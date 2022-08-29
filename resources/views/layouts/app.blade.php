<!DOCTYPE html>
<html lang="en">
<head>
    <title>My social</title>
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    @vite('resources/css/app.css')
    @livewireStyles
    @yield('style')
    @yield('script')

</head>
<body class="bg-main-900">
    <nav class="bg-main-500 justify-between flex text-white">
        <ul class="flex px-4 py-4 font-serif">
            <li class="p-3">
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="p-3">
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="p-3">
                <a href="{{ route('posts') }}">Posts</a>
            </li>
            @auth
            <li class="p-3">
                <a href="{{ route('friends') }}">Friends</a>
            </li>
            @endauth
        </ul>
        <ul class="flex px-4 py-4 font-serif">
            @guest
                <li class="p-3">
                    <a href="{{ route('login') }}">Login</a>
                </li>
                <li class="p-3">
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endguest
            @auth
                <li class="p-3">
                    <a href="{{ route('profile', ['user' => auth()->user()]) }}">{{ auth()->user()->username }}</a>
                </li>
                <li class="p-3">
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit" class="p-1 bg-main-600  px-3  rounded-md text-white">Logout</a>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>

    @livewireScripts
    @yield('content')
    <br>
    <br>
    <br>

</body>
</html>