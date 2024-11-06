<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Participants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;


class ParticipantsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {


        $participants = Participants::all();
        $participant_pria = Participants::selectRaw('count(gender) as gender_pria')->where('gender', 'P')->first();
        $participant_wanita = Participants::selectRaw('count(gender) as gender_wanita')->where('gender', 'W')->first();
        // return view('admin.dashboard', compact('participants', 'participant_pria', 'participant_wanita'));
        return view('admin.dashboard', [
            'participants' => Participants::orderBy('gender', 'desc')->orderBy('name', 'asc')->paginate(15),
            'participant_pria' => $participant_pria,
            'participant_wanita' => $participant_wanita
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($gender, $indexgender)
    {
        $indexgender;
        $gender;
        return view('guest.guest', compact('gender', 'indexgender'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $gender)
    {
        // dd($request->all(), $gender);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'age' => 'required'
        ]);

        // Normalize phone number to start with '628' so database will be tidy
        $phone = ltrim($request->phone, '+'); // Remove leading '+' if exists
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        $no_hp = Participants::where('phone', $phone)->select('id', 'phone', 'barcode_check_in_1')->first();
        if ($no_hp != null) {
            // dd($no_hp);
            $this->sendMessage($phone, $no_hp->barcode_check_in_1);
            return redirect('/guest-success/' . $no_hp->id)->with('success', 'Peserta Sudah terdaftar!');
        } else {
            $tokenLunch1 = $this->generateTokenLunch1();
            $tokenLunch2 = $this->generateTokenLunch2();
            $tokenCheckIn1 = $this->generateTokenCheckIn1();
            $tokenCheckIn2 = $this->generateTokenCheckIn2();
            $tokenCheckOut1 = $this->generateTokenCheckOut1();
            $tokenCheckOut2 = $this->generateTokenCheckOut2();

            Log::info('Generated Tokens:', [
                'Lunch 1' => $tokenLunch1,
                'Lunch 2' => $tokenLunch2,
                'Check In 1' => $tokenCheckIn1,
                'Check In 2' => $tokenCheckIn2,
                'Check Out 1' => $tokenCheckOut1,
                'Check Out 2' => $tokenCheckOut2,
            ]);
            $participant_pria = Participants::selectRaw('count(gender) as gender_pria')->where('gender', 'P')->first();
            $participant_wanita = Participants::selectRaw('count(gender) as gender_wanita')->where('gender', 'W')->first();
            // dd($participant_pria, $participant_wanita->gender_wanita);
            if ($gender == 'P') {
                if ($participant_pria->gender_pria >= 126) {
                    return redirect()->route('guest-full')->with('success', 'Kuota Terpenuhi!');
                } else {
                    $participant = Participants::create([
                        'name' => $request->name,
                        'gender' => $gender,
                        'phone' => $phone,
                        'age' => $request->age,
                        'lunch_voucher_1' => $tokenLunch1,
                        'lunch_voucher_2' => $tokenLunch2,
                        'barcode_check_in_1' => $tokenCheckIn1,
                        'barcode_check_out_1' => $tokenCheckOut1,
                        'barcode_check_in_2' => $tokenCheckIn2,
                        'barcode_check_out_2' => $tokenCheckOut2,
                        'status_check_in' => 0
                    ]);

                    $this->sendMessage($phone, $tokenCheckIn1);
                    $participant1 = Participants::where('id', $participant->id)->select('name', 'barcode_check_in_1')->first();
                    // return redirect()->route('guest-success', $participant->id)->with('success', 'Peserta berhasil ditambahkan!');
                    return redirect('/guest-success/' . $participant->id)->with('success', 'Peserta berhasil ditambahkan!');
                }
            } else {
                if ($participant_wanita->gender_wanita >= 80) {
                    return redirect()->route('guest-full')->with('success', 'Kuota Terpenuhi!');
                } else {
                    $participant = Participants::create([
                        'name' => $request->name,
                        'gender' => $gender,
                        'phone' => $phone,
                        'age' => $request->age,
                        'lunch_voucher_1' => $tokenLunch1,
                        'lunch_voucher_2' => $tokenLunch2,
                        'barcode_check_in_1' => $tokenCheckIn1,
                        'barcode_check_out_1' => $tokenCheckOut1,
                        'barcode_check_in_2' => $tokenCheckIn2,
                        'barcode_check_out_2' => $tokenCheckOut2,
                        'status_check_in' => 0
                    ]);
                    $this->sendMessage($phone, $tokenCheckIn1);
                    return redirect('/guest-success/' . $participant->id)->with('success', 'Peserta berhasil ditambahkan!');
                }

            }
        }




        //    dd($participant);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $participant = Participants::findOrFail($id);
        return view('participant.show', compact('participant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $participant = Participants::findOrFail($id);
        $participants = Participants::all();
        return view('guest.guest', compact('participant', 'participants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'age' => 'required'
        ]);

        $participant = Participants::findOrFail($id);
        $participant->update($validated);

        return redirect()->route('participant.index')->with('success', 'Data peserta berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Participants::destroy($id);
        return redirect()->route('participant.index')->with('success', 'Data peserta berhasil dihapus');
    }

    // Function to generate token barcode - Makan Siang 1
    private function generateTokenLunch1()
    {
        do {
            $randomNumber = random_int(1000, 9999); // Generates a random number between 1000 and 9999
            $date = now()->format('Ymd');
            $token = 'VMSI' . $date . '-' . $randomNumber;
        } while (Participants::where('lunch_voucher_1', $token)->exists()); // Check for uniqueness

        return $token;
    }

    // Function to generate token barcode - Makan Siang 2
    private function generateTokenLunch2()
    {
        do {
            $randomNumber = random_int(1000, 9999);
            $date = now()->format('Ymd');
            $token = 'VMSII' . $date . '-' . $randomNumber;
        } while (Participants::where('lunch_voucher_2', $token)->exists());

        return $token;
    }

    // Function to generate token barcode - Check In 1
    private function generateTokenCheckIn1()
    {
        do {
            $randomNumber = random_int(100, 300);
            $date = now()->format('Ymd');
            $token = 'CI' . $date . '-' . $randomNumber;
        } while (Participants::where('barcode_check_in_1', $token)->exists());

        return $token;
    }

    // Function to generate token barcode - Check In 2
    private function generateTokenCheckIn2()
    {
        do {
            $randomNumber = random_int(1000, 9999);
            $date = now()->format('Ymd');
            $token = 'CI' . $date . '-' . $randomNumber;
        } while (Participants::where('barcode_check_in_2', $token)->exists());

        return $token;
    }

    // Function to generate token barcode - Check Out 1
    private function generateTokenCheckOut1()
    {
        do {
            $randomNumber = random_int(1000, 9999);
            $date = now()->format('Ymd');
            $token = 'CO' . $date . '-' . $randomNumber;
        } while (Participants::where('barcode_check_out_1', $token)->exists());

        return $token;
    }

    // Function to generate token barcode - Check Out 2
    private function generateTokenCheckOut2()
    {
        do {
            $randomNumber = random_int(1000, 9999);
            $date = now()->format('Ymd');
            $token = 'CO' . $date . '-' . $randomNumber;
        } while (Participants::where('barcode_check_out_2', $token)->exists());

        return $token;
    }

    public function guess_success($id)
    {
        // dd($id);
        $barcode = Participants::where('id', $id)->select('barcode_check_in_1', 'name')->first();


        return view('guest.guest-success', compact('barcode'));

    }
    public function barcode()
    {

        $participants = [];
        return view('admin.barcode-check', compact('participants'));
    }
    public function barcode_check($barcode)
    {
        if(is_numeric($barcode)){
            $participant = Participants::where('barcode_check_in_1', 'like', '%' . $barcode . '%')->get();
        }else{
            $participant = Participants::where('name', 'like', '%' . $barcode . '%')->get();
        }
       
        // dd($participant);

        if ($participant) {
            return response()->json([
                'status' => 'success',
                'participant' => $participant,
                'code' => 200
            ]);
        } else {
            return response()->json([
                'status' => 'fail',

                'code' => 404
            ]);
        }

    }
    //fungsi cke in setelah barcode ditemukan
    public function check_in(Request $request)
    {
        $id = $request->input('id');  // Retrieve the `id` from the request data

        // Find the participant by ID
        $participant = Participants::find($id);
        if ($participant->status_check_in == 1) {
            return response()->json([
                'status' => 'Anda Sudah Check in',
                'code' => 202
            ]);
        } else {
            Participants::where('id', $id)->update([
                'status_check_in' => 1
            ]);
            return response()->json([
                'status' => 'Anda Sudah Check in',
                'message' => 'anda sudah check in',
                'code' => 200
            ]);
        }
    }
    
    public function kirimPesan($id){
         $participant = Participants::find($id);
         $phone = $participant->phone;
         $barcode = $participant->barcode_check_in_1;
         $name = $participant->name;
         $send_wa = $this->sendMessage($phone, $barcode, $name);
         if($send_wa == true){
             Participants::where('id', $id)->update([
                 'status_wa' => 1]);
                 
            return response()->json(['message' => 'Operasi berhasil', 'status'=>200], 200);
         }else{
             return response()->json(['message' => 'Operasi Gagal', 'status'=>400], 400);
         }
            
    }

    private function sendMessage($no_hp, $bar_code_check_in = "", $participant_name = "")
    {
        $api_key = env('WA_API_KEY');
        $number_key = env('WA_NUMBER_KEY');
        $curl = curl_init();
        $text = "Alhamdulillah, Anda telah terdaftar sebagai peserta Dauroh RBTQ Ibnu'Abbas.\\r\\n\\r\\n" .
                "Berikut nomor barcode yang telah Anda miliki:\\r\\n\\r\\n" .
                "*" . $bar_code_check_in . "*\\r\\n\\r\\n" .
                "Mohon untuk menunjukkan barcode ini kepada panitia saat acara berlangsung sebagai tanda registrasi.\\r\\n\\r\\n" .
                "Jazakumullahu Khairan atas kehadiran dan kepercayaan Anda. Kami nantikan kehadiran Anda, semoga Allah SWT memudahkan langkah Anda.\\r\\n\\r\\n" ;
                
       $text_baru = "Bismillah, \\r\\nAlhamdulillah\\r\\n\\r\\nAnda adalah *PESERTA DAUROH* RBTQ Ibnu`Abbas, dengan nomor barcode:\\r\\n\\r\\n*" . $bar_code_check_in . "*\\r\\n\\r\\nSampai bertemu di Dauroh nanti, \\r\\nIn syaa Allah\\r\\n\\r\\n========== \\r\\nPESAN INI TIDAK UNTUK DIBALAS.";
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.watzap.id/v1/send_message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                    "api_key": "' . $api_key . '",
                    "number_key": "' . $number_key . '",
                    "phone_no": ' . $no_hp . ',
                    "message": "' . $text_baru . '"
                }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                // 'Cookie: PHPSESSID=djqq1desdhuf251n7qhhfp81t7; X_URL_PATH=aHR0cHM6Ly9jb3JlLndhdHphcC5pZC98fHx8fHN1c3VrYWNhbmc%3D'
            ),
        ));

        $response = curl_exec($curl);
        $responseData = json_decode($response, true);
        if (isset($responseData['status']) && $responseData['status'] == 200) {
            return true;
        }

        return false;
    }
}
