<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\ArticleCategorySearch;
use Illuminate\Support\Facades\Validator;
class AdminArticleResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = ArticleCategorySearch::get();
        $categories = ArticleCategory::get();
        return view('admin.article.index', compact('articles', 'categories'));
    }

    public function sort_new()
    {
        $categories = ArticleCategory::get();

        //新しい順
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
        $rulus = [
        'article_title' => 'required',
        'article_body' => 'required',
        'article_description' => 'required',
        ];

        $message = [
            'article_title.required' => 'タイトルを入力してください',
            'article_body.required' => '本文を入力してください',
            'article_description.required' => '概要を入力してください',
        ];

        $validator = Validator::make($request->all(), $rulus, $message);

        if ($validator->fails()) {
            return redirect('/admin/article/create')
            ->withErrors($validator);
        }
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
    public function show($_article_id)
    {
        $article = Article::find($_article_id);
        $view_count = $article['view_count'];
        $article->update([
            'view_count' => $view_count+1,
        ]);
        return view('admin.article.article_page', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($_article_id)
    {
        $article = Article::find($_article_id);
        $article_categories = ArticleCategory::get();
        return view('admin.article.update', compact('article', 'article_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $_article_id)
    {
        Article::find($_article_id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'description' => $request->description,
            'recommend_order' => $request->recommend_order,
        ]);
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($_article_id)
    {

        Article::find($_article_id)->delete();
        ArticleCategorySearch::where('article_id', '=', $_article_id)->first()->delete();
        return redirect()->route('admin.article.index');
    }

    public function article_category_search($_category_id)
    {
        //
        $articles = ArticleCategorySearch::where('article_category_id', '=', $_category_id)->get();
        $categories = ArticleCategory::get();

        //記事の一件目を探す
        $a = $articles->first();

        //記事がないとき
        if(!isset($a)){
             $articles = null;
        }
        return view('admin.article.index', compact('articles', 'categories'));
    }
    public function test()
    {
        return view('article_template');
    }
}
