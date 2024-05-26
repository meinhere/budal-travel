<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen px-5 pb-12 bg-center bg-cover pt-28 lg:pt-12"
        style="background-image: url({{ $background }})">
        <div class="max-w-5xl p-5 mx-auto bg-white rounded-lg">
            {{-- Content Heading --}}
            <div class="flex items-center justify-between pb-5 overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h3 class="text-xl font-semibold">Kelola Bus <span
                            class="pl-2 text-sm font-normal text-indigo-700">{{ $count }} Bus</span></h3>
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
                        <a href="{{ route('dashboard.bus.create') }}"
                            class="text-white absolute flex right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 ">
                            New
                            @svg('bi-plus', 'w-5 h-5 text-white')
                        </a>
                    </div>
                </form>
            </div>

            <!-- component -->
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Kode Bus</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Nama & Spesifikasi Bus</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Status Bus</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Kategori</th>
                        <th class="hidden p-3 font-bold text-gray-600 border lg:table-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bus as $b)
                        <tr
                            class="flex flex-row flex-wrap mb-10 bg-white lg:hover:bg-gray-100 lg:table-row lg:flex-row lg:flex-no-wrap lg:mb-0">
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Kode
                                    Bus</span>
                                {{ $b->kode_bus }}
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Nama
                                    & Spesifikasi Bus</span>
                                <p>{{ $b->nama_bus }}
                                <p class="text-sm text-gray-400">{{ $b->kapasitas_solar }} L - {{ $b->jumlah_kursi }}
                                    Kursi - Rp {{ number_format($b->harga_sewa, 0, ',', '.') }}</p>
                                </p>
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Status
                                    Bus</span>
                                <span
                                    class="px-3 py-1 font-semibold text-sm rounded-full {{ $b->status_bus->kode_status == 1 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    @svg('bi-circle-fill', 'w-2 h-2 inline-block mr-2')
                                    {{ $b->status_bus->deskripsi }}
                                </span>
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Kategori
                                    Bus</span>
                                {{ $b->kategori_bus->nama_kategori }}
                            </td>
                            <td
                                class="relative block w-full p-3 text-center text-gray-800 border border-b lg:text-left lg:w-auto lg:table-cell lg:static">
                                <span
                                    class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">Aksi</span>
                                <form action="{{ route('dashboard.bus.destroy', $b->kode_bus) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="inline-block hover:text-red-600">
                                        @svg('bi-trash', 'w-5 h-5')
                                    </button>
                                </form>
                                <a href="{{ route('dashboard.bus.edit', $b->kode_bus) }}"
                                    class="inline-block pl-2 hover:text-blue-600">
                                    @svg('bi-pencil', 'w-5 h-5')
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="container mt-5">
                @foreach ($bus as $b)
                @endforeach
            </div>

            {{ $bus->links() }}

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
