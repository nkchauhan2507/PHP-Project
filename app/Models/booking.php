<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;
    protected $table='booking';
    protected $primaryKey='booking_id';
    public $timestamps=false;
    protected $fillable=['u_id','apt_date','apt_time','booking_status','coupon_id',
        'payment_status','total','payment_type','transaction_id','booking_date','discount_amount'];
}
