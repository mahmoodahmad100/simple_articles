<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use Session;

class ArticleController extends Controller
{

    /**
     * Auth middleware.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $articles)
    {
        $articles = $articles->all();
        return view('articles/index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());
        Session::flash('success_msg','you added new article');   
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  object  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $article = $article;
        return view('articles/show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  object  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $article = $article;
        return view('articles/edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        Session::flash('success_msg','you updated the article');   
        return redirect()->route('articles.index');
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
        Session::flash('success_msg','you deleted the article');   
        return redirect()->route('articles.index');
    }
}
