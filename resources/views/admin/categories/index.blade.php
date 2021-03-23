@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    @include('admin._partials.flash', ['$errors' => $errors])
                    <table class="table table-bordered table-stripped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse($categories as $key => $category)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $category->name }} </td>
                                    <td> {{ $category->parent ? $category->parent->name : '' }} </td>
                                    <th> {{ $category->updated_at }} </th>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                        {!! Form::open(['url' => 'admin/categories/'. $category->id, 'class' => 'd-inline delete']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Belum ada</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
@stop