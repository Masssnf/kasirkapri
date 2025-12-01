<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Faktur - {{ $transaksi->nofakturpriangan }}</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            /* Font struk */
            padding: 20px;
            font-size: 14px;
            color: #000;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        .header {
            text-align: center;
            border-bottom: 2px dashed #333;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .header p {
            margin: 2px 0;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 130px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f0f0f0;
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .font-bold {
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            text-align: center;
        }

        .signature-box {
            width: 200px;
            margin-top: 50px;
            border-top: 1px solid #000;
        }

        /* Tombol print hanya muncul di layar, hilang saat diprint */
        @media print {
            .no-print {
                display: none;
            }

            .container {
                border: none;
            }
        }
    </style>
</head>

<body onload="window.print()">

    <div class="no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()"
            style="padding: 10px 20px; cursor: pointer; background: #007bff; color: white; border: none; border-radius: 5px;">
            Cetak Dokumen
        </button>
    </div>

    <div class="container">
        <div class="header">
            <h1>PRIANGAN TV</h1>
            <p>Jl. Dr. Sukarjo No.70, Tawangsari, Kec. Tawang,</p>
            <p>Kota Tasikmalaya, Jawa Barat 46112</p>
            <p>Telp: (0265) 123456 | Email: admin@priangantv.com</p>
        </div>

        <table class="info-table">
            <tr>
                <td class="label">No Faktur</td>
                <td>: {{ $transaksi->nofakturpriangan }}</td>
                <td class="label">Tgl Transaksi</td>
                <td>: {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksipriangan)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td class="label">Pemasang</td>
                <td>: {{ $transaksi->nama_pemasangpriangan }}</td>
                <td class="label">Sales</td>
                <td>: {{ $transaksi->sales_iklanpriangan ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td colspan="3">: {{ $transaksi->alamat_pemasangpriangan }}</td>
            </tr>
        </table>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th style="width: 5%;">No</th>
                    <th>Keterangan</th>
                    <th style="width: 25%;">Harga (Rp)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td>
                    <td>
                        <strong>{{ $transaksi->iklanpriangan->jenis_iklanpriangan ?? 'Iklan Umum' }}</strong><br>
                        <small>Tanggal Muat:
                            {{ \Carbon\Carbon::parse($transaksi->tanggal_muatiklanpriangan)->format('d-m-Y') }}</small>
                    </td>
                    <td class="text-right">{{ number_format($transaksi->harga_transaksipriangan, 0, ',', '.') }}</td>
                </tr>

                <tr style="background-color: #fafafa;">
                    <td colspan="2" class="text-right font-bold">TOTAL TAGIHAN</td>
                    <td class="text-right font-bold">
                        {{ number_format($transaksi->harga_transaksipriangan, 0, ',', '.') }}</td>
                </tr>

                <tr>
                    <td colspan="2" class="text-right">Dibayar / DP</td>
                    <td class="text-right">{{ number_format($transaksi->jumlahbayar_transaksipriangan, 0, ',', '.') }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2" class="text-right font-bold">SISA PIUTANG</td>
                    <td class="text-right font-bold"
                        style="color: {{ $transaksi->piutang_transaksipriangan > 0 ? 'red' : 'green' }};">
                        {{ number_format($transaksi->piutang_transaksipriangan, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 15px;">
            Status Pembayaran:
            @if ($transaksi->piutang_transaksipriangan <= 0)
                <span style="border: 2px solid green; color: green; padding: 2px 10px; font-weight: bold;">LUNAS</span>
            @else
                <span style="border: 2px solid red; color: red; padding: 2px 10px; font-weight: bold;">BELUM
                    LUNAS</span>
            @endif
        </div>

        <div class="footer">
            <div>
                <p>Penerima,</p>
                <div class="signature-box">{{ $transaksi->nama_pemasangpriangan }}</div>
            </div>
            <div>
                <p>Hormat Kami,</p>
                <div class="signature-box">Admin Keuangan</div>
            </div>
        </div>
    </div>

</body>

</html>
