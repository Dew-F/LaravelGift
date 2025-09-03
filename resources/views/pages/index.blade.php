@extends('layouts.app')

@section('title', 'NAME COMPANY - SHORT DESCRIPTION')

@section('content')
<swiper-container class="h-64 bg-gray-100 z-0">
    <swiper-slide class="flex justify-center items-center">
        <img class="max-h-full max-w-full block object-cover" src="{{ asset('storage/image1.png') }}" alt="Image 1">
    </swiper-slide>
    <swiper-slide class="flex justify-center items-center">
        <img class="max-h-full max-w-full block object-cover" src="{{ asset('storage/image2.png') }}" alt="Image 1">
    </swiper-slide>
    <swiper-slide class="flex justify-center items-center">
        <img class="max-h-full max-w-full block object-cover" src="{{ asset('storage/image3.png') }}" alt="Image 1">
    </swiper-slide>
</swiper-container>
<p class="text-center py-4">
    Любовь к жизни – это способность радоваться каждому моменту, наслаждаться каждой секундой,<br>
    чувствовать вкус каждой минуты. Это когда ты можешь остановиться, вдохнуть воздух и понять,<br>
    что ты счастлив. <b>Пусть это будет каждый день.</b>
</p>
<span class="px-4">КАК ПОЛУЧИТЬ ПОДАРОК</span>
<div class="grid grid-cols-3 gap-16 p-4">
    <livewire:gift-selector />
    <livewire:questionnaire-form />
    <a href="#" class="bg-gray-100 p-4 min-h-40 rounded-xl" id="pay-button">Оплатите</a>
</div>
<span class="px-4">Далее в дело вступает наш сервис:</span>
<div class="grid grid-cols-4 gap-8 p-4">
    <div class="bg-gray-100 p-4 min-h-40 rounded-xl"><b>Индивидуальный подход</b><br>
        Мы учитываем каждый
        запрос и подбираем
        подарок индивидуально</div>
    <div class="bg-gray-100 p-4 min-h-40 rounded-xl"><b>Каллиграфические подписи</b><br>
        Наш мастер
        подпишет подарок
        каллиграфическим
        почерком</div>
    <div class="bg-gray-100 p-4 min-h-40 rounded-xl"><b>Сюрпризы</b><br>
        Каждый подарок
        сопровождаем небольшим
        сюрпризом</div>
    <div class="bg-gray-100 p-4 min-h-40 rounded-xl"><b>Бесплатная доставка</b><br>
        Привезем домой или в офис</div>
</div>
<div class="text-center pb-4">
    <span class="">Дарите радость легко</span>
</div>
@endsection