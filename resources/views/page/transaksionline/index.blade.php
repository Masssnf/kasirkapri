<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('DATA TRANSAKSI IKLAN ONLINE') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-[95%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 bg-gray-100 rounded-xl mb-2 font-bold flex items-center justify-between ">
                        <div>DAFTAR TRANSAKSI</div>
                        <div>
                            <a href="{{ route('transaksionline.create') }}"
                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500 justify-between">
                                <i class="fi fi-sr-square-plus p-"></i></a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold whitespace-nowrap">
                                    <th class="px-4 py-3">NO</th>
                                    <th class="px-4 py-3">NO FAKTUR</th>
                                    <th class="px-4 py-3">TGL TRANSAKSI</th>
                                    <th class="px-4 py-3">PEMASANG</th>
                                    <th class="px-4 py-3">ALAMAT</th>
                                    <th class="px-4 py-3">JENIS IKLAN</th>
                                    <th class="px-4 py-3">PORTAL IKLAN</th>
                                    <th class="px-4 py-3">SALES</th>
                                    <th class="px-4 py-3">TGL MUAT</th>
                                    <th class="px-4 py-3">HARGA</th>
                                    <th class="px-4 py-3">DIBAYAR</th>
                                    <th class="px-4 py-3">PIUTANG</th>
                                    <th class="px-4 py-3">STATUS</th>
                                    <th class="px-4 py-3">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksionline as $key => $t)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 whitespace-nowrap"
                                        align="center">
                                        <th
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $transaksionline->perPage() * ($transaksionline->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-4 py-3">{{ $t->nofakturonline }}</td>
                                        <td class="px-4 py-3">{{ $t->tanggal_transaksionline }}</td>
                                        <td class="px-4 py-3">{{ $t->nama_pemasangonline }}</td>
                                        <td class="px-4 py-3">{{ Str::limit($t->alamat_pemasangonline, 20) }}</td>
                                        <td class="px-4 py-3">{{ $t->iklanonline->jenis_iklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->sales_iklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->tanggal_muatiklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->iklanonline->harga_iklanonline }}</td>
                                        <td class="px-4 py-3">{{ $t->insentif_transaksionline }}</td>
                                        <td class="px-4 py-3">{{ $t->diskon_transaksionline }}</td>
                                        <td class="px-4 py-3">{{ $t->komisi_transaksionline}}</td>
                                        <td class="px-4 py-3">{{ $t->jumlahbayar_transaksionline }}</td>
                                        <td class="px-4 py-3">{{ $t->piutang_transaksionline }}</td>
                                        <td class="px-4 py-3">
                                            @if($t->piutang_transaksionline > 0)
                                                <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Belum Lunas</span>
                                            @else
                                                <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Lunas</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex justify-center gap-2">
                                            <button type="button" onclick="editSourceModal(this)" class="bg-amber-500 hover:bg-amber-600 px-4 py-2 rounded-lg text-base text-white flex items-center gap-1"
                                                data-id="{{ $t->id }}">
                                                {{-- data-nofakturpriangan="{{ $t->nofakturpriangan }}"
                                                data-tanggal_transaksipriangan="{{ $t->tanggal_transaksipriangan }}"
                                                data-nama_pemasangpriangan="{{ $t->nama_pemasangpriangan }}"
                                                data-alamat_pemasangpriangan="{{ $t->alamat_pemasangpriangan }}"
                                                data-id_iklanpriangan="{{ $t->id_iklanpriangan }}"
                                                data-tanggal_muatiklanpriangan="{{ $t->tanggal_muatiklanpriangan }}"
                                                
                                                Data Angka untuk Kalkulasi
                                                data-harga="{{ $t->harga_transaksipriangan }}"
                                                data-bayar="{{ $t->jumlahbayar_transaksipriangan }}"
                                                data-piutang="{{ $t->piutang_transaksipriangan }}" --}}
                                                <i class="fi fi-sr-file-edit"></i>
                                            </button>
                                            <button onclick="return transaksionlineDelete('{{ $t->id }}', '{{ $t->nama_pemasangonline }}')"
                                                class="bg-red-500 hover:bg-bg-red-300 px-4 py-2 rounded-lg text-base text-white">
                                                <i class="fi fi-sr-delete-document"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $transaksionline->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
