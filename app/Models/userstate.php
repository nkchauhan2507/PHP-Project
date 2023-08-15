<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userstate extends Model
{
    use HasFactory;
    protected $table='ustate';
    protected $primaryKey='state_id';
    public $timestamps=false;
    protected $fillable=['statename','country_id'];
}
