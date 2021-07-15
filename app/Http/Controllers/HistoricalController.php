<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historical;

class HistoricalController extends Controller
{
    public function index(Request $request)
    {
        return view('Historical.index');
    }

    public function save(Request $request)
    {
        Historical::create($request->all());
        return 1;
    }

    public function show(Request $request)
    {
        $data = Historical::orderby('created_at','desc')->limit(25)->get();
        return view('Historical.historial')->with('data',$data);
    }
}
