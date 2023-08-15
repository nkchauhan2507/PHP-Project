<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class professional extends Model
{
    use HasFactory;
    protected $table='professional';
    public $timestamps=false;
    protected $fillable=['Name','shopname','gst','city','u_id'];
}
