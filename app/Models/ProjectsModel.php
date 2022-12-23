<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsModel extends Model
{
    use HasFactory;
    public $table='projects';
    public $primaryKey='id';
    public $incrementiog=true;
    public $keyType='int';
    public $timestamps=false;
}
