<?php

namespace App\Http\Middleware;

use App\Rules\RequestRule;
use Closure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response) $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $validation = Validator::make(
            $request->all(),
            RequestRule::rules()
        );

        if ($validation->fails()) {
            return \response('Bad request', 400);
        }

        return $next($request);
    }
}
