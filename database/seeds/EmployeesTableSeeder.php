<?php

use App\Socomir\Employees\Employee;
use App\Socomir\Permissions\Permission;
use App\Socomir\Roles\Repositories\RoleRepository;
use App\Socomir\Roles\Role;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {



        /*Permisos productos*/
        $createFinancePerm = factory(Permission::class)->create([
            'name' => 'create-finance',
            'display_name' => 'Crear Finanza'
        ]);

        $viewFinancePerm = factory(Permission::class)->create([
            'name' => 'view-finance',
            'display_name' => 'Ver Finanza'
        ]);

        $updateFinancePerm = factory(Permission::class)->create([
            'name' => 'update-finance',
            'display_name' => 'Actualizar Finanza'
        ]);

        $deleteFinancePerm = factory(Permission::class)->create([
            'name' => 'delete-finance',
            'display_name' => 'Borrar Finanza'
        ]);

        /*Permisos Categorias*/
        $createYearPerm = factory(Permission::class)->create([
            'name' => 'create-year',
            'display_name' => 'Crear Año'
        ]);

        $viewYearPerm = factory(Permission::class)->create([
            'name' => 'view-year',
            'display_name' => 'Ver Año'
        ]);

        $updateYearPerm = factory(Permission::class)->create([
            'name' => 'update-year',
            'display_name' => 'Actualizar Año'
        ]);

        $deleteYearPerm = factory(Permission::class)->create([
            'name' => 'delete-year',
            'display_name' => 'Borrar Año'
        ]);



        /*Permisos Clientes*/
        $deletePqrPerm = factory(Permission::class)->create([
            'name' => 'delete-pqr',
            'display_name' => 'Borrar PQR'
        ]);

        $viewPqrPerm = factory(Permission::class)->create([
            'name' => 'view-pqr',
            'display_name' => 'Ver Pqr'
        ]);

        $updatePqrPerm = factory(Permission::class)->create([
            'name' => 'update-pqr',
            'display_name' => 'Actualizar Pqr'
        ]);

        $createPqrPerm = factory(Permission::class)->create([
            'name' => 'create-pqrr',
            'display_name' => 'Crear Pqr'
        ]);

        $viewPqrStatusPerm = factory(Permission::class)->create([
            'name' => 'view-pqrStatus',
            'display_name' => 'Ver Estados Pqr'
        ]);

        $createPqrStatusPerm = factory(Permission::class)->create([
            'name' => 'create-pqrStatus',
            'display_name' => 'Crear Estado Pqr'
        ]);



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
            'email' => 'desarrolladorcoandes@standard.com.co'
        ]);

        $super = factory(Role::class)->create([
            'name' => 'superadmin',
            'display_name' => 'Desarrollo'
        ]);

        $roleSuperRepo = new RoleRepository($super);
        /*Permisos Finanzas*/
        $roleSuperRepo->attachToPermission($createFinancePerm);
        $roleSuperRepo->attachToPermission($viewFinancePerm);
        $roleSuperRepo->attachToPermission($updateFinancePerm);
        $roleSuperRepo->attachToPermission($deleteFinancePerm);
        /*Permisos años*/
        $roleSuperRepo->attachToPermission($createYearPerm);
        $roleSuperRepo->attachToPermission($viewYearPerm);
        $roleSuperRepo->attachToPermission($updateYearPerm);
        $roleSuperRepo->attachToPermission($deleteYearPerm);
        /*Permisos Clientes*/
        $roleSuperRepo->attachToPermission($deletePqrPerm);
        $roleSuperRepo->attachToPermission($createPqrPerm);
        $roleSuperRepo->attachToPermission($viewPqrPerm);
        $roleSuperRepo->attachToPermission($updatePqrPerm);
        $roleSuperRepo->attachToPermission($viewPqrStatusPerm);
        $roleSuperRepo->attachToPermission($createPqrStatusPerm);
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
            'email' => 'gerenciacoandes@hotmail.com'
        ]);

        $admin = factory(Role::class)->create([
            'name' => 'admin',
            'display_name' => 'Administrador'
        ]);

        $roleAdminRepo = new RoleRepository($admin);
        /*Permisos Finanzas*/
        $roleAdminRepo->attachToPermission($createFinancePerm);
        $roleAdminRepo->attachToPermission($viewFinancePerm);
        $roleAdminRepo->attachToPermission($updateFinancePerm);
        $roleAdminRepo->attachToPermission($deleteFinancePerm);
        /*Permisos años*/
        $roleAdminRepo->attachToPermission($createYearPerm);
        $roleAdminRepo->attachToPermission($viewYearPerm);
        $roleAdminRepo->attachToPermission($updateYearPerm);
        $roleAdminRepo->attachToPermission($deleteYearPerm);
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
            'email' => 'contacto@compraventastandard.com'
        ]);

        $employee = factory(Employee::class)->create([
            'email' => 'disenadorcoandes@standard.com.co'
        ]);

        $operativo = factory(Role::class)->create([
            'name' => 'operativo',
            'display_name' => 'Asesor Comercial'
        ]);

        $roleOperativoRepo = new RoleRepository($operativo);
        /*Permisos Clientes*/
        $roleOperativoRepo->attachToPermission($createPqrPerm);
        $roleOperativoRepo->attachToPermission($viewPqrPerm);
        $roleOperativoRepo->attachToPermission($updatePqrPerm);
        $roleOperativoRepo->attachToPermission($viewPqrStatusPerm);
        /*Permisos Sucursal*/
        $roleOperativoRepo->attachToPermission($viewSubsidiaryPerm);
        $employee->roles()->save($operativo);
    }
}
