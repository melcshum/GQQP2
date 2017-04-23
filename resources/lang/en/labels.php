<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'roles'          => 'Roles',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'Login',
            'login_button'       => 'Login',
            'login_with'         => 'Login with :social_media',
            'register_box_title' => 'Register',
            'register_button'    => 'Register',
            'remember_me'        => 'Remember Me',
        ],

        'passwords' => [
            'forgot_password'                 => 'Forgot Your Password?',
            'reset_password_box_title'        => 'Reset Password',
            'reset_password_button'           => 'Reset Password',
            'send_password_reset_link_button' => 'Send Password Reset Link',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Country Alpha Codes',
                'alpha2'  => 'Country Alpha 2 Codes',
                'alpha3'  => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'Change Password',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'Created At',
                'edit_information'   => 'Edit Information',
                'email'              => 'E-mail',
                'last_updated'       => 'Last Updated',
                'name'               => 'Name',
                'update_information' => 'Update Information',
            ],
        ],

    ],

    'lms' => [
        'mcQuestions' =>[
            'management'          => 'Questions Management',
            'active'              => 'Active MC questions',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :MC question',
            'create'              => 'Create MC question',
            'deactivated'         => 'Deactivated MC questions',
            'deleted'             => 'Deleted MC questions',
            'edit'                => 'Edit MC question',
            'management'          => 'MC Question Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',

            'table' => [
                'confirmed'      => 'Confirmed',
                'created'        => 'Created',
                'description'          => 'Description',
                'id'             => 'ID',
                'last_updated'   => 'Last Updated',
                'name'           => 'Name',
                'question'       => 'Question',
                'no_deactivated' => 'No Deactivated Users',
                'no_deleted'     => 'No Deleted Users',
                'total'          => 'user total|users total',
            ],
<<<<<<< HEAD
            ],
            'iftutorialQuestions' =>[
                'management'          => 'Questions Management',
                'active'              => 'Active if tutorial questions',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :if tutorial question',
                'create'              => 'Create if tutorial question',
                'deactivated'         => 'Deactivated if tutorial questions',
                'deleted'             => 'Deleted if tutorial questions',
                'edit'                => 'Edit if tutorial question',
                'management'          => 'If tutorial Question Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',
=======
        ],

        'fillQuestions' =>[
            'management'          => 'Questions Management',
            'active'              => 'Active fill in the blank questions',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :fill in the blank question',
            'create'              => 'Create fill in the blank question',
            'deactivated'         => 'Deactivated fill in the blank questions',
            'deleted'             => 'Deleted fill in the blank questions',
            'edit'                => 'Edit fill in the blank question',
            'management'          => 'fill in the blank Question Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',
>>>>>>> 922febbdc7615e5c8d238aefe461dfcd2c2f61de

            'table' => [
                'confirmed'      => 'Confirmed',
                'created'        => 'Created',
                'description'    => 'Description',
                'id'             => 'ID',
                'last_updated'   => 'Last Updated',
                'name'           => 'Name',
                'question'       => 'Question',
                'no_deactivated' => 'No Deactivated Users',
                'no_deleted'     => 'No Deleted Users',
                'total'          => 'user total|users total',
            ],

        ],

        'loopQuestions' =>[
            'management'          => 'Questions Management',
            'active'              => 'Active loop questions',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :loop question',
            'create'              => 'Create loop question',
            'deactivated'         => 'Deactivated loop questions',
            'deleted'             => 'Deleted loop questions',
            'edit'                => 'Edit loop question',
            'management'          => 'loop Question Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',

            'table' => [
                'confirmed'      => 'Confirmed',
                'created'        => 'Created',
                'description'    => 'Description',
                'id'             => 'ID',
                'last_updated'   => 'Last Updated',
                'name'           => 'Name',
                'question'       => 'Question',
                'no_deactivated' => 'No Deactivated Users',
                'no_deleted'     => 'No Deleted Users',
                'total'          => 'user total|users total',
            ],

<<<<<<< HEAD
        'arrayQuestions' =>[
            'management'          => 'Questions Management',
            'active'              => 'Active array questions',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :array question',
            'create'              => 'Create array question',
            'deactivated'         => 'Deactivated array questions',
            'deleted'             => 'Deleted array questions',
            'edit'                => 'Edit array question',
            'management'          => 'Array Question Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',

            'table' => [
                'confirmed'      => 'Confirmed',
                'created'        => 'Created',
                'description'    => 'Description',
                'id'             => 'ID',
                'last_updated'   => 'Last Updated',
                'name'           => 'Name',
                'question'       => 'Question',
                'no_deactivated' => 'No Deactivated Users',
                'no_deleted'     => 'No Deleted Users',
                'total'          => 'user total|users total',
            ],
        ],


        
=======

        ],

>>>>>>> 922febbdc7615e5c8d238aefe461dfcd2c2f61de
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'roles'          => 'Roles',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'Confirmed',
                            'created_at'   => 'Created At',
                            'deleted_at'   => 'Deleted At',
                            'email'        => 'E-mail',
                            'last_updated' => 'Last Updated',
                            'name'         => 'Name',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],
];
