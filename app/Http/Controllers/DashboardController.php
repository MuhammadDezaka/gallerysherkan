<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $data = Foto::with('komentar.user','like')->where('user_id',$user_id )->get();

        
        // return dd($data);
        return view('admin.dashboard',compact('data'));
    }
}
