<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDashboard extends Model
{
    use HasFactory;

    protected $table = 'data_dashboard';
    protected $primaryKey = 'id_dashboard';
    public $incrementing = false; // Since id_dashboard is not auto-incrementing
    protected $keyType = 'string'; // The primary key is a string (alphanumeric)
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'id_dashboard',
        'title',
        'link',
        'deskripsi',
        'last_update',
        'year',
        'image',
        'status',
    ];

    public function otorisasi()
    {
        return $this->hasMany(DataOtorisasi::class, 'id_dashboard', 'id_dashboard');
    }
}
