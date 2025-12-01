<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('DATA TRANSAKSI ONLINE TV') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-[95%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="p-4 bg-gray-100 rounded-xl mb-4 font-bold flex items-center justify-between ">
                        <div>DAFTAR TRANSAKSI</div>
                        <div>
                            <a href="{{ route('transaksionline.create') }}"
                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500 justify-between">
                                <i class="fi fi-sr-square-plus p-"></i></a>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold whitespace-nowrap">
                                    <th class="px-4 py-3">NO</th>
                                    <th class="px-4 py-3">NO FAKTUR</th>
                                    <th class="px-4 py-3">TGL TRANSAKSI</th>
                                    <th class="px-4 py-3">PEMASANG</th>
                                    <th class="px-4 py-3">JENIS IKLAN</th>
                                    <th class="px-4 py-3">PORTAL IKLAN</th>
                                    <th class="px-4 py-3">TGL MUAT</th>
                                    <th class="px-4 py-3">TOTAL TAGIHAN</th>
                                    <th class="px-4 py-3">DIBAYAR</th>
                                    <th class="px-4 py-3">PIUTANG</th>
                                    <th class="px-4 py-3">STATUS</th>
                                    <th class="px-4 py-3">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Pastikan variabel di controller bernama $transaksionline --}}
                                @foreach ($transaksionline as $key => $t)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 whitespace-nowrap"
                                        align="center">

                                        <th class="px-6 py-4 font-medium">
                                            {{ $loop->iteration }}
                                            {{-- Jika pakai pagination: {{ $transaksionline->firstItem() + $key }} --}}
                                        </th>

                                        <td class="px-4 py-3">{{ $t->nofakturonline }}</td>
                                        <td class="px-4 py-3">{{ $t->tanggal_transaksionline }}</td>
                                        <td class="px-4 py-3">{{ $t->nama_pemasangonline }}</td>

                                        <td class="px-4 py-3">
                                            {{ $t->iklanonline->jenis_iklanonline ?? 'Data Terhapus' }}
                                        </td>

                                        <td class="px-4 py-3">{{ $t->portal_iklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->tanggal_muatiklanonline }}</td>

                                        <td class="px-4 py-3">Rp
                                            {{ number_format($t->totaltagihan_transaksionline, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3">Rp
                                            {{ number_format($t->jumlahbayar_transaksionline, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3 font-bold text-red-600">
                                            Rp {{ number_format($t->piutang_transaksionline, 0, ',', '.') }}
                                        </td>

                                        <td class="px-4 py-3">
                                            @if ($t->piutang_transaksionline > 0)
                                                <span
                                                    class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Belum
                                                    Lunas</span>
                                            @else
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Lunas</span>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4 flex justify-center gap-2">
                                            <button type="button" onclick="editSourceModal(this)"
                                                data-id="{{ $t->id }}" data-nofaktur="{{ $t->nofakturonline }}"
                                                data-tgl_transaksi="{{ $t->tanggal_transaksionline }}"
                                                data-nama="{{ $t->nama_pemasangonline }}"
                                                data-alamat="{{ $t->alamat_pemasangonline }}"
                                                data-id_iklan="{{ $t->id_iklanonline }}"
                                                data-portal_iklanonline="{{ $t->portal_iklanonline }}"
                                                data-sales="{{ $t->sales_iklanonline }}"
                                                data-tgl_muat="{{ $t->tanggal_muatiklanonline }}" {{-- Data Angka (Mentah) --}}
                                                data-insentif="{{ $t->insentif_transaksionline }}"
                                                data-diskon="{{ $t->diskon_transaksionline }}"
                                                data-komisi="{{ $t->komisi_transaksionline }}"
                                                data-total="{{ $t->totaltagihan_transaksionline }}"
                                                data-bayar="{{ $t->jumlahbayar_transaksionline }}"
                                                data-piutang="{{ $t->piutang_transaksionline }}"
                                                class="bg-amber-500 hover:bg-amber-600 px-4 py-2 rounded-lg text-white">
                                                <i class="fi fi-sr-file-edit"></i>
                                            </button>

                                            <button
                                                onclick="deleteTransaksi('{{ $t->id }}', '{{ $t->nofakturonline }}')"
                                                class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-white">
                                                <i class="fi fi-sr-delete-document"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination Link --}}
                    <div class="mt-4">
                        {{ $transaksionline->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden" id="sourceModal">
        <div class="relative w-full max-w-4xl max-h-screen overflow-y-auto bg-white rounded-lg shadow mx-4 my-8">
            <div class="flex items-start justify-between p-4 border-b rounded-t bg-gray-100">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source">Update Transaksi</h3>
                <button type="button" onclick="sourceModalClose()" class="text-gray-400 hover:text-gray-900">
                    <i class="fa-solid fa-xmark fa-xl"></i>
                </button>
            </div>

            <form class="w-full px-6 py-4" method="POST" id="formSourceModal">
                @csrf
                <input type="hidden" id="edit_id_iklan_hidden" name="id_iklanonline">

                <div class="flex flex-col gap-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">No Faktur</label>
                            <input type="text" id="edit_nofaktur" name="nofakturonline" readonly
                                class="bg-gray-200 border border-gray-300 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Tanggal Transaksi</label>
                            <input type="date" id="edit_tgl_transaksi" name="tanggal_transaksionline" required
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">Nama Pemasang</label>
                            <input type="text" id="edit_nama" name="nama_pemasangonline" required
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-medium">Alamat</label>
                            <input type="text" id="edit_alamat" name="alamat_pemasangonline" required
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-sm font-medium">Portal</label>
                            <select id="edit_portal" name="portal_iklanonline" required
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
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
                            <label class="block mb-1 text-sm font-medium">Sales</label>
                            <input type="text" id="edit_sales" name="sales_iklanonline" required
                                class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-blue-50 p-4 rounded-lg">
                        <div>
                            <label class="block mb-1 text-sm font-bold text-blue-900">Diskon (Rp)</label>
                            <input type="text" id="edit_diskon" name="diskon_transaksionline" required
                                onkeyup="formatInput(this)"
                                class="bg-white border border-blue-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-bold text-blue-900">Total Tagihan</label>
                            <input type="text" id="edit_total" name="totaltagihan_transaksionline" readonly
                                class="bg-gray-200 border border-gray-300 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                        <div>
                            <label class="block mb-1 text-sm font-bold text-blue-900">Jumlah Bayar</label>
                            <input type="text" id="edit_bayar" name="jumlahbayar_transaksionline" required
                                onkeyup="formatInput(this)"
                                class="bg-white border border-blue-300 text-gray-900 text-lg font-bold rounded-lg block w-full p-2.5" />
                        </div>
                    </div>

                    <div>
                        <label class="block mb-1 text-sm font-bold text-red-900">Sisa Piutang</label>
                        <input type="text" id="edit_piutang" name="piutang_transaksionline" readonly
                            class="bg-red-100 border border-red-300 text-red-800 text-lg font-bold rounded-lg block w-full p-2.5" />
                    </div>

                </div>

                <div class="flex items-center justify-end p-4 space-x-2 border-t border-gray-200 mt-4">
                    <button type="button" onclick="sourceModalClose()"
                        class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">Batal</button>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Simpan
                        Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    // --- 1. Helper Functions ---
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
        hitungEdit(); // Recalculate saat ngetik
    }

    // --- 2. Edit Modal Logic ---
    const editSourceModal = (button) => {
        const modal = document.getElementById('sourceModal');
        const form = document.getElementById('formSourceModal');
        const d = button.dataset;

        // Set URL Action
        // Pastikan nama route update benar
        let url = "{{ route('transaksionline.update', ':id') }}".replace(':id', d.id);
        form.action = url;

        // Add PUT Method
        if (!form.querySelector('input[name="_method"]')) {
            const m = document.createElement('input');
            m.type = 'hidden';
            m.name = '_method';
            m.value = 'PUT';
            form.appendChild(m);
        }

        // Fill Fields (Mapping data-attribute ke Input ID)
        document.getElementById('edit_nofaktur').value = d.nofaktur;
        document.getElementById('edit_tgl_transaksi').value = d.tgl_transaksi;
        document.getElementById('edit_nama').value = d.nama;
        document.getElementById('edit_alamat').value = d.alamat;
        document.getElementById('edit_portal').value = d.portal_iklanonline;
        document.getElementById('edit_sales').value = d.sales;

        // Simpan ID Iklan di hidden input (karena biasanya tidak diubah saat edit pembayaran)
        document.getElementById('edit_id_iklan_hidden').value = d.id_iklan;

        // Fill Numbers (Format Rupiah)
        document.getElementById('edit_diskon').value = formatRupiah(d.diskon);
        document.getElementById('edit_total').value = formatRupiah(d.total);
        document.getElementById('edit_bayar').value = formatRupiah(d.bayar);
        document.getElementById('edit_piutang').value = formatRupiah(d.piutang);

        modal.classList.remove('hidden');
        modal.classList.add('flex');
    };

    const sourceModalClose = () => {
        const modal = document.getElementById('sourceModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    };

    // --- 3. Hitung Ulang di Modal Edit ---
    // Logika sederhana: Total - Bayar = Piutang (Total dianggap tetap karena dari master harga)
    function hitungEdit() {
        const total = cleanNumber(document.getElementById('edit_total').value);
        const bayar = cleanNumber(document.getElementById('edit_bayar').value);

        let sisa = total - bayar;
        if (sisa < 0) sisa = 0; // Jika lunas/kembalian

        document.getElementById('edit_piutang').value = formatRupiah(sisa);
    }

    // --- 4. Delete Logic ---
    const deleteTransaksi = async (id, nofaktur) => {
        if (confirm(`Hapus transaksi ${nofaktur}?`)) {
            try {
                await axios.post(`/transaksionline/${id}`, {
                    '_method': 'DELETE',
                    '_token': document.querySelector('meta[name="csrf-token"]').content
                });
                location.reload();
            } catch (error) {
                alert('Gagal menghapus data.');
            }
        }
    }
</script>
