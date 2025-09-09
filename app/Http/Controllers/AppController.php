<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Services\SummarizeService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppController
{
    public function app(Request $request): Response|ResponseFactory
    {
        // store record
        Record::create(
            $request->all()
        );

        //prepare response
        $response = [
            'request' => $request->all(),
            'summarized' => SummarizeService::getSummarizedByDestinationId($request->input('destinationId'))
        ];

        return response($response, 201);
    }
}
