<x-app-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="min-h-screen px-5 pt-48 pb-12 bg-center bg-cover lg:pt-28" style="background-image: url({{ $background }})">
      <div class="max-w-4xl p-5 mx-auto bg-white rounded-lg">
				{{-- Content Heading --}}
				<div class="flex items-center justify-between pb-4 overflow-hidden border-b shadow-sm sm:rounded-lg">
					<div>
						<h3 class="flex items-center gap-2 text-2xl font-bold text-primary-300">
              Edit User
              @svg('bi-people', 'w-6 h-6')
            </h3>
					</div>
				</div>
	
				<!-- component -->
				<form action="{{ route('user.update', $login) }}" method="post" x-data="{ kode: {{ old('role_id') ?? $user->role_id }}, role: {{ $role }} }">
          @method('PUT')
          @csrf
          <div class="flex flex-wrap justify-between w-full gap-4 sm:flex-nowrap">
            <div class="basis-full md:basis-1/3">
              {{-- Role --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="role_id">Role User</x-label-dashboard>
                <select name="role_id" id="role_id" x-model="kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                  <option value="0">Pelanggan</option>
                  <template x-for="(r, i) in role" :key="i">
                    <option :value="r.id_role" x-text="r.nama_role" :selected="r.id_role == '{{ old('role_id') ?? $user->role_id }}'"></option>
                  </template>
                </select>
              </div>

              {{-- Nama User --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="nama_user">Nama User</x-label-dashboard>
                <x-input-dashboard type="text" name="nama_user" id="nama_user" placeholder="masukkan nama user" value="{{ old('nama_user') ?? $user->nama_pelanggan ?? $user->nama_karyawan }}" />
                <x-input-error :messages="$errors->get('nama_user')"></x-input-error>
              </div>
              
              {{-- Jenis Kelamin --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="jenis_kelamin_kode">Jenis Kelamin</x-label-dashboard>
                <select name="jenis_kelamin_kode" id="jenis_kelamin_kode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-300 focus:border-primary-300 block w-full p-2.5 ">
                  @foreach ($jenis_kelamin as $j)
                    <option value="{{ $j->kode_jenis_kelamin }}" {{ $j->kode_jenis_kelamin == (old('jenis_kelamin_kode') ?? $user->jenis_kelamin_kode) ? 'selected' : '' }}>{{ $j->keterangan }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="basis-full md:basis-1/3">
              {{-- Username --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="username">Username</x-label-dashboard>
                <x-input-dashboard type="text" name="username" id="username" placeholder="masukkan username" value="{{ old('username') ?? $user->login->username }}" />
                <x-input-error :messages="$errors->get('username')"></x-input-error>
              </div>

              {{-- Password --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="password">Password</x-label-dashboard>
                <x-input-dashboard type="password" name="password" id="password" placeholder="masukkan password" />
              </div>
              
              {{-- Konfirmasi Password --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="password_confirmation">Konfirmasi Password</x-label-dashboard>
                <x-input-dashboard type="password" name="password_confirmation" id="password_confirmation" placeholder="masukkan konfirmasi password" />
                <x-input-error :messages="$errors->get('password_confirmation')"></x-input-error>
              </div>
            </div>

            <div class="basis-full md:basis-1/3">
              {{-- No Telepon --}}
              <div class="flex flex-col gap-2 mt-5">
                <x-label-dashboard for="no_telepon">No Telepon</x-label-dashboard>
                <x-input-dashboard type="text" name="no_telepon" id="no_telepon" placeholder="masukkan no telepon" value="{{ old('no_telepon') ?? $user->no_telepon }}" />
                <x-input-error :messages="$errors->get('no_telepon')"></x-input-error>
              </div>

              {{-- Alamat --}}
              <div class="flex flex-col gap-2 mt-5" x-show="kode == 0">
                <x-label-dashboard for="alamat">Alamat</x-label-dashboard>
                <x-input-dashboard type="text" name="alamat" id="alamat" placeholder="masukkan alamat" ::disabled="kode != 0" value="{{ old('alamat') ?? $user->alamat }}" />
                <x-input-error :messages="$errors->get('alamat')"></x-input-error>
              </div>
            </div>
          </div>

          {{-- Action --}}
          <div class="flex items-center justify-between mt-6 overflow-hidden shadow-sm sm:rounded-lg">
            <a href="{{ route('dashboard.user') }}" class="flex items-center gap-2 px-4 py-2 border border-gray-600 rounded-lg hover:bg-gray-100">
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
