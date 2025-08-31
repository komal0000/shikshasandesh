<div class="choose-us section-padding-1" style="overflow: hidden;">
    <div class="container-fluid" style="padding-right: 100px; padding-left: 100px;">
        <div class="row no-gutters choose-negative-mrg" style="margin-top: 0; position: relative; z-index: 9;">
            @foreach ($facility as $facilities)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single-choose-us choose-bg-green h-100"
                        style="margin: 10px; display: flex; flex-direction: row; padding: 50px 48px 46px; box-sizing: border-box; transition: all 0.3s ease 0s;">
                        <div class="choose-img" style="flex: 0 0 60px; margin-right: 20px; overflow: hidden;">
                            <img class="animated" src="{{ asset($facilities->icon) }}" alt="" loading="lazy"
                                style="width: 100%; height: auto; display: block;">
                        </div>
                        <div class="choose-content" style="flex: 1;">
                            <h3 style="font-weight: bold; font-size: 22px; color: #fff; margin: 0 0 12px;">
                                {{ $facilities->title }}</h3>
                            <p style="line-height: 26px; font-size: 16px; color: #fff; margin: 0;">
                                {{ $facilities->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
