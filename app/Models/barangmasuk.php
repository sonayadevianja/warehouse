<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    use HasFactory;

    // protected $table = 'barangmasuks';
    // // protected $primaryKey = 'id';
    // protected $fillable = ['amount','tanggal_masuk'];
    // protected $hidden = ['created_at','updated_at'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
