<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-900 leading-tight">
            {{ __('DATA TRANSAKSI IKLAN ONLINE') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 bg-gray-100 rounded-xl mb-2 font-bold flex items-center justify-between ">
                        <div> TAMBAH TRANSAKSI</div>
                        <div>
                            <a href="{{ route('transaksiiklanonline.create') }}" onclick="return functionAdd()"
                                class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500 justify-between">
                                <i class="fi fi-sr-square-plus p-"></i></a>
                        </div>
                    </div>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-black dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr class="text-center font-semibold">
                                    <th scope="col" class="px-4 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        NO FAKTUR
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        KODE IKLAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        JENIS IKLAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TYPE IKLAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        PORTAL IKLAN
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        PEMASANG
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        ALAMAT PEMASANG
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        NO HP PEMASANG
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        TANGGAL MUAT
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        NAMA SALES
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        HARGA
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        INTENSIF
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        DISKON
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        JUMLAH BAYAR
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        ACTION
                                    </th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($transaksiiklanonline as $key => $t)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                                        align="center">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $transaksiiklanonline->perPage() * ($transaksiiklanonline->currentPage() - 1) + $key + 1 }}
                                        </th>
                                        <td class="px-5 py-5">
                                            {{ $t->nofakturonline }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->iklanonline->kode_iklanonline }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->iklanonline->jenis_iklanonline }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->iklanonline->type_iklanonline }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->iklanonline->portal_iklanonline }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->namapemasang }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->alamatpemasang }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->notelppemasang }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->tglmuat }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->namasales }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->iklanonline->harga_iklanonline }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->intensif }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->diskon }}
                                        </td>
                                        <td class="px-auto py-auto">
                                            {{ $t->jumlahbayar }}
                                        </td>
                                        <td class="px-6 py-4 flex justify-center gap-2">
                                            <button type="button" onclick="editSourceModal(this)"
                                                data-id="{{ $t->id }}" data-nofakturonline="{{ $t->nofakturonline }}"
                                                data-iklanonline="{{ $t->id_iklanonline }}"
                                                data-namapemasang="{{ $t->namapemasang }}"
                                                data-alamatpemasang="{{ $t->alamatpemasang }}"
                                                data-tglmuat="{{ $t->tglmuat }}"
                                                data-intensif="{{ $t->intensif }}"
                                                data-diskon="{{ $t->diskon }}"
                                                data-jumlahbayar="{{ $t->jumlahbayar }}"
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
    {{-- <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden" id="sourceModal">
        <div class="relative w-full max-w-3xl max-h-screen overflow-y-auto bg-white rounded-lg shadow mx-4 my-8">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900" id="title_source">
                    Update Data Paket
                </h3>
                <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                    data-modal-hide="defaultModal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <form class="w-full px-6 py-4" method="POST" id="formSourceModal">
                @csrf

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <!-- Jenis Paket -->
                    <div class="w-full">
                        <label for="jenis_paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Jenis Paket
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            id="id_jenis_paket" name="id_jenis_paket" data-placeholder="Pilih Konsinyasi">
                            <option value="">Pilih Jenis Paket...</option>
                            <option value="Wedding"> Paket Wedding</option>
                            <option value="Khitan">Paket Khitanan</option>
                            <option value="Engagement">Paket Engagement</option>
                            <option value="Graduation">Paket Graduation</option>
                            <option value="Birthday">Paket Birthday Party</option>
                        </select>
                    </div>

                    <!-- Make Up -->
                    <div class="w-full">
                        <label for="id_makeup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Make Up
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_makeup" id="id_makeup">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($makeup as $m)
                                <option value="{{ $m->id }}" data-harga="{{ $m->harga }}">
                                    {{ $m->type_makeup }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <!-- Album -->
                    <div class="w-full">
                        <label for="id_album" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Album
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_album" id="id_album">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($album as $a)
                                <option value="{{ $a->id }}" data-harga="{{ $a->harga }}">
                                    {{ $a->jenis_album }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Wardrobe -->
                    <div class="w-full">
                        <label for="id_wardrobe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Wardrobe
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_wardrobe" id="id_wardrobe">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($wardrobe as $w)
                                <option value="{{ $w->id }}" data-harga="{{ $w->harga }}">
                                    {{ $w->type_wardrobe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <!-- Catering -->
                    <div class="w-full">
                        <label for="id_catering" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Catering
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_catering" id="id_catering">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($catering as $c)
                                <option value="{{ $c->id }}" data-harga="{{ $c->harga }}">
                                    {{ $c->type_catering }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tenda -->
                    <div class="w-full">
                        <label for="id_tenda" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Tenda
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_tenda" id="id_tenda">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($tenda as $t)
                                <option value="{{ $t->id }}" data-harga_tenda="{{ $t->harga }}">
                                    {{ $t->uk_tenda }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <!-- Dekorasi -->
                    <div class="w-full">
                        <label for="id_dekorasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Dekorasi
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_dekorasi" id="id_dekorasi">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($dekorasi as $d)
                                <option value="{{ $d->id }}" data-harga_dekorasi="{{ $d->harga }}">
                                    {{ $d->type_dekorasi }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Hiburan -->
                    <div class="w-full">
                        <label for="id_hiburan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Hiburan
                        </label>
                        <select
                            class="appearance-none border border-gray-300 focus:ring-blue-500 focus:border-blue-500 bg-gray-50 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            name="id_hiburan" id="id_hiburan">
                            <option value="" disabled selected>Pilih...</option>
                            @foreach ($hiburan as $h)
                                <option value="{{ $h->id }}" data-harga_hiburan="{{ $h->harga }}">
                                    {{ $h->type_hiburan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex items-center p-4 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" id="formSourceButton"
                        class="bg-green-400 w-40 h-10 rounded-xl hover:bg-green-500">
                        Simpan
                    </button>
                    <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                        class="bg-red-500 w-40 h-10 rounded-xl text-white hover:shadow-lg hover:bg-red-600">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div> --}}

</x-app-layout>
