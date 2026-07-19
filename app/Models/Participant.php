<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Sweepstakes;

class Participant extends Model
{
    protected $fillable = [
        "sweepstake_id",
        "name",
        "email",
    ];

    public function sweepstake()
    {
        return $this->belongsTo(Sweepstakes::class);
    }
}
