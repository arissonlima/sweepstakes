<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sweepstakes extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'number_of_winners',
        'end_date',
        'description'
    ];

    // Altera o tipo da chave primária para string
    protected $keyType = "string";

    // Desativa o incremento automático da chave primária
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            if (empty($model->id)) {
                $model->id = Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
