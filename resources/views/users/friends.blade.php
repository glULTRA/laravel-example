@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-main-400 text-white mt-5 rounded px-4 py-4">
            {{-- Users to adds --}}
            <ul class="bg-main-500 p-4 rounded shadow">
            <h1 class="mb-2">Friend Suggestion</h1>
            @foreach ($users as $user)
                @if(auth()->user() != $user)
                <li class="p-3 mb-3 bg-main-600 rounded shadow">
                    {{-- User profile --}}
                        <div class="grid grid-rows-1 grid-flow-col">
                            {{-- 1- Profile Picture --}}
                            <div class="relative col-span-1 row-start-2">
                                <a href=""><img class="w-10 h-10 rounded-full" src="./profile.jpg" alt=""></a>
                                <span class="top-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                            </div>
                            {{-- 2- Name of user --}}
                            <h1 class="row-end-3 col-span-2 justify-self-start"> {{$user->name}} </h1>
                            {{-- 3- Add as friend --}}
                            <form action="{{ route('friends.add', $user->id) }}" method="POST" class="row-start-1  row-end-4 px-3 py-3 col-span-5 ">
                                @csrf
                                <button class=" bg-main-500 hover:text-main-50 hover:bg-main-600 rounded-sm shadow p-1" >Add as friend</button>
                            </form>
                        </div>
                        @endif
                    </li>
            @endforeach
        </ul>
        </div>  
    </div>
@endsection