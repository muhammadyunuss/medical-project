<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa extends Model
{
    use HasFactory;

    protected $table = 'periksa';
    protected $fillable = ['patient_id', 'tanggal_periksa','keluhan','diagnosa','penyakit','obat','keterangan', 'created_by','updated_by'];
}
