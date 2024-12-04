<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOtorisasi extends Model
{
    protected $table = 'data_otorisasi';
    protected $primaryKey = 'id_otorisasi';
    protected $fillable = ['id_user', 'id_dashboard'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(MasterUser::class, 'id_user', 'id_user');
    }

    public function dashboard()
    {
        return $this->belongsTo(DataDashboard::class, 'id_dashboard', 'id_dashboard');
    }
}
