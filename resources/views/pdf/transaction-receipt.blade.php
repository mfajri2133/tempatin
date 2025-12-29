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
            font-size: 11px;
            color: #1F2937;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
        }

        .header {
            margin-bottom: 40px;
            border-bottom: 1px solid #E5E7EB;
            padding-bottom: 30px;
        }

        .header-top {
            display: table;
            width: 100%;
            margin-bottom: 20px;
        }

        .logo-section {
            display: table-cell;
            width: 50%;
            vertical-align: top;
        }

        .company-name {
            font-size: 32px;
            font-weight: 300;
            color: #111827;
            letter-spacing: -0.5px;
            margin-bottom: 5px;
        }

        .company-tagline {
            font-size: 11px;
            color: #6B7280;
            font-weight: 400;
        }

        .invoice-section {
            display: table-cell;
            width: 50%;
            text-align: right;
            vertical-align: top;
        }

        .invoice-label {
            font-size: 42px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -1px;
            margin-bottom: 5px;
        }

        .invoice-number {
            font-size: 13px;
            color: #4F46E5;
            font-weight: 600;
        }

        .info-grid {
            display: table;
            width: 100%;
            margin-bottom: 40px;
        }

        .info-block {
            display: table-cell;
            width: 33.33%;
            vertical-align: top;
            padding-right: 20px;
        }

        .info-block:last-child {
            padding-right: 0;
        }

        .info-label {
            font-size: 9px;
            color: #9CA3AF;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .info-content {
            font-size: 11px;
            color: #111827;
            line-height: 1.7;
        }

        .info-content strong {
            font-weight: 600;
        }

        .status-pill {
            display: inline-block;
            padding: 4px 12px;
            background: #ECFDF5;
            color: #059669;
            border-radius: 16px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 6px;
        }

        .payment-box {
            background: #F9FAFB;
            border-left: 3px solid #4F46E5;
            padding: 20px 25px;
            margin-bottom: 40px;
        }

        .payment-title {
            font-size: 11px;
            color: #374151;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .payment-details {
            display: table;
            width: 100%;
        }

        .payment-col {
            display: table-cell;
            width: 33.33%;
            font-size: 10px;
        }

        .payment-col .label {
            color: #6B7280;
            margin-bottom: 3px;
        }

        .payment-col .value {
            color: #111827;
            font-weight: 600;
        }

        .table-section {
            margin-bottom: 35px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead tr {
            border-bottom: 2px solid #111827;
        }

        table th {
            padding: 12px 8px;
            text-align: left;
            font-size: 9px;
            color: #6B7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 600;
        }

        table td {
            padding: 20px 8px;
            border-bottom: 1px solid #F3F4F6;
            font-size: 11px;
            vertical-align: top;
        }

        .item-title {
            font-size: 13px;
            color: #111827;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .item-meta {
            font-size: 10px;
            color: #6B7280;
            line-height: 1.7;
        }

        .item-meta-row {
            margin-bottom: 3px;
        }

        .item-badge {
            display: inline-block;
            padding: 2px 8px;
            background: #EEF2FF;
            color: #4338CA;
            border-radius: 10px;
            font-size: 8px;
            font-weight: 600;
            margin-top: 6px;
        }

        .summary {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #E5E7EB;
        }

        .summary-row {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }

        .summary-label {
            display: table-cell;
            text-align: right;
            padding-right: 40px;
            font-size: 11px;
            color: #6B7280;
        }

        .summary-value {
            display: table-cell;
            text-align: right;
            width: 180px;
            font-size: 11px;
            font-weight: 600;
            color: #111827;
        }

        .summary-row.total {
            margin-top: 15px;
            padding-top: 12px;
            border-top: 2px solid #111827;
        }

        .summary-row.total .summary-label {
            font-size: 13px;
            color: #111827;
            font-weight: 600;
        }

        .summary-row.total .summary-value {
            font-size: 16px;
            font-weight: 700;
            color: #111827;
        }

        .qr-section {
            margin-top: 50px;
            padding: 30px;
            background: #FAFAFA;
            border: 1px dashed #D1D5DB;
            text-align: center;
        }

        .qr-title {
            font-size: 12px;
            color: #374151;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .qr-wrapper {
            background: white;
            display: inline-block;
            padding: 15px;
            border: 1px solid #E5E7EB;
        }

        .qr-wrapper img {
            width: 160px;
            height: 160px;
            display: block;
        }

        .qr-note {
            margin-top: 15px;
            font-size: 10px;
            color: #6B7280;
        }

        .footer {
            margin-top: 60px;
            padding-top: 25px;
            border-top: 1px solid #E5E7EB;
            text-align: center;
        }

        .footer-thanks {
            font-size: 12px;
            color: #111827;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .footer-text {
            font-size: 10px;
            color: #6B7280;
            margin-bottom: 5px;
        }

        .footer-meta {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #F3F4F6;
            font-size: 9px;
            color: #9CA3AF;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="header-top">
                <div class="logo-section">
                    <div class="company-name">Venue.</div>
                    <div class="company-tagline">Professional Venue Booking</div>
                </div>
                <div class="invoice-section">
                    <div class="invoice-label">INVOICE</div>
                    <div class="invoice-number">#{{ $order->order_code }}</div>
                </div>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-block">
                <div class="info-label">Billed To</div>
                <div class="info-content">
                    <strong>{{ $order->user->name }}</strong><br>
                    {{ $order->user->email }}
                    @if ($order->user->phone ?? false)
                        <br>{{ $order->user->phone }}
                    @endif
                </div>
            </div>
            <div class="info-block">
                <div class="info-label">Invoice Details</div>
                <div class="info-content">
                    <strong>Invoice:</strong> {{ $order->order_code }}<br>
                    <strong>Booking:</strong> {{ $order->booking->booking_code ?? '-' }}<br>
                    <strong>Date:</strong> {{ $order->created_at->format('d M Y') }}
                </div>
            </div>
            <div class="info-block">
                <div class="info-label">Payment Status</div>
                <div class="info-content">
                    <span class="status-pill">● PAID</span><br>
                    <strong style="font-size: 10px; margin-top: 8px; display: block;">
                        {{ optional($order->payment->paid_at)->format('d M Y, H:i') ?? '-' }}
                    </strong>
                </div>
            </div>
        </div>

        <div class="payment-box">
            <div class="payment-title">Payment Information</div>
            <div class="payment-details">
                <div class="payment-col">
                    <div class="label">Transaction ID</div>
                    <div class="value">{{ $order->payment->external_id ?? '-' }}</div>
                </div>
                <div class="payment-col">
                    <div class="label">Payment Method</div>
                    <div class="value">{{ ucfirst($order->payment->payment_type ?? 'N/A') }}</div>
                </div>
                <div class="payment-col">
                    <div class="label">Payment Date</div>
                    <div class="value">{{ optional($order->payment->paid_at)->format('d M Y') ?? '-' }}</div>
                </div>
            </div>
        </div>

        <div class="table-section">
            <table>
                <thead>
                    <tr>
                        <th style="width: 50%;">Description</th>
                        <th style="text-align: center; width: 12%;">Duration</th>
                        <th style="text-align: right; width: 18%;">Rate</th>
                        <th style="text-align: right; width: 20%;">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="item-title">{{ $order->booking->venue->name ?? '-' }}</div>
                            <div class="item-meta">
                                <div class="item-meta-row">
                                    <strong>Date:</strong>
                                    {{ \Carbon\Carbon::parse($order->booking->booking_date)->format('d F Y') }}
                                </div>
                                <div class="item-meta-row">
                                    <strong>Time:</strong> {{ $order->booking->start_time ?? '-' }} –
                                    {{ $order->booking->end_time ?? '-' }}
                                </div>
                                <div class="item-meta-row">
                                    <strong>Location:</strong> {{ $order->booking->venue->city_name ?? '-' }}
                                </div>
                                @if ($order->booking->venue->category ?? false)
                                    <span class="item-badge">{{ $order->booking->venue->category->name }}</span>
                                @endif
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <strong>{{ $order->booking->total_hours ?? 0 }}</strong> hours
                        </td>
                        <td style="text-align: right;">
                            Rp {{ number_format($order->booking->venue->price_per_hour ?? 0, 0, ',', '.') }}
                        </td>
                        <td style="text-align: right;">
                            <strong>Rp {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="summary">
                <div class="summary-row">
                    <div class="summary-label">Subtotal</div>
                    <div class="summary-value">Rp {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}</div>
                </div>
                <div class="summary-row">
                    <div class="summary-label">Tax & Fees</div>
                    <div class="summary-value">Rp 0</div>
                </div>
                <div class="summary-row total">
                    <div class="summary-label">Total Amount</div>
                    <div class="summary-value">Rp {{ number_format($order->total_amount ?? 0, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>

        @if ($order->booking && $order->booking->qr_img)
            <div class="qr-section">
                <div class="qr-title">Check-In QR Code</div>
                <div class="qr-wrapper">
                    <img src="file://{{ storage_path('app/public/' . $order->booking->qr_img) }}" alt="QR Code">
                </div>
                <p class="qr-note">
                    Present this QR code to venue staff upon arrival for check-in
                </p>
            </div>
        @endif

        <div class="footer">
            <div class="footer-thanks">Thank you for your business</div>
            <p class="footer-text">This is a computer-generated invoice and is valid without signature.</p>
            <p class="footer-text">For any inquiries, please contact our customer service.</p>
            <div class="footer-meta">
                Document generated on {{ now()->format('d F Y, H:i:s') }} WIB
            </div>
        </div>
    </div>
</body>

</html>
