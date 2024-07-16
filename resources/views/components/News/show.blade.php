@extends('layouts.app')


@section('cont')


    <div class="  mt-4 mb-1 border w-64 p-3 ">
        <span class="mb-5 bg-yellow-300">{{$show->category->name}}</span>

        <h1 class="text-2xl">{{$show->title}}</h1>
        <div>
            <div>
                <h1 class="mb-2 text-2xl"></h1>
                {{$show->body}}
            </div>
            <span class="text-sm">view - {{$show->view_count}}</span>
            <span class="text-sm ">like - {{$show->like}}</span>
        </div>
        @if(!is_null($show->token))

        <div class="border-5 py-5 m-3 border" >
             <span  class="text-2xl"> description </span>
            <h1 class="">  token -  {{$show->token->name}}</h1>
            <span class="">  price - {{$show->token->count}} </span>
        </div>
        @endif

    </div>


        <div class="mt-10 border w-64">
            @foreach($show->comments as $comment)
           <span>пользователь -  {{$comment->user->name}}!</span>
               <span class="block"> дата - {{$comment->created_at}}</span>
                <div> Комментарий :
                   <span class="block bg-blue-100">{{$comment->text}}</span>
                </div>
    @endforeach
        </div>

@auth()
    <div class="mt-10">
         <h1>add comment</h1>
        <form  action="{{route('store')}}" method="post">
            @csrf
            <input type="hidden" name="news_id" value="{{$show->id}}">
            <textarea  name="text" class="border p-5"></textarea>
            <button class="p-3 bg-gray-800 text-white block"> Отправить </button>
        </form>
    </div>
@endauth



@endsection
