<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $fillable = ['nama_penyakit', 'keterangan', 'created_by','updated_by'];

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function findData($penyakit)
    {
        return static::find($penyakit);
    }

    public function updateData($penyakit, $input)
    {
        return static::find($penyakit)->update($input);
    }

    public function deleteData($penyakit)
    {
        return static::find($penyakit)->delete();
    }
}
