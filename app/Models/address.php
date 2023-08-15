<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table='address';
    protected $primaryKey='address_id';
    public $timestamps=false;
    protected $fillable=['address','pincode','city_id','state_id','country_id'];
}
