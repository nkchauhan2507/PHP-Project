<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingdetails extends Model
{
    use HasFactory;
    protected $table='booking_details';
//    protected $primaryKey='booking_details_id';
    public $timestamps=false;
    protected $fillable=['booking_id','service_id','price'];
}
