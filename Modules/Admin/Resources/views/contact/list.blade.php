<div class="kt-section__content">
    <table class="table table-striped table-store">
        <thead>
        <tr>
            <th>@lang('admin::contact.index.TABLE_NAME')</th>
            <th>@lang('admin::contact.index.TABLE_COMPANY')</th>
            <th>@lang('admin::contact.index.TABLE_EMAIL')</th>
            <th>@lang('admin::contact.index.TABLE_PHONE')</th>
            <th>@lang('admin::contact.index.TABLE_CREATE_AT')</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list))
            @foreach($list as $item)
                <tr>
                    <td>
                        <a href="{{route('admin.contact.show', $item['id'])}}">
                            {{$item['fullname']}}
                        </a>
                    </td>
                    <td>{{$item['company']}}</td>
                    <td>{{$item['email']}}</td>
                    <td>{{$item['phone']}}</td>
                    <td>{{\Carbon\Carbon::parse($item['created_at'])->format('d/m/Y')}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
{{ $list->appends($filter)->links('helpers.paging') }}