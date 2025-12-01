<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Priangan TV</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 10pt "Tahoma";
            /* Font diperkecil sedikit agar muat */
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .page {
            width: 297mm;
            /* A4 Landscape */
            min-height: 210mm;
            padding: 10mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9pt;
            /* Ukuran font tabel */
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            vertical-align: top;
        }

        th {
            background-color: #f0f0f0;
            text-align: center;
            font-weight: bold;
        }

        .tengah {
            text-align: center;
        }

        .kanan {
            text-align: right;
        }

        /* Header Laporan */
        .header-laporan {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-laporan h1 {
            font-size: 16pt;
            font-weight: bold;
            margin: 0;
        }

        .header-laporan p {
            margin: 2px 0;
        }

        @page {
            size: A4 landscape;
            margin: 0;
        }

        @media print {

            html,
            body {
                width: 297mm;
                height: 210mm;
                background-color: white;
            }

            .page {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: initial;
                box-shadow: initial;
                background: initial;
                padding: 10mm;
            }
        }
    </style>
</head>

<body>
    <div class="book">
        <div class="page">

            <div class="header-laporan">
                <h1>PRIANGAN TV</h1>
                <p>LAPORAN DATA TRANSAKSI IKLAN</p>
                <p style="font-size: 9pt;">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
            </div>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 30px;">NO</th>
                            <th>NO FAKTUR</th>
                            <th>TGL TRANSAKSI</th>
                            <th>PEMASANG</th>
                            <th>ALAMAT</th>
                            <th>JENIS IKLAN</th>
                            <th>TGL MUAT</th>
                            <th>SALES</th>
                            <th>HARGA</th>
                            <th>DIBAYAR</th>
                            <th>PIUTANG</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $total_pendapatan = 0;
                            $total_piutang = 0;
                        @endphp

                        @foreach ($data as $t)
                            @php
                                $total_pendapatan += $t->jumlahbayar_transaksipriangan;
                                $total_piutang += $t->piutang_transaksipriangan;
                            @endphp
                            <tr>
                                <td class="tengah">{{ $no++ }}</td>
                                <td class="tengah">{{ $t->nofakturpriangan }}</td>
                                <td class="tengah">
                                    {{ \Carbon\Carbon::parse($t->tanggal_transaksipriangan)->format('d/m/Y') }}</td>
                                <td>{{ $t->nama_pemasangpriangan }}</td>
                                <td>{{ Str::limit($t->alamat_pemasangpriangan, 20) }}</td>
                                <td class="tengah">{{ $t->iklanpriangan->jenis_iklanpriangan ?? '-' }}</td>
                                <td class="tengah">
                                    {{ \Carbon\Carbon::parse($t->tanggal_muatiklanpriangan)->format('d/m/Y') }}</td>
                                <td>{{ $t->sales_iklanpriangan }}</td>

                                <td class="kanan">Rp {{ number_format($t->harga_transaksipriangan, 0, ',', '.') }}</td>
                                <td class="kanan">Rp
                                    {{ number_format($t->jumlahbayar_transaksipriangan, 0, ',', '.') }}</td>
                                <td class="kanan text-red-600">Rp
                                    {{ number_format($t->piutang_transaksipriangan, 0, ',', '.') }}</td>

                                <td class="tengah">
                                    @if ($t->piutang_transaksipriangan > 0)
                                        <span style="color: red; font-weight: bold;">BELUM</span>
                                    @else
                                        <span style="color: green; font-weight: bold;">LUNAS</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        <tr style="font-weight: bold; background-color: #f9f9f9;">
                            <td colspan="9" class="kanan">TOTAL PENDAPATAN (Uang Masuk)</td>
                            <td class="kanan">Rp {{ number_format($total_pendapatan, 0, ',', '.') }}</td>
                            <td class="kanan" style="color: red;">Rp {{ number_format($total_piutang, 0, ',', '.') }}
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 30px; display: flex; justify-content: flex-end;">
                <div style="text-align: center; width: 200px;">
                    <p>Tasikmalaya, {{ date('d F Y') }}</p>
                    <br><br><br>
                    <p style="font-weight: bold; text-decoration: underline;">Bagian Keuangan</p>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Otomatis print saat dibuka
        window.print();
    </script>
</body>

</html>
