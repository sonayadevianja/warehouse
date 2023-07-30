<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    use HasFactory;

    protected $table = 'barangmasuks';
    protected $primaryKey = 'id';
    protected $fillable = ['amount'];

    public function barang()
    {
        return $this->belongsTo('App\Barang', 'barangmasuk_id', 'id');
    }


}
