<x-app-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="min-h-screen px-5 pt-48 pb-12 bg-center bg-cover lg:pt-28" style="background-image: url({{ $background }})">
      <div class="max-w-4xl p-5 mx-auto bg-white rounded-lg">
				{{-- Content Heading --}}
				<div class="flex items-center justify-between pb-4 overflow-hidden border-b shadow-sm sm:rounded-lg">
					<div>
						<h3 class="flex items-center gap-2 text-2xl font-bold text-primary-300">
              Edit Bus
              @svg('bi-bus-front', 'w-6 h-6')
            </h3>
					</div>
				</div>
	
				<!-- component -->
				<form action="dashboard/bus" method="post">
          @method('PUT')
          @csrf
          <div class="flex flex-wrap justify-between w-full gap-4 sm:flex-nowrap">
            <div class="basis-full md:basis-1/3">
              {{-- Kategori Bus --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="kategori_kode" class="text-xl font-semibold text-secondary-base">Kategori Kode Bus</label>
                <select name="kategori_kode" id="kategori_kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                  @foreach ($kategori as $k)
                    <option value="{{ $k->kode_kategori }}" {{ $k->kode_kategori == $bus->kategori_kode ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                  @endforeach
                </select>
              </div>

              {{-- Kapasitas Solar --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="kapasitas_solar" class="text-xl font-semibold text-secondary-base">Kapasitas Solar</label>
                <input type="text" name="kapasitas_solar" id="kapasitas_solar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan kapasitas solar" value="{{ old('kapasitas_solar') ?? $bus->kapasitas_solar }}">
              </div>
              
              {{-- Jumlah Kursi --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="jumlah_kursi" class="text-xl font-semibold text-secondary-base">Jumlah Kursi</label>
                <input type="text" name="jumlah_kursi" id="jumlah_kursi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan jumlah kursi" value="{{ old('jumlah_kursi') ?? $bus->jumlah_kursi }}">
              </div>
            </div>

            <div class="basis-full md:basis-1/3">
              {{-- Status Bus --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="status_bus_kode" class="text-xl font-semibold text-secondary-base">Status Bus</label>
                <select name="status_bus_kode" id="status_bus_kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                  @foreach ($status_bus as $s)
                    <option value="{{ $s->kode_status }}" {{ $s->kode_status == $bus->status_bus_kode ? 'selected' : '' }}>{{ $s->deskripsi }}</option>
                  @endforeach
                </select>
              </div>

              {{-- Kecepatan --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="kecepatan" class="text-xl font-semibold text-secondary-base">Kecepatan</label>
                <input type="text" name="kecepatan" id="kecepatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan kecepatan bus" value="{{ old('kecepatan') ?? $bus->kecepatan }}">
              </div>
              
              {{-- Harga Sewa --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="harga_sewa" class="text-xl font-semibold text-secondary-base">Harga Sewa</label>
                <input type="text" name="harga_sewa" id="harga_sewa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan harga sewa" value="{{ old('harga_sewa') ?? $bus->harga_sewa }}">
              </div>
            </div>

            <div class="basis-full md:basis-1/3">
              {{-- Nama Bus --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="nama_bus" class="text-xl font-semibold text-secondary-base">Nama Bus</label>
                <input type="text" name="nama_bus" id="nama_bus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan nama bus" value="{{ old('nama_bus') ?? $bus->nama_bus }}">
              </div>
            </div>
          </div>

          {{-- Action --}}
          <div class="flex items-center justify-between mt-6 overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('dashboard.bus') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-600 rounded-lg hover:bg-gray-100">
              @svg('bi-arrow-left')
              Kembali
            </a>

            <button type="submit" class="flex items-center gap-1 px-4 py-2 text-white bg-blue-600 border rounded-lg hover:bg-blue-700">
              Simpan
              @svg('bi-check-lg', 'w-5 h-5')
            </button> 
          </div>
        </form>
			</div>
  </div>
</x-app-layout>
