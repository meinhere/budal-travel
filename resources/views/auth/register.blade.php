<x-guest-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>
    <x-slot:background_caption>{{ $background_caption }}</x-slot:background_caption>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    {{-- Logo --}}
    <div class="flex justify-center pb-2">
        <a href="/"><x-application-logo class="w-56" /></a>
    </div>

    {{-- Heading --}}
    <div class="pb-7">
        <h2 class="text-3xl font-semibold text-primary-200">Daftar</h2>
        <p class="pt-2 text-xs tracking-wider text-grey-200 font-extralight">Daftar akun untuk menikmati fitur yang tersedia</p>
    </div>

    {{-- Form --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        {{-- Nama Lengkap --}}
        <div class="flex flex-col gap-2 mb-4">
          <div class="relative h-11">
            <x-input-auth type="text" id="nama_pelanggan" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" />
            <x-label-auth for="nama_pelanggan">Nama Lengkap</x-label-auth>
          </div>
          <x-input-error :messages="$errors->get('nama_pelanggan')" class="mb-3"></x-input-error>
        </div>

        {{-- Username --}}
        <div class="flex flex-col gap-2 mb-4">
          <div class="relative h-11">
            <x-input-auth type="text" id="username" name="username" value="{{ old('username') }}" />
            <x-label-auth for="username">Username</x-label-auth>
          </div>
          <x-input-error :messages="$errors->get('username')" class="mb-3"></x-input-error>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="flex flex-col gap-2 mb-6">
          <div class="relative h-11">
            <p class="pl-2 tracking-wide text-primary-base font-extralight">Jenis Kelamin</p>
            <div class="flex gap-5 pt-1 pl-2 text-sm tracking-wide text-primary-base font-extralight">
              <div>
                <input type="radio" name="jenis_kelamin_kode" id="laki_laki" value="1" checked>
                <label for="laki_laki">Laki-Laki</label>
              </div>
              <div>
                <input type="radio" name="jenis_kelamin_kode" id="perempuan" value="2" {{ old('jenis_kelamin_kode') == 2 ? 'checked' : '' }}>
                <label for="perempuan">Perempuan</label>
              </div>
            </div>
          </div>
          <x-input-error :messages="$errors->get('jenis_kelamin_kode')" class="mb-3"></x-input-error>
        </div>
        
        {{-- Alamat --}}
        <div class="flex flex-col gap-2 mb-4">
          <div class="relative h-11">
            <x-input-auth type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" />
            <x-label-auth for="alamat">Alamat</x-label-auth>
          </div>
          <x-input-error :messages="$errors->get('alamat')" class="mb-3"></x-input-error>
        </div>

        {{-- No HP --}}
        <div class="flex flex-col gap-2 mb-4">
          <div class="relative h-11">
            <x-input-auth type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}" />
            <x-label-auth for="no_telepon">No HP</x-label-auth>
          </div>
          <x-input-error :messages="$errors->get('no_telepon')" class="mb-3"></x-input-error>
        </div>
        
        {{-- Password --}}
        <div class="flex flex-col gap-2 mb-4" x-data="{ show: false, val: '' }">
          <div class="relative h-11">
            <x-input-auth x-show="!show" type="password" id="password" name="password" x-model="val" />
            <x-input-auth x-show="show" type="text" id="password" name="password" x-model="val" value="{{ old('password') }}" />
            <x-label-auth for="password">Password</x-label-auth> 

            <button type="button" @click="show = !show">
              @svg('bi-eye-fill', ['class' => 'absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer', 'x-show' => 'show'])
              @svg('bi-eye-slash-fill', ['class' => 'absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer', 'x-show' => '!show'])
            </button>
          </div>
          <x-input-error :messages="$errors->get('password')" class="mb-3"></x-input-error>
        </div>
        
        {{-- Konfirmasi Password --}}
        <div class="flex flex-col gap-2 mb-4" x-data="{ show: false, val: '' }">
          <div class="relative h-11">
            <x-input-auth x-show="!show" type="password" id="password_confirmation" name="password_confirmation" x-model="val" />
            <x-input-auth x-show="show" type="text" id="password_confirmation" name="password_confirmation" x-model="val" />
            <x-label-auth for="password_confirmation">Konfirmasi Password</x-label-auth>

            <button type="button" @click="show = !show">
              @svg('bi-eye-fill', ['class' => 'absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer', 'x-show' => 'show'])
              @svg('bi-eye-slash-fill', ['class' => 'absolute block w-6 h-6 top-3 right-4 text-primary-base hover:cursor-pointer', 'x-show' => '!show'])
            </button>
          </div>
          <x-input-error :messages="$errors->get('password_confirmation')" class="mb-3"></x-input-error>
        </div>

        <button
          class="block w-full px-6 py-3 mt-6 text-xs tracking-wider text-center text-white align-middle bg-blue-500 rounded-lg "
          type="submit"
        >
          Daftar
        </button>

        <p class="block mt-6 text-sm antialiased font-normal leading-relaxed text-center text-gray-500">
          Sudah punya akun? 
          <a class="underline transition-colors text-primary-base hover:text-primary-200"
            href="/login">
            Login
          </a>
        </p>
    </form>
</x-guest-layout>