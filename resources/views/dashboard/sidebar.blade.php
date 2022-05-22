<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item"><a href=""><i class="la la-home"></i>
                <span class="menu-title" data-i18n="nav.dash.main">المشاريع </span>
                <span
                    class="badge badge badge-info badge-pill float-right mr-2">{{$count_of_project}}</span>
                    </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('project-manage.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route("showRequests")}}" data-i18n="nav.dash.crypto">طلبات الاسعار</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">المستخدمين </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('user-manage.index')}}"
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="{{route("user-manage.create")}}" data-i18n="nav.dash.crypto">انشاء مستخدم جديد </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item active"><a href="{{route("components")}}"><i class="la la-mouse-pointer"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">المحتوى  </span></a>
            </li>
            <li class="nav-item active"><a href="{{route("ourwork.index")}}"><i class="la la-mouse-pointer"></i><span
                class="menu-title" data-i18n="nav.add_on_drag_drop.main">أعمالنا  </span></a>
            </li>
        </ul>
    </div>
</div>
