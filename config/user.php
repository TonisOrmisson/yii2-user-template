<?php
return [
    'class' => \Da\User\Module::class,
    'allowUnconfirmedEmailLogin'=>true,
    'enableRegistration'=>true,
    'enableFlashMessages'=>true,
    //'enableSwitchIdentities' => false,
    'administrators' => ['admin'],
    'enableGdprCompliance' => true,
    'gdprPrivacyPolicyUrl' => "/privacy",
    'enableTwoFactorAuthentication' => true,
    'mailParams' => [
        'fromEmail' => $params['adminEmail'],
    ],

];
