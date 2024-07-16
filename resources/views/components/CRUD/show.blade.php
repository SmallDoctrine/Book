@extends('layouts.app')
@section('cont')
    <div class="flex">
        <div class="p-10 w-1/3 border ">
            <div class="flex gap-3 items-center text-xl">
                <img src="https://s2.coinmarketcap.com/static/img/coins/64x64/1.png" height="24" width="24" alt="BTC" loading="lazy" decoding="async" fetchpriority="low" >
                <a>{{$token->name}}</a>
                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 ">купить</button>
            </div>
            <p class="text-xl mt-2"> $ {{$token->count}}</p>
        </div>


        <div class="flex p-10 w-2/4 border ">
            <h1>График</h1>
        </div>







        <div class="flex p-10 w-1/3 border">
            <h1>новости</h1>

            @foreach($token->News as $item)
                <div class="mt-6 mb-4 border w-64 p-6 block">
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

    </div>

@endsection
