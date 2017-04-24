<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Exception Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in Exceptions thrown throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */
    'lms' => [
        'mcQuestions' => [
            'cant_deactivate_self'  => 'You can not do that to yourself.',
            'cant_delete_self'      => 'You can not delete yourself.',
            'cant_restore'          => 'This NC Question is not deleted so it can not be restored.',
            'create_error'          => 'There was a problem creating this MC question. Please try again.',
            'delete_error'          => 'There was a problem deleting this MC question. Please try again.',
            'delete_first'          => 'This MC question must be deleted first before it can be destroyed permanently.',
            'email_error'           => 'That email address belongs to a different question.',
            'mark_error'            => 'There was a problem updating this MC question. Please try again.',
            'not_found'             => 'That MC question does not exist.',
            'restore_error'         => 'There was a problem restoring this MC question. Please try again.',
            'update_error'          => 'There was a problem updating this MC question. Please try again.',

        ],

        'fillQuestions' => [
            'cant_deactivate_self'  => 'You can not do that to yourself.',
            'cant_delete_self'      => 'You can not delete yourself.',
            'cant_restore'          => 'This fill in the blank is not deleted so it can not be restored.',
            'create_error'          => 'There was a problem creating this fill in the blank question. Please try again.',
            'delete_error'          => 'There was a problem deleting this fill in the blank question. Please try again.',
            'delete_first'          => 'This fill in the blank question must be deleted first before it can be destroyed permanently.',
            'email_error'           => 'That email address belongs to a different question.',
            'mark_error'            => 'There was a problem updating this fill in the blank question. Please try again.',
            'not_found'             => 'That fill in the blank question does not exist.',
            'restore_error'         => 'There was a problem restoring this fill in the blank question. Please try again.',
            'update_error'          => 'There was a problem updating this fill in the blank question. Please try again.',

        ],

        'loopQuestions' => [
            'cant_deactivate_self'  => 'You can not do that to yourself.',
            'cant_delete_self'      => 'You can not delete yourself.',
            'cant_restore'          => 'This loop is not deleted so it can not be restored.',
            'create_error'          => 'There was a problem creating this loop question. Please try again.',
            'delete_error'          => 'There was a problem deleting this loop question. Please try again.',
            'delete_first'          => 'This loop question must be deleted first before it can be destroyed permanently.',
            'email_error'           => 'That email address belongs to a different question.',
            'mark_error'            => 'There was a problem updating this fill in the blank question. Please try again.',
            'not_found'             => 'That loop question does not exist.',
            'restore_error'         => 'There was a problem restoring this loop question. Please try again.',
            'update_error'          => 'There was a problem updating this loop question. Please try again.',

        ],

        'iftutorialQuestions' => [
            'cant_deactivate_self'  => 'You can not do that to yourself.',
            'cant_delete_self'      => 'You can not delete yourself.',
            'cant_restore'          => 'This if_else is not deleted so it can not be restored.',
            'create_error'          => 'There was a problem creating this if_else question. Please try again.',
            'delete_error'          => 'There was a problem deleting this if_else question. Please try again.',
            'delete_first'          => 'This if_else question must be deleted first before it can be destroyed permanently.',
            'email_error'           => 'That email address belongs to a different question.',
            'mark_error'            => 'There was a problem updating this if_else question. Please try again.',
            'not_found'             => 'That if_else question does not exist.',
            'restore_error'         => 'There was a problem restoring this if_else question. Please try again.',
            'update_error'          => 'There was a problem updating this if_else question. Please try again.',

        ],

        'arrayQuestions' => [
            'cant_deactivate_self'  => 'You can not do that to yourself.',
            'cant_delete_self'      => 'You can not delete yourself.',
            'cant_restore'          => 'This array is not deleted so it can not be restored.',
            'create_error'          => 'There was a problem creating this array question. Please try again.',
            'delete_error'          => 'There was a problem deleting this array question. Please try again.',
            'delete_first'          => 'This array question must be deleted first before it can be destroyed permanently.',
            'email_error'           => 'That email address belongs to a different question.',
            'mark_error'            => 'There was a problem updating this array question. Please try again.',
            'not_found'             => 'That array question does not exist.',
            'restore_error'         => 'There was a problem restoring this array question. Please try again.',
            'update_error'          => 'There was a problem updating this array question. Please try again.',

        ],

     ],
    'backend' => [
        'access' => [
            'roles' => [
                'already_exists'    => 'That role already exists. Please choose a different name.',
                'cant_delete_admin' => 'You can not delete the Administrator role.',
                'create_error'      => 'There was a problem creating this role. Please try again.',
                'delete_error'      => 'There was a problem deleting this role. Please try again.',
                'has_users'         => 'You can not delete a role with associated users.',
                'needs_permission'  => 'You must select at least one permission for this role.',
                'not_found'         => 'That role does not exist.',
                'update_error'      => 'There was a problem updating this role. Please try again.',
            ],

            'users' => [
                'cant_deactivate_self'  => 'You can not do that to yourself.',
                'cant_delete_self'      => 'You can not delete yourself.',
                'cant_restore'          => 'This user is not deleted so it can not be restored.',
                'create_error'          => 'There was a problem creating this user. Please try again.',
                'delete_error'          => 'There was a problem deleting this user. Please try again.',
                'delete_first'          => 'This user must be deleted first before it can be destroyed permanently.',
                'email_error'           => 'That email address belongs to a different user.',
                'mark_error'            => 'There was a problem updating this user. Please try again.',
                'not_found'             => 'That user does not exist.',
                'restore_error'         => 'There was a problem restoring this user. Please try again.',
                'role_needed_create'    => 'You must choose at lease one role.',
                'role_needed'           => 'You must choose at least one role.',
                'update_error'          => 'There was a problem updating this user. Please try again.',
                'update_password_error' => 'There was a problem changing this users password. Please try again.',
            ],
        ],
    ],

    'frontend' => [
        'auth' => [
            'confirmation' => [
                'already_confirmed' => 'Your account is already confirmed.',
                'confirm'           => 'Confirm your account!',
                'created_confirm'   => 'Your account was successfully created. We have sent you an e-mail to confirm your account.',
                'mismatch'          => 'Your confirmation code does not match.',
                'not_found'         => 'That confirmation code does not exist.',
                'resend'            => 'Your account is not confirmed. Please click the confirmation link in your e-mail, or <a href="'.route('frontend.auth.account.confirm.resend', ':user_id').'">click here</a> to resend the confirmation e-mail.',
                'success'           => 'Your account has been successfully confirmed!',
                'resent'            => 'A new confirmation e-mail has been sent to the address on file.',
            ],

            'deactivated' => 'Your account has been deactivated.',
            'email_taken' => 'That e-mail address is already taken.',

            'password' => [
                'change_mismatch' => 'That is not your old password.',
            ],
        ],
    ],
];
