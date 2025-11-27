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
                            <label for="nofakturonline"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kode Faktur
                            </label>
                            <input type="text" id="nofakturonline" name="nofakturonline" value="{{ $nofakturonline }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Kode Paket" readonly required />
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
                            <input type="text" name="alamat_pemasangonline" required placeholder="Nama Pemasang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>