@extends('layout.app')

@section('content')
<h2>Pembayaran {{ strtoupper($ewallet) }}</h2>
<p>Anda akan diarahkan ke halaman Pembayaran {{ strtoupper($ewallet) }}...</p>

<script>
    let paymentUrl = {
        'dana': 'https://link.dana.id/misc/payment',
        'gopay': 'https://gopay.co.id/pay',
        'ovo': 'https://ovo.id/transfer'
    };

    setTimeout(() => {
        window.location.href = paymentUrl['{{ $ewallet }}'];
    }, 3000);
</script>
@endsection