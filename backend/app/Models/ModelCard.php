<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCard extends Model
{
    use HasFactory;
    protected $table = 'tb_card';
    protected $primaryKey = 'id';
    protected $fillable =['contentText','category'];
}
