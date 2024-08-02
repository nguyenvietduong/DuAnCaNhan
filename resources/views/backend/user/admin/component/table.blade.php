<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Hình ảnh</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th class="text-center">Họ và tên</th>
            <th>SDT</th>
            <th>Địa chỉ</th>
            <th class="text-center">Trạng thái</th>
            <th class="text-center">Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($admins) && is_object($admins))
            @foreach ($admins as $user)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $user->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        <img src="{{ $user->image }}" width="50px" height="50px" alt="">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td class="text-center">
                        {{ "{$user->first_name} {$user->last_name}" }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td>
                        {{ $user->address }}
                    </td>

                    <td class="text-center js-switch-{{ $user->id }}">
                        <input type="checkbox" value="{{ $user->publish }}" class="js-switch status"
                            data-field="publish" data-model="{{ $config['model'] }}"
                            {{ $user->publish == 2 ? 'checked' : '' }} data-modelId="{{ $user->id }}" />
                    </td>

                    <td class="text-center">
                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('admin.delete', $user->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $admins->links('pagination::bootstrap-4') }} 
