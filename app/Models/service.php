<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table='service';
    public $timestamps=false;
    protected $fillable=['sname','description','price','sc_id','u_id'];
}
