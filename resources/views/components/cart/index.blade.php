@extends('layouts.app')
@section('cont')
    <h1 class="text-2xl  text-red-500   flex item-center">Корзина</h1>
<div class=" container mx-auto relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                id
            </th>
            <th scope="col" class="px-6 py-3">
                Цена
            </th>

            <th scope="col" class="px-6 py-3">
                Кол-во
            </th>

            <th scope="col" class="px-6 py-3">
                Действия
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($tokens as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                <td class="px-6 py-4">
                    {{$item['id']}}
                </td>
                <td class="px-6 py-4">
                    {{$item['count']}} Руб
                </td>
                <td class="px-6 py-4">
                    укажем кол - во
                </td>

                <td>
                    <a  class="border bg-red-300 text-white" href="{{route('cart.delete',$item['id'])}}">удалить</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
        <h1 class="mt-10 mb-10 text-lg">Оформление заказа</h1>
    <form action="{{route('cart.send')}}" method="post">
        @csrf
        <label>
            <span>пользователь</span>
            <input type="text" name="name" class="block mb-2 text-sm border font-medium text-gray-900 dark:text-white"
                   value="{{is_null(auth()->user()) ?  '' :auth()->user()->name}}">
        </label>
        <label>
            <span>адрес кошелька</span>
            <input type="text" name="wallet" class="block mb-2 text-sm  border font-medium text-gray-900 dark:text-white">
        </label>

        <button class="  bg-yellow-200 border" type="submit"> Заказать </button>

    </form>
</div>
@endsection
