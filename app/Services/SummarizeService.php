<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;


class SummarizeService
{
    /**
     * @param string $destinationId
     * @return array
     */
    public static function getSummarizedByDestinationId(string $destinationId): array
    {
        return DB::table('records')
            ->select([DB::raw('SUM(value) as total'), 'unit'])
            ->where('destinationId', '=', $destinationId)
            ->groupBy('unit')
            ->get()
            ->toArray();
    }
}
