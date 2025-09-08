<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'recordId',
        'time',
        'sourceId',
        'destinationId',
        'type',
        'value',
        'unit',
        'reference',
    ];

    protected function casts(): array
    {
        return [
            'time' => 'datetime',
        ];
    }
}
