<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(){
        // $user_id = Auth::user()->id;
        $data = Foto::with('komentar.user','like')->get();

        
        // return dd($data);
        return view('public.index',compact('data'));
    }
}
