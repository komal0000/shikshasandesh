<style>
    /* General styles for teacher area */
    .teacher-area .custom-row .custom-col-5 {
        padding: 15px !important;
    }

    /* Single teacher card */
    .teacher-area .custom-row .custom-col-5 .single-teacher {
        position: relative;
        overflow: hidden;
        border-radius: 12px !important;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1) !important;
        background: #ffffff !important;
        transition: box-shadow 0.3s ease !important;
    }

    /* Explicitly disable green overlay/border */
    .teacher-area .custom-row .custom-col-5 .single-teacher::before,
    .teacher-area .custom-row .custom-col-5 .single-teacher::after {
        display: none !important;
    }

    /* Image container */
    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-img {
        overflow: hidden;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-img img {
        display: block;
        width: 100% !important;
        height: auto !important;
        transition: filter 0.4s ease, transform 0.4s ease !important;
    }

    /* Visible content (name and designation) */
    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-visible {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.75), transparent) !important;
        padding: 15px 20 Huntington Beach, CA 92648 !important;
        text-align: left;
        transition: opacity 0.3s ease !important;
        z-index: 1;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-visible h4 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 4px;
        color: #ffffff !important;
        text-transform: capitalize;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-visible h5 {
        font-size: 16px;
        font-weight: 500;
        margin: 0;
        color: #e0e0e0 / !important;
        text-transform: uppercase;
    }

    /* Hover content (name, designation, description) */
    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-wrap {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(34, 34, 34, 0.9), rgba(68, 68, 68, 0.7)) !important;
        opacity: 0;
        transition: opacity 0.4s ease !important;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-wrap .teacher-content {
        background: #ffffff;
        border-radius: 8px;
        padding: 25px !important;
        text-align: center;
        transform: scale(0.9);
        transition: transform 0.4s ease-in-out !important;
        max-width: 80%;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-wrap .teacher-content h4 {
        font-size: 20px;
        font-weight: 700;
        margin: 0 0 8px;
        color: #333333 !important;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-wrap .teacher-content h5 {
        font-size: 16px;
        font-weight: 500;
        margin: 0 0 12px;
        color: #555555 !important;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher .teacher-content-wrap .teacher-content p {
        font-size: 14px;
        line-height: 24px;
        margin: 0;
        color: #666666 !important;
    }

    /* Hover effects */
    .teacher-area .custom-row .custom-col-5 .single-teacher:hover {
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2) !important;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher:hover .teacher-img img {
        filter: blur(3px) brightness(0.85) !important;
        transform: scale(1.05) !important;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher:hover .teacher-content-visible {
        opacity: 0 !important;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher:hover .teacher-content-wrap {
        opacity: 1 !important;
    }

    .teacher-area .custom-row .custom-col-5 .single-teacher:hover .teacher-content-wrap .teacher-content {
        transform: scale(1) !important;
    }
</style>
<div class="teacher-area pt-40 pb-40">
    <div class="container">
        <div class="section-title mb-30">
            <h2>Our <span>Teachers</span></h2>
            <p>{{ $data->news }}</p>
        </div>
        <div class="custom-row">
            @foreach ($teachers as $teacher)
                <div class="custom-col-5">
                    <div class="single-teacher mb-10">
                        <div class="teacher-img">
                            <img src="{{ asset($teacher->image) }}" alt="{{ $teacher->name }}" loading="lazy">
                        </div>
                        <div class="teacher-content-visible">
                            <h4>{{ $teacher->name }}</h4>
                            <h5>{{ $teacher->deg }}</h5>
                        </div>
                        <div class="teacher-content-wrap">
                            <div class="teacher-content">
                                <h4>{{ $teacher->name }}</h4>
                                <h5>{{ $teacher->deg }}</h5>
                                <p>{{ $teacher->short_des }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
