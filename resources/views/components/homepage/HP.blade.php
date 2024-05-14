@extends('layouts.app')

@section('cont')
    <div class=" my-9"> <!-- my - отссупы по гризонтали -->
        <div class=" flex justify-between ">
            <div><h1 class="text-2xl mb-7"> топ 5  </h1>
            </div><!-- text - размер шрифта ( можно посмотреть в таилвинде какие есть) -->
            <a href="{{route('books.homepage')}}" type="button" class="bg-black text-white py-2 px-10 mb-7 rounded-full"> Все токены </a>
        </div>
    @include('components.homepage.table.table')
@endsection
