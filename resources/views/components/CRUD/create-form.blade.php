@extends('layouts.app')
@section('cont')
    <!-- отображение сессии через with()-->
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

    <form   class="max-w-sm mx-auto"  method="post"  action="http://127.0.0.1:8000/books/createStore">
        <div class="mb-5">
            @csrf
            <label for="name"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">название токена </label>
            <input  id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"  />
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">описание </label>
            <input  id="description" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"  />
        </div>
        <div class="mb-5">
            <label for="years"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">год </label>
            <input  id="years" name="years" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"  />
        </div>
        <div class="mb-5">
            <label for="count"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">цена </label>
            <input  id="count" name="count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"  />
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить</button>
    </form>



@endsection
