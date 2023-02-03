<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная | Sneakers</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @livewireStyles

    <style>
        .cut{
            overflow: hidden;
            text-overflow: ellipsis;
            display: -moz-box;
            -moz-box-orient: vertical;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-clamp: 2;
            box-orient: vertical;
        }
        .delete-btn:active svg path{
            fill: #FF8585;
        }
        .cart-button img{
            transition: 0.3s all;
        }
        .cart-button:hover img{
            margin-right: 33px;
        }
    </style>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#E7F6FF] flex items-center justify-center" x-data="{cart_slider: false}" :class="cart_slider && 'overflow-hidden'">
<section id="cart" class="fixed z-50 w-full h-screen top-0 right-0" x-show="cart_slider" x-transition.duration.300ms>
    <div class="w-full h-full bg-black bg-opacity-60" x-show="cart_slider" x-transition @click="cart_slider = false"></div>
    <div class="h-full w-full sm:w-[385px] flex flex-col justify-content-between bg-white absolute top-0 p-[30px] right-0 transition-all duration-500">
        <div class="flex items-center justify-between">
            <p class="text-[24px] font-bold">Корзина</p>
            <button @click="cart_slider = false" class="delete-btn block sm:hidden w-[32px] h-[32px] flex items-center justify-center border border-[#F2F2F2] rounded-[8px] duration-200 transition hover:scale-110 hover:rotate-6 active:bg-[#FEF0F0] active:border-none">
                <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                    <path class="transition duration-300" d="M9.0799 7.61553L6.6311 5.16673L9.07982 2.71801C10.0241 1.77376 8.55964 0.309342 7.6154 1.25359L5.16668 3.70231L2.71787 1.2535C1.77384 0.309466 0.309467 1.77384 1.2535 2.71787L3.70231 5.16668L1.25359 7.61539C0.309343 8.55964 1.77376 10.0241 2.71801 9.07982L5.16673 6.6311L7.61553 9.0799C8.55969 10.0241 10.0241 8.55969 9.0799 7.61553Z" fill="#B5B5B5"/>
                </svg>
            </button>
        </div>
        <div class="flex flex-col mt-[30px] gap-[20px] h-full overflow-x-hidden">
            <div class="w-full rounded-[20px] border border-[#F3F3F3] p-[20px] flex items-center justify-between" >
                <img class="h-[70px] mt-[-10px]" src="./assets/img/cart-img.png" alt="cart-img">
                <div class="flex flex-col w-[150px]">
                    <p class="cut text-[14px] leading-[17px]">Мужские Кроссовки Nike Air Max 270</p>
                    <p class="text-[14px] font-bold">12 999 руб.</p>
                </div>
                <button class="delete-btn w-[32px] h-[32px] flex items-center justify-center border border-[#F2F2F2] rounded-[8px] duration-200 transition hover:scale-110 hover:rotate-6 active:bg-[#FEF0F0] active:border-none">
                    <svg width="10" height="10" viewBox="0 0 10 10" xmlns="http://www.w3.org/2000/svg">
                        <path class="transition duration-300" d="M9.0799 7.61553L6.6311 5.16673L9.07982 2.71801C10.0241 1.77376 8.55964 0.309342 7.6154 1.25359L5.16668 3.70231L2.71787 1.2535C1.77384 0.309466 0.309467 1.77384 1.2535 2.71787L3.70231 5.16668L1.25359 7.61539C0.309343 8.55964 1.77376 10.0241 2.71801 9.07982L5.16673 6.6311L7.61553 9.0799C8.55969 10.0241 10.0241 8.55969 9.0799 7.61553Z" fill="#B5B5B5"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex flex-col gap-[24px] mt-[20px]">
            <div class="flex flex-col gap-[6px]">
                <div class="flex justify-between">
                    <p class="text-[16px]">Итого:</p>
                    <p class="font-bold">21 189 руб.</p>
                </div>
                <div class="flex justify-between">
                    <p class="text-[16px]">Налог 5%:</p>
                    <p class="font-bold">1074 руб.</p>
                </div>
            </div>
            <button class="cart-button w-full h-[55px] bg-[#9DD458] rounded-[18px] font-semibold text-white relative flex items-center justify-center transition duration-300 hover:scale-105">
                Оформить заказ
                <img class="absolute right-0 mr-[44px]" src="{{ asset('assets/img/cart-arrow.svg') }}" alt="">
            </button>
        </div>
    </div>
</section>
<main class="w-[1080px] bg-white rounded-[20px] shadow-xl mt-0 mt-[0px] lg:mt-[85px]">
    <div class="header h-[128px] w-full border-b border-[#EAEAEA] flex items-center justify-between">
        <div class="px-[45px] flex flex-col gap-[20px] md:flex-row items-center justify-between w-full">
            <a href="#" class="flex items-center gap-[16px]">
                <img src="./assets/img/logo.svg" alt="logo" class="w-[40px] h-[40px]">
                <div class="flex flex-col">
                    <p class="font-bold text-[20px]">REACT SNEAKERS</p>
                    <p class="mt-[-6px] text-[#9D9D9D]">Магазин лучших кросовок</p>
                </div>
            </a>
            <div class="flex items-center gap-[30px]">
                <a class="flex items-center gap-[10px] cursor-pointer" @click="cart_slider = true">
                    <img class="w-[20px] h-[20px]" src="./assets/img/cart.svg" alt="cart">
                    <p class="text-[14px] text-[#5C5C5C]">1205 руб.</p>
                </a>
                <a href="#">
                    <img class="w-[20px] h-[20px]" src="assets/img/like.svg" alt="like">
                </a>
                <a href="login.html">
                    <img class="w-[20px] h-[20px]" src="assets/img/user.svg" alt="user">
                </a>
            </div>
        </div>
    </div>
    <div class="mt-[45px] mx-[60px] bg-[#F4EFE9] rounded-[20px] h-[240px] lg:h-[300px] relative">
        <img class="absolute top-[16px] left-[20px] relative z-10" src="./assets/img/adidas.svg" alt="adidas">
        <div class="flex flex-col left-0 md:left-[60px] top-[54px] lg:top-[80px] absolute z-10 w-full flex items-center md:block md:w-none">
            <p class="text-[38px] font-bold"><span class="text-[#8BB43C]">Stan Smith</span>, </br> Forever!</p>
            <button class="bg-[#A5D364] rounded-full w-[176px] h-[46px] text-white font-bold">КУПИТЬ</button>
        </div>
        <img src="./assets/img/banner.png" alt="banner" class="absolute hidden md:block h-[240px] lg:h-full top-0 right-0 z-0">
        <button class="absolute right-[-18px] top-[45%] rounded-full shadow-md flex items-center justify-center w-[35px] h-[35px] bg-white">
            <img src="./assets/img/arrow.svg" class="h-[12px]" alt="arrow">
        </button>
    </div>
    <section id="main" class="mx-[60px] mt-[40px]">
        <div class="flex flex-col gap-[10px] md:gap-0 md:flex-row items-center w-full justify-between">
            <p class="text-[24px] md:text-[32px] font-bold">Все кроссовки</p>
            <div class="relative flex items-center">
                <img class="absolute w-[16px] left-[18px]" src="./assets/img/search.svg" alt="search">
                <input class="placeholder:text-[#C4C4C4] py-[10px] pr-[14px] md:py-[14px] pl-[46px] md:pr-[18px] border border-[#F3F3F3] rounded-[10px]"
                       type="text" placeholder="Поиск...">
            </div>
        </div>
        <div class="w-full flex justify-around mb-[40px]">
            <div class="grid mt-[40px] grid-flow-row gap-8 md:gap-6 grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach($products as $product)
                    <div class="w-[210px] p-[30px] border border-[#F3F3F3] rounded-[40px] transition duration-700 hover:shadow-md hover:translate-y-[-10px] relative">
                        <div class="w-[150px] h-[120px] flex items-center justify-center relative">
                            <button class="absolute border top-0 left-0 w-[32px] h-[32px] flex items-center justify-center border-[#F2F2F2] rounded-[8px] duration-200 transition hover:scale-110 hover:-rotate-6">
                                <svg class="transition duration-300" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                     style="fill: #ECECEC;">
                                    <path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path>
                                </svg>
                            </button>
                            <img class="h-full" src="{{ asset('storage/'.$product->img_path) }}" alt="sneakers">
                        </div>
                        <p class="text-[14px] cut my-[14px]">{{ $product->name }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col">
                                <p class="uppercase text-[11px] text-[#BDBDBD]">ЦЕНА:</p>
                                <p class="font-bold mt-[-4px]">{{ number_format((int)$product->price, 0, '.', ' ') }} руб.</p>
                            </div>
                            <button class="w-[32px] h-[32px] flex items-center justify-center border-[#F2F2F2] rounded-[8px] duration-200 transition hover:scale-110 hover:rotate-6">
{{--                                <img class="w-[11px]" src="./assets/img/plus.svg" alt="plus">--}}
                                <img class="w-[11px]" src="./assets/img/check.png" alt="plus">
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
@livewireScripts
</body>
</html>
