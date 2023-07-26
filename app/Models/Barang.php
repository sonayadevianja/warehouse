<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }

    public function barangmasuk()
    {
        return $this->belongsTo(barangmasuk::class);
    }

    public function barangkeluar()
    {
        return $this->belongsTo(barangkeluar::class);
    }

}
