@extends('layouts.app')
@section('cont')
    <!--отображение сессии with() -->
    @if (session('add'))
        <div class="alert alert-success">
            {{ session('add') }}
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

    <form   class="max-w-sm mx-auto"  method="post"  action="{{route('News.CreateStore')}}">
        <div class="mb-5">
            @csrf
            <label for="title"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Заголовок</label>
            <input  id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"  />
        </div>
        <div class="mb-5">
            <div class="mb-5">
                <label for="cat"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Категории</label>
                <select name="category_id" id="cat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500">
                   @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
                   @endforeach
              </select>
            </div>
            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">описание новости </label>
            <textarea id="body" name="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 :border-blue-500"></textarea>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Добавить</button>

@endsection
