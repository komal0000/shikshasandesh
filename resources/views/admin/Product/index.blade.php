@extends('admin.layout.app')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection

@section('s-title')
@endsection
@section('page-option')
    <div class="text-right">
        <a href="{{ route('admin.product.add') }}" class="btn btn-primary"> Add </a>
    </div>
@endsection

@section('content')
    <div class="bg-white">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <img src="{{ asset($product->image) }}" alt="" class="w-100">
                    {{ $product->name }}
                    <a href="{{ route('admin.product.edit',['product' => $product->id])}}"
                        class="btn btn-primary">Edit</a>
                    <a href="{{ route('admin.product.del',['product'=> $product->id])}}"
                        class="btn btn-danger">Delete</a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(function() {
            $('.photo').dropify();
        });
    </script>
@endsection
