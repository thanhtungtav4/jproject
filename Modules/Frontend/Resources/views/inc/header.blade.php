<header>
    <div class="container">
        <div id="logo">
            <h1> <a href="{{route('frontend.home_'.Config::get('app.locale'))}}"><img src="{{asset($dataShareConfig['logo'][getValueByLang('')])}}" alt="Ryoki"></a></h1>
        </div>
        <!-- nav -->
        <nav class="d-lg-flex">
            <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
            <input type="checkbox" id="drop" />
                <ul class="menu mt-2 ml-auto">
                    <li class="nav-item dropdown">
{{--                        <a class="href-a nav-link dropdown-toggle" href="{{route('frontend.company_'.Config::get('app.locale'))}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        <a class="href-a" href="{{route('frontend.company_'.Config::get('app.locale'))}}">
                            @lang('frontend::index.corporateprofile')
                        </a>
                        <button class="nav-link dropdown-toggle btn-dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('frontend.company_'.Config::get('app.locale'))}}#about"> @lang('frontend::index.history')</a>
                            {{--//Corporate Profile & History--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.company_'.Config::get('app.locale'))}}#greeting">@lang('frontend::index.greeting')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item tab-link" href="{{route('frontend.company_'.Config::get('app.locale'))}}#offices">@lang('frontend::index.offices')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.company_'.Config::get('app.locale'))}}#policy">@lang('frontend::index.policy')</a>
                        </div>
                    </li>
                    <li class=""><a href="{{route('frontend.business_'.Config::get('app.locale'))}}">@lang('frontend::index.business_outline')</a></li>
                    <li class="nav-item dropdown">
                        <a class="href-a nav-link dropdown-toggle" href="{{route('frontend.solution-cat_'.Config::get('app.locale'))}}">
                            @lang('frontend::index.solution')
                        </a>
                        <button class="nav-link dropdown-toggle btn-dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_43">@lang('frontend::index.air_conditioning')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_44">@lang('frontend::index.energy_saving')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_45">@lang('frontend::index.system_riCS')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_51">@lang('frontend::index.factory')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_53">@lang('frontend::index.renewable_energy')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_52">@lang('frontend::index.service_company')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.solution_'.Config::get('app.locale'))}}#tab_53">@lang('frontend::index.equipment_renewal')</a>
                        </div>
                    </li>
                    <li class=""><a href="{{route('frontend.works_'.Config::get('app.locale'))}}">@lang('frontend::index.works')</a></li>
                    <li class="nav-item dropdown">
                        <a class="href-a nav-link dropdown-toggle" href="{{route('frontend.maintenance_'.Config::get('app.locale'))}}">
                            @lang('frontend::index.maintenance')
                        </a>
                        <button class="nav-link dropdown-toggle btn-dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('frontend.maintenance_'.Config::get('app.locale'))}}#contractdetails">@lang('frontend::index.contract_details')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('frontend.maintenance_'.Config::get('app.locale'))}}#contractprocessflow">@lang('frontend::index.contract_process_flow')</a>
                        </div>
                    </li>
                    <li class=""><a href="{{route('frontend.about.contact_'.Config::get('app.locale'))}}">@lang('frontend::index.inquiries')</a></li>
                </ul>

        </nav>
        <div class="clear"></div>
        <!-- //nav -->
    </div>
</header>
</div>
<!-- //header -->
