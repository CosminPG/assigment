<?php

namespace App\Notifications;

use SplObjectStorage;
use SplObserver;

class NotificationSubject implements \SplSubject
{

    /**
     * @var SplObjectStorage
     */
    private SplObjectStorage $observers;

    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * The subscription management methods.
     *
     * @param SplObserver $observer
     * @return void
     */
    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach subscriber
     *
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * Trigger an update in each subscriber.
     *
     * @return void
     */
    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
