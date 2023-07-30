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

    protected $table = 'barangs';

    protected $primaryKey = 'id';

    // protected $guarded = [];
    protected $fillable = ['stok'];

    public function barangmasuk()
    {
        return $this->hasMany('App\barangmasuk', 'barangmasuk_id', 'id');
    }

    public function barangkeluar()
    {
        return $this->belongsTo(barangkeluar::class);
    }

   public function barangedit()
    {
        return $this->belongsTo(barangedit::class);
    }

}
