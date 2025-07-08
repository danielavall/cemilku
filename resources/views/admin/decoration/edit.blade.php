@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
@endsection

@extends('adminlte::page')

@section('title', 'Edit Decoration')

@section('content')
    <div class="content-header">
        <h1>Edit Decoration</h1>
    </div>

    <x-adminlte-card>
        <form action="{{ route('admindecoration.update', $decoration->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-adminlte-input name="name" label="Decoration Name" value="{{ $decoration->name }}" required />
            <x-adminlte-input name="price" label="Price (Rp)" type="number" value="{{ $decoration->price }}" required />
            <x-adminlte-input name="stock" label="Stock" type="number" value="{{ $decoration->stock }}" required />

            {{-- Tampilkan gambar saat ini --}}
            @if ($decoration->image)
                <div class="mb-3">
                    <label>Current Image:</label><br>
                    <img src="{{ asset('assets/decoration/' . $decoration->image) }}" alt="Decoration Image" width="120" height="120" style="object-fit: cover; border-radius: 8px;">
                </div>
            @endif

            {{-- Input untuk ganti gambar --}}
            <div class="mb-3">
                <label for="image">Change Image (optional):</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <x-adminlte-button type="submit" theme="success" icon="fas fa-save" label="Update" />
            <a href="{{ route('admindecoration.index') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </x-adminlte-card>
@endsection
