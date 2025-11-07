@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">🛒 Form Pembelian Aplikasi Premium</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('beli.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" disabled>
                </div>

                <div class="mb-3">
                    <label>Harga</label>
                    <input type="text" class="form-control" value="Rp{{ number_format($product->price, 0, ',', '.') }}" disabled>
                </div>

                <div class="mb-3">
                    <label>Kontak WhatsApp / Telegram</label>
                    <input type="text" name="kontak" class="form-control" placeholder="Contoh: 08123456789" required>
                </div>

                <div class="mb-3">
                    <label>Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode" class="form-control" required onchange="tampilkanInstruksi()">
                        <option value="" selected disabled>-- Pilih Metode --</option>
                        <option value="dana">DANA</option>
                        <option value="gopay">GoPay</option>
                        <option value="transfer">Transfer Bank</option>
                    </select>
                </div>

                <div id="instruksiPembayaran" class="mt-4" style="display: none;">
                    <h5>📢 Instruksi Pembayaran:</h5>
                    <div id="dana" style="display: none;">
                        <p>Silakan transfer ke DANA: <strong>0812 3456 7890</strong></p>
                        <img src="{{ asset('img/qris-dana.png') }}" alt="QRIS DANA" width="150">
                    </div>
                    <div id="gopay" style="display: none;">
                        <p>Silakan transfer ke GoPay: <strong>0813 9876 5432</strong></p>
                        <img src="{{ asset('img/qris-gopay.png') }}" alt="QRIS GoPay" width="150">
                    </div>
                    <div id="transfer" style="display: none;">
                        <p>Silakan transfer ke rekening BCA: <strong>1234567890</strong> a.n. <strong>Premium Store</strong></p>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success w-100">Kirim Pesanan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function tampilkanInstruksi() {
    const metode = document.getElementById('metode').value;
    const instruksiBox = document.getElementById('instruksiPembayaran');
    instruksiBox.style.display = 'block';

    document.getElementById('dana').style.display = 'none';
    document.getElementById('gopay').style.display = 'none';
    document.getElementById('transfer').style.display = 'none';

    if (metode === 'dana') {
        document.getElementById('dana').style.display = 'block';
    } else if (metode === 'gopay') {
        document.getElementById('gopay').style.display = 'block';
    } else if (metode === 'transfer') {
        document.getElementById('transfer').style.display = 'block';
    }
}
</script>
@endsection
