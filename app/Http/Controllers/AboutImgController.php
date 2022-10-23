<?php

namespace App\Http\Controllers;

use App\Models\AboutImg;
use Illuminate\Http\Request;

class AboutImgController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutImg  $aboutImg
     * @return \Illuminate\Http\Response
     */
    public function show(AboutImg $aboutImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutImg  $aboutImg
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutImg $aboutImg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutImg  $aboutImg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutImg $aboutImg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutImg  $aboutImg
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutImg $aboutImg)
    {
        $aboutImg->delete();
        return redirect()->route('admin.about.index')->with('success', 'Изображение было удалено');
    }
}
