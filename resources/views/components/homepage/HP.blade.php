@extends('layouts.app')

@section('cont')
    @if (session('up'))
        <div class="alert alert-success">
            {{ session('up') }}
        </div>
    @endif

    <!--отображение ошибок валидации -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class=" my-9"> <!-- my - отссупы по гризонтали -->
        <div class=" flex justify-between ">
            <div><h1 class="text-2xl mb-7"> топ 5  </h1>
            </div><!-- text - размер шрифта ( можно посмотреть в таилвинде какие есть) -->
            <a href="{{route('books.homepage')}}" type="button" class="bg-black text-white py-2 px-10 mb-7 rounded-full"> Все токены </a>
        </div>
        <div class="m-4">
            <a class="bg-black text-white py-3 px-5 mb-3 rounded-full" href="{{route('table.Home')}}?update_price=1" >Обновить цены</a>
        </div>
    @include('components.homepage.table.table')
@endsection
