<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kriteria',
        'jabatan_id',
        'pekerjaan_id'

    ];   

    public function jabatans()
    {
        //kalo relasi hasMany, nama function jamak (pake s), terus relasi mengarah ke model
        //disini jabatan to model user
        return $this->hasMany(Jabatan::class); //relasi many to one (jabatan punya banyak user)
    }

    public function pekerjaans()
    {
        return $this->hasMany(Pekerjaan::class); 
    }
}
