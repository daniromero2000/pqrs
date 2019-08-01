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
        $createProductPerm = factory(Permission::class)->create([
            'name' => 'create-product',
            'display_name' => 'Crear Producto'
        ]);

        $viewProductPerm = factory(Permission::class)->create([
            'name' => 'view-product',
            'display_name' => 'Ver Producto'
        ]);

        $updateProductPerm = factory(Permission::class)->create([
            'name' => 'update-product',
            'display_name' => 'Actualizar Producto'
        ]);

        $deleteProductPerm = factory(Permission::class)->create([
            'name' => 'delete-product',
            'display_name' => 'Borrar Producto'
        ]);

        $viewProductStatusPerm = factory(Permission::class)->create([
            'name' => 'view-productStatus',
            'display_name' => 'Ver Estados Productos'
        ]);

        $createProductStatusPerm = factory(Permission::class)->create([
            'name' => 'create-productStatus',
            'display_name' => 'Crear Estado Productos'
        ]);


        /*Permisos Categorias*/
        $createCategoryPerm = factory(Permission::class)->create([
            'name' => 'create-category',
            'display_name' => 'Crear Categoría'
        ]);

        $viewCategoryPerm = factory(Permission::class)->create([
            'name' => 'view-category',
            'display_name' => 'Ver Categoría'
        ]);

        $updateCategoryPerm = factory(Permission::class)->create([
            'name' => 'update-category',
            'display_name' => 'Actualizar Categoría'
        ]);

        $deleteCategoryPerm = factory(Permission::class)->create([
            'name' => 'delete-category',
            'display_name' => 'Borrar Categoría'
        ]);


        /*Permisos Compras*/
        $updateOrderPerm = factory(Permission::class)->create([
            'name' => 'update-order',
            'display_name' => 'Actualizar Compra'
        ]);

        $viewOrderStatusPerm = factory(Permission::class)->create([
            'name' => 'view-orderStatus',
            'display_name' => 'Ver Estados Compras'
        ]);

        $createOrderStatusPerm = factory(Permission::class)->create([
            'name' => 'create-orderStatus',
            'display_name' => 'Crear Estado Compras'
        ]);


        /*Permisos Artículos*/
        $createItemPerm = factory(Permission::class)->create([
            'name' => 'create-item',
            'display_name' => 'Crear Artículo'
        ]);

        $viewItemPerm = factory(Permission::class)->create([
            'name' => 'view-item',
            'display_name' => 'Ver Artículo'
        ]);

        $updateItemPerm = factory(Permission::class)->create([
            'name' => 'update-item',
            'display_name' => 'Actualizar Artículo'
        ]);

        $deleteItemPerm = factory(Permission::class)->create([
            'name' => 'delete-item',
            'display_name' => 'Borrar Artículo'
        ]);

        $viewItemStatusPerm = factory(Permission::class)->create([
            'name' => 'view-itemStatus',
            'display_name' => 'Ver Estados Artículos'
        ]);

        $createItemStatusPerm = factory(Permission::class)->create([
            'name' => 'create-itemStatus',
            'display_name' => 'Crear Estado Artículo'
        ]);


        /*Permisos Clientes*/
        $deleteCustomerPerm = factory(Permission::class)->create([
            'name' => 'delete-customer',
            'display_name' => 'Borrar Cliente'
        ]);

        $viewCustomerPerm = factory(Permission::class)->create([
            'name' => 'view-customer',
            'display_name' => 'Ver Cliente'
        ]);

        $updateCustomerPerm = factory(Permission::class)->create([
            'name' => 'update-customer',
            'display_name' => 'Actualizar Cliente'
        ]);

        $createCustomerPerm = factory(Permission::class)->create([
            'name' => 'create-customer',
            'display_name' => 'Crear Cliente'
        ]);

        $viewCustomerStatusPerm = factory(Permission::class)->create([
            'name' => 'view-customerStatus',
            'display_name' => 'Ver Estados Clientes'
        ]);

        $createCustomerStatusPerm = factory(Permission::class)->create([
            'name' => 'create-customerStatus',
            'display_name' => 'Crear Estado Clientes'
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
        /*Permisos productos*/
        $roleSuperRepo->attachToPermission($createProductPerm);
        $roleSuperRepo->attachToPermission($viewProductPerm);
        $roleSuperRepo->attachToPermission($updateProductPerm);
        $roleSuperRepo->attachToPermission($deleteProductPerm);
        $roleSuperRepo->attachToPermission($viewProductStatusPerm);
        $roleSuperRepo->attachToPermission($createProductStatusPerm);
        /*Permisos Categoruias*/
        $roleSuperRepo->attachToPermission($createCategoryPerm);
        $roleSuperRepo->attachToPermission($viewCategoryPerm);
        $roleSuperRepo->attachToPermission($updateCategoryPerm);
        $roleSuperRepo->attachToPermission($deleteCategoryPerm);
        /*Permisos Artículos*/
        $roleSuperRepo->attachToPermission($createItemPerm);
        $roleSuperRepo->attachToPermission($viewItemPerm);
        $roleSuperRepo->attachToPermission($updateItemPerm);
        $roleSuperRepo->attachToPermission($deleteItemPerm);
        $roleSuperRepo->attachToPermission($viewItemStatusPerm);
        $roleSuperRepo->attachToPermission($createItemStatusPerm);
        /*Permisos Compras*/
        $roleSuperRepo->attachToPermission($updateOrderPerm);
        $roleSuperRepo->attachToPermission($viewOrderStatusPerm);
        $roleSuperRepo->attachToPermission($createOrderStatusPerm);
        /*Permisos Clientes*/
        $roleSuperRepo->attachToPermission($deleteCustomerPerm);
        $roleSuperRepo->attachToPermission($createCustomerPerm);
        $roleSuperRepo->attachToPermission($viewCustomerPerm);
        $roleSuperRepo->attachToPermission($updateCustomerPerm);
        $roleSuperRepo->attachToPermission($viewCustomerStatusPerm);
        $roleSuperRepo->attachToPermission($createCustomerStatusPerm);
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
            'email' => 'directormarketing@standard.com.co'
        ]);

        $marketing = factory(Role::class)->create([
            'name' => 'marketing',
            'display_name' => 'Marketing'
        ]);

        $roleMarketingRepo = new RoleRepository($marketing);
        $roleMarketingRepo->attachToPermission($createProductPerm);
        $roleMarketingRepo->attachToPermission($viewProductPerm);
        $roleMarketingRepo->attachToPermission($updateProductPerm);
        $roleMarketingRepo->attachToPermission($deleteProductPerm);
        $roleMarketingRepo->attachToPermission($viewProductStatusPerm);
        $roleMarketingRepo->attachToPermission($createProductStatusPerm);
        /*Permisos Categoruias*/
        $roleMarketingRepo->attachToPermission($createCategoryPerm);
        $roleMarketingRepo->attachToPermission($viewCategoryPerm);
        $roleMarketingRepo->attachToPermission($updateCategoryPerm);
        $roleMarketingRepo->attachToPermission($deleteCategoryPerm);
        /*Permisos Artículos*/
        $roleMarketingRepo->attachToPermission($createItemPerm);
        $roleMarketingRepo->attachToPermission($viewItemPerm);
        $roleMarketingRepo->attachToPermission($updateItemPerm);
        $roleMarketingRepo->attachToPermission($deleteItemPerm);
        $roleMarketingRepo->attachToPermission($viewItemStatusPerm);
        $roleMarketingRepo->attachToPermission($createItemStatusPerm);
        /*Permisos Compras*/
        $roleMarketingRepo->attachToPermission($updateOrderPerm);
        $roleMarketingRepo->attachToPermission($viewOrderStatusPerm);
        $roleMarketingRepo->attachToPermission($createOrderStatusPerm);
        /*Permisos Clientes*/
        $roleMarketingRepo->attachToPermission($deleteCustomerPerm);
        $roleMarketingRepo->attachToPermission($createCustomerPerm);
        $roleMarketingRepo->attachToPermission($viewCustomerPerm);
        $roleMarketingRepo->attachToPermission($updateCustomerPerm);
        $roleMarketingRepo->attachToPermission($viewCustomerStatusPerm);
        $roleMarketingRepo->attachToPermission($createCustomerStatusPerm);
        /*Permisos Ciudad*/
        $roleMarketingRepo->attachToPermission($viewCityPerm);
        /*Permisos Sucursal*/
        $roleMarketingRepo->attachToPermission($viewSubsidiaryPerm);
        $employee->roles()->save($marketing);


        $employee = factory(Employee::class)->create([
            'email' => 'gerenciacoandes@hotmail.com'
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
        /*Permisos productos*/
        $roleOperativoRepo->attachToPermission($viewProductPerm);
        $roleOperativoRepo->attachToPermission($viewProductStatusPerm);
        /*Permisos Artículos*/
        $roleOperativoRepo->attachToPermission($createItemPerm);
        $roleOperativoRepo->attachToPermission($viewItemPerm);
        $roleOperativoRepo->attachToPermission($updateItemPerm);
        $roleOperativoRepo->attachToPermission($viewItemStatusPerm);
        /*Permisos Compras*/
        $roleOperativoRepo->attachToPermission($updateOrderPerm);
        $roleOperativoRepo->attachToPermission($viewOrderStatusPerm);
        /*Permisos Clientes*/
        $roleOperativoRepo->attachToPermission($createCustomerPerm);
        $roleOperativoRepo->attachToPermission($viewCustomerPerm);
        $roleOperativoRepo->attachToPermission($updateCustomerPerm);
        $roleOperativoRepo->attachToPermission($viewCustomerStatusPerm);
        /*Permisos Sucursal*/
        $roleOperativoRepo->attachToPermission($viewSubsidiaryPerm);
        $employee->roles()->save($operativo);
    }
}
