<?php

namespace App\Http\Controllers;

use App\Models\Participants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ParticipantsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participants::all();
        return view('admin.dashboard', compact('participants'));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'age' => 'required',
            'lunch_voucher_1' => 'unique:lunch_voucher_1',
            'lunch_voucher_2' => 'unique:lunch_voucher_2',
            'barcode_check_in_1' => 'unique:barcode_check_in_1',
            'barcode_check_out_1' => 'unique:barcode_check_out_1',
            'barcode_check_in_2' => 'unique:barcode_check_in_2',
            'barcode_check_out_2' => 'unique:barcode_check_out_2',
        ]);

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

        $participant = Participants::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'age' => $request->age,
            'lunch_voucher_1' => $tokenLunch1,
            'lunch_voucher_2' => $tokenLunch2,
            'barcode_check_in_1' => $tokenCheckIn1,
            'barcode_check_out_1' => $tokenCheckOut1,
            'barcode_check_in_2' => $tokenCheckIn2,
            'barcode_check_out_2' => $tokenCheckOut2,
        ]);

        return redirect()->route('guest', $participant->id)->with('success', 'Peserta berhasil ditambahkan!');
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
    public function edit(string $id)
    {
        $participant = Participants::findOrFail($id);
        $participants = Participants::all();
        return view('admin.dashboard', compact('participant', 'participants'));
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
            $randomNumber = random_int(1000, 9999);
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
}
