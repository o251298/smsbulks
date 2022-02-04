<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('admin')}}">
            <span class="text">ThemeKit</span>
        </a>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">ADMIN</div>
                <div class="nav-item active">
                </div>
                <div class="nav-item">
                    <a href="{{route('admin')}}"><i class="ik ik-monitor"></i><span>Статистика</span></a>
                </div>
                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Пользователи</span></a>
                    <div class="submenu-content">
                        <a href="{{route('admin.users')}}" class="menu-item">Список пользователей</a>
                    </div>
                </div>

                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-package"></i><span>Рассылки смс</span> <span class="badge badge-success">DEV</span></a>
                    <div class="submenu-content">
                        <a href="{{route('admin.messages')}}" class="menu-item">Все смс</a>
                    </div>
                    <div class="submenu-content">
                        <a href="{{route('admin.moderation')}}" class="menu-item">Модерация смс</a>
                    </div>
                </div>
                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-package"></i><span>Альфа имена</span> <span class="badge badge-success">DEV</span></a>
                    <div class="submenu-content">
                        <a href="{{route('admin.originators')}}" class="menu-item">Альфа имена заявки</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="{{route('admin.payments')}}"><i class="ik ik-credit-card"></i><span>Оплаты</span></a>
                </div>
{{--                <div class="nav-item">--}}
{{--                    <a href="{{route('reports.index')}}"><i class="ik ik-menu"></i><span>Отчет смс</span> <!--<span class="badge badge-success">New</span> --></a>--}}
{{--                </div>--}}

{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Пакеты</span> <span class="badge badge-danger">2+</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="{{route('balance.create')}}" class="menu-item">Создать пакет <span class="badge badge-success">New</span></a>--}}
{{--                        <a href="{{route('balance.index')}}" class="menu-item">Список пакетов <span class="badge badge-success">New</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Стоп фразы</span></a>
                    <div class="submenu-content">
                        <a href="{{route('admin.badword.create')}}" class="menu-item">Создать плохое слово</a>
                        <a href="{{route('admin.badword')}}" class="menu-item">Список</a>
                    </div>
                </div>
{{--                <div class="nav-lavel">UI Element</div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-box"></i><span>Basic</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/ui/alerts.html" class="menu-item">Alerts</a>--}}
{{--                        <a href="pages/ui/badges.html" class="menu-item">Badges</a>--}}
{{--                        <a href="pages/ui/buttons.html" class="menu-item">Buttons</a>--}}
{{--                        <a href="pages/ui/navigation.html" class="menu-item">Navigation</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-gitlab"></i><span>Advance</span> <span class="badge badge-success">New</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/ui/modals.html" class="menu-item">Modals</a>--}}
{{--                        <a href="pages/ui/notifications.html" class="menu-item">Notifications</a>--}}
{{--                        <a href="pages/ui/carousel.html" class="menu-item">Slider</a>--}}
{{--                        <a href="pages/ui/range-slider.html" class="menu-item">Range Slider</a>--}}
{{--                        <a href="pages/ui/rating.html" class="menu-item">Rating</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="nav-item">--}}
{{--                    <a href="pages/ui/icons.html"><i class="ik ik-command"></i><span>Icons</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-lavel">Forms</div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-edit"></i><span>Forms</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/form-components.html" class="menu-item">Components</a>--}}
{{--                        <a href="pages/form-addon.html" class="menu-item">Add-On</a>--}}
{{--                        <a href="pages/form-advance.html" class="menu-item">Advance</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/form-picker.html"><i class="ik ik-terminal"></i><span>Form Picker</span> <span class="badge badge-success">New</span></a>--}}
{{--                </div>--}}

{{--                <div class="nav-lavel">Tables</div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/table-bootstrap.html"><i class="ik ik-credit-card"></i><span>Bootstrap Table</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/table-datatable.html"><i class="ik ik-inbox"></i><span>Data Table</span></a>--}}
{{--                </div>--}}



{{--                <div class="nav-lavel">Apps</div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/calendar.html"><i class="ik ik-calendar"></i><span>Calendar</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/taskboard.html"><i class="ik ik-server"></i><span>Taskboard</span></a>--}}
{{--                </div>--}}

{{--                <div class="nav-lavel">Pages</div>--}}

{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-lock"></i><span>Authentication</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/login.html" class="menu-item">Login</a>--}}
{{--                        <a href="pages/register.html" class="menu-item">Register</a>--}}
{{--                        <a href="pages/forgot-password.html" class="menu-item">Forgot Password</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-file-text"></i><span>Other</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/profile.html" class="menu-item">Profile</a>--}}
{{--                        <a href="pages/invoice.html" class="menu-item">Invoice</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/layouts.html"><i class="ik ik-layout"></i><span>Layouts</span><span class="badge badge-success">New</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-lavel">Other</div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-list"></i><span>Menu Levels</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.1</a>--}}
{{--                        <div class="nav-item has-sub">--}}
{{--                            <a href="javascript:void(0)" class="menu-item">Menu Level 2.2</a>--}}
{{--                            <div class="submenu-content">--}}
{{--                                <a href="javascript:void(0)" class="menu-item">Menu Level 3.1</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <a href="javascript:void(0)" class="menu-item">Menu Level 2.3</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="javascript:void(0)" class="disabled"><i class="ik ik-slash"></i><span>Disabled Menu</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-award"></i><span>Sample Page</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-lavel">Support</div>--}}

                <div class="nav-item">
                    <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit Issue</span></a>
                </div>
            </nav>
        </div>
    </div>
</div>
