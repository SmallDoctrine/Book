@extends('layouts.app')


@section('cont')
    <div class="flex gap-5  ">
    @foreach($all as $item)
        <div class="mt-6 mb-4 border w-64 p-6 ">
            <span class="mb-5 bg-blue-300">{{$item->category->name}}</span>
            <a href="{{route('News.show',$item->slug)}}">
                <h1 class="text-2xl">{{$item->title}}</h1>
            </a>
            <div>
                <span class="text-sm">view - {{$item->view_count}}</span>
                <span class="text-sm">like - {{$item->like}}</span>
            </div>
            <img src="{{asset("storage/$item->image")}}">
        </div>
    @endforeach
    </div>

@endsection
