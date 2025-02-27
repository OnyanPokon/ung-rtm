<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTM extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tahun',
        'ami_anchor',
        'survei_anchor',
        'akreditas_anchor',
    ];

    protected $casts = [
        'ami_anchor' => 'array',
        'survei_anchor' => 'array',
        'akreditas_anchor' => 'array',
    ];
}
