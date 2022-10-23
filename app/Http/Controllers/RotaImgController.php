<?php

namespace App\Http\Controllers;

use App\Models\RotaImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RotaImgController extends Controller
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
     * @param  \App\Models\RotaImg  $rotaImg
     * @return \Illuminate\Http\Response
     */
    public function show(RotaImg $rotaImg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RotaImg  $rotaImg
     * @return \Illuminate\Http\Response
     */
    public function edit(RotaImg $rotaImg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RotaImg  $rotaImg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RotaImg $rotaImg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RotaImg  $rotaImg
     * @return \Illuminate\Http\Response
     */
    public function destroy(RotaImg $rotaImg)
    {
        Storage::delete($rotaImg->img);
        $rotaImg->delete();
        return redirect()->route('admin.rota.index')->with('success', 'Изображение было удалено');
    }
}
