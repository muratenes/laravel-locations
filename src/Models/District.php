<?php

namespace MuratEnes\Regions\Models;


use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
