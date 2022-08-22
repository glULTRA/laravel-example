@extends('layouts.app')

@section('style')
<style type="text/css">
    .duration-150{
        padding: 8px 15px !important;
    }
</style>
@endsection 

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-main-500 text-white mt-5 rounded px-4 py-4">
            @auth
                <form action="{{ route('posts') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-main-100 border-2
                        text-main-500 rounded-lg w-full p-4 @error('body') border-error-500 @enderror" placeholder="Post something interesting !"></textarea>
                        @error('body')
                            <div class="text-error-500  mt-2 text-sm">
                                {{ $message }}
                            </div>  
                        @enderror
                    </div>
                    <button type="submit" class="bg-main-600 hover:bg-main-400 shadow-lg  text-white px-4 py-2 rounded-lg font-medium">
                        Post
                    </button>
                </form>
            @endauth
            @if ($posts->count())
                @foreach ($posts as $post)
                    <x-post :post="$post" />
                @endforeach
                <br>
                {{ $posts->links() }}
            @endif
        </div>
    </div>
@endsection