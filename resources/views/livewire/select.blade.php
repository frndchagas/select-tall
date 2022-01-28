<div class="flex flex-col mt-12 w-full mx-auto items-center">
    <h1 class="font-semibold text-4xl">Select country code - Example</h1>

    <div x-data="{ open: false }" class="flex flex-col gap-y-2 relative mt-10">

        <span for="email" class="text-gray-500 text-xl font-medium">Phone
            Number</span>

        <div class="flex w-[448px]">

            <!-- btn to open modal -->
            <a @click="open = true" class="flex group items-center">
                <div id="email"
                    class="h-[48px] bg-gray-100 border-none w-14 rounded-l-md hover:border-gray-300 flex items-center justify-center">
                    {{ $codePhone }}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[48px] w-6 bg-gray-100 text-gray-700" x-show="!open"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-[48px] w-6 bg-gray-100 text-gray-700" x-show="open"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                </svg>
            </a>
            <!-- end of btn to open modal -->

            <div class="px-2 bg-gray-100 border-r border-r-gray-200"></div>
            <input type="text" id="phone_number" wire:model.defer="phoneNumber"
                class="h-[48px] bg-gray-100 border-none w-full rounded-r-md hover:border-gray-300 focus:outline-none focus:ring-0">
            @error('phoneNumber')
                <p class="text-xs text-red-600">{{ $errors->first('phoneNumber') }}</p>
            @enderror
        </div>

        <!-- select with country -->
        <div @click.away="open = false, $wire.set('inputSearch', '')" x-show="open"
            class=" absolute max-w-[250px] inset-0 top-[85px] z-50 bg-white">
            <div
                class="flex flex-col w-[250px] shadow-lg rounded-md overflow-y-auto h-[320px] relative border border-gray-200 bg-white
                    scrollbar scrollbar-thumb-gray-500 scrollbar-track-white scrollbar-thin scrollbar-bor scrollbar-track-rounded-full scrollbar-thumb-rounded-full">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 absolute inset-0 top-[18px] left-5 z-50 text-gray-800" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Search" wire:model="inputSearch"
                    class="bg-gray-100 relative h-[48px] w-[230px] m-2 rounded-md border-0 hover:border-gray-300 focus:ring-[#24ae8f] pl-10 placeholder:text-gray-500">

                </input>


                <!-- item -->

                @if (count($countryArray) == 0)
                    <div class="flex items-center justify-center">
                        <p class="text-gray-600 text-md pt-5">No country found</p>
                    </div>
                @else
                    @foreach ($countryArray as $chave => $valor)

                        <a wire:click="$set('codePhone', '+{{ $valor['code'] }}')" @click="open = false">
                            <div
                                class="group flex max-w-[250px] justify-between items-center hover:bg-gray-100 px-4 h-[48px] py-2">
                                <div class=" flex gap-x-2 items-center">
                                    <img src="https://flagicons.lipis.dev/flags/4x3/{{ strtolower($chave) }}.svg"
                                        alt="{{ $valor['name'] }}" class="w-4 h-4">
                                    <span class="font-semibold text-gray-600 group-hover:text-[#24ae8f]  w-[160px]">
                                        {{ ucwords(strtolower($valor['name'])) }}
                                    </span>
                                </div>
                                <span
                                    class="text-gray-600 text-right group-hover:text-[#24ae8f]">+{{ $valor['code'] }}</span>
                            </div>
                        </a>
                    @endforeach
                @endif

                <!-- end item -->



            </div>
        </div>
        <!-- end select with country -->
    </div>



</div>
