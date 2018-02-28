<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Mail // should'nt be used here;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticleController extends Controller
{

    /**
     * Auth middleware.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articles)
    {
        return $articles->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('articles/create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request, Article $article)
    {
        $article->create($request->all());
        // for sure this way is not good at all.
        // it's much better to use events 
        // but this is just a simple example
        // and in real world apps this is not accepted
        // Mail::to("admin email")->send("new article");
        return $article;
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $article = Article::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $article
     * @return \Illuminate\Http\Response
     */
    // public function edit(Article $article)
    // {
    //     $article = $article;
    //     return view('articles/edit', compact('article'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
       return $article->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete(); 
        return 200;
    }
}
