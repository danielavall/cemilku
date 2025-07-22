@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
@endsection

@extends('adminlte::page')

@section('title', 'Add Decoration')

@section('content')
    <div class="content-header">
        <h1>Add Decoration</h1>
    </div>

    <x-adminlte-card>
        <form action="{{ route('admindecoration.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-adminlte-input name="name" label="Decoration Name" placeholder="Enter decoration name" required />
            <x-adminlte-input name="price" label="Price (Rp)" type="number" required />
            <x-adminlte-input name="stock" label="Stock" type="number" required />
            <x-adminlte-input name="image" label="Decoration Image" type="file" accept="image/*" />

            <x-adminlte-button type="submit" theme="primary" icon="fas fa-plus" label="Add" />
            <a href="{{ route('admindecoration.index') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </x-adminlte-card>
@endsection
