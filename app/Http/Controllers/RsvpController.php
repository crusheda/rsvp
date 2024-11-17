<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\ucapan;
use Carbon\Carbon;
use Auth;
use Storage;
use Exception;
use Redirect;

class RsvpController extends Controller
{
    function index()
    {
        return view('input-index');
    }

    function index2($nama)
    {
        return view('index')->with('nama', $nama);
    }

    function ucapanGet()
    {
        $show = ucapan::orderBy('created_at','desc')->get();
        $count = ucapan::count();

        $data = [
            'show' => $show,
            'count' => $count
        ];

        return response()->json($data, 200);
    }

    function ucapanStore(Request $request)
    {
        // print_r($request->all());
        // die();
        $tgl = Carbon::now()->isoFormat('dddd, D MMMM Y, HH:mm a');

        $data = new ucapan;
        $data->nama = $request->nama;
        $data->ucapan = $request->ucapan;
        $data->save();

        return response()->json($tgl, 200);
    }
}
