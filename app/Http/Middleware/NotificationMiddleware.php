<?php

namespace App\Http\Middleware;

use App\Notifications\NotificationObserver;
use App\Notifications\NotificationSubject;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $notificationSubject = new NotificationSubject();
        $notificationObserver = new NotificationObserver();
        $notificationObserver->setRequest($request->all());
        $notificationSubject->attach($notificationObserver);

        $notificationSubject->notify();

        return $next($request);
    }
}
