<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tên danh mục') }}
        </h2>
    </x-slot>

    <div class="py-12 mt-[120px]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="text-2xl font-semibold mb-5">DANH MỤC</h1>
                    <div class="grid grid-cols-11 gap-1">
                        
                        @foreach($categories as $category)
                        <a href="/" class="flex flex-col items-center hover:bg-slate-100 border-2 border-gray-100 shadow-md p-2">
                            <div class="shrink max-h-[80px] py-2">
                                <img class="max-w-full max-h-full align-middle" src="/storage/default_product.png" />
                            </div>
                            <span class="block mt-2 text-center font-semibold">{{ $category->name }}</span>
                            <span class="block mt-1 text-center text-sm">{{ $category->products->count() }} {{ __('products') }}</span>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="container mt-8 flex">
                <div id="products-filter-panel" class="mr-5 flex flex-col min-w-[180px] items-stretch">
                    <div id="filter-title">
                        <i class="fi fi-br-bars-filter"></i>
                        <span class="uppercase font-semibold text-md ml-2">{{ __('Filter') }}</span>
                    </div>
                    <div class="py-5 border-b-gray-500 border-b-2">
                        <div class="font-medium text-md mb-3">{{ __('Ratings') }}</div>
                        <div class="flex flex-col items-start">
                            <div class="cursor-pointer flex items-center px-3 space-x-2">
                                <x-star-rating class="text-center" :stars="5"/>
                            </div>
                            <div class="cursor-pointer flex items-center px-3 space-x-2">
                                <x-star-rating class="text-center" :stars="4"/>
                                <span class="text-black">trở lên</span>
                            </div>
                            <div class="cursor-pointer flex items-center px-3 space-x-2">
                                <x-star-rating class="text-center" :stars="3"/>
                                <span class="text-black">trở lên</span>
                            </div>
                            <div class="cursor-pointer flex items-center px-3 space-x-2">
                                <x-star-rating class="text-center" :stars="2"/>
                                <span class="text-black">trở lên</span>
                            </div>
                            <div class="cursor-pointer flex items-center px-3 space-x-2">
                                <x-star-rating class="text-center" :stars="1"/>
                                <span class="text-black">trở lên</span>
                            </div>
                        </div>
                    </div>
                    <div class="py-5 border-b-gray-500 border-b-2">
                        <div class="font-medium text-md mb-3">{{ __('Price Range') }}</div>
                        <form>
                            <div class="flex flex-col items-stretch space-y-3">
                                <div class="flex items-center justify-between">
                                    <x-input class="max-w-[80px] text-center px-2 outline-none" placeholder="{{ __('From') }}" />
                                    <x-input class="max-w-[80px] text-center px-2 outline-none" placeholder="{{ __('To') }}" />
                                </div>
                                <x-button class="uppercase py-2 px-4 text-center">
                                    {{ __('Apply') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                    <div class="py-5">
                        <form>
                            <x-button class="uppercase py-2 px-4 text-center">
                                {{ __('Delete All') }}
                            </x-button>
                        </form>
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="text-2xl font-semibold mb-5 uppercase">TÊN DANH MỤC</h1>
                            <p class="mt-2 text-md max-w-[600px]">Mô tả danh mục</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-3 bg-white border-b border-gray-200 flex items-center space-x-2">
                            <h2 class="text-lg font-semibold">Sắp xếp theo</h2>
                            <div class="flex justify-start items-stretch flex-1 space-x-2">
                                <button class="py-2 px-3 bg-green-300 shadow-sm border border-gray-200">Bán chạy</button>
                                <button class="py-2 px-3 bg-white shadow-sm border border-gray-200">Mới nhất</button>
                                <button class="py-2 px-3 bg-white shadow-sm border border-gray-200">Giá Thấp Đến Cao</button>
                                <button class="py-2 px-3 bg-white shadow-sm border border-gray-200">Giá Cao Đến Thấp</button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden mt-5">
                        <div class="grid grid-cols-4 gap-3 mb-5">
                            @foreach($products as $product)
                            <a href="{{ route('products.show', ['productId' => $product->id]) }}" class="block">
                                <x-product-card :product="$product"/>
                            </a>
                            @endforeach
                        </div>

                        {{ $products->links() }}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
