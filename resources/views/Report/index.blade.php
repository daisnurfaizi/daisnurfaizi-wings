@extends('Templates.index')

@section('content')
    <!--
                                                                                                      This component uses @tailwindcss/forms

                                                                                                      yarn add @tailwindcss/forms
                                                                                                      npm install @tailwindcss/forms

                                                                                                      plugins: [require('@tailwindcss/forms')]
                                                                                                    -->
    {{-- {{ dd($reports) }} --}}
    <div class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="sticky inset-y-0 left-0 bg-gray-100 px-4 py-2 text-left">
                        <label class="sr-only" for="SelectAll">Select All</label>

                        <input class="h-5 w-5 rounded border-gray-200" type="checkbox" id="SelectAll" />
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                            ID

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                            User

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                            Total

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        <div class="flex items-center gap-2">
                            Date

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-700" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                        Item
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach ($reports as $report)
                    <tr>
                        <td class="sticky inset-y-0 left-0 bg-white px-4 py-2">
                            <label class="sr-only" for="Row1">Row 1</label>

                            <input class="h-5 w-5 rounded border-gray-200" type="checkbox" id="Row1" />
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                            {{ $report['document_code'] }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            {{ $report['user_name'] }}
                        </td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">
                            {{ 'Rp. ' . number_format($report['total_amount'], 2, ',', '.') }}
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $report['date'] }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            @foreach ($report['transaction_detail'] as $item)
                                <strong class="block mb-3 rounded bg-red-100 px-3 py-1.5 text-xs font-medium text-red-700">
                                    {{ $item['product_name'] . ' x ' . $item['quantity'] }}
                                </strong>
                            @endforeach

                        </td>
                    </tr>
                @endforeach



            </tbody>
        </table>
    </div>
@endsection
