<?php
/** @var array $params */
return [
    'class' => \Da\User\Module::class,
    'allowUnconfirmedEmailLogin'=>true,
    'enableRegistration'=>true,
    'enableFlashMessages'=>true,
    //'enableSwitchIdentities' => false,
    'administrators' => ['admin'],
    'enableGdprCompliance' => true,
    'gdprRequireConsentToAll' => true,
    'gdprPrivacyPolicyUrl' => "/privacy",
    'enableTwoFactorAuthentication' => true,
    'enableSessionHistory' => true,
    'mailParams' => [
        'fromEmail' => $params['adminEmail'],
    ],

];
