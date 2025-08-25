@extends('admin.layout.app')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/plugins/drophify/css/dropify.min.css') }}">
@endsection
@section('s-title')
<li class="breadcrumb-item">
    <a href="{{ route('admin.testimonial.index') }}"> Testimonial </a>
</li>
<li class="breadcrumb-item active">
    Edit
</li>
@endsection
@section('content')
    <div class="bg-white p-5 shadow">
        <form action="{{ route('admin.testimonial.edit',['testimonial'=>$testimonial->id]) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="image">
                        Image
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" class="photo form-control"
                        data-default-file="{{ asset($testimonial->image) }}">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-2">
                                <label for="name">
                                    Name
                                </label>
                                <input type="text" name="name" id="name" class="form-control" required
                                    value="{{ $testimonial->name }}">
                            </div>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="rate">
                                Profession
                            </label>
                            <input type="text" name="profission" id="profission" class="form-control" required value="{{$testimonial->profission}}">



                        </div>
                    </div>
                    <div class="mb-2">

                        <label for="long_des">
                           Message
                        </label>
                        <textarea name="long_des" id="long_des" class="form-control" required  required>{{ $testimonial->long_des }}
                        </textarea>
                    </div>

                    <div class="text-right py-2">
                        <a href="{{route('admin.testimonial.index')}}" class="btn btn-danger my-2">Cancel</a>
                        <button class="btn btn-primary">
                            save
                        </button>



                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('admin/plugins/drophify/js/dropify.min.js') }}"></script>
    <script>
        $(function() {
            $('.photo').dropify();
            $('#long_des').summernote();
        });
    </script>
@endsection
