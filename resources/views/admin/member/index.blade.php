@extends('admin.layouts.app')
@section('content')
    <main>
        <h3>Slider List</h3>
        <p><a href="{{ route('admin.member.create') }}" class="btn btn-primary">Create New Member</a></p>
        @include('admin.layouts.message')
        <table class="table table table-striped table-hover no-footer" id="category-table">
            <thead>
            <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Birthdate</th>
                <th class="text-center">Address</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center"></th>
            </tr>
            </thead>
            @if(count($members) >0)
                <tbody>
                @foreach($members as $index => $member)
                    <tr>
                        <td class="text-center">
                            {{ $member->name }}
                        </td>
                        <td class="text-center">
                            {{ $member->position }}
                        </td>
                        <td class="text-center">
                            {{ $member->birth }}
                        </td>
                        <td class="text-center">
                            {{ $member->address }}
                        </td>
                        <td class="text-center">
                            {{ $member->email }}
                        </td>
                        <td class="text-center">
                            {{ $member->phone }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.member.update',$member->memberId) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger" onclick="return confirmDelete({{$member->memberId}})">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
        <div class="section-body contain-lg">
            <div class="col-md-12 text-center">
                {{ $members->links() }}
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.member.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this member",
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
                                    memberId: id
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