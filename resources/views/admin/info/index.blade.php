@extends('admin.layouts.app')
@section('content')
    <main>
        <h3>Company Information</h3>
        @include('admin.layouts.message')
        <div class="col-md-8">
        <table class="table table table-striped table-hover no-footer" id="category-table">
            {!! Form::open(['files'=>true]) !!}
            <tr>
                <td>Email</td>
                <td>{!! Form::text('email',$info->email,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{!! Form::text('address',$info->address,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>{!! Form::text('phone',$info->phone,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Facebook</td>
                <td>{!! Form::text('facebook',$info->facebook,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Twitter</td>
                <td>{!! Form::text('twitter',$info->twitter,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Google +</td>
                <td>{!! Form::text('google',$info->google,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Youtube</td>
                <td>{!! Form::text('youtube',$info->youtube,['class'=>'form-control']) !!}</td>
            </tr>
            <tr>
                <td>Logo</td>
                <td>
                    {!! Form::file('logo',['class'=>'form-control']) !!}
                    <img src="{{ $info->logo != null ? asset($info->Resources->path) : "" }}" class="categoryThumbnail">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    <button class="btn btn-primary">Update</button>
                </td>
            </tr>
            {!! Form::close() !!}
        </table>
        </div>
    </main>
@endsection