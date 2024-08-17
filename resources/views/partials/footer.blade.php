<footer class="footer" style="background-color: {{ Auth::guard('event_owner')->user() ? '#F6E7D2' : '#FFFFFF' }};">
    <div class="container-fluid px-3">
        <div class="row">
            <!-- Icons -->
            <div class="col-6 col-md-4 d-flex justify-content-center justify-content-md-start order-1 p-0 ps-md-3">
                <a href="https://www.facebook.com" class="me-3 text-secondary text-decoration-none" target="_blank">
                    <i class="fab fa-facebook fa-xl"></i>
                </a>
                <a href="https://twitter.com" class="me-3 text-secondary text-decoration-none fa-xl" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>
                <a href="https://www.instagram.com" class="me-3 text-secondary text-decoration-none fa-xl" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- Copyright -->
            <div class="col-12 col-md-4 text-center order-3 order-md-2 m-0">
                <small>Copyright © 2024 Eventplore</small>
            </div>
            <!-- Terms and Support -->
            <div class="col-6 col-md-4 d-flex justify-content-center justify-content-md-end align-items-center order-2 order-md-3 p-0 pe-md-3">
                <a href="{{ route('gudeline') }}" class="me-3 text-decoration-none" style="color: #84947C">Terms of service</a>
                <a href="#" class="text-decoration-none" style="color: #84947C">Support</a>
            </div>
        </div>
    </div>
</footer>

