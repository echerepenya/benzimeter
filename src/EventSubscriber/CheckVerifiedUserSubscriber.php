<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Http\Event\CheckPassportEvent;
use Symfony\Component\Security\Http\Authenticator\Passport\UserPassportInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

class CheckVerifiedUserSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            CheckPassportEvent::class => ['onCheckPassport', -10],
        );
    }
    
    public function onCheckPassport(CheckPassportEvent $event)
    {
        $passport = $event->getPassport();
        $user = $passport->getUser();
        if(!$user instanceof User) {
            throw new \Exception('Unexpected user type');
        }

        if(!$user->isVerified()) {
            throw new CustomUserMessageAuthenticationException(
                'Необходимо подтвердить адрес электронной почты.'
            );
        }
    }
}