<div class="modal fade" id="feature" tabindex="-1" role="dialog" aria-labelledby="featureLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="featureLabel">Authentication required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-muted">Only authenticated users can use this feature.</p>
                <div class="text-end">
                    <button type="button" class="btn btn-secondary">
                        <a href="{{ route('register') }}" class="text-white text-decoration-none">Register</a>
                    </button>
                    <button type="button" class="btn btn-primary">
                        <a href="{{ route('login') }}" class="text-decoration-none text-white">Login</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
