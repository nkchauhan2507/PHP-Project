<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membership extends Model
{
    use HasFactory;
    protected $table='membership';
    public $timestamps=false;
    protected $fillable=['type','description','duration','price'];
}
