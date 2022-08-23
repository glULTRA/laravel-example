@extends('layouts.app')

@section('script')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
@endsection

@section('content')
    @CAN('update', $user)
    <div class="flex justify-center">
        <div class="w-8/12 bg-main-500  mt-5 rounded px-4 py-4">
           <!-- This is an example component -->
           <form action="{{ route('profile', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="h-full">
                    <div class="border-b-2 block md:flex">
                        {{-- <form action="{{ route('images.add', $user )}} " > --}}
                        <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-main-100 shadow-md">
                            <div class="flex justify-between">
                                <span class="text-sm block">User Profile</span>
                                {{-- <button type="submit" class="-mt-2 text-md  text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Save</button> --}}
                                {{-- <a href="{{ route('images.add') }}"> Save</a> --}}
                            </div>
                            {{-- Tommorow task will be adding image profile to user and store it to the database. --}}    
                            <span class="text-gray-600">This information is secret so be careful</span>
                            <div class="w-full p-8 mx-2 flex justify-center">
                                {{-- <div class="bg-white px-1 py-1">
                                    <img id="showImage" class="max-w-xs w-60 items-center" src="https://images.unsplash.com/photo-1477118476589-bff2c5c4cfbb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=200&q=200" alt="">                          
                                </div> --}}
                                    <div class="flex justify-center items-center w-full">
                                        <label for="image" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                            </div>
                                            <input id="image" name="image"  type="file" class="hidden">
                                        </label>
                                    </div> 
                                </div>
                            </div>
                        {{-- </form> --}}
                        <div class="w-full md:w-3/5 p-8 bg-main-100 lg:ml-4 shadow-md">
                            <div class="rounded  shadow p-6">
                                @if(session()->has('message'))
                                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-green-500">
                                        <span class="text-xl inline-block mr-5 align-middle">
                                        <i class="fas fa-bell"></i>
                                        </span>
                                        <span class="inline-block align-middle mr-8">
                                        <b class="capitalize">Success!</b> {{ session()->get('message') }}
                                        </span>
                                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                        <span>×</span>
                                        </button>
                                    </div>
                                    <script>
                                        function closeAlert(event){
                                        let element = event.target;
                                        while(element.nodeName !== "BUTTON"){
                                            element = element.parentNode;
                                        }
                                        element.parentNode.parentNode.removeChild(element.parentNode);
                                        }
                                    </script>
                                @elseif(session()->has('error_message'))
                                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                                        <span class="text-xl inline-block mr-5 align-middle">
                                        <i class="fas fa-bell"></i>
                                        </span>
                                        <span class="inline-block align-middle mr-8">
                                        <b class="capitalize">Failed!</b> {{ session()->get('error_message') }}
                                        </span>
                                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                        <span>×</span>
                                    
                                        </button>
                                    </div>
                                    <script>
                                        function closeAlert(event){
                                        let element = event.target;
                                        while(element.nodeName !== "BUTTON"){
                                            element = element.parentNode;
                                        }
                                        element.parentNode.parentNode.removeChild(element.parentNode);
                                        }
                                    </script>
                                    {{ Request::session()->forget('error_message'); }}
                                @elseif(session()->has('info_message'))
                                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-yellow-500">
                                        <span class="text-xl inline-block mr-5 align-middle">
                                        <i class="fas fa-bell"></i>
                                        </span>
                                        <span class="inline-block align-middle mr-8">
                                        <b class="capitalize">Note!</b> {{ session()->get('info_message') }}
                                        </span>
                                        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                                        <span>×</span>
                                    
                                        </button>
                                    </div>
                                    <script>
                                        function closeAlert(event){
                                        let element = event.target;
                                        while(element.nodeName !== "BUTTON"){
                                            element = element.parentNode;
                                        }
                                        element.parentNode.parentNode.removeChild(element.parentNode);
                                        }
                                    </script>
                                @endif
                                {{-- Name --}}
                                <div class="pb-6">
                                    <label for="name" class="text-sm text-gray-700 block pb-1">Name</label>
                                    <div class="flex">
                                        <input id="name" name="name" class="text-md block px-3 py-2 rounded-lg w-full 
                                        bg-main-50 border-2 border-gray-300 placeholder-gray-600 shadow-md
                                        focus:placeholder-gray-500
                                        focus:bg-white 
                                        focus:border-gray-600  
                                        focus:outline-none" type="text" value="{{ $user->name }}" />
                                    </div>
                                    @error('name')
                                        <div class="bg-error-400 text-white rounded-lg px-1 py-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    
                                </div>
                                {{-- Username --}}
                                <div class="pb-4">
                                    <label for="username" class="text-sm text-gray-700 block pb-1">Username</label>
                                    <input id="username" name="username" class="text-md block px-3 py-2 rounded-lg w-full 
                                    bg-main-50 border-2 border-gray-300 placeholder-gray-600 shadow-md
                                    focus:placeholder-gray-500
                                    focus:bg-white 
                                    focus:border-gray-600  
                                    focus:outline-none" type="text" value="{{ $user->username }}" />
                                    @error('username')
                                        <div class="bg-error-400 text-white rounded-lg px-1 py-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Email --}}
                                <div class="pb-4">
                                    <label for="email" class="text-sm text-gray-700 block pb-1">Email</label>
                                    <input id="email" name="email" class="text-md block px-3 py-2 rounded-lg w-full 
                                    bg-main-50 border-2 border-gray-300 placeholder-gray-600 shadow-md
                                    focus:placeholder-gray-500
                                    focus:bg-white 
                                    focus:border-gray-600  
                                    focus:outline-none" type="email" value="{{ $user->email }}" />
                                    @error('email')
                                        <div class="bg-error-400 text-white rounded-lg px-1 py-1">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- Password --}}
                                <div class="py-2 " x-data="{ show: true }" max="8">
                                    <span class="px-1 text-sm text-gray-600 ">Password</span>
                                    <div class="relative">
                                        <input name="password" id="password" placeholder="New Password" :type="show ? 'password' : 'text'" class="text-md block px-3 py-2 rounded-lg w-full 
                                        bg-main-50 border-2 border-gray-300 placeholder-gray-600 shadow-md
                                        focus:placeholder-gray-500
                                        focus:bg-white 
                                        focus:border-gray-600  
                                        focus:outline-none">
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                            <svg class="h-6 text-gray-700"fill="none" @click="show = !show"
                                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                            </svg>
                                            <svg class="h-6 text-gray-700"  fill="none" @click="show = !show"
                                            :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                            viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                            </svg>
                                        </div>
                                        @error('password')
                                        <div class="bg-error-400 text-white rounded-lg px-1 py-1">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <span class="text-gray-600 pt-4 block opacity-70">Personal login information of your account</span>
                                <button class="w-full py-3 px-3 mt-2 bg-main-400 hover:bg-main-500 text-main-50 "> Save </button>
                            </div>
                        </div>
                    </div>
                </div>
            {{-- </form> --}}
            {{-- End of the example --}}
        </div>
    </div>
    @endcan
    @CAN('visit', $user)
        <x-userprofile :user="$user"/>
    @endcan
@endsection