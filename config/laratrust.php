<?php

/**
 * This file is part of Laratrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Laratrust
 */

use App\Model\Employees\Employee;
use App\Model\Permissions\Permission;
use App\Model\Roles\Role;
use App\Model\Teams\Team;

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
    | Laratrust Role Model
    |--------------------------------------------------------------------------
    |
    | This is the Role model used by Laratrust to create correct relations.  Update
    | the role if it is in a different namespace.
    |
    */
    'role' => Role::class,

    /*
    |--------------------------------------------------------------------------
    | Laratrust Roles Table
    |--------------------------------------------------------------------------
    |
    | This is the roles table used by Laratrust to save roles to the database.
    |
    */
    'roles' => 'roles',

    /*
    |--------------------------------------------------------------------------
    | Laratrust Permission Model
    |--------------------------------------------------------------------------
    |
    | This is the Permission model used by Laratrust to create correct relations.
    | Update the permission if it is in a different namespace.
    |
    */
    'permission' => Permission::class,

    /*
    |--------------------------------------------------------------------------
    | Laratrust Permissions Table
    |--------------------------------------------------------------------------
    |
    | This is the permissions table used by Laratrust to save permissions to the
    | database.
    |
    */
    'permissions' => 'permissions',



    /**
     * Team model
     */
    'team' => Team::class,


    /**
     * Teams table.
     */
    'teams' => 'teams',

    /*
    |--------------------------------------------------------------------------
    | Laratrust permission_role Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_role table used by Laratrust to save relationship
    | between permissions and roles to the database.
    |
    */
    'permission_role' => 'permission_role',

    /*
    |--------------------------------------------------------------------------
    | Laratrust role_user Table
    |--------------------------------------------------------------------------
    |
    | This is the role_user table used by Laratrust to save assigned roles to the
    | database.
    |
    */
    'role_user' => 'role_user',

    /*
    |--------------------------------------------------------------------------
    | Laratrust permission_user Table
    |--------------------------------------------------------------------------
    |
    | This is the permission_user table used by Laratrust to save relationship
    | between permissions and users to the database.
    |
    */
    'permission_user' => 'permission_user',

    /*
    |--------------------------------------------------------------------------
    | User Foreign key on Laratrust's role_user Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'user_foreign_key' => 'user_id',

    /*
    |--------------------------------------------------------------------------
    | Role Foreign key on Laratrust's role_user and permission_role Tables (Pivot)
    |--------------------------------------------------------------------------
    */
    'role_foreign_key' => 'role_id',

    /*
    |--------------------------------------------------------------------------
    | Permission Foreign key on Laratrust's permission_role Table (Pivot)
    |--------------------------------------------------------------------------
    */
    'permission_foreign_key' => 'permission_id',

    /**
     * Role foreign key on Laratrust's role_user and permission_user tables.
     */
    'team' => 'team_id',

    /*
    |--------------------------------------------------------------------------
    | Method to be called in the middleware return case
    | Available: abort|redirect
    |--------------------------------------------------------------------------
    */
    'middleware_handling' => 'abort',

    /*
    |--------------------------------------------------------------------------
    | Parameter passed to the middleware_handling method
    |--------------------------------------------------------------------------
    */
    'middleware_params' => '403',

    /**
     * Define if the laratrust middleware are registered automatically in the service provider
     */
    'register' => true,
];
