@extends('layouts.app')

@section('cont')
    <!--отображение сессии with() -->
    @if (session('up'))
        <div class="alert alert-success">
            {{ session('up') }}
        </div>
    @endif
    <div class="flex flex-wrap">
        @foreach($check as $item)
            <div class="group my-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-300 bg-white shadow-md">
                <svg class="pointer-events-none absolute inset-x-0 bottom-5 mx-auto text-3xl text-white  transition-opacity group-hover:animate-ping group-hover:opacity-30 peer-hover:opacity-0" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path fill="currentColor" d="M2 10a4 4 0 0 1 4-4h20a4 4 0 0 1 4 4v10a4 4 0 0 1-2.328 3.635a2.996 2.996 0 0 0-.55-.756l-8-8A3 3 0 0 0 14 17v7H6a4 4 0 0 1-4-4V10Zm14 19a1 1 0 0 0 1.8.6l2.7-3.6H25a1 1 0 0 0 .707-1.707l-8-8A1 1 0 0 0 16 17v12Z" /></svg>
                <div class="mt-4 px-5 pb-5">
                    <h5 class="text-xl tracking-tight text-slate-900">Книга - {{$item->name}}  </h5>
                    <h5 class="text-xl tracking-tight text-slate-900"> год выпуска : {{$item->years}} </h5>
                    <h5 class="text-xl tracking-tight text-slate-500"> категория: {{$item->description}} </h5>

                    <div class="mt-2 mb-5 flex items-center justify-between">
                        <p>
                            <span class="text-2xl font-bold text-slate-900">{{$item->count}} руб</span>
                        </p>
                    </div>
                    <a href="{{route('books.show',$item->id)}}" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <!-- в роут передаем название самого контролера роутов  . и подроут контролера -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        </svg>Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
