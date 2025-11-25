<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('IKLAN ONLINE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="gap-5 items-start flex">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/3 p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        FORM INPUT IKLAN ONLINE
                    </div>
                    <div>
                        <form class="max-w-sm mx-auto" method="POST" action="{{ route('iklanonline.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_iklanonline"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Iklan
                                </label>
                                <input type="text" name="kode_iklanonline"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <div class="mb-3">
                                <label for="jenis_iklanonline"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Iklan
                                </label>
                                <input type="text" name="jenis_iklanonline"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <div class="mb-3">
                                <label for="type_iklanonline"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type Iklan
                                </label>
                                <input type="text" name="type_iklanonline"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <div class="mb-3">
                                <label for="portal_iklanonline"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Portal Iklan
                                </label>
                                <input type="text" name="portal_iklanonline"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <div class="mb-3">
                                <label for="harga_iklanonline"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Iklan
                                </label>
                                <input type="text" name="harga_iklanonline"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" " />
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-full p-4">
                    <div class="p-4 bg-gray-100 mb-2 rounded-xl font-bold">
                        TABEL DATA IKLAN ONLINE
                    </div>
                    <div>
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 text-center">
                                    <tr>
                                        <th scope="col" class="px-4 py-3 bg-gray-100">
                                            NO
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            KODE IKLAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            JENIS IKLAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            TYPE IKLAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            PORTAL IKLAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            HARGA IKLAN
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-100">
                                            ACTION
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($iklanonline as $key => $i)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 px-4"
                                            align="center">
                                            <th scope="row"
                                                class="px-5 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $no++ }}
                                            </th>
                                            <td class="px-5 py-3">
                                                {{ $i->kode_iklanonline }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $i->jenis_iklanonline }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $i->type_iklanonline }}
                                            </td>
                                            <td class="px-5 py-3">
                                                {{ $i->portal_iklanonline }}
                                            </td>
                                            <td class="px-5 py-3">
                                                Rp{{ $i->harga_iklan }}
                                            </td>
                                            <td class="px-5 py-3">
                                                <button type="button"
                                                    class="bg-amber-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-amber-500"
                                                    onclick="editSourceModal(this)" data-modal-target="sourceModal"
                                                    data-id="{{ $i->id }}"
                                                    data-kode_iklanonline="{{ $i->kode_iklanonline }}"
                                                    data-jenis_iklanonline="{{ $i->jenis_iklanonline }}"
                                                    data-type_iklanonline="{{ $i->type_iklanonline }}"
                                                    data-portal_iklanonline="{{ $i->portal_iklanonline }}"
                                                    data-harga_iklanonline="{{ $i->harga_iklanonline }}">
                                                    <i class="fi fi-sr-file-edit"></i>
                                                </button>
                                                <button
                                                    class="bg-red-400 p-3 w-10 h-10 rounded-xl text-white hover:bg-red-500"
                                                    onclick="return iklanonlineDelete('{{ $i->id }}','{{ $i->kode_iklanonline }}')">
                                                    <i class="fi fi-sr-delete-document"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $iklanonline->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="sourceModal">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="w-full max-w-md relative bg-white rounded-lg shadow mx-4">

                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900" id="title_source">
                        Update Sumber Database
                    </h3>
                    <button type="button" onclick="sourceModalClose(this)" data-modal-target="sourceModal"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="defaultModal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>

                <form method="POST" id="formSourceModal">
                    @csrf
                    <div class="flex flex-col p-4 space-y-3 max-h-[75vh] overflow-y-auto">
                        <div>
                            <label for="kode_iklan" class="block mb-1 text-sm font-medium text-gray-900">Kode
                                Iklan</label>
                            <input type="text" id="kode_iklan" name="kode_iklan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Masukan Kode">
                        </div>
                        <div>
                            <label for="type_iklan" class="block mb-1 text-sm font-medium text-gray-900">Type
                                Iklan</label>
                            <input type="text" id="type_iklan" name="type_iklan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Masukan Type">
                        </div>
                        <div>
                            <label for="jenis_iklan" class="block mb-1 text-sm font-medium text-gray-900">Jenis
                                Iklan</label>
                            <input type="text" id="jenis_iklan" name="jenis_iklan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Masukan Jenis">
                        </div>
                        <div>
                            <label for="warna_iklan" class="block mb-1 text-sm font-medium text-gray-900">Warna
                                Iklan</label>
                            <input type="text" id="warna_iklan" name="warna_iklan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Masukan Warna">
                        </div>
                        <div>
                            <label for="iklan_priangan" class="block mb-1 text-sm font-medium text-gray-900">Iklan
                                Priangan Tv</label>
                            <input type="text" id="iklan_priangan" name="iklan_priangan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Masukan Data">
                        </div>
                        <div>
                            <label for="harga_iklan" class="block mb-1 text-sm font-medium text-gray-900">Harga
                                Iklan</label>
                            <input type="text" id="harga_iklan" name="harga_iklan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                                placeholder="Masukan Harga">
                        </div>
                    </div>

                    <div class="flex items-center justify-end p-4 space-x-2 border-t border-gray-200 rounded-b">
                        <button type="button" data-modal-target="sourceModal" onclick="sourceModalClose(this)"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 hover:text-blue-700">
                            Batal
                        </button>
                        <button type="submit" id="formSourceButton"
                            class="px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
{{-- <script>
    const editSourceModal = (button) => {
        const formModal = document.getElementById('formSourceModal');
        const modalTarget = button.dataset.modalTarget;
        const id = button.dataset.id;
        const kode_iklan = button.dataset.kode_iklan;
        const type_iklan = button.dataset.type_iklan;
        const jenis_iklan = button.dataset.jenis_iklan;
        const warna_iklan = button.dataset.warna_iklan;
        const iklan_priangan = button.dataset.iklan_priangan;
        const harga_iklan = button.dataset.harga_iklan;
        let url = "{{ route('iklan.update', ':id') }}".replace(':id', id);

        let status = document.getElementById(modalTarget);
        document.getElementById('title_source').innerText = `UPDATE ${kode_iklan}`;

        document.getElementById('kode_iklan').value = kode_iklan;
        document.getElementById('type_iklan').value = type_iklan;
        document.getElementById('jenis_iklan').value = jenis_iklan;
        document.getElementById('warna_iklan').value = warna_iklan;
        document.getElementById('iklan_priangan').value = iklan_priangan;
        document.getElementById('harga_iklan').value = harga_iklan;

        document.getElementById('formSourceButton').innerText = 'Simpan';
        document.getElementById('formSourceModal').setAttribute('action', url);
        let csrfToken = document.createElement('input');
        csrfToken.setAttribute('type', 'hidden');
        csrfToken.setAttribute('value', '{{ csrf_token() }}');
        formModal.appendChild(csrfToken);

        let methodInput = document.createElement('input');
        methodInput.setAttribute('type', 'hidden');
        methodInput.setAttribute('name', '_method');
        methodInput.setAttribute('value', 'PATCH');
        formModal.appendChild(methodInput);

        status.classList.toggle('hidden');
    }

    const sourceModalClose = (button) => {
        const modalTarget = button.dataset.modalTarget;
        let status = document.getElementById(modalTarget);
        status.classList.toggle('hidden');
    }

    const iklanDelete = async (id, kode_iklan) => {
        let tanya = confirm(`Apakah anda yakin untuk menghapus ${kode_iklan} ?`);
        if (tanya) {
            await axios.post(`/iklan/${id}`, {
                    '_method': 'DELETE',
                    '_token': $('meta[name="csrf-token"]').attr('content')
                })
                .then(function(response) {
                    // Handle success
                    location.reload();
                })
                .catch(function(error) {
                    // Handle error
                    alert('Error deleting record');
                    console.log(error);
                });
        }
    }
</script> --}}
