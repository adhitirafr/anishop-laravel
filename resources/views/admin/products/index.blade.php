@extends('admin.layout')
@section('title', 'Products')
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
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse($products as $key => $product)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $product->sku }} </td>
                                    <td> {{ $product->name }} </td>
                                    <td> {{ $product->price }} </td>
                                    <td> {{ $product->status }} </td>
                                    <th> {{ $product->updated_at }} </th>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('categories.edit', $product->id) }}">Edit</a>
                                        {!! Form::open(['url' => 'admin/categories/'. $product->id, 'class' => 'd-inline delete']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                    <td>Belum ada</td>
                            @endif
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary">Add New</a>
                </div>
            </div>
        </div>
    </div>
@stop