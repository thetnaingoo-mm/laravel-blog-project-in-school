<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome',[
            'articles' => Article::when(request()->has('q'),function($query){
                $query->where(function (Builder $builder) {
                    $q = request()->q;
                    $builder->where("title","like","%".$q."%");
                    $builder->orWhere("description","like","%".$q."%");
                });
        })
        ->when(request()->has('category'),function ($query) {
            $query->where('category_id',request()->category);
        })
        ->when(request()->has('name'),function($query){
            $sortType = request()->name ?? 'asc';
            $query->orderBy('name',$sortType);
        })->latest('id')
        ->paginate(7)->withQueryString()
    ]);
    }

    public function show($slug)
    {
        $article = Article::where('slug',$slug)->firstOrFail();
        return view('detail',compact('article'));
    }

    public function categorized($slug)
    {
        $category = Category::where('slug',$slug)->firstOrFail();
        return view('categorized',[
            'category' => $category,
            'articles' => $category->articles()
        ->when(request()->has('q'),function($query){
            $query->where(function (Builder $builder) {
                $q = request()->q;
                $builder->where("title","like","%".$q."%");
                $builder->orWhere("description","like","%".$q."%");
            });
        })
        ->paginate(10)->withQueryString()
    ]);
    }
}

