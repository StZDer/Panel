<?php

namespace App\Http\Controllers;

use App\Http\Requests\RotaRequest;
use App\Models\Rota;
use App\Models\RotaImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RotaController extends Controller
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
        $rotas = Rota::all();
        return view('admin.rota.index', compact('rotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RotaRequest $request)
    {
        $rota = new Rota();
        $rota->title = $request->input('title');
        $rota->desc = $request->input('desc');
        $rota->user = Auth::user()->name;
        if ($request->svg != null) {
            $img = $request->svg;
            $imgPath = Storage::put('/public/images', $img);
            $rota->svg = $imgPath;
        }
        $rota->save();
        if ($request->image != null) {
            foreach ($request->file('image') as $file) {
                $img = new RotaImg();
                $imgPath = Storage::put('/public/images', $file);
                $img->img = $imgPath;
                $img->rota_id = $rota->id;
                $img->save();
            }
        }
        return redirect()->route('admin.rota.index')->with('success', 'Лаборатория была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rota  $rota
     * @return \Illuminate\Http\Response
     */
    public function show(Rota $rotum)
    {
        $rota = Rota::where('id', $rotum->id)->first();
        $rotasimg = RotaImg::where('rota_id', $rota->id)->get();
        return view('admin.rota.show', compact(['rota', 'rotasimg']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rota  $rota
     * @return \Illuminate\Http\Response
     */
    public function edit(Rota $rotum)
    {
        $rota = Rota::where('id', $rotum->id)->first();
        $rotasimg = RotaImg::where('rota_id', $rota->id)->get();
        return view('admin.rota.edit', compact(['rota', 'rotasimg']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rota  $rota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rota $rotum)
    {
        if ($request->svg != null) {
            if ($rotum->svg) {
                Storage::delete($rotum->svg);
            }
            $img = $request->svg;
            $imgPath = Storage::put('/public/images', $img);
            $rotum->svg = $imgPath;
        }
        if ($request->image != null) {
            foreach ($request->file('image') as $file) {
                $img = new RotaImg();
                $imgPath = Storage::put('/public/images', $file);
                $img->img = $imgPath;
                $img->rota_id = $rotum->id;
                $img->save();
            }
        }
        $rotum->update($request->all());
        return redirect()->route('admin.rota.index')->with('success', 'Новость была изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rota  $rota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rota $rotum)
    {
        Storage::delete($rotum->svg);
        if ($rotum->images()->exists() != null) {
            $rotasimg = $rotum->images;
            foreach ($rotasimg as $rotasimg) {
                Storage::delete($rotasimg->img);
            }
        }
        $rotum->delete();
        return redirect()->route('admin.rota.index')->with('success', 'Лаборатория была удалена');
    }
}
