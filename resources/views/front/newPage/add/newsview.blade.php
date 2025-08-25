<style>
     .animated-link {
    display: inline-block;
    padding: 10px 24px;
    color: #333;
    font-weight: 500;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
    border: 2px solid #18ff03;
    border-radius: 4px;
}

.animated-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background-color: #00b846;
    transition: all 0.4s ease;
    z-index: -1;
}

.blog-content-wrap{
    background-color: white;
}

.animated-link:hover {
        color: white;
        background-color: green;
    }

.animated-link:hover::before {
    left: 0;
}

.link-text {
    position: relative;
    z-index: 1;
}

.link-icon {
    position: relative;
    z-index: 1;
    margin-left: 8px;
    display: inline-block;
    transform: translateX(0);
    transition: transform 0.3s ease;
}

.animated-link:hover .link-icon {
    transform: translateX(5px);
}
</style>
<div class="event-area bg-img default-overlay pt-40 pb-40 news-background"  style="background-image: url('{{ asset('/img/bg.jpeg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="section-title mb-75 text-center">
            <h2><span>Latest</span> News</h2>
        </div>

        <div class="row">
            @foreach ($news->take(4) as $item)
                <!-- Limit to 4 news items -->
                <div class="col-lg-3 col-md-6 mb-30">
                    <div class="single-blog" style="height: 100%; display: flex; flex-direction: column;">
                        <div class="blog-img" style="flex: 1;">
                            <a href="{{ route('news.details', $item->id) }}">
                                <img src="{{ asset($item->feature_image) }}" alt="{{ $item->title }}"
                                    style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
                            </a>
                        </div>
                        <div class="blog-content-wrap"
                            style="flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                            {{-- <span>{{ $item->category }}</span> --}}
                            <div class="blog-content">
                                <h4><a href="{{ route('news.details', $item->id) }}">{{ $item->title }}</a></h4>
                                <p>{{ $item->short_content }}</p>
                            </div>
                            <div class="blog-date">
                                <a href="#"><i class="fas fa-calendar-alt"></i>
                                    {{ date('M, jS Y', strtotime($item->created_at)) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div style="text-align: center; margin-top: 30px;">
            <a href="{{ route('news.list') }}" class="animated-link pb-20">
                <span class="link-text">View more</span>
                <span class="link-icon">→</span>
            </a>
        </div>
    </div>
</div>
