@extends('layouts.app')

@section('content')
    <div class="justify-center flex">
        <div class="w-4/12 rounded-lg p-6 bg-main-500 text-white mt-4 shadow-lg shadow-main-400">
        <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form action="{{ route('register') }}" method="POST" class="">
                @csrf
                {{-- Input a name --}}
                <div class="mb-4">
                    <label for="name" class="sr-only">name</label>
                    <input type="text" id="name" name="name" class="placeholder-main-400 bg-main-100 border-2 w-full text-main-600 focus:outline-none
                    p-4 rounded-lg @error('name') border-error-400 @enderror" value="{{ old('name') }}" placeholder="Enter your name">
                    @error('name')
                        <div class="px-1 py-1 bg-error-500 w-fit text-white rounded text-center mt-2 font-bold text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Input a username --}}
                <div class="mb-4">
                    <label for="username" class="sr-only">username</label>
                    <input type="text" id="username" name="username" class="placeholder-main-400 bg-main-100 border-2 w-full text-main-600 focus:outline-none
                    p-4 rounded-lg @error('username') border-error-400 @enderror" value="{{ old('username') }}" placeholder="Enter your username">
                    @error('username')
                        <div class="px-1 py-1 bg-error-500 w-fit text-white rounded text-center mt-2 font-bold text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Input a email --}}
                <div class="mb-4">
                    <label for="email" class="sr-only">email</label>
                    <input type="email" id="email" name="email" class="placeholder-main-400 bg-main-100 border-2 w-full text-main-600 focus:outline-none
                    p-4 rounded-lg @error('email') border-error-400 @enderror" value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <div class="px-1 py-1 bg-error-500 w-fit text-white rounded text-center mt-2 font-bold text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Input a password --}}
                <div class="mb-4">
                    <label for="password" class="sr-only">password</label>
                    <input type="password" id="password" name="password" class="placeholder-main-400 bg-main-100 border-2 w-full text-main-600 focus:outline-none
                    p-4 rounded-lg @error('password') border-error-400 @enderror" value="{{ old('password') }}" placeholder="Enter your password">
                    @error('password')
                        <div class="px-1 py-1 bg-error-500 w-fit text-white rounded text-center mt-2 font-bold text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Repeat password --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="placeholder-main-400 bg-main-100 border-2 w-full text-main-600 focus:outline-none
                    p-4 rounded-lg @error('password_confirmation') border-error-400 @enderror" value="{{ old('password_confirmation') }}" placeholder="Repeat your password">
                    @error('password_confirmation')
                        <div class="px-1 py-1 bg-error-500 w-fit text-white rounded text-center mt-2 font-bold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Agree to terms & policy. --}}
                <div class="text-center text-sm text-grey-dark mt-4">
                    <input type="checkbox" name="policy" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <span> By signing up, you agree to the </span> 
                    <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                        Terms of Service
                    </a> and 
                    <a class="no-underline border-b border-grey-dark text-grey-dark" href="#">
                        Privacy Policy
                    </a>
                </div>
                {{-- Submit button --}}
                <button type="submit" class="mt-6 w-full my-1 bg-main-600 rounded px-3 py-3 hover:bg-main-800 focus:outline-none ">
                    Create account
                </button>
            </form>
            <div class="text-grey-dark mt-6 text-center">
                Already have an account? 
                <a class="no-underline border-b border-blue text-blue" href="{{ route('login') }}">
                    Log in
                </a>.
            </div>
        </div>
    </div>
@endsection