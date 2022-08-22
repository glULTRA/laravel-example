@extends('layouts.app')

@section('content')
    <div class="justify-center flex">
        <div class="w-4/12 rounded-lg p-6 bg-main-500 text-white mt-4 shadow-lg shadow-main-400">
        <h1 class="mb-8 text-3xl text-center">Sign in</h1>
            <form action="{{ route('login') }}" method="POST" class="">
                @csrf
                {{-- Input a email --}}
                <div class="mb-4">
                    <label for="email" class="sr-only">email</label>
                    <input type="email" id="email" name="email" class="placeholder-main-400 bg-main-100 border-2 w-full text-main-600 focus:outline-none
                    p-4 rounded-lg @error('email') border-error-400 @enderror" value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <div class="bg-error-500 w-fit text-white rounded text-center mt-2 font-bold">
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
                        <div class="bg-error-500 w-fit text-white rounded text-center mt-2 font-bold">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Remember me checkbox --}}
                <div class="">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember"> Remember me</label>
                    </div>
                </div>
                {{-- Submit button --}}
                <button type="submit" class="mt-6 w-full my-1 bg-main-600 rounded px-3 py-3 hover:bg-main-800 focus:outline-none ">
                    Sign in
                </button>
            </form>
            <div class="text-grey-dark mt-6 text-center">
                Doesn't have any account? 
                <a class="no-underline border-b border-blue text-blue" href="{{ route('register') }}">
                    Register
                </a>.
            </div>
        </div>
    </div>
@endsection