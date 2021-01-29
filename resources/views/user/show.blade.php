@extends('layouts.app')

@section('content')
<div class="mt-12 flex">
    <img class="rounded-full mr-12" src="{{$user->image->url}}" alt="">
    <div class="flex flex-col">
        <h1 class="text-base md:text-3xl mb-5">{{$user->name}}</h1>
        <h3 class="text-base md:text-lg text-gray-700"> <strong>  Country: </strong> {{$user->location->country}}</h3>
        <h3 class="text-base md:text-lg text-gray-700 capitalize"> <strong>  Level: </strong> {{$user->level->name ?? 'None'}}</h3>
        
        <h2 class="text-base md:text-lg text-gray-700"><strong>  Instagram: </strong> {{$user->profile->instagram}}</h1>
            <h2 class="text-base md:text-lg text-gray-700"><strong>  GitHub: </strong> {{$user->profile->github}}</h1>
                <h2 class="text-base md:text-lg text-gray-700"><strong>  Web: </strong>: {{$user->profile->web}}</h1>
                </div>
            </div>
            
    @empty($post)
        <div class="grid grid-cols-3 gap-10 my-12">
            @foreach($posts as $post)
            <div>
                <a href="{{ route('post.show', ['post' => $post->id])}}">
                    <img src="{{$post->image->url}}" alt="" class="w-full">
                </a>
            </div>
        @endforeach
        </div>
    @else
        <strong>No post!</strong>
    @endempty
@endsection