<div class="col-lg-3 col-md-6">
    <h5 class="text-white mb-4">Our Office</h5>
    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{$data['addr']}}</p>
    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$data['phone']}}</p>
    <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$data['email']}}</p>
    @php
            $socials=getGroupedSetting('social',true);

    @endphp
    <div class="d-flex pt-3">
        <a class="btn btn-square btn-secondary rounded-circle me-2" href="{{$socials['Facebook']??'#'}}"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-square btn-secondary rounded-circle me-2"  href="{{$socials['Twitter']??'#'}}"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-square btn-secondary rounded-circle me-2"  href="{{$socials['Instagram']??'#'}}"><i class="fab fa-instagram"></i></a>
    </div>
</div>
