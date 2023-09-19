<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Detail') }}
        </h2>
    </x-slot>

    <div class="py-12 mt-[120px]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white overflow-hidden shadow-md p-3">
                <div class="shrink-0 p-4">
                    <div class="w-[450px] h-[450px] bg-gray-300"></div>
                </div>
                <div class="p-5 box-border flex-auto flex flex-col">
                    <h1 class="text-2xl font-bold ">{{ $product->name }}</h1>
                    <div class="mt-2 flex relative">
                        <div class="text-base flex items-center pr-4">
                            <span class="block mr-1 font-semibold">{{ $product->average_ratings }}</span>
                            <x-star-rating :stars="round($product->average_ratings)"/>
                        </div>
                        <div class="text-base flex items-center px-4 border-l-2 border-gray-300">
                            <span class="block mr-1 font-semibold">{{ $product->reviews()->count() }}</span>
                            <span class="text-sm">Ratings</span>
                        </div>
                        <div class="text-base flex items-center px-4 border-l-2 border-gray-300">
                            <span class="block mr-1 font-semibold">{{ $product->sold_quantity }}</span>
                            <span class="text-sm">Solds</span>
                        </div>
                    </div>
                    <div class="py-4 px-5 flex items-center">
                        <div class="text-3xl"> {{ number_format($product->price) }} VND</div>
                    </div>
                    <div>
                        <div class="py-4">
                            <div class="text-sm font-semibold">{{ __('Stock quantity') }}</div>
                            <div class="py-3 text-gray-600">{{ $product->stock_quantity }}</div>
                        </div>
                        <form>
                            <div class="text-sm font-semibold">{{ __('Quantity') }}</div>
                            <x-input class="w-[100px] my-3" type="number" :value="1"/>
                            <div class="border-t-2 border-gray-300 py-3 space-x-4">
                                <x-button>
                                    {{ __('Add to cart') }}
                                </x-button>
                                <x-button>
                                    {{ __('Purchase') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mt-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-5 uppercase">{{ __('Product Description') }}</h1>
                    <p class="mt-2 text-md max-w-[600px]">{{ $product->description }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg mt-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-5 uppercase">{{ __('Product Reviews') }}</h1>
                    <div class="p-6 bg-gray-100 border border-gray-300 min-h-[5rem] mb-4 box-border flex items-center">
                        <div class="text-center mr-8">
                            <div class="text-lg">
                                <span class="text-2xl font-semibold">{{ $product->average_ratings }}</span>
                                <span>{{ __('out of 5') }}</span>
                            </div>
                            <div class="text-2xl">
                                <x-star-rating class="" :stars="round($product->average_ratings)"/>
                            </div>
                        </div>
                        <div class="ml-4 flex">
                            <div class="mx-2 my-1 px-4 py-1 border-slate-300 border-2">{{ __('All') }}</div>
                            <div class="mx-2 my-1 px-4 py-1 border-slate-300 border-2">{{ __('5 stars') }}</div>
                            <div class="mx-2 my-1 px-4 py-1 border-slate-300 border-2">{{ __('4 stars') }}</div>
                            <div class="mx-2 my-1 px-4 py-1 border-slate-300 border-2">{{ __('3 stars') }}</div>
                            <div class="mx-2 my-1 px-4 py-1 border-slate-300 border-2">{{ __('2 stars') }}</div>
                            <div class="mx-2 my-1 px-4 py-1 border-slate-300 border-2">{{ __('1 star') }}</div>
                        </div>
                    </div>
                    @foreach($product->reviews as $review)
                        <x-product-review :review="$review"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
