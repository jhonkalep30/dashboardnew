<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'master_user';
    protected $primaryKey = 'id_user';
    public $incrementing = false; // Add this line
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'uniq_id', 'id');
    }
    public function hasOtorisasi($id_otorisasi) {
        return $this->otorisasi->contains('id_otorisasi', $id_otorisasi);
    }
    public function otorisasi()
    {
        return $this->hasMany(DataOtorisasi::class, 'id_user', 'id_user');
    }
}
