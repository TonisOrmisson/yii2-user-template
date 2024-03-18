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
    'enableSessionHistory' => true,
    'allowAccountDelete' => true,
    'mailParams' => [
        'fromEmail' => $params['adminEmail'],
    ],
    //'maxPasswordAge' => 1,
    //'viewPath' => '@Da/User/resources/views/bootstrap5',
    //'twoFactorAuthenticationForcedPermissions' => ['siteAdmin'],
    'enableTwoFactorAuthentication' => true,
    //'profileVisibility' => 3

];
