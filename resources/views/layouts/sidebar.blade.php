<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="/">
            <span class="text">SmsBulks</span>
        </a>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-lavel">Навигация</div>
                <div class="nav-item active">
                    <a href="/home"><i class="ik ik-bar-chart-2"></i><span>Главная</span></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('send.single')}}"><i class="ik ik-menu"></i><span>Одиночная смс</span> <!--<span class="badge badge-success">New</span> --></a>
                </div>
                <div class="nav-item">
                    <a href="{{route('send.bulk')}}"><i class="ik ik-menu"></i><span>Массовая отправка смс</span> <!--<span class="badge badge-success">New</span> --></a>
                </div>

                <div class="nav-item has-sub">
                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Базы номеров</span> <!-- <span class="badge badge-danger">2+</span> --></a>
                    <div class="submenu-content">
                        <a href="{{route('groups.index')}}" class="menu-item">База номеров</a>
                        <a href="{{route('groups.create')}}" class="menu-item">Создать базу</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="{{route('reports.index')}}"><i class="ik ik-menu"></i><span>Отчет смс</span> <!--<span class="badge badge-success">New</span> --></a>
                </div>

{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Пакеты</span> <span class="badge badge-danger">2+</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="{{route('balance.create')}}" class="menu-item">Создать пакет <span class="badge badge-success">New</span></a>--}}
{{--                        <a href="{{route('balance.index')}}" class="menu-item">Список пакетов <span class="badge badge-success">New</span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="nav-item">
                    <a href="{{route('payments.list')}}"><i class="ik ik-credit-card"></i><span>Оплата</span> <span class="badge badge-success">New</span></a>
                </div>

                <div class="nav-item has-sub">
                    <a href="#"><i class="ik ik-box"></i><span>Альфа имена</span></a>
                    <div class="submenu-content">
                        <a href="{{route('originator.create')}}" class="menu-item">Создать</a>
                    </div>
                </div>
                {{--                <div class="nav-item has-sub">--}}
                {{--                    <a href="#"><i class="ik ik-package"></i><span>Extra</span></a>--}}
                {{--                    <div class="submenu-content">--}}
                {{--                        <a href="pages/ui/session-timeout.html" class="menu-item">Session Timeout</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Widgets</span> <span class="badge badge-danger">150+</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/widgets.html" class="menu-item">Basic</a>--}}
{{--                        <a href="pages/widget-statistic.html" class="menu-item">Statistic</a>--}}
{{--                        <a href="pages/widget-data.html" class="menu-item">Data</a>--}}
{{--                        <a href="pages/widget-chart.html" class="menu-item">Chart Widget</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="nav-lavel">UI Element</div>--}}

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
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-package"></i><span>Extra</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/ui/session-timeout.html" class="menu-item">Session Timeout</a>--}}
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

{{--                <div class="nav-lavel">Charts</div>--}}
{{--                <div class="nav-item has-sub">--}}
{{--                    <a href="#"><i class="ik ik-pie-chart"></i><span>Charts</span> <span class="badge badge-success">New</span></a>--}}
{{--                    <div class="submenu-content">--}}
{{--                        <a href="pages/charts-chartist.html" class="menu-item active">Chartist</a>--}}
{{--                        <a href="pages/charts-flot.html" class="menu-item">Flot</a>--}}
{{--                        <a href="pages/charts-knob.html" class="menu-item">Knob</a>--}}
{{--                        <a href="pages/charts-amcharts.html" class="menu-item">Amcharts</a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="nav-lavel">Дополнительно</div>
{{--                <div class="nav-item">--}}
{{--                    <a href="pages/calendar.html"><i class="ik ik-calendar"></i><span>Calendar</span></a>--}}
{{--                </div>--}}
                <div class="nav-item">
                    <a href="{{route('documentation')}}"><i class="ik ik-server"></i><span>API документация</span></a>
                </div>

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
{{--                <div class="nav-item">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-monitor"></i><span>Documentation</span></a>--}}
{{--                </div>--}}
{{--                <div class="nav-item">--}}
{{--                    <a href="javascript:void(0)"><i class="ik ik-help-circle"></i><span>Submit Issue</span></a>--}}
{{--                </div>--}}
            </nav>
        </div>
    </div>
</div>
