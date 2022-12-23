<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursModal extends Model
{
    use HasFactory;
    public $table='courses';
    public $primaryKey='id';
    public $incrementiog=true;
    public $keyType='int';
    public $timestamps=false;
}
