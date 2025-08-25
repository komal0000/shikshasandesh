<div class="register-area bg-img pt-130 pb-130"
    style="background-image:url('https://images.pexels.com/photos/1029577/pexels-photo-1029577.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');">
    <div class="container">
        <div class="section-title-2 mb-75 white-text">
            <h2>Register <span>Now</span></h2>
            <p>{{ $data->event }}</p>
        </div>

        <!-- Success message display -->
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="register-wrap">
            <div id="register-3" class="mouse-bg">
                {{-- <div class="winter-banner">
                    <img src="https://htmldemo.net/glaxdu/glaxdu/assets/img/banner/regi-1.png" alt="">
                    <div class="winter-content">
                        <span>WINTER </span>
                        <h3>2019</h3>
                        <span>ADMISSION </span>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="col-lg-10 col-md-8">
                    <div class="register-form">
                        <h4>Get A free Registration</h4>
                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="first_name" placeholder="First Name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="last_name" placeholder="Last Name" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="phone" placeholder="Phone" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="email" placeholder="Email" type="text" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-form-style">
                                        <textarea name="message" placeholder="Message"></textarea>
                                        <button class="submit default-btn" type="submit">SUBMIT NOW</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="register-1" class="mouse-bg"></div>
    <div id="register-2" class="mouse-bg"></div>
</div>
