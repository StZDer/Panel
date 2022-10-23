<?php

namespace App\Http\Controllers;

use App\Models\NewsImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsImgController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsImg  $newsImg
     * @return \Illuminate\Http\Response
     */
    public function show(NewsImg $newsImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsImg  $newsImg
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsImg $newsImg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsImg  $newsImg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsImg $newsImg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsImg  $newsImg
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsImg $newsImg)
    {
        Storage::delete($newsImg->img);
        $newsImg->delete();
        return redirect()->route('admin.news.index')->with('success', 'Изображение было удалено');
    }
}
