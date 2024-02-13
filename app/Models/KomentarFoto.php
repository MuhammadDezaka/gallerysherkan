<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomentarFoto extends Model
{
    use HasFactory;

    protected $table = 'komentar_foto';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
