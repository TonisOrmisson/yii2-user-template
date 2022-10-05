<?php

namespace app\bootstraps;

use Da\User\Event\UserEvent;
use yii\base\BootstrapInterface;
use Yii;

class AppBootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
        Yii::info("ping", 'app');
        /** @var ?\Da\User\Model\User $user */
        $user = $app->user->identity;

        if (!($user instanceof \Da\User\Model\User)) {
            return;
        }

        Yii::info("ping", 'app');

        $user->on(UserEvent::EVENT_BEFORE_BLOCK, function (UserEvent $event) {
            Yii::info("ping block", 'app');
            Yii::info("user blocked: {$event->sender->username}", 'app');
        });
    }

}