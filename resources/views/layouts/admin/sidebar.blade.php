<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"> <img src="{{ asset('img/avatarsocomir.png') }}" class="img-circle"
                    alt="User Image"></div>
            <div class="pull-left info">
                <p>{{ $user->name }}</p> <a href="#"><i class="fa fa-circle text-success"> </i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            @if($user->hasRole('admin|superadmin|marketing|operativo'))
            <li class="header">ADMINISTRACIÓN</li>
            @if($user->hasRole('admin|superadmin'))<li
                class="treeview @if(request()->segment(2) == 'employees' || request()->segment(2) == 'roles' || request()->segment(2) == 'permissions') active @endif">
                <a href="#"> <i class="fa fa-user"> </i> <span>Empleados</span> <span class="pull-right-container"> <i
                            class="fa fa-angle-left pull-right"> </i> </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.employees.index') }}"><i class="fa fa-circle-o"> </i> Ver Empleados</a>
                    </li>
                    <li><a href="{{ route('admin.employees.create') }}"><i class="fa fa-plus"> </i> Crear Empleado</a>
                    </li>
                    @if($user->hasRole('superadmin'))<li
                        class="treeview @if(request()->segment(2) == 'roles') active @endif"> <a href="#"> <i
                                class="fa fa-star-o"> </i> <span>Roles</span> <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"> </i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-circle-o"> </i> Ver Roles</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview @if(request()->segment(2) == 'permissions') active @endif"> <a href="#"> <i
                                class="fa fa-star-o"> </i> <span>Permisos</span> <span class="pull-right-container"> <i
                                    class="fa fa-angle-left pull-right"> </i> </span> </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.permissions.index') }}"><i class="fa fa-circle-o"> </i> Ver
                                    Permisos</a></li>
                        </ul>
                    </li> @endif
                </ul>
            </li>

            @endif @if($user->hasRole('admin|superadmin|marketing|'))<li
                class="treeview @if(request()->segment(2) == 'countries' || request()->segment(2) == 'provinces') active @endif">
                <a href="#"> <i class="fa fa-flag"> </i> <span>Ciudades</span> <span class="pull-right-container"> <i
                            class="fa fa-angle-left pull-right"> </i> </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.countries.index') }}"><i class="fa fa-circle-o"> </i> Ver Ciudades</a>
                    </li>
                </ul>
            </li> @endif @if($user->hasRole('admin|superadmin|marketing|operativo'))<li
                class="treeview @if(request()->segment(2) == 'subsidiaries') active @endif"> <a href="#"> <i
                        class="fa fa-map-marker"> </i> <span>Sucursales</span> <span class="pull-right-container"> <i
                            class="fa fa-angle-left pull-right"> </i> </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.subsidiaries.index') }}"><i class="fa fa-circle-o"> </i> Ver
                            Sucursales</a>
                    </li> @if($user->hasRole('admin|superadmin|marketing'))<li><a
                            href="{{ route('admin.subsidiaries.create') }}"><i class="fa fa-plus"> </i> Crear
                            Sucursal</a>
                    </li> @endif
                </ul>
            </li> @endif @endif
        </ul>
    </section>
</aside>