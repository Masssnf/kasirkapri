<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Kabar Priangan Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 9pt "Tahoma";
        }

        * {
            box-sizing: border-box;
        }

        .page {
            width: 297mm;
            /* A4 Landscape */
            min-height: 210mm;
            padding: 10mm;
            margin: 10mm auto;
            border: 1px #D3D3D3 solid;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 8pt;
        }

        th,
        td {
            border: 1px solid black;
            padding: 4px;
            vertical-align: middle;
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

        /* --- GAYA BARU UNTUK HEADER DENGAN LOGO --- */
        .header-container {
            display: flex;
            align-items: center;
            /* Posisi vertikal sejajar tengah */
            justify-content: center;
            /* Posisi horizontal di tengah halaman */
            margin-bottom: 20px;
            border-bottom: 3px double #333;
            /* Garis pemisah di bawah kop */
            padding-bottom: 15px;
        }

        .logo-wrapper img {
            height: 70px;
            /* ATUR TINGGI LOGO DI SINI */
            width: auto;
            /* Lebar menyesuaikan proporsi */
            margin-right: 20px;
            /* Jarak antara logo dan teks */
        }

        .header-text {
            text-align: left;
            /* Teks rata kiri terhadap logo */
            color: #333;
        }

        .header-text h1 {
            font-size: 18pt;
            font-weight: bold;
            margin: 0;
            text-transform: uppercase;
        }

        .header-text p {
            margin: 2px 0;
            font-size: 10pt;
            font-weight: bold;
        }

        /* ---------------------------------------- */


        @media print {

            html,
            body {
                width: 297mm;
                height: 210mm;
                background-color: white;
            }

            .page {
                margin: 0;
                border: none;
                box-shadow: none;
                padding: 5mm;
            }
        }
    </style>
</head>

<body>
    <div class="book">
        <div class="page">

            <div class="header-container">
                <div class="logo-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kabar Priangan">
                </div>

                <div class="header-text">
                    <h1>HARIAN UMUM KABAR PRIANGAN</h1>
                    <p>Jl. Raya Priangan No. 123, Jawa Barat, Indonesia</p>
                    <p>Telp: (021) 123-4567 | Email: finance@priangantv.com</p>
                    <p style="font-size: 9pt; font-weight: normal;">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
                </div>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 20px;">NO</th>
                            <th>NO FAKTUR</th>
                            <th>TGL TRANSAKSI</th>
                            <th>PEMASANG</th>
                            <th>JENIS IKLAN</th>
                            <th>TGL MUAT</th>
                            <th>JML MUAT</th>
                            <th>HARGA</th>
                            <th>OMSET (Harga x Qty)</th>
                            <th>PPN</th>
                            <th>KOMISI</th>
                            <th>INSENTIF</th>
                            <th>SALES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            // Inisialisasi Variabel Penampung Total
                            $grand_harga = 0;
                            $grand_omset = 0;
                            $grand_ppn = 0;
                            $grand_komisi = 0;
                            $grand_insentif = 0;
                        @endphp

                        @foreach ($data as $t)
                            @php
                                // Hitung Qty & Omset
                                $qty = $t->total_muatiklanonline > 0 ? $t->total_muatiklanonline : 1;
                                $omset = $t->harga_transaksionline * $qty;

                                // Akumulasi ke Grand Total
                                $grand_harga += $t->harga_transaksionline;
                                $grand_omset += $omset;
                                $grand_ppn += $t->ppn_transaksionline;
                                $grand_komisi += $t->komisi_transaksionline;
                                $grand_insentif += $t->insentif_transaksionline;
                            @endphp

                            <tr>
                                <td class="tengah">{{ $no++ }}</td>
                                <td class="tengah">{{ $t->nofakturonline }}</td>
                                <td class="tengah">
                                    {{ \Carbon\Carbon::parse($t->tanggal_transaksionline)->format('d/m/Y') }}</td>
                                <td>{{ $t->nama_pemasangonline }}</td>
                                <td class="tengah">{{ $t->iklanonline->jenis_iklanonline ?? '-' }}</td>
                                <td class="tengah">
                                    {{ \Carbon\Carbon::parse($t->tanggal_muatiklanonline)->format('d/m/Y') }}</td>
                                <td class="tengah">{{ $qty }}</td>

                                <td class="kanan">Rp {{ number_format($t->harga_transaksionline, 0, ',', '.') }}</td>

                                <td class="kanan">Rp {{ number_format($omset, 0, ',', '.') }}</td>

                                <td class="kanan">Rp {{ number_format($t->ppn_transaksionline, 0, ',', '.') }}</td>
                                <td class="kanan">Rp {{ number_format($t->komisi_transaksionline, 0, ',', '.') }}</td>
                                <td class="kanan">Rp {{ number_format($t->insentif_transaksionline, 0, ',', '.') }}
                                </td>
                                <td class="tengah">{{ $t->sales_iklanonline }}</td>
                            </tr>
                        @endforeach

                        <tr style="font-weight: bold; background-color: #f9f9f9;">
                            <td colspan="7" class="kanan">TOTAL KESELURUHAN</td>

                            <td class="kanan">Rp {{ number_format($grand_harga, 0, ',', '.') }}</td>

                            <td class="kanan">Rp {{ number_format($grand_omset, 0, ',', '.') }}</td>

                            <td class="kanan">Rp {{ number_format($grand_ppn, 0, ',', '.') }}</td>
                            <td class="kanan">Rp {{ number_format($grand_komisi, 0, ',', '.') }}</td>
                            <td class="kanan">Rp {{ number_format($grand_insentif, 0, ',', '.') }}</td>
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
        window.print();
    </script>
</body>

</html>
