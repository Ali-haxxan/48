<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function categoryFeatures(Request $request, $id)
    {
        dd($id);
        $featureName = categories::find($id);
        $features = Feature::all()->where('category_id', $id);
        $data = [
            'features' => $features,
            'featuresName' => $featureName,
        ];
        // return view('48-h.features', $data);
    }
}
