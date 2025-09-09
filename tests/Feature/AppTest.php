<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AppTest extends TestCase
{
    /**
     * A basic feature test example.
     * @dataProvider successRequestDataProvider
     */
    public function testSuccessRequest(string $recordId, string $sourceId, string $destinationId, string $type, float $value, string $unit, string $reference): void
    {
        $postData = [
            'recordId' => $recordId,
            'time' => date('Y-m-d H:i:s'),
            'sourceId' => $sourceId,
            'destinationId' => $destinationId,
            'type' => $type,
            'value' => $value,
            'unit' => $unit,
            'reference' => $reference
        ];
        $response = $this->post('/', $postData);
        dd($response);
//
//        $response->assertStatus(200);
    }

    public static function successRequestDataProvider(): array
    {
        $types = ['positive', 'negative'];
        $units = ['m', 'pack', 'l'];
        $randomsUuids = [
            '3d9e2cfd-143a-42e7-9f97-e48b51c4548f',
            '5c368a05-b428-4e08-b0e7-68dbdd6539c4',
            'b4b24d87-7842-4bb0-8a81-aca1768b63de',
            'fe344463-5cd0-4474-bf63-029194cc4a08',
            '095d5d15-da97-41d1-9f9b-330a3c2cb5bf',
            'e8ddb190-ea0f-432a-ac28-a156885a7a05',
            '6fc55be7-c685-4592-97bf-2f97bd38b31f',
            '3e74be1c-9952-40af-bce8-690b4e068e78',
            '8f1965ca-3c18-4047-8781-ae79d051c12f',
            'c626d545-49ad-406e-ae65-3c30b9dc9f9c',
        ];

        return [
            //recordId, sourceId, destinationId, type, value, unit, reference
            [Str::uuid()->toString(), Str::uuid()->toString(), $randomsUuids[array_rand($randomsUuids)], $types[array_rand($types)], rand(0, 9999)/100, $units[array_rand($units)], Str::uuid()->toString()]
        ];
    }
}
