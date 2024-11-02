@extends('layouts.app')
@section('content')
    
<div class="container mx-auto p-6 rounded-lg shadow-lg bg-white">
    <!-- Title -->
    <h1 class="text-3xl font-bold text-black mb-6">Participant</h1>
    <!-- Table Code begin -->
    <div class="rounded-lg shadow-lg p-4">
        <div class="grid justify-items-center mb-5">
            <label for="Input barcode">Scan Barcode</label>
            <input type="text" id="scan-barcode" name="barcode_scan">
        </div>
        <table class="min-w-full divide-y divide-gray-200 bg-white border border-gray-200 overflow-x-auto "
            id="participant-table-one">
            <!-- Table Head begin -->
            <thead class="bg-[#F4F6FF] text-black">
                <!-- Table Row Head begin -->
                <tr>
                    <!-- Row Head Items begin -->
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Class
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Barcode
                        Check In</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                    <!-- Row Head Items end -->
                </tr>
                <!-- Table Row Head end -->
            </thead>
            <!-- Table Head end -->
            <!-- Table Body begin -->
           <tbody>

           </tbody>
            <!-- Table Body End -->
        </table>
    </div>
    <!-- Table Code end -->
</div>

@endsection