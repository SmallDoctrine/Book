<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createnews;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

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
        News::create($request->all());
        return redirect()->back()->with('add','Новость Добавлена');
    }

    public function show($slug)
    {

        DB::table('News')
            ->where('slug',$slug)
            ->increment('view_count');


        $show=News::with('Book')->where('slug',$slug)->first();
        return view('components.News.show',['show'=>$show]);

    }
}
