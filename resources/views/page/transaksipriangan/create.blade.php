<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TRANSAKSI PRIANGAN TV') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                    FORM INPUT TRANSAKSI PRIANGAN TV
                </div>
                @if ($errors->any())
                    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                        role="alert">
                        <span class="font-medium">Ada kesalahan!</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="w-full mx-auto" method="POST" action="{{ route('transaksipriangan.store') }}">
                    @csrf

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label for="nofakturpriangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kode Paket
                            </label>
                            <input type="text" id="nofakturpriangan" name="nofakturpriangan" value="{{ $nofakturpriangan }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kode Paket" readonly required />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Transaksi</label>
                            <input type="date" name="tanggal_transaksipriangan" required value="{{ date('Y-m-d') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pemasang</label>
                            <input type="text" name="nama_pemasangpriangan" required placeholder="Nama Pemasang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Pemasang</label>
                            <input type="text" name="alamat_pemasangpriangan" required placeholder="Alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Iklan</label>
                            <select name="id_iklanpriangan" id="id_iklanpriangan" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected>Pilih Jenis Iklan...</option>
                                @foreach ($iklanpriangan as $ip)
                                    <option value="{{ $ip->id }}">{{ $ip->jenis_iklanpriangan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Muat</label>
                            <input type="date" name="tanggal_muatiklanpriangan" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                (Manual)</label>
                            <input type="text" id="harga_transaksipriangan" name="harga_transaksipriangan" required
                                onkeyup="formatInput(this)"
                                class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Input Harga..." />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                Bayar</label>
                            <input type="text" id="jumlahbayar_transaksipriangan"
                                name="jumlahbayar_transaksipriangan" required onkeyup="formatInput(this)"
                                class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Input Bayar..." />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisa
                                Piutang</label>
                            <input type="text" id="piutang_transaksipriangan" name="piutang_transaksipriangan"
                                readonly value="0"
                                class="bg-red-100 border border-red-300 text-red-700 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <a href="{{ route('transaksipriangan.index') }}"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center">Batal</a>
                        <button type="submit"
                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-12 py-2.5 text-center">Simpan
                            Transaksi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // 1. Helper Format Rupiah (10000 -> 10.000)
        function formatRupiah(angka) {
            if (!angka) return '0';
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        // 2. Helper Bersihkan Titik (10.000 -> 10000)
        function cleanNumber(rupiah) {
            if (!rupiah) return 0;
            return parseFloat(rupiah.toString().replace(/[^0-9]/g, '')) || 0;
        }

        // 3. Fungsi Trigger saat user mengetik
        function formatInput(input) {
            let val = cleanNumber(input.value);
            input.value = formatRupiah(val);

            // Panggil fungsi hitung setiap kali user mengetik di Harga atau Bayar
            hitungPiutang();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const inputHarga = document.getElementById('harga_transaksipriangan');
            const inputBayar = document.getElementById('jumlahbayar_transaksipriangan');
            const inputPiutang = document.getElementById('piutang_transaksipriangan');

            // Fungsi Hitung Piutang Global
            window.hitungPiutang = function() {
                // Ambil angka bersih dari input Harga dan Bayar
                const harga = cleanNumber(inputHarga.value);
                const bayar = cleanNumber(inputBayar.value);

                // Rumus: Harga - Bayar
                let sisa = harga - bayar;

                // Jika bayar lebih besar (kembalian), piutang 0
                if (sisa < 0) sisa = 0;

                // Tampilkan hasil di kolom Piutang
                inputPiutang.value = formatRupiah(sisa);
            }
        });
    </script>
</x-app-layout>
