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
            <li class="header">GESTION PQRS SOCOMIR</li>
            @if($user->hasRole('superadmin|marketing|operativo'))
            <li class="treeview @if(request()->segment(2) == 'pqrs') active @endif">
                <a href="#"> <i class="fa fa-users"> </i> <span>PQRS</span> <span class="pull-right-container">
                        @if($pqrSCCount > 0)
                        <span class="label label-danger pull-right">{{ $pqrSCCount }}</span>
                        @endif
                        <i class="fa fa-angle-left pull-right"> </i> </span> </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.pqrs.index') }}"><i class="fa fa-circle-o"> </i> Ver PQRS</a>
                    </li>
                    <li><a href="{{ route('admin.pqrs.create') }}"><i class="fa fa-plus"> </i> Crear PQR</a>
                    </li>
                    <li class="treeview @if(request()->segment(2) == 'pqr-statuses') active @endif"> <a href="#">
                            <i class="fa fa-anchor">
                            </i> <span>Estados de PQRS</span>
                            <span class="pull-right-container"> <i class="fa fa-angle-left pull-right">
                                </i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="{{ route('admin.pqr-statuses.index') }}"><i class="fa fa-circle-o"> </i>
                                    Ver estados PQRS</a></li> @if($user->hasRole('superadmin|marketing'))<li><a
                                    href="{{ route('admin.pqr-statuses.create') }}"><i class="fa fa-plus"> </i>
                                    Crear estado PQR
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
                @endif
                @if($user->hasRole('operativo|superadmin|marketing'))
            <li class="header">GESTION INFO FINANCIERA
            </li>
            <li
                class="treeview @if(request()->segment(2) == 'finances' || request()->segment(2) == 'attributes') active @endif">
                <ul class="treeview-menu"> @if($user->hasPermission('view-finance'))@endif
            </li> @endif
        </ul>
        </li> @if($user->hasRole('superadmin|marketing'))<li
            class="treeview @if(request()->segment(2) == 'years') active @endif"> <a href="#"> <i class="fa fa-sitemap">
                </i> <span>Info Financiera</span> <span class="pull-right-container"> <i
                        class="fa fa-angle-left pull-right"> </i> </span> </a>
            <ul class="treeview-menu"> @if($user->hasPermission('view-year'))<li><a
                        href="{{ route('admin.years.show', 1) }}"><i class="fa fa-circle-o"> </i> Ver Años Info
                        Financiera</a>
                </li>@endif @if($user->hasPermission('create-year'))<li><a href="{{ route('admin.years.create') }}"><i
                            class="fa fa-plus"> </i> Crear Año Financiero</a>
                </li>@endif
                @if($user->hasPermission('create-finance'))<li><a href="{{ route('admin.finances.create') }}"><i
                            class="fa fa-plus"> </i> Crear Info
                        Financiera</a>
                </li>@endif

            </ul>
        </li> @endif
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