@if (isset($list_group_child) && count($list_group_child) > 0)
    @foreach ($list_group_child as $item)
        <tr class="group-child-item">
            <td>
                <p>{{ $item['group_name'] }}</p>
                <input type="hidden" name="group_child_id[]" value="{{ $item['group_id'] }}">
            </td>
            <td style="max-width: 200px;width: 200px">
                <select class="form-control" name="" id="" onchange="Edit.removeRowGroupChild(this)">
                    <option value="">Hành động</option>
                    <option value="1">Xóa</option>
                </select>
                {{--<button type="button" class="btn btn-danger" onclick="Edit.removeRowGroupChild(this)">--}}
                    {{--@lang('core::admin-group.remove')--}}
                {{--</button>--}}
            </td>
        </tr>
    @endforeach
@endif
