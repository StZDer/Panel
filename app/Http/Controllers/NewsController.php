<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\NewsImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->desc = $request->input('desc');
        $news->date = $request->input('date');
        $news->user = Auth::user()->name;
        $news->save();
        if ($request->image != null) {
            foreach ($request->file('image') as $file) {
                $img = new NewsImg();
                $imgPath = Storage::put('/public/images', $file);
                $img->img = $imgPath;
                $img->news_id = $news->id;
                $img->save();
            }
        }
        return redirect()->route('admin.news.index')->with('success', 'Новость была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news = News::where('id', $news->id)->first();
        $newsimg = NewsImg::where('news_id', $news->id)->get();
        return view('admin.news.show', compact(['news', 'newsimg']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $news = News::where('id', $news->id)->first();
        $newsimg = NewsImg::where('news_id', $news->id)->get();
        return view('admin.news.edit', compact(['news', 'newsimg']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, News $news)
    {
        if ($request->image != null) {
            foreach ($request->file('image') as $file) {
                $img = new NewsImg();
                $imgPath = Storage::put('/public/images', $file);
                $img->img = $imgPath;
                $img->news_id = $news->id;
                $img->save();
            }
        }
        $news->update($request->all());
        return redirect()->route('admin.news.index')->with('success', 'Новость была изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $newsimgs = $news->images;
        foreach ($newsimgs as $newsimg) {
            Storage::delete($newsimg->img);
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость была удалена');
    }
}
