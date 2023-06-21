@extends('layouts.errors')
@section('content')
<div class="container">
       <div class="row vh-100 align-items-center">
        <div class="col-5 mx-auto text-center">
            <h3 class="fw-secondary fw-bold display-4 text-muted">:(</h3>
            <h1 class="error-page-title mb-0">419</h1>
            <h5 class="font-secondary mb-5">Session Expired</h5>
            <a href="{{ route('admin.dashboard') }}" class="btn ms-btn ms-btn-outline-primary">
                <i class="fa-solid fa-house me-3"></i>
                Dashboard
            </a>
        </div>
       </div>
    </div>
</div>
@endsection