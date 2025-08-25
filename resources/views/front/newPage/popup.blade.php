<style>
    .popup-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .popup-content {
        position: absolute;
        background-color: #fefefe;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 0px;
        border-radius: 5px;
        max-width: 800px;
        width: 90%;
        max-height: 90vh; /* Limit height to 90% of viewport height */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        overflow: auto;
    }

    .popup-close {
        color: #000000;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        position: absolute;
        right: 15px;
        top: 5px;
        z-index: 1001;
    }

    .popup-close:hover {
        color: black;
    }

    .popup-image-container {
        position: relative;
        margin: 0 auto;
        height: 100%;
        max-height: 90vh;
        overflow-y: auto; /* Add scrollbar when content exceeds container */
    }

    .popup-image {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .popup-button-overlay {
        bottom: 20px;
        left: 0;
        width: 100%;
        text-align: center;
        padding: 10px 0;
        background: rgba(255, 255, 255, 0.7);
        z-index: 10;
        margin-top: -60px; /* Pull button up to overlap with bottom of image */
    }

    .hidden {
        display: none;
    }

    .active {
        display: block;
    }

    a,
    button,
    img,
    input,
    span {
        -webkit-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    .btn-primary {
        color: #fff;
        background-color: #2ba306;
        border-color: #00ff2a;
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
@if ($popups->count() > 0)
    <div id="popupModal" class="popup-modal">
        <div class="popup-content">
            <span class="popup-close">&times;</span>
            @foreach ($popups as $popup)
                <div class="popup-image-container {{ $loop->first ? 'active' : 'hidden' }}"
                    data-index="{{ $loop->index }}">
                    <img src="{{ asset($popup->image) }}" alt="Popup Image" class="popup-image"
                        data-mobile-image="{{ asset($popup->mobile_image) }}">
                    @if (!empty($popup->btn_title) && !empty($popup->btn_link))
                        <div class="popup-button-overlay">
                            <a href="{{ $popup->btn_link }}" class="btn btn-primary" target="_blank">
                                {{ $popup->btn_title }}
                            </a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popupModal = document.getElementById('popupModal');
            const popupImageContainers = document.querySelectorAll('.popup-image-container');
            const closeButton = document.querySelector('.popup-close');
            let currentIndex = 0;

            // Detect if the user is on a mobile device
            const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

            // Update image sources for mobile view
            if (isMobile) {
                popupImageContainers.forEach(function(container) {
                    const image = container.querySelector('.popup-image');
                    const mobileImage = image.getAttribute('data-mobile-image');
                    if (mobileImage) {
                        image.src = mobileImage;
                    }
                });
            }

            // Prevent scrolling of the background content when popup is open
            document.body.style.overflow = 'hidden';

            // Show the modal when page loads
            popupModal.style.display = 'block';

            // Handle closing the current popup
            closeButton.addEventListener('click', function() {
                // Hide current popup
                popupImageContainers[currentIndex].classList.add('hidden');
                popupImageContainers[currentIndex].classList.remove('active');

                // Move to next popup or close modal if no more popups
                currentIndex++;
                if (currentIndex < popupImageContainers.length) {
                    // Show next popup
                    popupImageContainers[currentIndex].classList.remove('hidden');
                    popupImageContainers[currentIndex].classList.add('active');
                } else {
                    // No more popups, close the modal
                    popupModal.style.display = 'none';
                    // Re-enable scrolling when all popups are closed
                    document.body.style.overflow = '';
                }
            });

            // Optional: Close modal when clicking outside of popup-content
            window.addEventListener('click', function(event) {
                if (event.target == popupModal) {
                    closeButton.click();
                }
            });
        });
    </script>
@endif
