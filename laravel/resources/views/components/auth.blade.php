@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <a href="{{ route('account')}}" class="text-sm text-gray-700 underline">Профиль</a>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit">Выход</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Вход</a>
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Регистрация</a>
        @endauth
    </div>
@endif
