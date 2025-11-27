<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('DATA TRANSAKSI IKLAN ONLINE') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-[95%] mx-auto sm:px-6 lg:px-8"> {{-- Lebar saya perbesar biar muat --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="p-4 bg-gray-100 rounded-xl mb-2 font-bold flex items-center justify-between ">
                        <div> TAMBAH TRANSAKSI</div>
                        <div>
                            <a href="{{ route('transaksiiklanonline.create') }}"
                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500 justify-between">
                                <i class="fi fi-sr-square-plus p-"></i></a>
                        </div>
                    </div>

                    {{-- TABEL DETAIL (SESUAI REQUEST) --}}
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold whitespace-nowrap">
                                    <th scope="col" class="px-4 py-3">NO</th>
                                    <th scope="col" class="px-4 py-3">NO FAKTUR</th>
                                    <th scope="col" class="px-4 py-3">TGL TRANSAKSI</th>
                                    <th scope="col" class="px-4 py-3">KODE IKLAN</th>
                                    <th scope="col" class="px-4 py-3">JENIS</th>
                                    <th scope="col" class="px-4 py-3">TYPE</th>
                                    <th scope="col" class="px-4 py-3">PORTAL</th>
                                    <th scope="col" class="px-4 py-3">PEMASANG</th>
                                    <th scope="col" class="px-4 py-3">ALAMAT</th>
                                    <th scope="col" class="px-4 py-3">NO HP</th>
                                    <th scope="col" class="px-4 py-3">TGL MUAT</th>
                                    <th scope="col" class="px-4 py-3">SALES</th>
                                    <th scope="col" class="px-4 py-3">HARGA</th>
                                    <th scope="col" class="px-4 py-3">DISKON</th>
                                    <th scope="col" class="px-4 py-3">TOTAL BAYAR</th>
                                    <th scope="col" class="px-4 py-3">STATUS</th>
                                    <th scope="col" class="px-4 py-3">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksiiklanonline as $key => $t)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap"
                                        align="center">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                            {{ $transaksiiklanonline->perPage() * ($transaksiiklanonline->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-4 py-3">{{ $t->nofakturonline }}</td>
                                        <td class="px-4 py-3">{{ $t->tgltransaksionline }}</td>

                                        {{-- Relasi Iklan --}}
                                        <td class="px-4 py-3">{{ $t->iklanonline->kode_iklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->iklanonline->jenis_iklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->iklanonline->type_iklanonline ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $t->iklanonline->portal_iklanonline ?? '-' }}</td>

                                        <td class="px-4 py-3">{{ $t->namapemasang }}</td>
                                        <td class="px-4 py-3">{{ Str::limit($t->alamatpemasang, 15) }}</td>
                                        <td class="px-4 py-3">{{ $t->notelppemasang }}</td>
                                        <td class="px-4 py-3">{{ $t->tglmuat }}</td>
                                        <td class="px-4 py-3">{{ $t->namasales }}</td>

                                        {{-- Format Rupiah --}}
                                        <td class="px-4 py-3">{{ number_format($t->harga, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3">{{ number_format($t->diskon, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 font-bold">
                                            {{ number_format($t->jumlahbayar, 0, ',', '.') }}</td>

                                        <td class="px-4 py-3">
                                            @if ($t->piutang > 0)
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Hutang</span>
                                            @else
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Lunas</span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 flex justify-center gap-2">
                                            {{-- TOMBOL EDIT (Diisi Data Lengkap untuk Modal) --}}
                                            <button type="button" onclick="editSourceModal(this)"
                                                data-id="{{ $t->id }}"
                                                data-nofakturonline="{{ $t->nofakturonline }}"
                                                data-tgltransaksionline="{{ $t->tgltransaksionline }}"
                                                data-namapemasang="{{ $t->namapemasang }}"
                                                data-alamatpemasang="{{ $t->alamatpemasang }}"
                                                data-notelppemasang="{{ $t->notelppemasang }}"
                                                data-id_iklanonline="{{ $t->id_iklanonline }}"
                                                data-tglmuat="{{ $t->tglmuat }}"
                                                data-namasales="{{ $t->namasales }}" {{-- Data Angka (Penting) --}}
                                                data-harga_satuan="{{ $t->harga }}"
                                                data-intensif="{{ $t->intensif }}" data-diskon="{{ $t->diskon }}"
                                                data-pajak="{{ $t->pajak }}"
                                                data-jumlahbayar="{{ $t->jumlahbayar }}"
                                                data-dibayar="{{ $t->dibayar }}" data-piutang="{{ $t->piutang }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-4 py-2 rounded-lg text-base text-white flex items-center gap-1">
                                                <i class="fi fi-sr-file-edit"></i>
                                            </button>

                                            <button
                                                onclick="return transaksiiklanonlineDelete('{{ $t->id }}', '{{ $t->nofakturonline }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-4 py-2 rounded-lg text-base text-white">
                                                <i class="fi fi-sr-delete-document"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $transaksiiklanonline->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden" id="sourceModal">
        <div class="relative w-full max-w-2xl max-h-screen overflow-y-auto bg-white rounded-lg shadow mx-4 my-8">

            <div class="flex items-start justify-between p-4 border-b rounded-t bg-gray-100">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source">Update Transaksi</h3>
                <button type="button" onclick="sourceModalClose()"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form class="w-full px-6 py-4" method="POST" id="formSourceModal">
                @csrf
                <div class="flex flex-col gap-4">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">No Faktur</label>
                            <input type="text" id="edit_nofakturonline" name="nofakturonline" readonly
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Tanggal Transaksi</label>
                            <input type="date" id="edit_tgltransaksionline" name="tgltransaksionline" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">Nama Pemasang</label>
                            <input type="text" id="edit_namapemasang" name="namapemasang" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Nama Sales</label>
                            <input type="text" id="edit_namasales" name="namasales" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">Alamat</label>
                            <input type="text" id="edit_alamatpemasang" name="alamatpemasang" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">No Telp</label>
                            <input type="text" id="edit_notelppemasang" name="notelppemasang" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <hr class="my-2 border-gray-300">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">Kode Iklan</label>
                            <select name="id_iklanonline" id="edit_id_iklanonline" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                <option value="">Pilih...</option>
                                @foreach ($iklanonline as $i)
                                    <option value="{{ $i->id }}" data-harga="{{ $i->harga_iklanonline }}">
                                        {{ $i->kode_iklanonline }} - {{ $i->jenis_iklanonline }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Tanggal Muat</label>
                            <input type="date" id="edit_tglmuat" name="tglmuat" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Harga Satuan</label>
                            <input type="text" id="edit_harga" name="harga_iklan" readonly
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 font-medium" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">Intensif (Kali)</label>
                            <input type="number" id="edit_intensif" name="intensif" min="1" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Diskon (Rp)</label>
                            <input type="text" id="edit_diskon" name="diskon" required
                                onkeyup="formatInput(this)"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">PPN (11%)</label>
                            <input type="text" id="edit_pajak" name="pajak" readonly
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 font-medium" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-blue-50 p-4 rounded-lg">
                        <div>
                            <label class="block mb-1 text-sm font-bold text-blue-900">Total Tagihan</label>
                            <input type="text" id="edit_jumlahbayar" name="jumlahbayar" readonly
                                class="bg-white border border-blue-300 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-bold text-blue-900">Sudah Dibayar</label>
                            <input type="text" id="edit_dibayar" name="dibayar" required
                                onkeyup="formatInput(this)"
                                class="bg-white border border-blue-300 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-bold text-red-900">Sisa Piutang</label>
                            <input type="text" id="edit_piutang" name="piutang" readonly
                                class="bg-red-100 border border-red-300 text-red-800 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                </div>

                <div class="flex items-center justify-end p-4 space-x-2 border-t border-gray-200 mt-4">
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                        Batal
                    </button>
                    <button type="submit" id="formSourceButton"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>

<script>
    // --- 1. HELPER FORMATTER ---
    function formatRupiah(angka) {
        if (!angka) return '0';
        return new Intl.NumberFormat('id-ID').format(angka);
    }

    function cleanNumber(rupiah) {
        if (!rupiah) return 0;
        return parseFloat(rupiah.toString().replace(/[^0-9]/g, '')) || 0;
    }

    function formatInput(input) {
        let val = cleanNumber(input.value);
        input.value = formatRupiah(val);
        hitungEdit();
    }

    // --- 2. FUNGSI BUKA MODAL EDIT ---
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modal = document.getElementById('sourceModal');

        // Ambil data dari tombol (Dataset)
        const d = button.dataset;

        // Set Action URL
        // Sesuaikan nama route dengan web.php Anda
        let url = "{{ route('transaksiiklanonline.update', ':id') }}".replace(':id', d.id);
        formModal.action = url;

        // Tambah Method PUT (Untuk Update)
        if (!formModal.querySelector('input[name="_method"]')) {
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            formModal.appendChild(methodInput);
        }

        // --- ISI FORM DENGAN DATA ---
        document.getElementById('edit_nofakturonline').value = d.nofakturonline;
        document.getElementById('edit_tgltransaksionline').value = d.tgltransaksionline;
        document.getElementById('edit_namapemasang').value = d.namapemasang;
        document.getElementById('edit_alamatpemasang').value = d.alamatpemasang;
        document.getElementById('edit_notelppemasang').value = d.notelppemasang;
        document.getElementById('edit_namasales').value = d.namasales;
        document.getElementById('edit_tglmuat').value = d.tglmuat;

        // Dropdown: Set Value ID
        document.getElementById('edit_id_iklanonline').value = d.id_iklanonline;

        // Angka: Format Rupiah
        document.getElementById('edit_harga').value = formatRupiah(d.harga_satuan);
        document.getElementById('edit_intensif').value = d.intensif;
        document.getElementById('edit_diskon').value = formatRupiah(d.diskon);
        document.getElementById('edit_pajak').value = formatRupiah(d.pajak);
        document.getElementById('edit_jumlahbayar').value = formatRupiah(d.jumlahbayar);
        document.getElementById('edit_dibayar').value = formatRupiah(d.dibayar);
        document.getElementById('edit_piutang').value = formatRupiah(d.piutang);

        // Tampilkan Modal
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    const sourceModalClose = () => {
        const modal = document.getElementById('sourceModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };

    // --- 3. LOGIKA HITUNG ULANG DI MODAL ---
    // Pasang listener agar angka berubah real-time saat diedit
    document.getElementById('edit_intensif').addEventListener('input', hitungEdit);
    document.getElementById('edit_diskon').addEventListener('keyup', hitungEdit); // Listener tambahan
    document.getElementById('edit_dibayar').addEventListener('keyup', hitungEdit); // Listener tambahan

    // Update harga jika user ganti kode iklan di modal
    document.getElementById('edit_id_iklanonline').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        let hargaBaru = parseFloat(selectedOption.dataset.harga) || 0;
        document.getElementById('edit_harga').value = formatRupiah(hargaBaru);
        hitungEdit();
    });

    function hitungEdit() {
        const harga = cleanNumber(document.getElementById('edit_harga').value);
        const intensif = parseFloat(document.getElementById('edit_intensif').value) || 0;
        const diskon = cleanNumber(document.getElementById('edit_diskon').value);
        const dibayar = cleanNumber(document.getElementById('edit_dibayar').value);

        // A. Hitung Subtotal
        let subtotal = (harga * intensif) - diskon;
        if (subtotal < 0) subtotal = 0;

        // B. Hitung PPN
        const pajak = subtotal * 0.11;

        // C. Hitung Total
        const totalTagihan = subtotal + pajak;

        // D. Hitung Piutang
        let sisaPiutang = totalTagihan - dibayar;
        if (sisaPiutang < 0) sisaPiutang = 0;

        // E. Tampilkan Hasil
        document.getElementById('edit_pajak').value = formatRupiah(Math.round(pajak));
        document.getElementById('edit_jumlahbayar').value = formatRupiah(Math.round(totalTagihan));
        document.getElementById('edit_piutang').value = formatRupiah(Math.round(sisaPiutang));
    }

    // --- 4. DELETE FUNCTION ---
    const transaksiiklanonlineDelete = async (id, nofaktur) => {
        if (confirm(`Hapus transaksi ${nofaktur}?`)) {
            try {
                await axios.post(`/transaksiiklanonline/${id}`, {
                    '_method': 'DELETE',
                    '_token': document.querySelector('meta[name="csrf-token"]').content
                });
                location.reload();
            } catch (error) {
                alert('Gagal menghapus data.');
            }
        }
    };
</script>
