<div class="container">
    <!-- Grid row -->
    <div class="row mt-4 px-3">
        <div class="col-lg-3 col-md-6 col-12 mx-auto mb-4 mb-lg-0 footer-content">
            <!-- Shortcuts -->
            <h6 class="fw-bold text-white mb-3 footer-list-title">Shortcuts</h6>
            <ul class="footer-list">
                <li class="text-gray px-2 mb-2">
                    <a href="{{ route('news.index') }}" class="text-reset footer-list-item">Top</a>
                </li>
                <li class="text-gray px-2 mb-2">
                    <a href="{{ route('user.news.favorite') }}"  class="text-reset footer-list-item">My Favorite</a>
                </li>
                <li class="text-gray px-2 mb-2">
                    <a href="" class="text-reset footer-list-item">Sports</a>
                </li>
                <li class="text-gray px-2 mb-2">
                    <a href="" class="text-reset footer-list-item">Subscribe</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mx-auto mb-4 mb-lg-0 footer-content">
            <!-- Recent Post -->
            <h6 class="fw-bold text-white mb-3 footer-list-title">Recent Post</h6>
            <ul class="footer-list">
                <li class="text-gray px-2 mb-2">
                    <a href="" class="text-reset footer-list-item">News Title 1</a>
                </li>
                <li class="text-gray px-2 mb-2">
                    <a href="" class="text-reset footer-list-item">News Title 1</a>
                </li>
                <li class="text-gray px-2 mb-2">
                    <a href="" class="text-reset footer-list-item">News Title 1</a>
                </li>
                <li class="text-gray px-2 mb-2">
                    <a href="" class="text-reset footer-list-item">News Title 1</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mx-auto mb-4 mb-lg-0 footer-motto">
            <!-- About -->
            {{-- <h6 class="fw-bold text-white mb-3 footer-list-title">About</h6> --}}
            <div class="text-center fw-bold h5">
                <img src="{{ asset('images/logo3.png') }}" alt="" width="90">
                <p class="text-gray">Customize Compare Communicate</p>
                <p class="text-gray">with US</p>
                <p class="text-gray">C C C</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12 mx-auto mb-4 mb-lg-0 footer-content">
            <h6 class="fw-bold text-white mb-3 footer-list-title">Contact</h6>
            <ul class="footer-list">
                <li class="text-gray px-2 mb-2">
                    <p class="text-reset"><i class="fa-solid fa-house me-2"></i>New York, NY 10012, US</p>
                </li>
                <li class="text-gray px-2 mb-2">
                    <p class="text-reset footer-list-item"><i class="fa-solid fa-envelope me-2"></i>info@example.com</p>
                </li>
                <li class="text-gray px-2 mb-2">
                    <p class="text-reset"><i class="fa-solid fa-phone me-2"></i>+ 01 234 567 88</p>
                </li>
            </ul>
        </div>
    </div>
    <!-- Copy right & Other apps -->
    <div class="d-sm-flex justify-content-between border-top align-items-center mt-3 pt-1 px-3">
        <!-- Left -->
        <div>
            {{-- <a href=""><img src="{{ asset('images/logo3.png') }}" alt="" width="90"></a> --}}
            <span class="text-gray">All rights reserved 2022</span>
        </div>
        <!-- Right -->
        <div class="text-center">
            <a href="" class="text-white sns-logo">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-youtube"></i>
            </a>
            <a href="" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="" class="text-white ms-3 sns-logo">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
        </div>
    </div>
</div>