<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index() {
        $pesanans = Pesanan::all(); // Ambil semua data pesanan
        return view('pesanan', compact('pesanans'));
    }

    public function tambah_pesanan(Request $request) {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'pesan' => 'required|string',
            'paket' => 'required|string',
        ]);

        // Buat pesanan baru
        $pesanan = new Pesanan;
        $pesanan->name = $validatedData['name'];
        $pesanan->email = $validatedData['email'];
        $pesanan->phone = $validatedData['phone'];
        $pesanan->pesan = $validatedData['pesan'];
        $pesanan->paket = $validatedData['paket'];
        $pesanan->save();

        // Redirect atau respon sesuai kebutuhan
        return redirect()->back()->with('success', 'Pesanan berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('daftar_pesanan')
                         ->with('status', 'Pesanan berhasil dihapus');
    }
}
