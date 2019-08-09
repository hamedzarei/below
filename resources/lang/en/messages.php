<?php
/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 8/1/19
 * Time: 6:19 PM
 */

return [
    'custom'               => [
        '201' => 'successfully created',
        '401' => 'try login again',
        '403' => 'forbidden',
        '409' => 'resource conflict',
        '429' => 'too many request exception, retry after :retry hours',
        'token' => [
            'revoke' => 'successfully revoked',
            'client_revoke_notice' => 'your old token is going to revoke in 24 hours'
        ],
        'error' => [
            'no_data' => 'your request has no content or content is not valid',
            'unauthorized' => 'unauthorized',
            'wrong_password' => 'your password is not correct!',
            'disabled_account' => 'your account has been disabled',
            'used_code' => 'this code has been used at :time'
        ],
        'success' => [
            'update' => 'updated successfully',
            'create' => 'successfully created',
            'delete' => 'successfully deleted',
            'validation_email_sent' => 'validation email sent',
            'ok_validation' => 'your account has been successfully validated',
            'forgot_password' => 'please check your email to continue!',
            'unsubscribe' => 'you have unsubscribed successfully'
        ]
    ]

];