@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
@endsection

@extends('adminlte::page')

@section('title', 'Trash - Snacks')

@section('content')
    <div class="content-header">
        <h1>Trash - Deleted Snacks</h1>
    </div>


    <a href="{{ route('admin.snack.index') }}" class="btn btn-yellowbrown mb-3">
        <i class="fas fa-arrow-left "></i> Back to List
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Deleted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashedSnacks as $index => $snack)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $snack->name }}</td>
                    <td>{{ $snack->deleted_at }}</td>
                    <td>
                        <form action="{{ route('admin.snack.restore', $snack->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-add btn-sm" onclick="return confirm('Restore snack ini?')">Restore</button>
                        </form>
                        <form action="{{ route('admin.snack.force-delete', $snack->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete btn-sm" onclick="return confirm('Hapus permanen snack ini?')">Delete Permanently</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada snack yang terhapus.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <form action="{{ route('admin.snack.restore-all') }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Yakin ingin mengembalikan semua snack yang terhapus?')">
    @csrf
    @method('PUT')
    <button type="submit" class="btn btn-export mb-3">
        <i class="fas fa-undo"></i> Restore All
    </button>
    </form>
@endsection
