<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
    //
    protected $fillable = ['province_id', 'name', 'population'];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
