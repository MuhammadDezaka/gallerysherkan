<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    
    protected $table = 'foto';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function komentar()
    {
        return $this->hasMany(KomentarFoto::class);
    }

    public function like()
    {
        return $this->hasMany(LikeFoto::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
