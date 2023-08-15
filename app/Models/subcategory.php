<?php

namespace App\Models;
use Db;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;
    protected $table='sub_category';
    public $timestamps=false;
    protected $fillable=['scname','category_id'];

}
