<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('article.index',[
            'articles' => Article::when(request()->has('q'),function($query){
                $query->where(function (Builder $builder) {
                    $q = request()->q;
                    $builder->where("title","like","%".$q."%");
                    $builder->orWhere('description', 'like', '%'.$q.'%');
                });
        })
        ->when(Auth::user()->role === "user", function ($query) {
            $query->where('user_id',Auth::id());
        })
        ->when(request()->has('name'),function($query){
            $sortType = request()->name ?? 'asc';
            $query->orderBy('name',$sortType);
        })->latest('id')
        ->paginate(7)->withQueryString()
    ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'excerpt' => Str::words($request->description,30,'...'),
            'category_id' => $request->category,
            'user_id' => Auth::id()
        ]);
        return redirect()->route('article.index')->with('message',$article->title . " is created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
    Gate::authorize('update', $article);

        return view('article.edit',compact('article'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
    //    if(!Gate::allows("article-update", $article)){
    //     return abort(401);
    //    }

    // if(Gate::denies('article-update', $article)){
    //     return abort(403);
    // }

    Gate::authorize('update', $article);
        $article->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'excerpt' => Str::words($request->description,30,'...'),
            'category_id' => $request->category
        ]);
        return redirect()->route('article.index')->with('message','update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        Gate::authorize('delete',$article);
        $article->delete();
        return redirect()->back()->with('message','delete successful');
    }
}
