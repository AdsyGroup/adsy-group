<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelGame extends Model
{
    use HasFactory;
    protected $table = 'tb_listgame';
    protected $primaryKey = 'id';
    protected $fillable =['title','description','image_url','link'];
}
