<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

    <!-- begin:: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i>
    </button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper" style="opacity: 1;">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <h3 class="kt-header__title kt-grid__item"></h3>
        </div>
    </div>

    <!-- end:: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Chào,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">{{ (Auth::user()) ? Auth::user()->full_name : '' }}</span>
                    <img class="kt-hidden" alt="Pic" src="{{asset('static/backend/images/default-placeholder.png')}}">

                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold text-capitalize">{{(Auth::user()) ? substr(str_slug(Auth::user()->full_name),0,1) : ''}}</span>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x">
                    <div class="kt-user-card__avatar">
                        <img class="kt-hidden" alt="Pic"
                             src="{{asset('static/backend/images/default-placeholder.png')}}">

                        <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                        <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-primary text-capitalize ">{{ (Auth::user()) ? substr(str_slug(Auth::user()->full_name),0,1) : '' }}</span>
                    </div>
                    <div class="kt-user-card__name kt-font-primary">
                        {{ (Auth::user()) ?Auth::user()->full_name : ''}}
                    </div>
                </div>

                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <div class="kt-notification__custom kt-space-between">
                        <a href="{{route('logout')}}" class="btn btn-label btn-label-brand btn-sm btn-bold">
                            Đăng xuất
                        </a>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>
