<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabRequest;
use App\Models\Lab;
use App\Models\labImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LabController extends Controller
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
        $labs = Lab::all();
        return view('admin.lab.index', compact('labs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lab.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabRequest $request)
    {
        $lab = new Lab();
        $lab->title = $request->input('title');
        $lab->desc = $request->input('desc');
        $lab->user = Auth::user()->name;
        if ($request->svg != null) {
            $img = $request->svg;
            $imgPath = Storage::put('/public/images', $img);
            $lab->svg = $imgPath;
        }
        $lab->save();
        if ($request->image != null) {
            foreach ($request->file('image') as $file) {
                $img = new labImg();
                $imgPath = Storage::put('/public/images', $file);
                $img->img = $imgPath;
                $img->lab_id = $lab->id;
                $img->save();
            }
        }
        return redirect()->route('admin.lab.index')->with('success', 'Лаборатория была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        $lab = Lab::where('id', $lab->id)->first();
        $labsimg = LabImg::where('lab_id', $lab->id)->get();
        return view('admin.lab.show', compact(['lab', 'labsimg']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        $lab = Lab::where('id', $lab->id)->first();
        $labsimg = LabImg::where('lab_id', $lab->id)->get();
        return view('admin.lab.edit', compact(['lab', 'labsimg']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lab $lab)
    {
        // dd($lab->svg);
        if ($request->svg != null) {
            if ($lab->svg) {
                Storage::delete($lab->svg);
            }
            $img = $request->svg;
            $imgPath = Storage::put('/public/images', $img);
            $lab->svg = $imgPath;
        }
        if ($request->image != null) {
            foreach ($request->file('image') as $file) {
                $img = new LabImg();
                $imgPath = Storage::put('/public/images', $file);
                $img->img = $imgPath;
                $img->lab_id = $lab->id;
                $img->save();
            }
        }
        $lab->update($request->all());
        return redirect()->route('admin.lab.index')->with('success', 'Лаборатория была изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        Storage::delete($lab->svg);
        $labimgs = $lab->images;
        foreach ($labimgs as $labimg) {
            Storage::delete($labimg->img);
        }
        $lab->delete();
        return redirect()->route('admin.lab.index')->with('success', 'Лаборатория была удалена');
    }
}
