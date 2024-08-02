<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>
                <input type="checkbox" value="" id="checkAll" class="input-checkbox">
            </th>
            <th>Tên</th>
            <th>Email</th>
            <th>HDV</th>
            <th>Ngày khởi hành</th>
            <th>Tổng giá</th>
            <th>Trạng thái</th>
            <th class="text-center">Tùy chọn </th>
        </tr>
    </thead>
    <tbody>
        @if (isset($bookings) && is_object($bookings))
            @foreach ($bookings as $booking)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $booking->id }}" class="input-checkbox checkBoxItem">
                    </td>
                    <td>
                        {{ $booking->name }}
                    </td>

                    <td>
                        {{ $booking->email }}
                    </td>

                    <td>
                        {{ $booking->guide->name ?? 'Chưa có' }}
                    </td>

                    <td>
                        {{ $booking->tour_date }}
                    </td>

                    <td>
                        {{ number_format($booking->total, 0, ',', '.') }}đ
                    </td>

                    <td>
                        @foreach (config('apps.setup.status') as $key => $val)
                            {{ $booking->status == $key ? $val : '' }}
                        @endforeach
                    </td>

                    <td class="text-center">
                        <a href="{{ route('booking.edit', $booking->id) }}" class="btn btn-success"><i
                                class="fa fa-edit"></i></a>
                        <a href="{{ route('booking.delete', $booking->id) }}" class="btn btn-danger"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $bookings->links('pagination::bootstrap-4') }}
