<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Log;
use SplSubject;

class NotificationObserver implements \SplObserver
{
    protected const AMOUNT_THRESHOLD = 10;

    protected array $request;

    /**
     * @param array $request
     */
    public function setRequest(array $request): void
    {
        $this->request = $request;
    }

    /**
     *
     *
     * @param SplSubject $subject
     * @return void
     */
    public function update(SplSubject $subject): void
    {
        $message = $this->request['recordId'].' has the value: '.$this->request['value'];

        if ($this->request['value'] > self::AMOUNT_THRESHOLD) {
            Log::alert($message);

            return;
        }

        Log::notice($message);
    }
}
