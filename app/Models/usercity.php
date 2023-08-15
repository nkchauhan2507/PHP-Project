<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usercity extends Model
{
    use HasFactory;
    protected $table='ucity';
    protected $primaryKey='city_id';
    public $timestamps=false;
    protected $fillable=['cityname','state_id'];

}
