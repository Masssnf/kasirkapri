<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi Kabar Priangan Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* ... Style sama seperti sebelumnya ... */
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

        .header-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            border-bottom: 3px double #333;
            padding-bottom: 15px;
        }

        .logo-wrapper img {
            height: 70px;
            width: auto;
            margin-right: 20px;
        }

        .header-text {
            text-align: left;
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

            {{-- HEADER --}}
            <div class="header-container">
                <div class="logo-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Kabar Priangan">
                </div>
                <div class="header-text">
                    <h1>HARIAN UMUM KABAR PRIANGAN</h1>
                    <p>Jl. Dr. Sukarjo No.70, Tawangsari, Kec, Tawang, Kota Tasikmalaya</p>
                    <p>Telepon : Redaksi 0265-7525756, Iklan/Sirkulasi 0265-335300</p>
                    <p>Email : hukabarpriangan@gmail.com </p>
                    <p style="font-size: 9pt; font-weight: normal;">Dicetak pada: {{ date('d-m-Y H:i') }}</p>
                </div>
            </div>

            {{-- TABEL --}}
            <div>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 20px;">NO</th>
                            <th>NO FAKTUR</th>
                            <th>TGL TRANSAKSI</th>
                            <th>NAMA PEMASANG</th>
                            <th>JENIS IKLAN</th>
                            <th>TGL MUAT</th>
                            {{-- Sesuaikan urutan kolom agar mirip gambar --}}
                            {{-- <th>HARGA</th> --}}
                            <th>NILAI</th>
                            <th>PPN 11%</th>
                            <th>DPP</th>
                            <th>KOMISI (20%)</th>
                            <th>INSENTIF (20%)</th>
                            <th>PEMEROLEH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                            $grand_harga = 0;
                            $grand_nilai = 0;
                            $grand_ppn = 0;
                            $grand_dpp = 0;
                            $grand_komisi = 0;
                            $grand_insentif = 0;
                        @endphp

                        @foreach ($data as $t)
                            @php
                                // 1. NILAI (Total Tagihan dari Database yang sudah include PPN)
                                // Asumsi: totaltagihan_transaksionline adalah angka 300.000
                                $nilai= $t->harga_transaksionline;
                                // $nilai = $t->totaltagihan_transaksionline;
                                // $harga = $t->harga_transaksionline;

                                // 2. DPP (Back Calculation)
                                // Logika Gambar: 300.000 / 1.11 = 269.696,97
                                $dpp = $nilai / 1.11;

                                // 3. PPN
                                // Logika Gambar: 300.000 - 269.696,97 = 30.303,03
                                $ppn = $nilai - $dpp;

                                // 4. KOMISI
                                // Logika Gambar: 20% DARI DPP (Bukan dari Nilai)
                                // 269.696,97 * 0.2 = 53.939,39
                                $komisi = $dpp * 0.2;

                                // 5. INSENTIF
                                // Logika Gambar: 20% DARI (DPP - KOMISI)
                                // (269.696,97 - 53.939,39) * 0.2 = 43.151,52
                                $sisa_untuk_insentif = $dpp - $komisi;
                                $insentif = $sisa_untuk_insentif * 0.2;

                                // --- Akumulasi Grand Total ---
                                // $grand_harga += $harga;
                                $grand_nilai += $nilai;
                                $grand_ppn += $ppn;
                                $grand_dpp += $dpp;
                                $grand_komisi += $komisi;
                                $grand_insentif += $insentif;
                            @endphp

                            <tr>
                                <td class="tengah">{{ $no++ }}</td>
                                <td> {{ $t->nofakturonline }}</td>
                                <td class="tengah">
                                    {{ \Carbon\Carbon::parse($t->tanggal_transaksionline)->format('d/m/Y') }}</td>
                                <td>{{ $t->nama_pemasangonline }}</td>
                                <td class="tengah">{{ $t->iklanonline->jenis_iklanonline ?? '-' }}</td>
                                <td class="tengah">
                                    {{ \Carbon\Carbon::parse($t->tanggal_muatiklanonline)->format('d/m/Y') }}</td>

                                {{-- <td class="kanan">Rp {{ number_format($harga, 0, ',', '.') }}</td> --}}

                                {{-- NILAI --}}
                                <td class="kanan">Rp {{ number_format($nilai, 0, ',', '.') }}</td>

                                {{-- PPN --}}
                                <td class="kanan">Rp {{ number_format($ppn, 0, ',', '.') }}</td>


                                {{-- DPP --}}
                                <td class="kanan">
                                    Rp {{ number_format($dpp, 0, ',', '.') }}
                                </td>

                                {{-- KOMISI --}}
                                <td class="kanan">Rp {{ number_format($komisi, 0, ',', '.') }}</td>

                                {{-- INSENTIF --}}
                                <td class="kanan">Rp {{ number_format($insentif, 0, ',', '.') }}</td>

                                <td class="tengah">{{ $t->sales_iklanonline }}</td>
                            </tr>
                        @endforeach

                        {{-- TOTAL FOOTER --}}
                        <tr style="font-weight: bold; background-color: #f9f9f9;">
                            <td colspan="6" class="kanan">TOTAL KESELURUHAN</td>

                            {{-- <td class="kanan">Rp {{ number_format($grand_harga, 0, ',', '.') }}</td> --}}
                            <td class="kanan">Rp {{ number_format($grand_nilai, 0, ',', '.') }}</td>
                            <td class="kanan">Rp {{ number_format($grand_ppn, 0, ',', '.') }}</td>
                            <td class="kanan">Rp {{ number_format($grand_dpp, 0, ',', '.') }}</td>
                            <td class="kanan">Rp {{ number_format($grand_komisi, 0, ',', '.') }}</td>
                            <td class="kanan" colspan="1">Rp {{ number_format($grand_insentif, 0, ',', '.') }}</td>
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
