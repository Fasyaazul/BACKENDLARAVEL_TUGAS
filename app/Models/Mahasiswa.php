<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table='mahasiswa';
    protected $primarykey='id';
    protected $timestamp = false;
    protected $fillable=['nama','jenis_kelamin','alamat'];
}

