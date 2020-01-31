<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Http\Resources\Article as ArticleResource;
use App\Http\Requests;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all articles
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);

        // Return collection of articles as a resource
        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new article
        $article = $request->isMethod('put') ? Article::findOrFail($request->input('article_id')) : new Article;

        $article->id = $request->input('article_id');
        $article->title = $request->input('title');
        $article->text = $request->input('text');

        if ($article->save()) return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get single article
        $article = Article::findOrFail($id);

        // Return single article as a resouce
        return new ArticleResource($article);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete article
        $article = Article::findOrFail($id);

        if ($article->delete()) return new ArticleResource($article);
    }
}
