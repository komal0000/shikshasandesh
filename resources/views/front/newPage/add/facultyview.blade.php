<div class="choose-us section-padding-1">
    <div class="container-fluid">
        <div class="row no-gutters choose-negative-mrg">
            @foreach ($facility as $facilities)
                <div class="col-lg-3 col-md-6 mb-4">
                <div class="single-choose-us choose-bg-green h-100" style="margin: 10px;">
                        <div class="choose-img">
                            <img class="animated" src="{{ asset($facilities->icon) }}" alt="" loading="lazy">
                        </div>
                        <div class="choose-content">
                            <h3>{{ $facilities->title }}</h3>
                            <p>{{ $facilities->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

