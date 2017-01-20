@extends('admin.layouts.app')
@section('content')
    <main>
        <h3>Partner List</h3>
        <p><a href="{{ route('admin.partner.create') }}" class="btn btn-primary">Create New Partner</a></p>
        @include('admin.layouts.message')
        <table class="table table table-striped table-hover no-footer" id="category-table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Site</th>
                <th class="text-center">Address</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            @if(count($partners) > 0)
                <tbody>
                @foreach($partners as $index => $partner)
                    <tr>
                        <td class="text-center">{{ $currentIndex + $index +1 }}</td>
                        <td class="text-center">
                            {{ $partner->partnerName }}
                        </td>
                        <td class="text-center">
                            {{ $partner->partnerEmail }}
                        </td>
                        <td class="text-center">
                            {{ $partner->partnerSite }}
                        </td>
                        <td class="text-center">
                            {{ $partner->partnerAddress  }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.partner.update',$partner->partnerId) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger" onclick="return confirmDelete({{$partner->partnerId}})">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
        <div class="section-body contain-lg">
            <div class="col-md-12 text-center">
                {{ $partners->links() }}
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.partner.delete') }}";
            bootbox.dialog({
                message: "Do you want to delete this partner",
                title: "Confirm",
                buttons: {
                    success: {
                        label: "Confirm",
                        className: "btn-success",
                        callback: function () {
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data : {
                                    partnerId: id
                                },
                                success: function () {
                                    location.reload();
                                }
                            });
                        }
                    },
                    danger: {
                        label: "Cancel",
                        className: "btn-danger",
                        callback: function () {
                        }
                    }
                }
            });
        }
    </script>
@stop