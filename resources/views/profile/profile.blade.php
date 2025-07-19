<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.getElementById('successAlert');
                    if (alert) {
                        // Bootstrap 5 dismiss
                        var bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                        bsAlert.close();
                    }
                }, 3000);
            </script>
        @endif
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="d-flex flex-column align-items-center">
                            <div class="position-relative mb-4">
                                <img src="{{ asset('img/user.png') }}" alt="Profile Picture" class="rounded-circle shadow" width="120" height="120">
                                
                            </div>
                            <h3 class="fw-bold mb-1">
                                {{ auth()->user()->name ?? 'Nama Pengguna' }}
                            </h3>
                            <p class="text-muted mb-3">
                                {{ auth()->user()->email ?? 'email@domain.com' }}
                            </p>
                        </div>
                        <hr>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="bg-light rounded-3 p-4 h-100 shadow-sm">
                                    <h6 class="text-uppercase text-secondary fw-semibold mb-2">Nama Lengkap</h6>
                                    <p class="mb-0 fs-5">{{ auth()->user()->name ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bg-light rounded-3 p-4 h-100 shadow-sm">
                                    <h6 class="text-uppercase text-secondary fw-semibold mb-2">Email</h6>
                                    <p class="mb-0 fs-5">{{ auth()->user()->email ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-primary px-4" onclick="editProfile()">
                                <i class="bi bi-pencil-square me-2"></i>Edit
                            </a>
                            <a href="/logout" class="btn btn-danger px-4">
                                <i class="bi bi-box-arrow-right me-2"></i>Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script>
        function editProfile() {
            window.location.href = '/edit_profile';
        }
    </script>
</x-layout>