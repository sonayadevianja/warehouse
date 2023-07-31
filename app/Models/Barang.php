<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = ['nama_barang','tanggal_produksi','jenis_id','stok','deskripsi'];

    protected $hidden = ['created_at','update_at'];

    public function jenis()
    {
        return $this->belongsTo(jenis::class);
    }
    public function barangmasuk()
    {
        return $this->hasMany(barangmasuk::class);
    }
    public function barangkeluar()
    {
        return $this->hasMany(barangkeluar::class);
    }



    // protected $guarded = [];
//     protected $fillable = ['stok'];


//     public function barangkeluar()
//     {
//         return $this->belongsTo(barangkeluar::class);
//     }

//    public function barangedit()
//     {
//         return $this->belongsTo(barangedit::class);


}
