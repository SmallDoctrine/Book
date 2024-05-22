<div >
    <nav class=" bg-gray-900">
        <div class="  flex justify-between container mx-auto px-8" >
            <div class="relative flex h-16 items-center justify-between">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex justify-between x-4">
                            <a href="{{route('table.Home')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Главная страница</a>
                            <a href="{{route('books.homepage')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Все токены </a>
                            <a href="{{route('books.create')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Добавить токен</a>
                            <a href="{{route('News.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Новости </a>
                            <div class="flex justify-between gap-5">
                            <a href="" class="text-gray-300  hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Войти </a>
                            <a href="{{route('auth.create')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Зарегистрироваться </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </nav>
</div>
