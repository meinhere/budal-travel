<x-app-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="min-h-screen px-5 pt-48 pb-12 bg-center bg-cover lg:pt-28" style="background-image: url({{ $background }})">
      <div class="max-w-4xl p-5 mx-auto bg-white rounded-lg">
				{{-- Content Heading --}}
				<div class="flex items-center justify-between pb-4 overflow-hidden border-b shadow-sm sm:rounded-lg">
					<div>
						<h3 class="flex items-center gap-2 text-2xl font-bold text-primary-300">
              Tambah User
              @svg('bi-people', 'w-6 h-6')
            </h3>
					</div>
				</div>
	
				<!-- component -->
				<form action="/dashboard/user" method="post" x-data="{ kode: '', role: {{ $role }} }">
          @csrf
          <div class="flex flex-wrap justify-between w-full gap-4 sm:flex-nowrap">
            <div class="basis-full md:basis-1/3">
              {{-- Role --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="role_id" class="text-xl font-semibold text-secondary-base">Role User</label>
                <select name="role_id" id="role_id" x-model="kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                  <option value="0">Pelanggan</option>
                  <template x-for="(r, i) in role" :key="i">
                    <option :value="r.id_role" x-text="r.nama_role"></option>
                  </template>
                </select>
              </div>

              {{-- Nama User --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="nama_user" class="text-xl font-semibold text-secondary-base">Nama User</label>
                <input type="text" name="nama_user" id="nama_user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan nama user">
              </div>
              
              {{-- Jenis Kelamin --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="kode_jenis_kelamin" class="text-xl font-semibold text-secondary-base">Jenis Kelamin</label>
                <select name="kode_jenis_kelamin" id="kode_jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                  @foreach ($jenis_kelamin as $j)
                    <option value="{{ $j->kode_jenis_kelamin }}">{{ $j->keterangan }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="basis-full md:basis-1/3">
              {{-- Username --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="username" class="text-xl font-semibold text-secondary-base">Username</label>
                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan username">
              </div>

              {{-- Password --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="password" class="text-xl font-semibold text-secondary-base">Password</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan password bus">
              </div>
              
              {{-- Konfirmasi Password --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="password_confirmation" class="text-xl font-semibold text-secondary-base">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan konfirmasi password">
              </div>
            </div>

            <div class="basis-full md:basis-1/3">
              {{-- No Telepon --}}
              <div class="flex flex-col gap-2 mt-5">
                <label for="no_telepon" class="text-xl font-semibold text-secondary-base">No Telepon</label>
                <input type="text" name="no_telepon" id="no_telepon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan no telepon">
              </div>

              {{-- Alamat --}}
              <div class="flex flex-col gap-2 mt-5" x-show="kode == 0">
                <label for="alamat" class="text-xl font-semibold text-secondary-base">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5" placeholder="masukkan alamat" :disabled="kode != 0">
              </div>
            </div>
          </div>

          {{-- Action --}}
          <div class="flex items-center justify-between mt-6 overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('dashboard.user') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-600 rounded-lg hover:bg-gray-100">
              @svg('bi-arrow-left')
              Kembali
            </a>

            <button type="submit" class="flex items-center gap-1 px-4 py-2 text-white bg-green-400 border rounded-lg hover:bg-green-600">
              Tambah
              @svg('bi-plus-lg', 'w-5 h-5')
            </button>
          </div>
        </form>
			</div>
  </div>
</x-app-layout>
