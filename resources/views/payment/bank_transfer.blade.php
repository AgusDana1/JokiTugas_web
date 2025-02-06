@extends('layout.app')

@section('content')
<h2>Pembayaran Transfer Bank</h2>
<p>Silahkan Transfer ke rekening berikut: </p>
<p><strong>BCA: 123-456-789 (a.n Agus Dana)</strong></p>
<p>Setelah Transfer, unggah bukti pembayaran anda.</p>
<a href="{{ route("order.index") }}">Kembali ke Dashboard</a>
@endsection