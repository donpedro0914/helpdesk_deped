<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['agent', 'notes'];

    public function getFormattedIdAttribute()
    {
        return str_pad($this->id, 6, '0', STR_PAD_LEFT);
    }
}
