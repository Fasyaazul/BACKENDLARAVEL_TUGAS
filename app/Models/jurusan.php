<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table='jurusan';
    protected $primarykey='id';
    protected $fillable=['nama_jurusan'];
}
