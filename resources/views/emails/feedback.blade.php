<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feedback dari pengguna</title>
</head>
<body>
    <h2>Halo Admin,</h2>
    <p>Ada feedback baru dari pengguna:</p>

    <p><strong>Nama:</strong> {{ $name }}</p>
    <p><strong>Pesan:</strong></p>
    <p>{{ $user_message }}</p>

    <p>Terima kasih.</p>
</body>
</html>