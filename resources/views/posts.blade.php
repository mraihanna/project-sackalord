@extends('layouts.main')
@section('container')
    <h1 class="font-bold ml-7">{{ $title }}</h1>
    <section class="w-full flex flex-col px-3">
        @if ($posts->count())
            <article class="flex flex-col shadow my-4 rounded-xl border-solid border-2 border-slate-500 overflow-hidden">
                <a href="/posts/{{ $posts[0]->slug }}" class="hover:opacity-75">
                    <img src="https://source.unsplash.com/1400x400?{{ $posts[0]->category->name }}"
                        alt="{{ $posts[0]->category->name }}">
                </a>
                <div class="bg-white flex flex-col justify-center text-center p-6">
                    <a href="/posts/{{ $posts[0]->slug }}"
                        class="text-3xl font-bold hover:text-purple-700 pb-4">{{ $posts[0]->title }}</a>
                    <p class="text-sm pb-3">
                        By <a href="/authors/{{ $posts[0]->author->username }}"
                            class="font-semibold hover:text-purple-700">{{ $posts[0]->author->name }}</a> in <a
                            href="/categories/{{ $posts[0]->category->slug }}"
                            class="font-semibold hover:text-purple-700">{{ $posts[0]->category->name }}</a>
                        <a
                            class="bg-purple-500 px-3 ml-2 py-1 rounded-xl text-white">{{ $posts[0]->created_at->diffForHumans() }}</a>
                    </p>
                    <p class="pb-6">{{ $posts[0]->excerpt }}</p>
                    <a href="/posts/{{ $posts[0]->slug }}" class="uppercase text-gray-800 hover:text-purple-700">Continue
                        Reading <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
        @else
            <p class="text-center text-2xl">No Post Found.</p>
        @endif

        <div class="grid grid-cols-3 gap-3">
            @foreach ($posts->skip(1) as $post)
                <article
                    class="flex flex-col shadow my-4 rounded-xl border-solid border-2 border-slate-500 overflow-hidden">
                    <a href="/posts/{{ $post->slug }}" class="hover:opacity-75">
                        <img src="https://source.unsplash.com/500x300?{{ $post->category->name }}"
                            alt="{{ $post->category->name }}">
                    </a>
                    <div class="bg-white flex flex-col justify-start p-6">
                        <a href="/categories/{{ $post->category->slug }}"
                            class="text-purple-600 hover:text-purple-800 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
                        <a href="/posts/{{ $post->slug }}"
                            class="text-3xl font-bold hover:text-purple-700 pb-4">{{ $post->title }}</a>
                        <p class="text-sm pb-3">
                            By <a href="/authors/{{ $post->author->username }}"
                                class="font-semibold hover:text-purple-700">{{ $post->author->name }}</a> <a
                                class="font-sm hover:text-purple-700">{{ $post->created_at->diffForHumans() }}</a>
                        </p>
                        <p class="pb-6">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="uppercase text-gray-800 hover:text-purple-700">Continue
                            Reading <i class="fas fa-arrow-right"></i></a>
                    </div>
                </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex items-center py-8">
            <a href="#"
                class="h-10 w-10 bg-purple-800 hover:bg-purple-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
            <a href="#"
                class="h-10 w-10 font-semibold text-gray-800 hover:bg-purple-600 hover:text-white text-sm flex items-center justify-center">2</a>
            <a href="#"
                class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next
                <i class="fas fa-arrow-right ml-2"></i></a>
        </div>

    </section>
@endsection
