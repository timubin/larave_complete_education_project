<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoModel extends Model
{
    use HasFactory;
    public $table='photo';
    public $primaryKey='id';
    public $incrementiog=true;
    public $keyType='int';
    public $timestamps=false;
}
