{{-- search box --}}


<div>
    <div class="w-full flex justify-center">

        <div class="w-1/2">
            <input type="text" wire:model="cari"
                class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                placeholder="Cari" />
        </div>
        {{-- </div> --}}
    </div>

    {{-- end search box --}}

    {{-- product --}}

    <section
        class="w-fit h-screen mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5 overflow-auto">

        <!--   ✅ Product card 1 - Starts Here 👇 -->
        @foreach ($products as $product)
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
                <div>
                    <img src="{{ $product->image }}" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                    <div class="px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3 uppercase text-xs">Brand {{ $product->product_code }}</span>
                        <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->product_name }}
                        </p>
                        <span class="text-gray-400 mr-3 uppercase text-xs">Dimensi</span>
                        <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->dimension }}</span>

                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">Rp.
                                {{ number_format(($product->price * $product->discount) / 100, 2, ',', '.') }}</p>
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">Rp.
                                    {{ number_format($product->price, 2, ',', '.') }}</p>
                            </del>
                            {{-- button rounded plus --}}

                            <div wire:click="addToCart('{{ $product->product_code }}')"
                                class="ml-auto hover:bg-green-500 rounded-full p-2 duration-500"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <!--   🛑 Product card 1 - Ends Here  -->
        {{-- paginate --}}


    </section>
    <div class="w-full flex justify-center">
        {{ $products->links() }}
    </div>
</div>
{{-- end product --}}
