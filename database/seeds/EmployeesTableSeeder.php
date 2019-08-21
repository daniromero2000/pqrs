<?php

use App\Model\Employees\Employee;
use App\Model\Permissions\Permission;
use App\Model\Roles\Repositories\RoleRepository;
use App\Model\Roles\Role;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {

        /*Permisos Empleados*/
        $deleteEmployeePerm = factory(Permission::class)->create([
            'name' => 'delete-employee',
            'display_name' => 'Borrar Empleado'
        ]);

        $viewEmployeePerm = factory(Permission::class)->create([
            'name' => 'view-employee',
            'display_name' => 'Ver Empleado'
        ]);

        $updateEmployeePerm = factory(Permission::class)->create([
            'name' => 'update-employee',
            'display_name' => 'Actualizar Empleado'
        ]);

        $createEmployeePerm = factory(Permission::class)->create([
            'name' => 'create-employee',
            'display_name' => 'Crear Empleado'
        ]);


        /*Permisos roles*/
        $viewRolsPerm = factory(Permission::class)->create([
            'name' => 'view-role',
            'display_name' => 'Ver Rol'
        ]);

        /*Permisos Permisos*/
        $viewPermissionPerm = factory(Permission::class)->create([
            'name' => 'view-permission',
            'display_name' => 'Ver Permiso'
        ]);


        /*Permisos ciudades*/
        $viewCityPerm = factory(Permission::class)->create([
            'name' => 'view-city',
            'display_name' => 'Ver Ciudad'
        ]);


        /*Permisos sucursales*/
        $viewSubsidiaryPerm = factory(Permission::class)->create([
            'name' => 'view-subsidiary',
            'display_name' => 'Ver Sucursal'
        ]);


        /*Creacion Usuario Super Admin Desarrollo*/
        $employee = factory(Employee::class)->create([
            'employeeEmail' => 'desarrolladorcoandes@standard.com.co'
        ]);

        $super = factory(Role::class)->create([
            'name' => 'superadmin',
            'display_name' => 'Desarrollo'
        ]);

        $roleSuperRepo = new RoleRepository($super);
        /*Permisos Empleados*/
        $roleSuperRepo->attachToPermission($deleteEmployeePerm);
        $roleSuperRepo->attachToPermission($createEmployeePerm);
        $roleSuperRepo->attachToPermission($viewEmployeePerm);
        $roleSuperRepo->attachToPermission($updateEmployeePerm);
        /*Permisos Ciudad*/
        $roleSuperRepo->attachToPermission($viewCityPerm);
        /*Permisos Sucursal*/
        $roleSuperRepo->attachToPermission($viewSubsidiaryPerm);
        /*Permisos Roles*/
        $roleSuperRepo->attachToPermission($viewRolsPerm);
        /*Permisos Permisos*/
        $roleSuperRepo->attachToPermission($viewPermissionPerm);
        $employee->roles()->save($super);


        $employee = factory(Employee::class)->create([
            'employeeEmail' => 'carlo.villarreal@lagobo.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        $roleAdminRepo = new RoleRepository($admin);
        /*Permisos Empleados*/
        $roleAdminRepo->attachToPermission($deleteEmployeePerm);
        $roleAdminRepo->attachToPermission($createEmployeePerm);
        $roleAdminRepo->attachToPermission($viewEmployeePerm);
        $roleAdminRepo->attachToPermission($updateEmployeePerm);
        /*Permisos Ciudad*/
        $roleAdminRepo->attachToPermission($viewCityPerm);
        /*Permisos Sucursal*/
        $roleAdminRepo->attachToPermission($viewSubsidiaryPerm);
        $employee->roles()->save($admin);

        $employee = factory(Employee::class)->create([
            'employeeEmail' => 'employee@company.com'
        ]);

        $operativo = factory(Role::class)->create([
            'name' => 'operativo',
            'display_name' => 'Operativo'
        ]);

        $roleOperativoRepo = new RoleRepository($operativo);
        /*Permisos Sucursal*/
        $roleOperativoRepo->attachToPermission($viewSubsidiaryPerm);
        $employee->roles()->save($operativo);
    }
}
