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
    'allowAccountDelete' => true,
    'mailParams' => [
        'fromEmail' => $params['adminEmail'],
    ],
    'maxPasswordAge' => 199,
    //'viewPath' => '@Da/User/resources/views/bootstrap5'

];
