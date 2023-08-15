<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
    use HasFactory;
    protected $table='admin';
    public $timestamps=false;
    protected $fillable=['Name','Username','Password'];
}
