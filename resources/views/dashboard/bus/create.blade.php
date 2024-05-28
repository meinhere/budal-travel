<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen px-5 pt-28 lg:pt-24 pb-12 bg-center bg-cover" style="background-image: url({{ $background }})">
        <div class="max-w-4xl p-5 mx-auto bg-white rounded-lg">
          {{-- Content Heading --}}
          <div class="flex items-center justify-between pb-4 overflow-hidden border-b shadow-sm sm:rounded-lg">
            <div>
              <h3 class="flex items-center gap-2 text-2xl font-bold text-primary-300">
                Tambah Bus
                @svg('bi-bus-front', 'w-6 h-6')
              </h3>
            </div>
           </div>

            <!-- component -->
            <form action="{{ route('bus.store') }}" method="post">
                @method('POST')
                @csrf
                <div class="flex flex-wrap justify-between w-full gap-4 sm:flex-nowrap">
                    <div class="basis-full md:basis-1/3">
                        {{-- Kategori Bus --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="kategori_kode" >Kategori Kode Bus</x-label-dashboard>
                            <select name="kategori_kode" id="kategori_kode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5">
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->kode_kategori }}" {{ $k->kode_kategori == old('kategori_kode') ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kapasitas Solar --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="kapasitas_solar">Kapasitas Solar</x-label-dashboard>
                            <x-input-dashboard type="text" name="kapasitas_solar" id="kapasitas_solar" placeholder="masukkan kapasitas solar" value="{{ old('kapasitas_solar') }}" />
                            <x-input-error :messages="$errors->get('kapasitas_solar')"></x-input-error>
                        </div>

                        {{-- Jumlah Kursi --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="jumlah_kursi">Jumlah Kursi</x-label-dashboard>
                            <x-input-dashboard type="text" name="jumlah_kursi" id="jumlah_kursi" placeholder="masukkan jumlah kursi" value="{{ old('jumlah_kursi') }}" />
                            <x-input-error :messages="$errors->get('jumlah_kursi')"></x-input-error>
                        </div>
                    </div>

                    <div class="basis-full md:basis-1/3">
                        {{-- Status Bus --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="status_bus_kode">Status Bus</x-label-dashboard>
                            <select name="status_bus_kode" id="status_bus_kode"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                                @foreach ($status_bus as $s)
                                    <option value="{{ $s->kode_status }}" {{ $s->kode_status == old('status_bus_kode') ? 'selected' : '' }}>{{ $s->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Kecepatan --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="kecepatan">Kecepatan</x-label-dashboard>
                            <x-input-dashboard type="text" name="kecepatan" id="kecepatan" placeholder="masukkan kecepatan bus" value="{{ old('kecepatan') }}" />
                            <x-input-error :messages="$errors->get('kecepatan')"></x-input-error>
                        </div>

                        {{-- Harga Sewa --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="harga_sewa">Harga Sewa</x-label-dashboard>
                            <x-input-dashboard type="text" name="harga_sewa" id="harga_sewa" placeholder="masukkan harga sewa" value="{{ old('harga_sewa') }}" />
                            <x-input-error :messages="$errors->get('harga_sewa')"></x-input-error>
                        </div>
                    </div>

                    <div class="basis-full md:basis-1/3">
                        {{-- Nama Bus --}}
                        <div class="flex flex-col gap-2 mt-5">
                            <x-label-dashboard for="nama_bus">Nama Bus</x-label-dashboard>
                            <x-input-dashboard type="text" name="nama_bus" id="nama_bus" placeholder="masukkan nama bus" value="{{ old('nama_bus') }}" />
                            <x-input-error :messages="$errors->get('nama_bus')"></x-input-error>
                        </div>
                    </div>
                </div>

                {{-- Action --}}
                <div class="flex items-center justify-between mt-6 overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('dashboard.bus') }}"
                        class="flex items-center gap-2 px-4 py-2 border border-gray-600 rounded-lg hover:bg-gray-100">
                        @svg('bi-arrow-left')
                        Kembali
                    </a>

                    <button type="submit"
                        class="flex items-center gap-1 px-4 py-2 text-white bg-green-400 border rounded-lg hover:bg-green-600">
                        Tambah
                        @svg('bi-plus-lg', 'w-5 h-5')
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
