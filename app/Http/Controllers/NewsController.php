<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnews;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index ()
    {

        $news=News::with('category')->get();
        return view('components.News.index',['all'=>$news]);

    }


    public function create()
    {

        return view('components.News.Create',['categories' => Categories::all()]);
    }


    public function CreateStore(Createnews $request)
    {
        $file= $request->file('src');
        $filename = $file->getClientOriginalName();
        // указываем что получили с формы картинку с ключом src ->
        // getClientOriginalName (достает оригинальное название картинки с массива загруженно файла )
        // заварачиваем все в переменную filename для дальнейшего взаимодействия
        $path = "news/$filename";
        Storage::disk('public')->put($path,file_get_contents($file));
            //в функции  storage disk(указываем место хранения файла ) ->
            // put (принимает 2 параметра - 1)path- путь для хранения в хранилище , 2) file_get_contents -саму картинку)
            //  file_get_contents - загружает с временого хранилище в оригинальное
        $request->merge([
            'image'=>$path
        ]);
        //        $request->merge([]) - обьединяет все request параметры в один единный массив для дальнейшего взаимодействия

            News::create($request->all());
            return redirect()->back()->with('add','Новость Добавлена');
    }

    public function show($slug)
    {

        DB::table('News')
            ->where('slug',$slug)
            ->increment('view_count');


        $show=News::with('token','category')->where('slug',$slug)->first();
        return view('components.News.show',['show'=>$show]);

    }
}
