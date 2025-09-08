<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Services\SumarizeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppController
{
    public function app(Request $request)
    {
        // store record
        Record::create(
            $request->all()
        );

        //prepare response
        $response = [
            'request' => $request->all(),
            'summarized' => SumarizeService::getSumarizedByDestinationId($request->input('destinationId'))
        ];

        return response($response, 201);
    }
}
