<?php
return [
    'class' => 'yii\authclient\Collection',
    'clients' => [
        'google' => [
            'class' => \Da\User\AuthClient\Google::class,
            'clientId' => 'myid',
            'clientSecret' => 'mysecret',
        ],
    ]
];
