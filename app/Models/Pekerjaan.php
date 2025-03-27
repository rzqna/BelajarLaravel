<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pekerjaan'
    ];  

    public function users()
    {
        //kalo relasi hasMany, nama function jamak (pake s), terus relasi mengarah ke model
        //disini pekerjaan to model user
        return $this->hasMany(User::class); //relasi many to one (pekerjaan punya banyak user)
    }

    public function kriterias()
    {
        //kalo relasi hasMany, nama function jamak (pake s), terus relasi mengarah ke model
        //disini jabatan to model user
        return $this->belongsTo(Kriteria::class); //relasi many to one (jabatan punya banyak user)
    }
}
