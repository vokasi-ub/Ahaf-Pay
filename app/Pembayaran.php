<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    public $timestamps = false;
    protected $primaryKey = 'id_pembayaran'; 

    public function santri() {
		return $this->belongsTo('Santri', 'id_santri');
	}
}
