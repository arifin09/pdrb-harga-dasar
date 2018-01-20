<?php

namespace App\Models\Bantenprov\PdrbHargaDasar;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PdrbHargaDasar extends Model 
{

    protected $table = 'pdrb_harga_dasars';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

}