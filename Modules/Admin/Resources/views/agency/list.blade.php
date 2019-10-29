<div class="kt-section__content">
    <table class="table table-striped table-store">
        <thead>
        <tr>
            <th>@lang('admin::agency.index.TABLE_NAME_VI')</th>
            <th>@lang('admin::agency.index.TABLE_NAME_EN')</th>
            <th>@lang('admin::agency.index.TABLE_IMAGE')</th>
            <th>@lang('admin::agency.index.TABLE_STATUS')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list))
            @foreach($list as $item)
                <tr>
                    <td>
                        <a href="{{route('admin.agency.edit', $item['id'])}}">
                            {{$item['name_vi']}}
                        </a>
                    </td>
                    <td>
                        {{$item['name_en']}}
                    </td>
                    <td>
                        <img width="100" height="100" src="{{asset($item['image_logo'])}}"
                             onerror="this.onerror=null;this.src='{{asset('static/backend/images/default-placeholder.png')}}';">
                    </td>
                    <td>
                        <span class="kt-switch kt-switch--success">
                            <label>
                                <input type="checkbox" onchange="index.change_status('{{$item['id']}}',this)"
                                       name="is_active"{{$item['is_active'] == 1 ? 'checked':''}}>
                                <span></span>
                            </label>
                        </span>
                    </td>
                    <td>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    <a href="javascript:void(0)" class="dropdown-item" onclick="index.remove({{$item['id']}})">
                                        <i class="la la-trash"></i>
                                        <span class="kt-nav__link-text kt-margin-l-5">@lang('admin::agency.index.REMOVE')</span>
                                    </a>
{{--                                                                        @include('helpers.button', ['button' => [--}}
{{--                                                                                   'route' => 'admin.country.destroy',--}}
{{--                                                                                    'html' => '<a href="javascript:void(0)" onclick="remove.click('.$item['country_id'].')" class="dropdown-item">'--}}
{{--                                                                                    .'<i class="la la-trash"></i>'--}}
{{--                                                                                    .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.TABLE_REMOVE').'</span>'.--}}
{{--                                                                               '</a>'--}}
{{--                                                                           ]])--}}
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
{{ $list->appends($filter)->links('helpers.paging') }}