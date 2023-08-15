<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table='user';
    protected $primaryKey='u_id';
    public $timestamps=false;
    protected $fillable=['cust_name','email','phoneno','gender','DOB','password','address_id','token'];
}
