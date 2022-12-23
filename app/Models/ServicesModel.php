<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesModel extends Model
{
    use HasFactory;
    public $table='services';
    public $primarykey='id';
    public $incrementiog=true;
    public $keyType='int';
    public $timestamps=false;
}
