<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Contracts\NotifierClientInterface;
use App\Domain\Entities\Notification;

class Notifier
{

    /**
     * @var NotifierClientInterface
     */
    private NotifierClientInterface $client;

    /**
     * @param NotifierClientInterface $client
     */
    public function __construct(NotifierClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @return NotifierClientInterface
     */
    public function getClient(): NotifierClientInterface
    {
        return $this->client;
    }

    /**
     * @param Notification $notification
     * @return void
     */
    public function notify(Notification $notification): void
    {
        $this->client->notify($notification);
    }

}
