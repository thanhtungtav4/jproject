<div class="kt-section__content">
    <table class="table table-striped table-store">
        <thead>
        <tr>
            <th>@lang('admin::config.index.TABLE_NAME')</th>
            <th>@lang('admin::config.index.TABLE_VALUE_VI')</th>
            <th>@lang('admin::config.index.TABLE_VALUE_EN')</th>
            <th>@lang('admin::config.index.TABLE_DESCRIPTION')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list))
            @foreach($list as $item)
                <tr>
                    <td>{{$item['name']}}</td>
                    @if($item['type'] == 'input')
                        <td>{{$item['value_vi']}}</td>
                        <td>{{$item['value_en']}}</td>
                    @elseif($item['type'] == 'ckeditor')
                        <td>{!! $item['value_vi'] !!}</td>
                        <td>{!! $item['value_en'] !!}</td>
                    @elseif($item['type'] == 'image')
                        <td>
                            <img width="100" height="100" src="{{asset($item['value_vi'])}}"
                                 onerror="this.onerror=null;this.src='{{asset('static/backend/images/default-placeholder.png')}}';">
                        </td>
                        <td>
                            <img width="100" height="100" src="{{asset($item['value_en'])}}"
                                 onerror="this.onerror=null;this.src='{{asset('static/backend/images/default-placeholder.png')}}';">
                        </td>
                    @endif
                    <td>{{$item['description']}}</td>
                    <td>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button"
                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    <a href="{{route('admin.config.edit', $item['id'])}}" class="dropdown-item">
                                        <i class="la la-trash"></i>
                                        <span class="kt-nav__link-text kt-margin-l-5">@lang('admin::config.index.EDIT')</span>
                                    </a>
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
{{ $list->links('helpers.paging') }}