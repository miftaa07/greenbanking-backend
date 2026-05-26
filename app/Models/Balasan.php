<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balasan extends Model
{
    use HasFactory;

    protected $table = 'balasan';

    protected $fillable = [
        'pesan_id',
        'isi_balasan',
    ];

    public function pesan()
    {
        return $this->belongsTo(Pesan::class);
    }
}
