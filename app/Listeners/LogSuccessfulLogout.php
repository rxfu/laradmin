<?php

namespace App\Listeners;

use App\Services\LogService;

class LogSuccessfulLogout
{
    private $_service;

    /**
     * Create the event listener.
     *
     * @param \App\Services\LogService $service
     * @return void
     */
    public function __construct(LogService $service)
    {
        $this->_service = $service;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->_service->log(200006, $event->user, 'logout');
    }
}