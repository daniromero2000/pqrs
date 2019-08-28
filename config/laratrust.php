<?php

/**
 * This file is part of Laratrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Laratrust
 */

<<<<<<< HEAD
use App\Socomir\Employees\Employee;
use App\Socomir\Permissions\Permission;
use App\Socomir\Roles\Role;
use App\Socomir\Teams\Team;

=======
use App\Model\Employees\Employee;
use App\Model\Permissions\Permission;
use App\Model\Roles\Role;
use App\Model\Teams\Team;
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

return [
    /*
    |--------------------------------------------------------------------------
    | Use MorphMap in relationships between models
    |--------------------------------------------------------------------------
    |
    | If true, the morphMap feature is going to be used. The array values that
    | are going to be used are the ones inside the 'user_models' array.
    |
    */
    'use_morph_map' => false,

    /*
    |--------------------------------------------------------------------------
    | Use cache in the package
    |--------------------------------------------------------------------------
    |
    | Defines if Laratrust will use Laravel's Cache to cache the roles and permissions.
    |
    */
<<<<<<< HEAD
    'use_cache' => false,
=======
    'use_cache' => true,
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4

    /*
    |--------------------------------------------------------------------------
    | Use teams feature in the package
    |--------------------------------------------------------------------------
    |
    | Defines if Laratrust will use the teams feature.
    | Please check the docs to see what you need to do in case you have the package already configured.
    |
    */
    'use_teams' => false,

    /*
    |--------------------------------------------------------------------------
    | Strict check for roles/permissions inside teams
    |--------------------------------------------------------------------------
    |
    | Determines if a strict check should be done when checking if a role or permission
    | is attached inside a team.
    | If it's false, when checking a role/permission without specifying the team,
    | it will check only if the user has attached that role/permission ignoring the team.
    |
    */
    'teams_strict_check' => false,

    /*
    |--------------------------------------------------------------------------
    | Laratrust User Models
    |--------------------------------------------------------------------------
    |
    | This is the array that contains the information of the user models.
    | This information is used in the add-trait command, and for the roles and
    | permissions relationships with the possible user models.
    |
    | The key in the array is the name of the relationship inside the roles and permissions.
    |
    */
    'user_models' => [
        'users' => Employee::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Laratrust Models
    |--------------------------------------------------------------------------
    |
    | These are the models used by Laratrust to define the roles, permissions and teams.
    | If you want the Laratrust models to be in a different namespace or
    | to have a different name, you can do it here.
    |
    */
    'models' => [
        /**
         * Role model
         */
        'role' => Role::class,

        /**
         * Permission model
         */
        'permission' => Permission::class,

        /**
         * Team model
         */
        'team' => Team::class,

    ],

    /*
    |--------------------------------------------------------------------------
    | Laratrust Tables
    |--------------------------------------------------------------------------
    |
    | These are the tables used by Laratrust to store all the authorization data.
    |
    */
    'tables' => [
        /**
         * Roles table.
         */
        'roles' => 'roles',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Permissions table.
         */
        'permissions' => 'permissions',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Teams table.
         */
        'teams' => 'teams',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Role - User intermediate table.
         */
        'role_user' => 'role_user',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Permission - User intermediate table.
         */
        'permission_user' => 'permission_user',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Permission - Role intermediate table.
         */
        'permission_role' => 'permission_role',

<<<<<<< HEAD
=======

>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
    ],

    /*
    |--------------------------------------------------------------------------
    | Laratrust Foreign Keys
    |--------------------------------------------------------------------------
    |
    | These are the foreign keys used by laratrust in the intermediate tables.
    |
    */
    'foreign_keys' => [
        /**
         * User foreign key on Laratrust's role_user and permission_user tables.
         */
        'user' => 'user_id',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Role foreign key on Laratrust's role_user and permission_role tables.
         */
        'role' => 'role_id',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Role foreign key on Laratrust's permission_user and permission_role tables.
         */
        'permission' => 'permission_id',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Role foreign key on Laratrust's role_user and permission_user tables.
         */
        'team' => 'team_id',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
    ],

    /*
    |--------------------------------------------------------------------------
    | Laratrust Middleware
    |--------------------------------------------------------------------------
    |
    | This configuration helps to customize the Laratrust middleware behavior.
    |
    */
    'middleware' => [
        /**
         * Define if the laratrust middleware are registered automatically in the service provider
         */
        'register' => true,
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Method to be called in the middleware return case.
         * Available: abort|redirect
         */
        'handling' => 'abort',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
        /**
         * Parameter passed to the middleware_handling method
         */
        'params' => '403',
<<<<<<< HEAD

=======
>>>>>>> 916b0d501bc015f411b62ad487daa9bfbef31ab4
    ],

    /*
    |--------------------------------------------------------------------------
    | Laratrust Magic 'can' Method
    |--------------------------------------------------------------------------
    |
    | Supported cases for the magic can method (Refer to the docs).
    | Available: camel_case|snake_case|kebab_case
    |
    */
    'magic_can_method_case' => 'kebab_case',
];
