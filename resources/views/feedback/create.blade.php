@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-pink text-white fw-bold">
            Form Feedback Pelanggan
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('feedback.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan:</label>
                    <input type="text" name="nama_pelanggan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Apakah Anda puas dengan hasil laundry kami?</label><br>
                    @for($i=1; $i<=5; $i++)
                        <input type="radio" name="puas_laundry" value="{{ $i }}" required> ⭐
                    @endfor
                </div>

                <div class="mb-3">
                    <label class="form-label">Apakah harga yang ditawarkan sesuai dengan layanannya?</label><br>
                    @for($i=1; $i<=5; $i++)
                        <input type="radio" name="puas_harga" value="{{ $i }}" required> ⭐
                    @endfor
                </div>

                <div class="mb-3">
                    <label for="kritik_saran" class="form-label">Kritik dan Saran:</label>
                    <textarea name="kritik_saran" class="form-control" rows="4"></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ url('/') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
