<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\KomentarFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class KomentarFotoController extends Controller
{
    public function store(Request $request){

        //validasi apakah user sudah login atau belum jika belum maka lempar ke halaman login
        if(Auth::check()){
            $data = $request->all();
            $data['tanggal_komentar'] = Carbon::now();
            $data['user_id'] =  Auth::user()->id;
            KomentarFoto::create($data);  
            $url = $request->c_url == 'public'? '/': 'home';
            // $redirectTo = request()->url() == route('home') ? route('home') : '/';
            return redirect($url);
  
        } else {
            return redirect('/login');
        }
       
    }
}
