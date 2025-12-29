<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $order->order_code }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 3px solid #4F46E5;
            padding-bottom: 20px;
        }

        .header h1 {
            font-size: 28px;
            color: #4F46E5;
            margin-bottom: 5px;
        }

        .header p {
            color: #666;
            font-size: 14px;
        }

        .invoice-info {
            display: table;
            width: 100%;
            margin-bottom: 30px;
        }

        .invoice-info .left,
        .invoice-info .right {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }

        .invoice-info .right {
            text-align: right;
        }

        .invoice-info h3 {
            font-size: 14px;
            color: #4F46E5;
            margin-bottom: 10px;
        }

        .invoice-info p {
            margin-bottom: 5px;
            font-size: 12px;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            background-color: #10B981;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            font-size: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        table thead {
            background-color: #F3F4F6;
        }

        table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
            font-size: 11px;
            color: #374151;
            border-bottom: 2px solid #D1D5DB;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 11px;
        }

        .total-section {
            margin-top: 30px;
            text-align: right;
        }

        .total-row {
            margin-bottom: 10px;
            font-size: 13px;
        }

        .total-row span {
            display: inline-block;
            width: 150px;
        }

        .total-row.grand-total {
            font-size: 16px;
            font-weight: bold;
            color: #4F46E5;
            border-top: 2px solid #4F46E5;
            padding-top: 10px;
            margin-top: 10px;
        }

        /* ===== QR SECTION ===== */
        .qr-section {
            margin-top: 40px;
            text-align: center;
        }

        .qr-section img {
            width: 160px;
            height: 160px;
            margin-bottom: 10px;
        }

        .qr-section p {
            font-size: 11px;
            color: #374151;
        }

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
            text-align: center;
            font-size: 10px;
            color: #6B7280;
        }

        .payment-info {
            background-color: #F9FAFB;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .payment-info h3 {
            font-size: 12px;
            color: #374151;
            margin-bottom: 10px;
        }

        .payment-info p {
            font-size: 11px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>INVOICE</h1>
            <p>Bukti Pembayaran Booking Venue</p>
        </div>

        <div class="invoice-info">
            <div class="left">
                <h3>Informasi Customer</h3>
                <p><strong>{{ $order->user->name }}</strong></p>
                <p>{{ $order->user->email }}</p>
                @if ($order->user->phone)
                    <p>{{ $order->user->phone }}</p>
                @endif
            </div>
            <div class="right">
                <h3>Detail Invoice</h3>
                <p><strong>Invoice:</strong> {{ $order->order_code }}</p>
                <p><strong>Tanggal:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                <p><strong>Status:</strong> <span class="status-badge">PAID</span></p>
            </div>
        </div>

        <div class="payment-info">
            <h3>Informasi Pembayaran</h3>
            <p><strong>Transaction ID:</strong> {{ $order->payment->external_id }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ ucfirst($order->payment->payment_status) }}</p>
            <p><strong>Tanggal Pembayaran:</strong> {{ $order->payment->paid_at->format('d M Y, H:i') }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th style="text-align: center;">Durasi</th>
                    <th style="text-align: right;">Harga/Jam</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <strong>{{ $order->booking->venue->name }}</strong><br>
                        <small>
                            Tanggal: {{ \Carbon\Carbon::parse($order->booking->booking_date)->format('d M Y') }}<br>
                            Jam: {{ $order->booking->start_time }} - {{ $order->booking->end_time }}
                        </small>
                    </td>
                    <td style="text-align: center;">
                        {{ $order->booking->total_hours }} jam
                    </td>
                    <td style="text-align: right;">
                        Rp {{ number_format($order->booking->venue->price_per_hour, 0, ',', '.') }}
                    </td>
                    <td style="text-align: right;">
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="total-section">
            <div class="total-row">
                <span>Subtotal:</span>
                <strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong>
            </div>
            <div class="total-row grand-total">
                <span>Total Pembayaran:</span>
                <strong>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</strong>
            </div>
        </div>

        @if ($order->booking && $order->booking->qr_img)
            <div class="qr-section">
                <img src="file://{{ storage_path('app/public/' . $order->booking->qr_img) }}" alt="QR Booking">
                <p>Tunjukkan QR ini saat check-in venue</p>
            </div>
        @endif

        <div class="footer">
            <p>Invoice ini dibuat secara otomatis oleh sistem.</p>
            <p>Terima kasih telah menggunakan layanan kami!</p>
            <p style="margin-top: 10px;">
                Dicetak pada: {{ now()->format('d M Y, H:i') }}
            </p>
        </div>
    </div>
</body>

</html>
