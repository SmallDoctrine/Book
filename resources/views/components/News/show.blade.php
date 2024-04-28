@extends('layouts.app')


@section('cont')


    <div class="  mt-4 mb-1 border w-64 p-3 ">
        <span class="mb-5 bg-blue-300">{{$show->category->name}}</span>

        <h1 class="text-2xl">{{$show->title}}</h1>
        <div>
            <div>
                <h1 class="mb-2 text-2xl"></h1>
                {{$show->body}}
            </div>
            <span class="text-sm">view - {{$show->view_count}}</span>
            <span class="text-sm ">like - {{$show->like}}</span>
        </div>
        @if(!is_null($show->book))
        <div class="border-5">
            <h1 class="text-xl">название- {{$show->book->name}}</h1>
            <span class="text-md"> цена - {{$show->book->count}} </span>
        </div>
        @endif

    </div>



@endsection
