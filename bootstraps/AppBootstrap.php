<?php

namespace app\bootstraps;

use yii\base\BootstrapInterface;
use Yii;

class AppBootstrap implements BootstrapInterface
{

    public function bootstrap($app)
    {
        Yii::info("ping", 'app');
        /** @var \Da\User\Model\User $user */
        $user = $app->user->identity;

        Yii::info("ping", 'app');

    }

}