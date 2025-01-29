@if (session('success'))
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Laravel Project</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <h5>{{ session('success') }}</h5>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the toast element exists
            const toastElement = document.getElementById('liveToast');
            if (toastElement) {
                // Initialize the toast
                const toast = new bootstrap.Toast(toastElement);
                // Show the toast
                toast.show();
            }
        });
    </script>
@elseif($errors->any())
    <div class="position-absolute d-flex flex-column gap-1" style="top: .5rem; right: .5rem; z-index:100;">
        @foreach ($errors->all() as $error)
            <div class="w-100 alert alert-success alert-dismissible fade show m-0" role="alert">
                <p class="m-0">{{ $error }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endforeach
    </div>
@endif
