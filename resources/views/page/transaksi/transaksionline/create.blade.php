<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('TRANSAKSI ONLINE') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                <div class="p-4 bg-gray-100 mb-6 rounded-xl font-bold">
                    FORM INPUT TRANSAKSI ONLINE
                </div>

                <form class="w-full mx-auto" method="POST" action="{{ route('transaksiiklanonline.store') }}">
                    @csrf

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                                Faktur</label>
                            <input type="text" name="nofakturonline" value="{{ $nofakturonline ?? 'TRX-001' }}"
                                readonly
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Transaksi</label>
                            <input type="date" name="tgltransaksionline" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pemasang</label>
                            <input type="text" name="namapemasang" required placeholder="Nama Pemasang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                Pemasang</label>
                            <input type="text" name="alamatpemasang" required placeholder="Alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp</label>
                            <input type="text" name="notelppemasang" required placeholder="08..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                Iklan</label>
                            <select name="id_iklanonline" id="id_kode_iklan" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="" disabled selected>Pilih Kode Paket...</option>

                                @foreach ($iklanonline as $i)
                                    <option value="{{ $i->id }}" data-jenis="{{ $i->jenis_iklanonline }}"
                                        data-type="{{ $i->type_iklanonline ?? '-' }}"
                                        data-portal="{{ $i->portal_iklanonline ?? '-' }}"
                                        data-harga="{{ $i->harga_iklanonline }}">
                                        {{ $i->kode_iklanonline }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Iklan</label>
                            <input type="text" id="auto_jenis" readonly placeholder="Otomatis..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                                Iklan</label>
                            <input type="text" id="auto_type" readonly placeholder="Otomatis..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portal
                                Iklan</label>
                            <input type="text" id="auto_portal" readonly placeholder="Otomatis..."
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Muat</label>
                            <input type="date" name="tglmuat" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">
                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Sales</label>
                            <input type="text" name="namasales" required placeholder="Nama Sales"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga
                                Satuan</label>
                            <input type="text" id="auto_harga" readonly placeholder="Rp 0"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Intensif
                                (Kali)</label>
                            <input type="number" id="intensif" name="intensif" value="1" min="1" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon
                                (Rp)</label>
                            <input type="text" id="diskon" name="diskon" value="0" required
                                onkeyup="formatInput(this)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex gap-5">

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PPN
                                (11%)</label>
                            <input type="text" id="pajak" name="pajak" readonly value="0"
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 font-medium" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total
                                Tagihan</label>
                            <input type="text" id="jumlahbayar" name="jumlahbayar" readonly
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dibayar /
                                DP</label>
                            <input type="text" id="dibayar" name="dibayar" value="0" required
                                onkeyup="formatInput(this)"
                                class="bg-white border border-blue-500 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5"
                                placeholder="Rp..." />
                        </div>

                        <div class="mb-5 w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sisa
                                Piutang</label>
                            <input type="text" id="piutang" name="piutang" value="0" readonly
                                class="bg-red-100 border border-red-300 text-red-700 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="flex justify-between mt-5">
                        <a
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
        // --- FUNGSI HELPER FORMATTER ---

        // 1. Mengubah angka biasa ke format Rupiah (10000 -> 10.000)
        function formatRupiah(angka) {
            if (!angka) return '0';
            return new Intl.NumberFormat('id-ID').format(angka);
        }

        // 2. Membersihkan titik agar bisa dihitung matematika (10.000 -> 10000)
        function cleanNumber(rupiah) {
            if (!rupiah) return 0;
            // Hapus semua karakter selain angka (termasuk titik dan Rp)
            return parseFloat(rupiah.toString().replace(/[^0-9]/g, '')) || 0;
        }

        // 3. Dipanggil via onkeyup di HTML agar saat ngetik langsung ada titiknya
        function formatInput(input) {
            // Ambil value asli, bersihkan, lalu format ulang
            let val = cleanNumber(input.value);
            input.value = formatRupiah(val);

            // Panggil hitungSemua agar kalkulasi berjalan
            // Kita butuh akses ke fungsi hitungSemua, maka logic utama kita taruh luar atau global event
            input.dispatchEvent(new Event('input_calculate'));
        }

        // --- LOGIKA UTAMA ---
        document.addEventListener('DOMContentLoaded', function() {

            const selectKode = document.getElementById('id_kode_iklan');

            const inputJenis = document.getElementById('auto_jenis');
            const inputType = document.getElementById('auto_type');
            const inputPortal = document.getElementById('auto_portal');
            const inputHarga = document.getElementById('auto_harga');

            const inputIntensif = document.getElementById('intensif');
            const inputDiskon = document.getElementById('diskon');

            const inputPajak = document.getElementById('pajak');
            const inputTotal = document.getElementById('jumlahbayar');
            const inputDibayar = document.getElementById('dibayar');
            const inputPiutang = document.getElementById('piutang');

            // --- Event Listener Custom untuk memicu hitungan dari formatInput ---
            document.addEventListener('input', function(e) {
                if (e.target.classList.contains('hitung-trigger')) {
                    hitungSemua();
                }
            });

            // Event Autofill Iklan
            selectKode.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];

                inputJenis.value = selectedOption.dataset.jenis;
                inputType.value = selectedOption.dataset.type;
                inputPortal.value = selectedOption.dataset.portal;

                // Format harga dari database (misal: 1000000 jadi 1.000.000)
                let hargaDb = parseFloat(selectedOption.dataset.harga);
                inputHarga.value = formatRupiah(hargaDb);

                hitungSemua();
            });

            // Event Trigger Hitungan
            // Kita pakai 'input' biasa untuk intensif (karena number)
            inputIntensif.addEventListener('input', hitungSemua);

            // Untuk Diskon & Dibayar, kita sudah pakai onkeyup="formatInput", 
            // jadi kita dengarkan custom event yang kita buat di fungsi formatInput tadi
            inputDiskon.addEventListener('input_calculate', hitungSemua);
            inputDibayar.addEventListener('input_calculate', hitungSemua);


            function hitungSemua() {
                // A. AMBIL DATA (Gunakan cleanNumber karena valuenya ada titiknya)
                const harga = cleanNumber(inputHarga.value);
                const intensif = parseFloat(inputIntensif.value) || 0;
                const diskon = cleanNumber(inputDiskon.value);
                const dibayar = cleanNumber(inputDibayar.value);

                // B. HITUNG
                let subtotal = (harga * intensif) - diskon;
                if (subtotal < 0) subtotal = 0;

                const pajak = subtotal * 0.11;
                const totalTagihan = subtotal + pajak;

                let sisaPiutang = totalTagihan - dibayar;
                if (sisaPiutang < 0) sisaPiutang = 0;

                // C. TAMPILKAN (Format kembali jadi Rupiah)
                inputPajak.value = formatRupiah(Math.round(pajak));
                inputTotal.value = formatRupiah(Math.round(totalTagihan));
                inputPiutang.value = formatRupiah(Math.round(sisaPiutang));
            }
        });
    </script>
</x-app-layout>
