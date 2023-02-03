<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход | Sneakers</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#E7F6FF] flex items-center justify-center h-screen px-[10px]">
<div class="bg-white w-full sm:w-[400px] rounded-[20px]">
    <form action="{{ route('auth.login.post') }}" method="POST" class="md:px-[55px] pt-[48px]">
        @csrf
        <p class="text-[32px] font-semibold text-center">Вход в аккаунт</p>
        <div class="flex flex-col gap-[14px] mt-[31px] items-center">
            @if(session()->has('message'))
                <div class="w-[290px] bg-red-400 px-5 py-2 text-white rounded">
                    {{ session('message') }}
                </div>
            @endif
            <div class="flex flex-col">
                <input name="email" value="{{ old('email') }}"
                       class="w-[290px] h-[45px] pl-[20px] rounded-[10px] border border-[#F3F3F3]" type="text"
                       placeholder="Почта пользователя">
                @error('email') <p class="text-red-700">{{ $message }}</p> @enderror
            </div>
            <div class="flex flex-col">
                <input name="password" class="w-[290px] h-[45px] pl-[20px] rounded-[10px] border border-[#F3F3F3]"
                       type="password" placeholder="Пароль от аккаунта">
                @error('password') <p class="text-red-700">{{ $message }}</p> @enderror
            </div>
            <div class="flex w-full items-start">
                <label class="block text-gray-500 font-bold" for="remember">
                    <input class="ml-1 leading-tight" type="checkbox" id="remember" name="remember">
                    <span class="text-sm">remember me</span>
                </label>
            </div>
        </div>
        <div class="w-full mt-[31px] flex justify-center">
            <button type="submit"
                    class="bg-[#9DD458] rounded-[18px] w-[245px] h-[55px] text-white font-semibold transition duration-200 hover:scale-105">
                Войти
            </button>
        </div>
        <div class="mt-[10px] w-full flex justify-center">
            <a href="{{ route('auth.register') }}" class="text-[16px] text-blue-600">Регистрация</a>
        </div>
    </form>
    <div class="flex flex-col w-full mt-[24px]">
        <div class="flex items-center w-full justify-between mb-[15px]">
            <span class="w-full h-[1px] bg-[#D9D9D9]"></span>
            <p class="mx-[12px]">Или</p>
            <span class="w-full h-[1px] bg-[#D9D9D9]"></span>
        </div>
        <div class="flex w-full justify-center items-center gap-[25px] mb-[25px]">
            <a href="#" class="transition duration-200 hover:scale-105 hover:-rotate-6">
                <img class="w-[36px] h-[36px]" src="{{ asset('assets/img/social/vk.png') }}" alt="vk">
            </a>
            <a href="#" class="transition duration-200 hover:scale-105">
                <img class="w-[36px] h-[36px]" src="{{ asset('assets/img/social/chrome.png') }}" alt="chrome">
            </a>
            <a href="#" class="transition duration-200 hover:scale-105 hover:rotate-6">
                <img class="w-[36px] h-[36px]" src="{{ asset('assets/img/social/discord.png') }}" alt="discord">
            </a>
        </div>
    </div>
</div>

</body>
</html>
