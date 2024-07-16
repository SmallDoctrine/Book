@extends('layouts.app')
@section('title')
    Авторизация
@endsection
@section('cont')

    @if (session('error'))
        <div class="alert alert-danger" style="color:Red">
            {{ session('error') }}
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

    <form class="max-w-sm mx-auto"  method="post"  action="{{route('authenticate') }}">
        @csrf

        <div class="mb-5">
            <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Введите почту </label>
            <input  type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"   />
        </div>

        <div class="mb-5">
            <label for="password"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Введите пароль </label>
            <input  type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"   />
        </div>

        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Войти</button>
    </form>
@endsection
