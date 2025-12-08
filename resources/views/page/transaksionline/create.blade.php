<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TRANSAKSI KABAR PRIANGAN ONLINE') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-6">

                <div class="border-b pb-4 mb-6">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white uppercase">Form Input Transaksi Online
                    </h3>
                    <p class="text-sm text-gray-500">Silakan isi data transaksi dengan lengkap dan benar.</p>
                </div>

                @if ($errors->any())
                    <div class="p-4 mb-6 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 border border-red-200"
                        role="alert">
                        <strong class="font-bold block mb-1">Terjadi Kesalahan!</strong>
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="space-y-6 bg-" method="POST" action="{{ route('transaksionline.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">No
                                    Faktur</label>
                                <input type="text" name="nofakturonline"
                                    value="{{ $nofakturonline ?? 'TRX-ONL-001' }}" readonly
                                    class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Nama
                                    Pemasang</label>
                                <input type="text" name="nama_pemasangonline" required placeholder="Nama Pemasang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Nama
                                    Sales</label>
                                <input type="text" name="sales_iklanonline" required placeholder="Nama Sales"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Tanggal
                                    Transaksi</label>
                                <input type="date" name="tanggal_transaksionline" required
                                    value="{{ date('Y-m-d') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Alamat
                                    Pemasang</label>
                                <textarea name="alamat_pemasangonline" rows="5" required placeholder="Alamat lengkap..."
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Jenis
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

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Portal
                                Iklan</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                name="portal_iklanonline">
                                <option value="">Pilih Portal...</option>
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

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Tanggal
                                Muat</label>
                            <input type="date" name="tanggal_muatiklanonline" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div>
                            <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Total Muat
                                (Kali)</label>
                            <input type="number" id="total_muatiklanonline" name="total_muatiklanonline" value="1"
                                min="1" required oninput="hitungSemua()"
                                class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <hr class="border-gray-200">

                    <div class="p-4 bg-blue-50 rounded-lg border border-blue-100">
                        <h4 class="font-bold text-blue-800 mb-4">Rincian Pembayaran</h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Harga
                                    Satuan (Manual)</label>
                                <input type="text" id="harga_transaksionline" name="harga_transaksionline" required
                                    onkeyup="formatInput(this)"
                                    class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                                    placeholder="Input Harga..." />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Diskon
                                    (Rp)</label>
                                <input type="text" id="diskon_transaksionline" name="diskon_transaksionline"
                                    value="0" required onkeyup="formatInput(this)"
                                    class="bg-white border border-blue-500 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                            </div>

                            <div>
                                <label class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Jumlah
                                    Dibayar (DP)</label>
                                <input type="text" id="jumlahbayar_transaksionline"
                                    name="jumlahbayar_transaksionline" value="0" required
                                    onkeyup="formatInput(this)"
                                    class="bg-white border border-green-500 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-xs">
                        <div>
                            <label class="block mb-1 font-medium text-gray-500">Insentif (20%)</label>
                            <input type="text" id="insentif_transaksionline" name="insentif_transaksionline"
                                readonly value="0"
                                class="bg-gray-100 border border-gray-200 text-gray-700 text-sm rounded block w-full p-2" />
                        </div>
                        <div>
                            <label class="block mb-1 font-medium text-gray-500">Komisi (20%)</label>
                            <input type="text" id="komisi_transaksionline" name="komisi_transaksionline" readonly
                                value="0"
                                class="bg-gray-100 border border-gray-200 text-gray-700 text-sm rounded block w-full p-2" />
                        </div>
                        <div>
                            <label class="block mb-1 font-medium text-gray-500">PPN (11%)</label>
                            <input type="text" id="ppn_transaksionline" name="ppn_transaksionline" readonly
                                value="0"
                                class="bg-gray-100 border border-gray-200 text-gray-700 text-sm rounded block w-full p-2" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4">
                        <div>
                            <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">TOTAL
                                TAGIHAN</label>
                            <input type="text" id="totaltagihan_transaksionline"
                                name="totaltagihan_transaksionline" readonly value="0"
                                class="bg-gray-800 text-white text-2xl font-bold rounded-lg block w-full p-4 text-right" />
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-bold text-red-600 dark:text-white">SISA
                                PIUTANG</label>
                            <input type="text" id="piutang_transaksionline" name="piutang_transaksionline"
                                readonly value="0"
                                class="bg-red-100 text-red-600 border border-red-300 text-2xl font-bold rounded-lg block w-full p-4 text-right" />
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-6 border-t mt-6">
                        <a href="{{ route('transaksionline.index') }}"
                            class="text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-8 py-2.5 text-center">
                            Batal
                        </a>
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center shadow-lg">
                            Simpan Transaksi
                        </button>
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
            // Ambil Element
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
                const harga = cleanNumber(inputHarga.value);
                const diskon = cleanNumber(inputDiskon.value);
                const bayar = cleanNumber(inputBayar.value);
                let qty = parseFloat(inputTotalMuat.value) || 1;

                // Hitung
                const totalOmset = harga * qty;
                const insentif = totalOmset * 0.20;
                const komisi = totalOmset * 0.20;

                let subtotal = totalOmset - diskon;
                if (subtotal < 0) subtotal = 0;

                const ppn = subtotal * 0.11;
                const totalTagihan = subtotal + ppn;

                let piutang = totalTagihan - bayar;
                if (piutang < 0) piutang = 0;

                // Tampilkan
                inputInsentif.value = formatRupiah(Math.round(insentif));
                inputKomisi.value = formatRupiah(Math.round(komisi));
                inputPPN.value = formatRupiah(Math.round(ppn));
                inputTotal.value = formatRupiah(Math.round(totalTagihan));
                inputPiutang.value = formatRupiah(Math.round(piutang));
            }
        });
    </script>
</x-app-layout>
