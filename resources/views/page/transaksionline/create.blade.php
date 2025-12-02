<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TRANSAKSI IKLAN ONLINE KABAR PRIANGAN') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">

                <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                    FORM INPUT TRANSAKSI IKLAN ONLINE KABAR PRIANGAN
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

                <form class="w-full mx-auto" method="POST" action="{{ route('transaksionline.store') }}">
                    @csrf

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                Faktur</label>
                            <input type="text" name="nofakturonline" value="{{ $nofakturonline ?? 'TRX-ONL-001' }}"
                                readonly
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Transaksi</label>
                            <input type="date" name="tanggal_transaksionline" required value="{{ date('Y-m-d') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pemasang</label>
                            <input type="text" name="nama_pemasangonline" required placeholder="Nama Pemasang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Pemasang</label>
                            <input type="text" name="alamat_pemasangonline" required placeholder="Alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Iklan</label>
                            <select name="id_iklanonline" id="id_iklanonline" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected>Pilih Jenis Iklan...</option>
                                @foreach ($iklanonline as $io)
                                    <option value="{{ $io->id }}" data-harga="{{ $io->harga_iklanonline }}">
                                        {{ $io->jenis_iklanonline }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portal
                                Iklan</label>
                            <select
                                class="js-example-placeholder-single js-states form-control w-full m-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5"
                                name="portal_iklanonline">
                                <option value="">Pilih...</option>
                                <option value="Kabar Tasikmalaya">Kabar Tasikmalaya</option>
                                <option value="Kabar Singaparna">Kabar Singaparna</option>
                                <option value="Kabar Ciamis">Kabar Ciamis</option>
                                <option value="Kabar Banjar">Kabar Banjar</option>
                                <option value="Kabar Pangandaran">Kabar Pangandaran</option>
                                <option value="Kabar Garut">Kabar Garut</option>
                                <option value="Kabar Bandung">Kabar Bandung</option>
                                <option value="Kabar Sumedang">Kabar Sumedang</option>
                            </select>
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Muat</label>
                            <input type="date" name="tanggal_muatiklanonline" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Muat
                                (Kali)</label>
                            <input type="number" id="total_muatiklanonline" name="total_muatiklanonline" value="1"
                                min="1" required oninput="hitungSemua()"
                                class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sales</label>
                            <input type="text" name="sales_iklanonline" required placeholder="Nama Sales"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Satuan
                                (Manual)</label>
                            <input type="text" id="harga_transaksionline" name="harga_transaksionline" required
                                onkeyup="formatInput(this)"
                                class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                placeholder="Input Harga..." />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon
                                (Rp)</label>
                            <input type="text" id="diskon_transaksionline" name="diskon_transaksionline"
                                value="0" required onkeyup="formatInput(this)"
                                class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insentif
                                (20%)</label>
                            <input type="text" id="insentif_transaksionline" name="insentif_transaksionline"
                                readonly value="0"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komisi
                                (20%)</label>
                            <input type="text" id="komisi_transaksionline" name="komisi_transaksionline" readonly
                                value="0"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PPN
                                (11%)</label>
                            <input type="text" id="ppn_transaksionline" name="ppn_transaksionline" readonly
                                value="0"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                Tagihan</label>
                            <input type="text" id="totaltagihan_transaksionline"
                                name="totaltagihan_transaksionline" readonly value="0"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                                Dibayar</label>
                            <input type="text" id="jumlahbayar_transaksionline" name="jumlahbayar_transaksionline"
                                value="0" required onkeyup="formatInput(this)"
                                class="bg-white border border-blue-500 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisa
                                Piutang</label>
                            <input type="text" id="piutang_transaksionline" name="piutang_transaksionline"
                                readonly value="0"
                                class="bg-red-100 border border-red-300 text-red-700 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <a href="{{ route('transaksionline.index') }}"
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
        // 1. Helper Format Rupiah
        function formatRupiah(angka) {
            if (!angka) return '0';
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        // 2. Helper Bersihkan Titik
        function cleanNumber(rupiah) {
            if (!rupiah) return 0;
            return parseFloat(rupiah.toString().replace(/[^0-9]/g, '')) || 0;
        }

        // 3. Trigger Input
        function formatInput(input) {
            let val = cleanNumber(input.value);
            input.value = formatRupiah(val);
            hitungSemua();
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Ambil Element (Sesuai ID Baru)
            const selectJenis = document.getElementById('id_iklanonline');

            const inputTotalMuat = document.getElementById('total_muatiklanonline');
            const inputHarga = document.getElementById('harga_transaksionline');
            const inputDiskon = document.getElementById('diskon_transaksionline');
            const inputBayar = document.getElementById('jumlahbayar_transaksionline');

            const inputInsentif = document.getElementById('insentif_transaksionline');
            const inputKomisi = document.getElementById('komisi_transaksionline');
            const inputPPN = document.getElementById('ppn_transaksionline');
            const inputTotal = document.getElementById('totaltagihan_transaksionline');
            const inputPiutang = document.getElementById('piutang_transaksionline');

            // Event: Pilih Jenis Iklan (Autofill Harga)
            selectJenis.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const hargaDb = parseFloat(selectedOption.dataset.harga) || 0;

                inputHarga.value = formatRupiah(hargaDb);
                hitungSemua();
            });

            // LOGIKA HITUNGAN UTAMA
            window.hitungSemua = function() {
                // 1. Ambil Angka Bersih
                const harga = cleanNumber(inputHarga.value);
                const diskon = cleanNumber(inputDiskon.value);
                const bayar = cleanNumber(inputBayar.value);
                let qty = parseFloat(inputTotalMuat.value) || 1;

                // 2. Hitung Total Omset (Harga x Qty)
                const totalOmset = harga * qty;

                // 3. Hitung Insentif & Komisi (20% dari Total Omset)
                const insentif = totalOmset * 0.20;
                const komisi = totalOmset * 0.20;

                // 4. Hitung Dasar (Total Omset - Diskon)
                let subtotal = totalOmset - diskon;
                if (subtotal < 0) subtotal = 0;

                // 5. Hitung PPN (11% dari Subtotal)
                const ppn = subtotal * 0.11;

                // 6. Total Tagihan
                const totalTagihan = subtotal + ppn;

                // 7. Piutang
                let piutang = totalTagihan - bayar;
                if (piutang < 0) piutang = 0;

                // 8. Tampilkan Hasil (Format Rupiah)
                inputInsentif.value = formatRupiah(Math.round(insentif));
                inputKomisi.value = formatRupiah(Math.round(komisi));
                inputPPN.value = formatRupiah(Math.round(ppn));
                inputTotal.value = formatRupiah(Math.round(totalTagihan));
                inputPiutang.value = formatRupiah(Math.round(piutang));
            }
        });
    </script>
</x-app-layout>
