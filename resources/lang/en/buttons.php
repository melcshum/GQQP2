<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Buttons Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in buttons throughout the system.
    | Regardless where it is placed, a button can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'users' => [
                'activate'           => 'Activate',
                'change_password'    => 'Change Password',
                'deactivate'         => 'Deactivate',
                'delete_permanently' => 'Delete Permanently',
                'login_as'           => 'Login As :user',
                'resend_email'       => 'Resend Confirmation E-mail',
                'restore_user'       => 'Restore User',
            ],
        ],
    ],

    'emails' => [
        'auth' => [
            'confirm_account' => 'Confirm Account',
            'reset_password'  => 'Reset Password',
        ],
    ],

    'general' => [
        'cancel' => 'Cancel',

        'crud' => [
            'create' => 'Create',
            'delete' => 'Delete',
            'edit'   => 'Edit',
            'update' => 'Update',
            'view'   => 'View',
        ],

        'save' => 'Save',
        'view' => 'View',
    ],

    'lms' =>[
      'models' =>[
        'deactivate'            => 'Deactivate',
          'activate'              => 'Activate',

      ],
        'mcQuestion' =>[
            'restore_user'       => 'Restore Mc Question',
            'delete_permanently' => 'Delete Permanently',
        ],

        'fillQuestion' =>[
            'restore_user'       => 'Restore fill in the blank Question',
            'delete_permanently' => 'Delete Permanently',
        ],

        'loopQuestion' =>[
            'restore_user'       => 'Restore loop Question',
            'delete_permanently' => 'Delete Permanently',
        ],

        'iftutorialQuestion' =>[
            'restore_user'       => 'Restore if_else Question',
            'delete_permanently' => 'Delete Permanently',
        ],

        'arrayQuestion' =>[
            'restore_user'       => 'Restore array Question',
            'delete_permanently' => 'Delete Permanently',
        ],
    ],
];
