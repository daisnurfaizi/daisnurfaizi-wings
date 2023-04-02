<div class="w-1/2 flex justify-center z-50">

    @if ($isVisible)
        <div role="alert"
            class="rounded-xl border  bg-white border-gray-100 p-4 shadow-xl animate__animated animate__fadeInDown alert alert-{{ $type }}"
            x-data="{ isVisible: true }" x-init="setTimeout(() => {
                isVisible = false;
                @this.call('hideAlert')
            }, 3000)" x-show="isVisible">
            <div class="flex items-start gap-4">
                @if ($type == 'error')
                    <span class="text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                @elseif ($type == 'warning')
                    <span class="text-yellow-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </span>
                @else
                    <span class="text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </span>
                @endif

                <div class="flex-1">
                    <strong class="block font-medium text-gray-900"> {{ $type }} </strong>

                    <p class="mt-1 text-sm text-gray-700">
                        {{ $type == 'success' ? $message : $message }}
                        {{-- Your product changes have been saved. --}}
                    </p>
                </div>

                <button class="text-gray-500 transition hover:text-gray-600">
                    <span class="sr-only">Dismiss popup</span>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    @endif


</div>
