<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="min-h-screen px-5 pt-48 pb-12 bg-center bg-cover lg:pt-28"
        style="background-image: url({{ $background }})">
        <div class="max-w-4xl p-5 mx-auto bg-white rounded-lg">
            {{-- Content Heading --}}
            <div class="flex items-center justify-between pb-4 overflow-hidden border-b shadow-sm sm:rounded-lg">
                <div>
                    <h3 class="flex items-center gap-2 text-2xl font-bold text-primary-300">
                        Edit Wisata
                        @svg('bi-houses', 'w-6 h-6')
                    </h3>
                </div>
            </div>

            <!-- component -->
            <form action="{{ route('wisata.update', $wisata) }}" method="post">
                @method('PUT')
                @csrf
                <div class="flex flex-wrap justify-between w-full gap-4 sm:flex-nowrap">
                    <div class="basis-full md:basis-1/3">
                      {{-- Kode Kota --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="kota_kode">Kode Kota</x-label-dashboard>
                        <select name="kota_kode" id="kota_kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                          @foreach ($kota as $k)
                            <option value="{{ $k->kode_kota }}" {{ $k->kode_kota == (old('kota_kode') ?? $wisata->kota_kode) ? 'selected' : '' }}>{{ $k->nama_kota }}</option>
                          @endforeach
                        </select>
                      </div>
        
                      {{-- Jam Buka --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="jam_buka">Jam Buka</x-label-dashboard>
                        <x-input-dashboard type="time" name="jam_buka" id="jam_buka" value="{{ old('jam_buka') ?? $wisata->jam_buka }}" />
                        <x-input-error :messages="$errors->get('jam_buka')"></x-input-error>
                      </div>
                      
                      {{-- Tarif Parkir --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="tarif_parkir">Tarif Parkir</x-label-dashboard>
                        <x-input-dashboard type="text" name="tarif_parkir" id="tarif_parkir" placeholder="Rp xx.xxx,-" value="{{ old('tarif_parkir') ?? $wisata->tarif_parkir }}" />
                        <x-input-error :messages="$errors->get('tarif_parkir')"></x-input-error>
                      </div>
                    </div>
                    
                    <div class="basis-full md:basis-1/3">
                      {{-- Nama Wisata --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="nama_wisata">Nama Wisata</x-label-dashboard>
                        <x-input-dashboard type="text" name="nama_wisata" id="nama_wisata" placeholder="masukkan nama wisata" value="{{ old('nama_wisata') ?? $wisata->nama_wisata }}" />
                        <x-input-error :messages="$errors->get('nama_wisata')"></x-input-error>
                      </div>
        
                      {{-- Jam Tutup --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="jam_tutup">Jam Tutup</x-label-dashboard>
                        <x-input-dashboard type="time" name="jam_tutup" id="jam_tutup" value="{{ old('jam_tutup') ?? $wisata->jam_tutup }}" />
                        <x-input-error :messages="$errors->get('jam_tutup')"></x-input-error>
                      </div>
                      
                      {{-- Titik Lokasi (Lat) --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="titik_lat">Titik Lokasi (Lat)</x-label-dashboard>
                        <x-input-dashboard type="text" name="titik_lat" id="titik_lat" placeholder="masukkan titik latitude" value="{{ old('titik_lat') ?? trim(explode(',', $wisata->titik_lokasi)[0]) }}" />
                        <x-input-error :messages="$errors->get('titik_lat')"></x-input-error>
                      </div>
                    </div>
        
                    <div class="basis-full md:basis-1/3">
                      {{-- Alamat Wisata --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="alamat_wisata">Alamat Wisata</x-label-dashboard>
                        <x-input-dashboard type="text" name="alamat_wisata" id="alamat_wisata" placeholder="masukkan alamat wisata" value="{{ old('alamat_wisata') ?? $wisata->alamat_wisata }}" />
                        <x-input-error :messages="$errors->get('alamat_wisata')"></x-input-error>
                      </div>
        
                      {{-- Tarif Masuk Wisata --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="tarif_masuk_wisata">Tarif Masuk Wisata</x-label-dashboard>
                        <x-input-dashboard type="text" name="tarif_masuk_wisata" id="tarif_masuk_wisata" placeholder="Rp xx.xxx,-" value="{{ old('tarif_masuk_wisata') ?? $wisata->tarif_masuk_wisata }}" />
                        <x-input-error :messages="$errors->get('tarif_masuk_wisata')"></x-input-error>
                      </div>
        
                      {{-- Titik Lokasi (Long) --}}
                      <div class="flex flex-col gap-2 mt-5">
                        <x-label-dashboard for="titik_long">Titik Lokasi (Long)</x-label-dashboard>
                        <x-input-dashboard type="text" name="titik_long" id="titik_long" placeholder="masukkan titik longitude" value="{{ old('titik_long') ?? trim(explode(',', $wisata->titik_lokasi)[1]) }}" />
                        <x-input-error :messages="$errors->get('titik_long')"></x-input-error>
                      </div>
                    </div>
                  </div>

                {{-- Action --}}
                <div class="flex items-center justify-between mt-6 overflow-hidden shadow-sm sm:rounded-lg">
                    <a href="{{ route('dashboard.wisata') }}"
                        class="flex items-center gap-2 px-4 py-2 border border-gray-600 rounded-lg hover:bg-gray-100">
                        @svg('bi-arrow-left')
                        Kembali
                    </a>

                    <button type="submit"
                        class="flex items-center gap-1 px-4 py-2 text-white bg-blue-600 border rounded-lg hover:bg-blue-700">
                        Simpan
                        @svg('bi-check-lg', 'w-5 h-5')
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
