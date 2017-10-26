<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = \App\Article::latest()->paginate(5);

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        flash('woeiruowieurowieur');
        flash('woeiruowieurowieur')->success();
        flash('woeiruowieurowieur')->warning();
        flash('woeiruowieurowieur')->error();
        flash('overlay message')->overlay();
        flash('woeiruowieurowieur')->important();
        flash()->overlay('mesldkfjlskdjfsldf', '제목입니다.');
        return redirect(route('articles.index'));
        */
        $article = new \App\Article;
        return view('articles.create', compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\ArticlesRequest $request)
    {
        $article = auth()->user()->articles()->create($request->all());

        if (! $article) {
            flash('글이 저장되지 않았습니다.')->error();
            return back()->withInput();
        }

        flash('글이 저장되었습니다.');
        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Article $article)
    {
        //$article = \App\Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Article $article)
    {
        $this->authorize('update', $article);

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\ArticlesRequest $request, \App\Article $article)
    {
        $article->update($request->all());
        flash('글이 수정되었습니다.');
        return redirect(route('articles.show',$article->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        flash('글이 삭제되었습니다.');
        return response()->json([], 204);
    }
}
