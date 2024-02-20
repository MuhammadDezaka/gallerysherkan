<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index(){
        $data = Foto::with('komentar.user','like','user')->get();

        return view('public.index',compact('data'));
    }
}
