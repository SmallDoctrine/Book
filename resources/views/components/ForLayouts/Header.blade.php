<div >
    <nav class=" bg-gray-900">
        <div class="  flex justify-between px-8" >
            <div class="relative flex h-16 items-center justify-between">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex justify-between x-4">
                            <a href="{{route('table.Home')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Главная страница</a>
                            <a href="{{route('books.homepage')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Все токены </a>
                            <a href="{{route('books.create')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Добавить токен</a>
                            <a href="{{route('News.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Новости </a>
                            <a href="{{route('News.create')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Создать новость </a>
                            <a href="{{route('user.dashboard')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> личный кабинет </a>

                            <div class="flex justify-between gap-5">

                                   @auth()
                                <span style="color: #e2e8f0">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                                <form  method="post" action="{{route('logout')}}">
                                    @csrf
                                    <button  type="submit"  class="px-2 py-3 bg-yellow text-white">Выйти</button>
                                </form>

                                @elseguest()
                            </div>
                            <a href="{{route('login')}}" class="text-white  hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Войти </a>
                            <a href="{{route('create')}}" class="text-white hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"> Зарегистрироваться </a>
                            @endauth
                            <div class=" flex item-center ">
                            <a href="{{route('cart.index')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium "> ({{$totalQuantity}})
                                <svg  width="40px" height="40px" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.5 4.5H5.05848C5.7542 4.5 6.10206 4.5 6.36395 4.68876C6.62584 4.87752 6.73584 5.20753 6.95585 5.86754L7.5 7.5" stroke="#white" stroke-linecap="round"/>
                                    <path d="M17.5 17.5H8.05091C7.90471 17.5 7.83162 17.5 7.77616 17.4938C7.18857 17.428 6.78605 16.8695 6.90945 16.2913C6.92109 16.2367 6.94421 16.1674 6.99044 16.0287V16.0287C7.04177 15.8747 7.06743 15.7977 7.09579 15.7298C7.38607 15.0342 8.04277 14.5608 8.79448 14.5054C8.8679 14.5 8.94906 14.5 9.11137 14.5H14.5" stroke="#222222" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M14.1787 14.5H11.1376C9.85836 14.5 9.21875 14.5 8.71781 14.1697C8.21687 13.8394 7.96492 13.2515 7.461 12.0757L7.29218 11.6818C6.48269 9.79294 6.07794 8.84853 6.52255 8.17426C6.96715 7.5 7.99464 7.5 10.0496 7.5H15.3305C17.6295 7.5 18.779 7.5 19.2126 8.24711C19.6462 8.99422 19.0758 9.99229 17.9352 11.9884L17.6517 12.4846C17.0897 13.4679 16.8088 13.9596 16.3432 14.2298C15.8776 14.5 15.3113 14.5 14.1787 14.5Z" stroke="#222222" stroke-linecap="round"/>
                                    <circle cx="17" cy="20" r="1" fill="#aaaaaa"/>
                                    <circle cx="9" cy="20" r="1" fill="#aaaaaa"/>

                                </svg>
                            </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </nav>
</div>
