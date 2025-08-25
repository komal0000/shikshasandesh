@php
    $about_img = getSetting('about_img',true);
@endphp
<div class="about-us pt-40 pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="about-content">
                    <div class="section-title section-title-green mb-30">
                        <h2>About <span>Us</span></h2>
                        <p>{{ $data->why }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="about-img default-overlay">
                    <img src="{{ asset($about_img) }}" alt="About Us" loading="lazy">
                </div>

            </div>
        </div>
    </div>
</div>
