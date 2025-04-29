<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtmReportModel extends Model
{
    protected $fillable = [
        'mengetahui1_nama',
        'mengetahui1_jabatan',
        'mengetahui1_nip',
        'mengetahui2_nama',
        'mengetahui2_jabatan',
        'mengetahui2_nip',
        'lampiran',
        'pemimpin_rapat',
        'notulis',
        'tanggal_pelaksanaan',
        'waktu_pelaksanaan',
        'tempat_pelaksanaan',
        'agenda',
        'peserta',
        'tahun_akademik'
    ];
} 