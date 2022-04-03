@extends('layouts.main')

@section('container')
    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->
        {{-- <a href="#" class="hover:opacity-75">
            <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
        </a> --}}
        <div class="bg-white flex flex-col justify-start p-6">
            <a href="/categories/{{ $post->category->slug }}"
                class="text-purple-700 text-sm font-bold uppercase pb-4 hover:text-purple-800">{{ $post->category->name }}</a>
            <h1 class="text-3xl font-bold pb-4">{{ $post->title }}</h1>
            <p href="#" class="text-sm pb-8">
                By <a href="/authors/{{ $post->author->username }}"
                    class="font-semibold hover:text-purple-700">{{ $post->author->name }}</a>, Published on April
                25th, 2020
            </p>
            <h1 class="text-2xl font-bold pb-3">Introduction</h1>
            <p class="pb-3">{{ $post->excerpt }}</p>
            <h1 class="text-2xl font-bold pb-3">Body</h1>
            {!! $post->body !!}
        </div>
        <a href="/posts" class="text-left p-6">
            <p class="text-lg text-purple-600 hover:text-purple-800 font-bold flex items-center"><i
                    class="fas fa-arrow-left pr-1"></i> Previous
            </p>
        </a>
    </article>
@endsection
