<?php

namespace App\Http\Controllers;

use App\Models\KomentarFoto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarFotoController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $data['tanggal_komentar'] = Carbon::now();
        $data['user_id'] =  Auth::user()->id;
        KomentarFoto::create($data);  

        return redirect('/home');
    }
}
