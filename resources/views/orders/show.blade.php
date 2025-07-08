<x-app2>
    <div class="container py-4" style="background-color: #FFFBEF;">
        <a href="{{ route('orders.index') }}" class="btn btn-sm btn-outline-warning mb-3">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>

        <div class="card shadow-sm border border-warning rounded-4 p-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="mb-0">Invoice: <strong>{{ $order->invoice_number ?? 'INV/' . $order->id }}</strong></h5>
                <span class="badge text-white fw-bold px-3 py-2"
                    style="background-color: {{ getStatusColor($order->status) }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <p class="text-muted">Tanggal Pesanan: {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</p>

            <hr class="text-warning">

            <h6 class="fw-bold mb-3">Item Pesanan:</h6>
            @forelse ($order->items as $item)
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3"
                        style="width: 64px; height: 64px; background-color: #f5f5f5; border-radius: 4px;">
                        {{-- Gambar produk jika ada --}}
                        @if ($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid rounded" alt="">
                        @endif
                    </div>
                    <div class="flex-grow-1">
                        <div class="fw-bold">{{ $item->product_name }}</div>
                        <div class="text-muted small">{{ $item->quantity }} barang x Rp{{ number_format($item->price, 0, ',', '.') }}</div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold">Subtotal</div>
                        <div>Rp{{ number_format($item->quantity * $item->price, 0, ',', '.') }}</div>
                    </div>
                </div>
            @empty
                <p class="text-muted">Tidak ada item dalam pesanan ini.</p>
            @endforelse

            <hr class="text-warning">

            <div class="d-flex justify-content-end">
                <div class="text-end">
                    <div class="fw-bold">Total Harga:</div>
                    <h5>Rp{{ number_format($order->total, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>
    </div>
</x-app2>
