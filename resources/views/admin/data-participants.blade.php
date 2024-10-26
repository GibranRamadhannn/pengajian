<!-- PHP Syntax for convert barcode to PNG -->
<?php use Picqer\Barcode\BarcodeGeneratorPNG; ?>

<!-- Code begin -->
<div class="container mx-auto p-6 rounded-lg shadow-lg bg-white">
    <!-- Title -->
    <h1 class="text-3xl font-bold text-black mb-6">Participant</h1>
    <!-- Table Code begin -->
    <div class="rounded-lg shadow-lg p-4">
        <table class="min-w-full divide-y divide-gray-200 bg-white border border-gray-200 overflow-x-auto "
            id="participant-table">
            <!-- Table Head begin -->
            <thead class="bg-[#F4F6FF] text-black">
                <!-- Table Row Head begin -->
                <tr>
                    <!-- Row Head Items begin -->
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gender
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
            <tbody class="text-black divide-y divide-gray-200">
                <!-- Looping Data -->
                @foreach($participants as $participant)
                <!-- Table Row Body begin -->
                <tr class="text-center border-b">
                    <!-- Row Body Items begin -->
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $participant->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $participant->phone }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $participant->gender }}</td>
                    <td class="p-4 text-center">
                        <div class="flex flex-col items-center">
                            <div class="flex-shrink-0">
                                <!-- Generate Barcode to PNG -->
                                <?php
                        $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                        $barcode = base64_encode($generator->getBarcode($participant->barcode_check_in_1, $generator::TYPE_CODE_128));
                        ?>
                                <img src="data:image/png;base64,<?= $barcode ?>" class="w-60" alt="Barcode">
                            </div>
                            <!-- Number of barcode-->
                            <div class="text-sm font-medium text-gray-900">{{ $participant->barcode_check_in_1
                                }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!-- Edt Action Button -->
                        <a href="{{ route('participant.edit', $participant->id) }}" id="open-modal-edit-participant"
                            class="text-indigo-600 hover:text-indigo-900" data-id="{{ $participant->id }}">Edit</a>
                        <!-- Delete Action Button -->
                        <a href="#" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                    </td>
                    <!-- Row Body Items begin -->
                </tr>
                <!-- Table Row end -->
                @endforeach
            </tbody>
            <!-- Table Body End -->
        </table>
    </div>
    <!-- Table Code end -->
</div>
<!-- Code end -->

<div id="modal-edit-participant" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Deactivate
                                account</h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Are you sure you want to deactivate your account? All
                                    of your data will be permanently removed. This action cannot be undone.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button"
                        class="close-modal inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Deactivate</button>
                    <button type="button"
                        class="close-modal mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>