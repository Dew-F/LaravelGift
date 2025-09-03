<div
    class="bg-gray-100 rounded-xl hover:bg-gray-200 transition min-h-40 relative {{ $isCompleted || session('questionnaire_completed') ? 'bg-gray-200' : '' }}">
    <div class="cursor-pointer h-full p-4" wire:click="$set('showModal', true)">
        <div class="flex items-center justify-between">
            <div>Ответьте на несколько вопросов</div>

            @if($isCompleted || session('questionnaire_completed'))
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            @endif
        </div>
    </div>

    @if($showModal)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-full max-w-7xl mx-auto">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-medium">Анкета</h3>
                    <button wire:click="$set('showModal', false)" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="p-6 max-h-[70vh] overflow-y-auto">
                    <form wire:submit.prevent="saveForm" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="font-medium text-gray-700">Ваше имя</label>
                                <input type="text" wire:model="formData.customer_name"
                                    class="mt-1 block w-full p-1 rounded-sm border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>

                            <div>
                                <label class="font-medium text-gray-700">Укажите, пожалуйста, номер телефона для
                                    связи</label>
                                <input type="tel" wire:model="formData.customer_phone"
                                    class="mt-1 block w-full p-1 rounded-md border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="font-medium text-gray-700">Кого вы хотите порадовать</label>
                                <select wire:model="formData.recipient_type"
                                    class="mt-1 block w-full p-1 rounded-md border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option value="">Выберите...</option>
                                    <option value="wife">Жена</option>
                                    <option value="husband">Муж</option>
                                    <option value="girlfriend">Девушка</option>
                                    <option value="boyfriend">Любимый</option>
                                    <option value="daughter">Дочь</option>
                                    <option value="son">Сын</option>
                                    <option value="mother">Мама</option>
                                    <option value="father">Папа</option>
                                    <option value="friend">Друг/Подруга</option>
                                    <option value="colleague">Сотрудник/ца, коллега</option>
                                    <option value="other">Другое</option>
                                </select>
                            </div>
                            <div>
                                <label class="font-medium text-gray-700">Какое оформление предпочитаете</label>
                                <select wire:model="formData.design_preference"
                                    class="mt-1 block w-full p-1 rounded-md border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                    <option value="">Выберите...</option>
                                    <option value="birthday">День рождения</option>
                                    <option value="new_year">Новый год</option>
                                    <option value="march_8">8 марта</option>
                                    <option value="february_23">23 февраля</option>
                                    <option value="neutral">Нейтральное</option>
                                    <option value="custom">Особенное</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="font-medium text-gray-700">Предпочтительные тона упаковки</label>
                                <select wire:model="formData.color_preference"
                                    class="mt-1 block w-full p-1 rounded-md border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Выберите...</option>
                                    <option value="light">Светлые</option>
                                    <option value="dark">Темные</option>
                                    <option value="bright">Яркие</option>

                                </select>
                            </div>

                            <div>
                                <label class="font-medium text-gray-700">Поздравление на подарке</label>
                                <select wire:model="formData.greeting_type"
                                    class="mt-1 block w-full p-1 rounded-md border-gray-300 border shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Выберите...</option>
                                    <option value="neutral">Нейтральное</option>
                                    <option value="motivational">Мотивирующее</option>
                                    <option value="none">Без надписи</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="font-medium text-gray-700">Дополнительная информация</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <input type="text" wire:model="formData.recipient_name" placeholder="Имя получателя"
                                    class="rounded-md border-gray-300 border p-1 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <input type="number" wire:model="formData.recipient_age" placeholder="Возраст"
                                    class="rounded-md border-gray-300 border p-1 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <textarea wire:model="formData.recipient_hobby" placeholder="Хобби, любимое занятие"
                                class="w-full rounded-md border-gray-300 p-1 border shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                            <input type="text" wire:model="formData.social_media_link"
                                placeholder="Ссылка на соц. сети получателя или фото"
                                class="w-full rounded-md border-gray-300 border p-1 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>

                        <div class="space-y-3">
                            <label class="font-medium text-gray-700">Информация о доставке</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <input type="date" wire:model="formData.delivery_date"
                                    class="rounded-md border-gray-300 p-1 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                <input type="time" wire:model="formData.delivery_time"
                                    class="rounded-md border-gray-300 p-1 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>

                            <input type="text" wire:model="formData.delivery_address" placeholder="Адрес доставки"
                                class="w-full rounded-md border-gray-300 p-1 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>

                        <div class="space-y-3">
                            <label class="font-medium text-gray-700">Контактная информация для доставки</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                <input type="text" wire:model="formData.recipient_contact_name" placeholder="Имя получателя"
                                    class="rounded-md border-gray-300 border p-1 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                                <input type="tel" wire:model="formData.recipient_contact_phone" placeholder="Телефон получателя"
                                    class="rounded-md border-gray-300 border p-1 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    required>
                            </div>
                            <input type="email" wire:model="formData.customer_email" placeholder="Ваш email"
                                class="w-full rounded-md border-gray-300 p-1 border shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                                Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>