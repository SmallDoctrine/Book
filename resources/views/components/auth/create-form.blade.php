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

    <form class="max-w-sm mx-auto"  method="post"  action="{{ route('createStore') }}">
        @csrf
        <div class="mb-5">
            <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Введите имя </label>
            <input  id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500" />
        </div>

        <div class="mb-5">
            <label for="password"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Введите пароль </label>
            <input  type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"   />
        </div>
        <div class="mb-5">
            <label for="password_confirmation"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Подтвердите пароль </label>
            <input  type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"   />
        </div>


        <div class="mb-5">
            <label for="email"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Введите почту </label>
            <input  type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"   />
        </div>


        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Зарегистрироваться</button>
    </form>
@endsection
