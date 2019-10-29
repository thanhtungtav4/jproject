<header>
    <div class="container">
        <div id="logo">
            <h1> <a href="#"><img src="{{asset($dataShareConfig['logo'][getValueByLang('')])}}" alt="Ryoki"></a></h1>
        </div>
        <!-- nav -->
        <nav class="d-lg-flex">
            <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
            <input type="checkbox" id="drop" />
                <ul class="menu mt-2 ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('frontend::index.corporateprofile')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('frontend.company_'.Config::get('app.locale'))}}"> @lang('frontend::index.history')</a>
                            {{--//Corporate Profile & History--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Greeting">@lang('frontend::index.greeting')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Offices">@lang('frontend::index.offices')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Environmental Policy">@lang('frontend::index.policy')</a>
                        </div>
                    </li>
                    <li class=""><a href="{{route('frontend.business_'.Config::get('app.locale'))}}">@lang('frontend::index.business_outline')</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Solution" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('frontend::index.solution')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Air Conditioning / Water Supply / Drainage Systems">@lang('frontend::index.air_conditioning')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Energy Saving">@lang('frontend::index.energy_saving')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Energy Saving Air Conditioning System RiCS">@lang('frontend::index.system_riCS')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Plant Factory">@lang('frontend::index.factory')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Renewable Energy">@lang('frontend::index.renewable_energy')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Energy Service Company (ESCO) Business">@lang('frontend::index.service_company')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Facility/Equipment Renewal">@lang('frontend::index.equipment_renewal')</a>
                        </div>
                    </li>
                    <li class=""><a href="Works">@lang('frontend::index.works')</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="Maintenance" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @lang('frontend::index.maintenance')
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="Contract Details">@lang('frontend::index.contract_details')</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="Contract Process Flow">@lang('frontend::index.contract_process_flow')</a>
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