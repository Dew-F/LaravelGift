<div>
    <!-- Блок с выбранным подарком -->
    <div class="bg-gray-100 p-2.5 min-h-40 rounded-xl cursor-pointer transition hover:bg-gray-200" wire:click="showGiftModal">
        @if($selectedGift)
            <div>
                <div class="w-full h-44 flex items-center justify-center bg-white rounded-xl">
                    <img src="{{ $selectedGift->image }}" class="w-full h-40 object-contain mb-2 rounded"
                        alt="{{ $selectedGift->name }}">
                </div>
                <p class="font-bold">{{ $selectedGift->name }}</p>
                <p class="text-gray-600 mb-1">{{ $selectedGift->price }} ₽</p>
            </div>

        @else
            <span>Выберите подарок</span>
        @endif
    </div>

    <!-- Модальное окно -->
    @if($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg max-w-7xl mx-auto max-h-[80vh] overflow-y-auto">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">Выберите подарок</h2>
                    <button wire:click="$set('showModal', false)" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Категории -->
                @if(!$selectedCategory)
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Выберите категорию:</h3>
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($categories as $category)
                                <div wire:click="selectCategory({{ $category->id }})"
                                    class="bg-gray-100 p-4 rounded-lg cursor-pointer hover:bg-gray-200">
                                    <h4 class="font-bold">{{ $category->name }}</h4>
                                    <p class="text-sm text-gray-600">{{ $category->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <!-- Продукты -->
                    <div>
                        <button wire:click="backToCategories" class="mb-4 text-blue-500 hover:text-blue-700">
                            ← Назад к категориям
                        </button>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($products as $product)
                                <div wire:click="selectProduct({{ $product->id }})"
                                    class="bg-white p-4 rounded-lg cursor-pointer hover:bg-gray-200">
                                    <div class="w-full h-44 flex items-center justify-center bg-white rounded-xl">
                                        <img src="{{ $product->image }}" class="w-full h-40 object-contain mb-2 rounded"
                                            alt="{{ $product->name }}">
                                    </div>
                                    <h4 class="font-bold">{{ $product->name }}</h4>
                                    <p class="text-gray-600">{{ $product->price }} ₽</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>