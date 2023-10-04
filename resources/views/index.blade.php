@extends('layouts.header')
@section('content')
<div class="row col-sm-12">
    <div class="col-sm-10">
    </div>
    <div class="col-sm-2">
        <a href="{{ route('addproduct')}}" class="btn btn-primary pull-right">Add Product</a>
    </div>
</div><br>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Product Listing</h4>
                <table id="productDatatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>ProductName</th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(!empty($products))
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{$product->category}}</td>
                                    <td>{{$product->sub_category}}</td>
                                    <td>
                                    <a href="{{ route('editproduct',$product->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('delete',$product->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection
@section('jsblock')
<script>
$(document).ready(function() {
    var dataTable = $('#productDatatable').DataTable({
    "paging": true,
    "ordering": true,
    "searching": true,
    });
});
</script>
@endsection