<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usercountry extends Model
{
    use HasFactory;
    protected $table='ucountry';
    protected $primaryKey='country_id';
    public $timestamps=false;
    protected $fillable=['countryname'];
}
