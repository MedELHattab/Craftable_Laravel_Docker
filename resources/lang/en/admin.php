<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'user' => [
        'title' => 'User',

        'actions' => [
            'index' => 'User',
            'create' => 'New User',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'sex' => [
        'title' => 'Sexes',

        'actions' => [
            'index' => 'Sexes',
            'create' => 'New Sex',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'sexes-list' => [
        'title' => 'Sexes-List',

        'actions' => [
            'index' => 'Sexes-List',
            'create' => 'New Sexes-List',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'sex' => [
        'title' => 'Sexes',

        'actions' => [
            'index' => 'Sexes',
            'create' => 'New Sex',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];