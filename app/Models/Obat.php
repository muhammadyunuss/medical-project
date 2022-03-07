<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';
    protected $fillable = ['nama_obat', 'keterangan', 'created_by','updated_by'];

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($obat)
    {
        return static::find($obat);
    }

    public function updateData($obat, $input)
    {
        return static::find($obat)->update($input);
    }

    public function deleteData($obat)
    {
        return static::find($obat)->delete();
    }
}
