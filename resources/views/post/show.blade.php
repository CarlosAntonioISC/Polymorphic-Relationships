@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center py-16">

    <div class="w-1/2 flex mb-6">
        <img class="w-20 rounded-full" src="{{$user->image->url}}" alt="">
        
        <div class="flex flex-col pl-5">
            <h1 class="font-bold"> <a href="{{ route('user.show', ['user' => $user->id])}}"> {{$user->name}}</a> </h1>
            <span class="text-gray-500">{{$post->created_at->diffForHumans()}}</span>
            @empty($post->tags)
                nohay
                @else 
                <div class="flex mt-2">
                @foreach ($post->tags as $tag)
                    <span class="bg-blue-600 text-white rounded-2xl px-4 mr-2">{{$tag->name}}</span>                    
                    @endforeach
                </div>
            @endempty

        </div>
    </div>

    <img class=" w-1/2" src="{{$post->image->url}}" alt="">


    <section class="w-1/2 flex flex-col p-8">
        <span class="mb-8">Comments</span>
        @if($comments->count() > 0)
            @foreach ($comments as $comment)
            <article class="mb-12 flex flex-col border-b-2 pb-5">
                <div class="w-1/2 flex mb-4">
                    <img class="w-16 rounded-full" src="{{$comment->user->image->url}}" alt="">
                    <div class="flex flex-col pl-5">
                        <h3 class="font-bold text-gray-700"> 
                            <a href="{{ route('user.show', ['user' => $comment->user->id])}}"> {{$comment->user->name}}</a>
                        </h3>
                        <h3 class="text-gray-500"> {{$comment->created_at->diffForHumans()}} </h3>
                    </div>

                </div>

                <h2> {{$comment->body}} </h2>

            </article>
            @endforeach
        @else
        no hay
        @endif
    </section>
</div>
@endsection