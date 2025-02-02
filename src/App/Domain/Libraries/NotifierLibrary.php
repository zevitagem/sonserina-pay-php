<?php

declare(strict_types=1);

namespace App\Domain\Libraries;

use App\Domain\Contracts\NotifierClientInterface;
use App\Domain\Entities\Notification;
use App\Domain\Contracts\ReceptorEmailClientInterface;

class NotifierLibrary implements NotifierClientInterface
{

    /**
     * @var Notification 
     */
    private Notification $notification;

    /**
     * @param ReceptorEmailClientInterface $receptor
     * @return Notification
     */
    public function configure(ReceptorEmailClientInterface $receptor): Notification
    {
        $this->notification = new Notification();
        $this->notification->setEmail($receptor->getEmail());
        $this->notification->setMessage('Transaction performed successfully');

        return $this->getNotification();
    }

    /**
     * @return Notification
     */
    public function getNotification(): Notification
    {
        return $this->notification;
    }

    /**
     * @param Notification $notification
     * @return void
     */
    public function notify(Notification $notification): void
    {
        echo 'Notifying ... [' . $notification->getEmail() . ']' . PHP_EOL;
    }

}
