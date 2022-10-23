<?php

namespace App\Http\Controllers;

use App\Models\LabImg;
use Illuminate\Http\Request;

class LabImgController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LabImg  $labImg
     * @return \Illuminate\Http\Response
     */
    public function show(LabImg $labImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LabImg  $labImg
     * @return \Illuminate\Http\Response
     */
    public function edit(LabImg $labImg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LabImg  $labImg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LabImg $labImg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LabImg  $labImg
     * @return \Illuminate\Http\Response
     */
    public function destroy(LabImg $labImg)
    {
        $labImg->delete();
        return redirect()->route('admin.lab.index')->with('success', 'Изображение было удалено');
    }
}
