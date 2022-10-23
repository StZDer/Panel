<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutImg;
use App\Models\Company;
use App\Models\Lab;
use App\Models\News;
use App\Models\NewsImg;
use App\Models\Rota;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function about()
    {
        $about = About::first();
        $aboutimgs = AboutImg::where('about_id', $about->id)->get();
        return view('panel.about.index', compact(['about', 'aboutimgs']));
    }

    public function news()
    {
        $news = News::all();
        return view('panel.news.index', compact(['news']));
    }

    public function lab()
    {
        $labs = Lab::all();
        return view('panel.lab.index', compact(['labs']));
    }

    public function labdesc($request)
    {
        $labs = Lab::all();
        $lab = Lab::where('id', $request)->first();
        return view('panel.lab.desc', compact(['lab', 'labs']));
    }

    public function rotas()
    {
        $rotas = Rota::all();
        return view('panel.rotas.index', compact(['rotas']));
    }

    public function rotadesc($request)
    {
        $rotas = Rota::all();
        $rota = Rota::where('id', $request)->first();
        return view('panel.rotas.desc', compact(['rotas', 'rota']));
    }
}
