<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    protected $table = 'santri';
    public $timestamps = false;

    protected $primaryKey = "id_santri";
    protected $fillable = [
        'id_santri', 'nama_santri',
    ];

    public function pembayaran() {
		return $this->hasMany('Pembayaran', 'id_santri');
	}
}
