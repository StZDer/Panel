<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
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
        $about = About::first();
        $aboutimgs = AboutImg::where('about_id', $about->id)->get();
        return view(
            'admin.about.index',
            compact(['about', 'aboutimgs'])
        );
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
        foreach ($request->file('image') as $file) {
            $img = new AboutImg();
            $imgPath = Storage::put('/public/images', $file);
            $img->img = $imgPath;
            $img->about_id = 1;
            $img->save();
        }
        return redirect()->route('admin.about.index')->with('success', 'Рота была добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        $about = About::where('id', $about->id)->first();
        $aboutimgs = AboutImg::where('about_id', $about->id)->get();
        return view('admin.about.edit', compact(['about', 'aboutimgs']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        $about->update($request->all());
        return redirect()->route('admin.about.index')->with('success', 'Информацию "О нас" была изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
