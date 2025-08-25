@extends('admin.layout.app')

@section('css')
    <style>
        .col-md-3 {
            /* margin-bottom: 10px; */
        }

        label {
            font-weight: 600;
            font-size: 1.1rem;
            /* margin-bottom: 5px; */
            color: black;
            margin-top: 5px;
        }

        .form-control,
        .tox {
            border-radius: 5px !important;
        }

        .upload-container {
            padding: 30px;
            background: #cecece;
            border-radius: 10px;
        }

        .upload-container #single-upload-container {
            padding: 10px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            border-radius: 10px;
            border: 2px dashed #716880;
            min-height: 170px;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }

        .upload-container #single-upload-container .single-upload {
            width: 20%;
            padding: 5px;
            background: white;
            height: 150px;
            overflow: hidden;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            position: relative;
            border: 1px dashed #716880;
        }

        .upload-container #single-upload-container .single-upload button {
            position: absolute;
            top: 0px;
            right: 0px;
            height: 30px;
            width: 30px;
            background: #d80000;
            color: white;
            border: none;
        }

        .upload-container #single-upload-container .single-upload img {
            width: 100%;
        }

        #images .single-image {
            border: 1px solid white;
            position: relative;
        }

        #images .single-image>button {
            position: absolute;
            top: 1px;
            right: 1px;
        }

        /* Modal image holder */
        #modal-image-holder img {
            max-width: 100%;
            max-height: 80vh;
        }
    </style>
@endsection

@section('page-option')
@endsection

@section('s-title')
    <li class="breadcrumb-item">
       <a href=" {{route('admin.setting.gallery.type.index')}}">Gallery</a>
    </li>
    <li class="breadcrumb-item active">
        {{ $type->name }}
    </li>
@endsection

@section('content')
    <div class="upload-container">
        <div id="single-upload-container">
            <!-- Dynamically inserted images will go here -->
        </div>
        <div class="py-3">
            <button class="btn btn-primary" onclick="$('#input-fileupload')[0].click();">
                Select Files
            </button>
            <button class="btn btn-secondary" onclick="save()">Upload Files</button>
        </div>
        <input type="file" class="d-none" accept="image/*" multiple id="input-fileupload">
    </div>

    <div class="bg-white shadow mt-3">
        <div class="card-body">
            <div>
                <div class="row" id="images">
                    @foreach ($type->galleries as $image)
                        <div class="col-md-3  p-0">
                            <div id="image-{{ $image->id }}" class="single-image">
                                <img data-src="{{ asset($image->file) }}" src="{{ asset($image->thumb ?? $image->file) }}"
                                    class="w-100" alt="">
                                <button onclick="del({{ $image->id }})" class="btn btn-danger">X</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- Modal for image viewing -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-5">
                <div id="modal-image-holder">
                    <img src="/front/basicimage.jpg" class="w-100" alt="">
                    <button class="next" style="position: absolute; top: 50%; right: 10px;">Next</button>
                    <button class="prev" style="position: absolute; top: 50%; left: 10px;">Prev</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var i = 0,
            blobs = [],
            index = 0,
            galleryelem = [];

        // Image Uploading
        $('#input-fileupload').change(function(e) {
            console.log(this.files);
            for (let index = 0; index < this.files.length; index++) {
                const file = this.files[index];
                if (file) {
                    let reader = new FileReader();

                    reader.onload = function(e) {
                        blobs['b_' + i] = file;
                        const img = '<div id="single-upload-' + i + '" class="single-upload">' +
                            '<img src="' + e.target.result + '" />' +
                            '<button onclick="remove(' + i + ')">X</button>' +
                            '</div>';
                        $('#single-upload-container').append(img);
                        i++;
                    }

                    reader.readAsDataURL(file);
                }
            }
        });

        function remove(sn) {
            $('#single-upload-' + sn).remove();
            delete blobs['b_' + sn];
        }

        function save() {
            console.log('uploading');

            if (Object.keys(blobs).length === 0) {
                alert('Please select files to upload');
                return;
            }

            var f = new FormData();
            f.append('type', {{ $type->id }});

            for (const key in blobs) {
                if (Object.hasOwnProperty.call(blobs, key)) {
                    const blob = blobs[key];
                    f.append('images[]', blob);
                }
            }

            console.log('uploading');


            axios.post('{{ route('admin.setting.gallery.add') }}', f)
                .then((res) => {
                    let html = '';
                    res.data.forEach(img => {
                        html += '<div class="col-md-3 p-0">' +
                            '<div data-src="/' + img.file + '" id="image-' + img.id +
                            '" class="single-image">' +
                            '<img src="/' + img.file + '" class="w-100" alt="">' +
                            '<button onclick="del(' + img.id + ')">X</button>' +
                            '</div>' +
                            '</div>';
                    });
                    $('#images').prepend(html);
                    $('#single-upload-container').html('');
                    blobs = [];
                })
                .catch((err) => {
                    console.log(err);
                });
        }

        function del(gallery) {
            axios.post('{{ route('admin.setting.gallery.del', ':gallery') }}'.replace(':gallery', gallery), {
                })
                .then((res) => {
                    $('#image-' + gallery).remove();
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    </script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="{{ asset('front/js/lazy.js') }}"></script>
@endsection
