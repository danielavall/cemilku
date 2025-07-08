<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status');
        // $userId = Auth::id() ?? 2; // default sementara jika belum login
        $userId = Auth::user()->id;

        // Siapkan query builder
        $query = Order::with([
            'orderDetails.collection',
            'orderDetails.customize',
            'user.mainAddress',
        ])->where('user_id', $userId);

        // Filter status jika ada
        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        // Eksekusi query
        $orders = $query->latest()->get();

        return view('orders', compact('orders', 'status'));
    }

    public function pay(Order $order)
    {
        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan ini tidak dapat dibayar.');
        }

        // Update status jadi "paid"
        $order->status         = 'paid';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Pembayaran berhasil diproses.');
    }

    public static function getStatusColor($status)
    {
        return match ($status) {
            'pending' => '#FDC607',   // Belum Bayar
            'paid' => '#52282A',      // Diproses
            'shipped' => '#00D9F5',   // Dikirim
            'completed' => '#28a745', // Selesai
            'cancelled' => '#dc3545', // Dibatalkan
            default => '#6c757d',     // Default abu-abu
        };
    }

}
