<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;

class ArticleResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::get();
        $articles = ArticleCategorySearch::get();
        $categories = ArticleCategory::get();
        return view('admin.article.index', compact('articles', 'categories'));
    }

    public function sort_new(Request $request)
    {
        $categories = ArticleCategory::get();
        $articles = ArticleCategorySearch::orderBy('id', 'desc')->get();
        return view('admin.article.index', compact('articles', 'categories'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article_categories = ArticleCategory::get();
        return view('admin.article.create',compact('article_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::create([
            'title' => $request->article_title,
            'body' => $request->article_body,
            'description' => $request->article_description,
            'recommend_order' => $request->article_recommend_order,
        ]);
        ArticleCategorySearch::insert([
            'article_id' => $article['id'],
            'article_category_id' => $request->category_id
        ]);
        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($article_id)
    {
        $article = Article::find($article_id);
        return view('admin.article.article_page', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article_id)
    {
        $article = Article::find($article_id);
        return view('update', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article_id)
    {
        Article::find($article_id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'description' => $request->description,
            'recommend_order' => $request->recommend_order,
        ]);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article_id)
    {

        Article::find($article_id)->delete();
        ArticleCategorySearch::where('article_id', '=', $article_id)->first()->delete();
        return redirect()->route('admin.article.index');
    }

    public function article_category_search($category_id)
    {
        //
        $articles = ArticleCategorySearch::where('article_category_id', '=', $category_id)->get();
        $a = $articles->first();
        $categories = ArticleCategory::get();
        //$aがnullの場合
        if(!isset($a)){
             $articles = null;
        }
        return view('admin.article.index', compact('articles', 'categories'));
    }

}
