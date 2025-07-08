@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
@endsection

@extends('adminlte::page')

@section('title', 'Add Collection')

@section('content')
    <div class="content-header">
        <h1>Add Collection</h1>
    </div>

    <x-adminlte-card>
        <form action="{{ route('admincollection.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama Collection --}}
            <x-adminlte-input name="name" label="Collection Name" placeholder="Enter collection name" required />

            {{-- Jenis Collection --}}
            <x-adminlte-select name="type" label="Type" required>
                <option value="">-- Choose Type --</option>
                <option value="tower">Tower</option>
                <option value="bouquet">Bouquet</option>
            </x-adminlte-select>

            {{-- Jumlah Layer --}}
            <x-adminlte-select name="layer" label="Number of Layers" required onchange="toggleLayerInputs(this.value)">
                <option value="">-- Choose Layers --</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </x-adminlte-select>

            {{-- Snack per Layer --}}
            @php
                $snacks = \App\Models\Snack::all();
            @endphp

            <div id="layer-inputs">
                @for ($i = 1; $i <= 4; $i++)
                    <div class="layer-select layer-{{ $i }}" style="display: none;">
                        <x-adminlte-select name="snack_id_{{ $i }}" label="Snack for Layer {{ $i }}">
                            <option value="">-- Choose Snack --</option>
                            @foreach ($snacks as $snack)
                                <option value="{{ $snack->id }}">{{ $snack->name }}</option>
                            @endforeach
                        </x-adminlte-select>
                    </div>
                @endfor
            </div>

            {{-- Harga --}}
            <x-adminlte-input name="price" label="Price (Rp)" type="number" required />

            {{-- Stok --}}
            <x-adminlte-input name="stock" label="Stock" type="number" required />

            {{-- Gambar --}}
            <x-adminlte-input name="image" label="Collection Image" type="file" accept="image/*" />

            <x-adminlte-button type="submit" theme="primary" icon="fas fa-plus" label="Add" />
            <a href="{{ route('collections.index') }}" class="btn btn-secondary ml-2">Cancel</a>
        </form>
    </x-adminlte-card>

    {{-- Script Dinamis --}}
    <script>
        function toggleLayerInputs(layer) {
            for (let i = 1; i <= 4; i++) {
                const el = document.querySelector('.layer-' + i);
                if (el) {
                    el.style.display = i <= layer ? 'block' : 'none';
                }
            }
        }
    </script>
@endsection
