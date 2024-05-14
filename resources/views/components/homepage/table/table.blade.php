
<div class=" container mx-auto relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                Токен
            </th>
            <th scope="col" class="px-6 py-3">
                Описание
            </th>
            <th scope="col" class="px-6 py-3">
                Цена
            </th>
            <th scope="col" class="px-6 py-3">
                Год
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($Books as $item)
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <a href="{{route('books.show',$item->name)}}" class=" bg-gray-800 text-white py-2 px-5 mb-7 rounded-full">{{$item->name}}</a>
                </th>
                <td class="px-6 py-4">
                    {{$item->description}}

                </td>
                <td class="px-6 py-4">
                    {{$item->count}} Руб
                </td>
                <td class="px-6 py-4">
                    {{$item->years}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>
