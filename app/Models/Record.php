<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// @TODO: move value field in another table in order to increase sum calculation execution times
class Record extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'recordId',
        'time',
        'sourceId',
        'destinationId',
        'type',         // this can also be stored as bool
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
