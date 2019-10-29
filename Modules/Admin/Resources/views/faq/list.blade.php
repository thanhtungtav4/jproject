<div class="kt-section__content">
    <table class="table table-striped table-store">
        <thead>
        <tr>
            <th>@lang('admin::faq.index.TABLE_QUESTION_VI')</th>
            <th>@lang('admin::faq.index.TABLE_QUESTION_EN')</th>
            <th>@lang('admin::faq.index.TABLE_POSITION')</th>
            <th>@lang('admin::faq.index.TABLE_STATUS')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list))
            @foreach($list as $item)
                <tr>
                    <td>
                        {!! $item['question_vi'] !!}
                    </td>
                    <td>
                        {!! $item['question_en'] !!}
                    </td>
                    <td>{{$item['faq_order']}}</td>
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
                                <button id="btnGroupVerticalDrop1" type="button"
                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    @include('helpers.button', ['button' => [
                                                                                   'route' => 'admin.faq.edit',
                                                                                    'html' => '<a href="'.route('admin.faq.edit', $item['id']).'" class="dropdown-item">'
                                                                                    .'<i class="la la-edit"></i>'
                                                                                    .'<span class="kt-nav__link-text kt-margin-l-5">'
                                                                                        .'Chỉnh sửa'.
                                                                                    '</span>'.
                                                                               '</a>'
                                                                           ]])
                                    @include('helpers.button', ['button' => [
                                                 'route' => 'admin.faq.destroy',
                                                  'html' => '<a href="javascript:void(0)" onclick="index.remove('.$item['id'].')" class="dropdown-item">'
                                                  .'<i class="la la-trash"></i>'
                                                  .'<span class="kt-nav__link-text kt-margin-l-5">'
                                                      .__('admin::faq.index.REMOVE').
                                                  '</span>'.
                                             '</a>'
                                         ]])
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