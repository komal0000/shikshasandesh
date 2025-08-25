@php
    $socials=getGroupedSetting('social',true);
@endphp
<!-- Topbar Start -->
<div class="container-fluid bg-dark px-0">
    <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
            <div class="h-100 d-inline-flex align-items-center text-light">
                <span>Follow Us:</span>
                <a class="btn btn-link text-light" href="{{$socials['Facebook']??'#'}}"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-link text-light"  href="{{$socials['Twitter']??'#'}}"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-link text-light"  href="{{$socials['Instagram']??'#'}}"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-6 text-end">
            <div class="h-100 bg-secondary d-inline-flex align-items-center text-dark py-2 px-4">
                <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Call Us:</span>
                <span>{{$curdata['phone']}}</span>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
