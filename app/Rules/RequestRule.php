<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class RequestRule
{
    /**
     * Run the validation rule.
     *
     */
    public static function rules(): array
    {
        return [
            'recordId'      => ['required', 'string'],
            'time'          => ['sometimes', 'date_format:Y-m-d H:i:s'],
            'sourceId'      => ['required', 'string'],
            'destinationId' => ['required', 'string'],
            'type'          => ['sometimes', 'in:positive,negative'],
//            'value'         => ['required', 'decimal:10,4'],
            'value'         => ['required',
                                function ($attribute, $value, $fail) {
                                    if (!is_float($value)) {
                                        $fail($attribute.' is invalid.');
                                    }
                                }],
            'unit'          => ['required', 'string'],
            'reference'     => ['required', 'string'],
        ];
    }
}
