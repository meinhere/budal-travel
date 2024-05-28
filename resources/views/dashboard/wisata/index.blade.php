<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen px-5 pb-12 bg-center bg-cover pt-28 lg:pt-12"
        style="background-image: url({{ $background }})">
        <div class="p-5 mx-auto bg-white rounded-lg max-w-7xl">
            {{-- Content Heading --}}
            <div class="flex items-center justify-between pb-5 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h3 class="text-xl font-semibold">Kelola Wisata <span class="pl-2 text-sm font-normal text-indigo-700">{{ $count }} Wisata</span>
                    </h3>
                </div>
                <form class="basis-1/2 md:basis-1/3">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            @svg('bi-search', 'w-5 h-5 text-gray-400 dark:text-gray-300')
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-transparent rounded-lg bg-gray-50 focus:border-blue-500 "
                            placeholder="Search">
                        <a href="{{ route('dashboard.wisata.create') }}"
                            class="text-white absolute flex right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">
                            New
                            @svg('bi-plus', 'w-5 h-5 text-white')
                        </a>
                    </div>
                </form>
            </div>

            {{-- Notification Success --}}
            @if (session()->has('success'))
            <div id="alert-3" class="flex items-center justify-center p-4 mx-auto mb-4 text-green-800 bg-green-200 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
                @svg('bi-info-circle', 'w-6 h-6 text-green-500')
                <span class="sr-only">Info</span>
                <div class="text-sm font-medium ms-3">
                        {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        @svg('bi-x-lg', 'w-6 h-6')
                </button>
            </div>
            @endif

            <!-- component -->
            <table class="w-full text-sm text-left border-collapse">
                <thead>
                    <tr>
                        <th class="hidden w-1/4 p-3 font-bold text-gray-600 border lg:table-cell">Nama Wisata</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Status</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Harga Tiket</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Jam Buka/Jam Tutup</th>
                        <th class="hidden w-1/4 p-3 font-bold text-gray-600 border lg:table-cell">Alamat</th>
                        <th class="hidden p-3 font-bold text-center text-gray-600 border lg:table-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wisata as $w)
                        <tr
                            class="flex flex-row flex-wrap mb-10 bg-white lg:hover:bg-gray-100 lg:table-row lg:flex-row lg:flex-no-wrap lg:mb-0">
                            <td  
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Nama
                                    Wisata</span>
                                <p class="font-semibold pt-4 sm:pt-0">{{ $w->nama_wisata }}
                                <p class="text-gray-500">{{ $w->kota->provinsi->nama_provinsi }}</p>
                                </p>

                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Status</span>
                                @php $now = \Carbon\Carbon::now()->format('H:i:s') @endphp
                                <span class="px-3 py-1 font-semibold text-sm rounded-full {{ $now >= $w->jam_buka && $now < $w->jam_tutup ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $now >= $w->jam_buka && $now < $w->jam_tutup ? 'Buka' : 'Tutup' }}
                                </span>
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Harga
                                    Tiket</span>
                                <span class="px-3 py-1 text-sm font-semibold rounded-full ">
                                    Rp {{ number_format($w->tarif_masuk_wisata, 0, ',', '.') }}
                                </span>
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Jam
                                    Buka/Jam Tutup</span>
                                <p class="pt-4 sm:pt-0">
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $w->jam_buka)->format('H:i') }} -
                                    {{ \Carbon\Carbon::createFromFormat('H:i:s', $w->jam_tutup)->format('H:i') }} WIB
                                </p>
                            </td>
                            <td class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Alamat</span>
                                <p class="pt-4 sm:pt-0">{{ $w->alamat_wisata }}</p>
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Aksi</span>
                                <form action="{{ route('dashboard.wisata.destroy', $w->kode_wisata) }}" method="post" class="inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="inline-block hover:text-red-600">
                                        @svg('bi-trash', 'w-5 h-5')
                                    </button>
                                </form>
                                <a href="{{ route('dashboard.wisata.edit', $w->kode_wisata) }}"
                                    class="inline-block pl-2 hover:text-blue-600">
                                    @svg('bi-pencil', 'w-5 h-5')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $wisata->links() }}

            {{-- <div class="flex items-center justify-between mt-5">
					<a href="" class="px-4 py-2 text-sm border border-gray-400 rounded-lg hover:border-transparent hover:text-indigo-700 hover:bg-gray-200">
						@svg('carbon-arrow-left', 'w-5 h-5 inline-block mr-1')
						Previous
					</a>
					<div class="max-w-3xl">
						<a href="" class="px-3 py-2 mx-1 text-sm text-center border border-gray-400 rounded-lg hover:text-indigo-700 hover:bg-gray-200 hover:border-transparent">
							1
						</a>
						<a href="" class="px-3 py-2 mx-1 text-sm text-center border border-gray-400 rounded-lg hover:text-indigo-700 hover:bg-gray-200 hover:border-transparent">
							2
						</a>
						<a href="" class="px-3 py-2 mx-1 text-sm text-center border border-gray-400 rounded-lg hover:text-indigo-700 hover:bg-gray-200 hover:border-transparent">
							3
						</a>
					</div>
					<a href="" class="px-4 py-2 text-sm border border-gray-400 rounded-lg hover:border-transparent hover:text-indigo-700 hover:bg-gray-200">
						Next
						@svg('carbon-arrow-right', 'w-5 h-5 inline-block mr-1')
					</a>
				</div> --}}
        </div>
    </div>
</x-app-layout>
