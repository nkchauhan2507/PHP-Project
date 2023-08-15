<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    use HasFactory;
    protected $table='coupon';
    public $timestamps=false;
    protected $fillable=['coupon_code','discount_amt','minimum_amt','no_use','coupon_type','start_date','end_date','u_id'];
}
