<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>

    <div class="flex flex-col justify-center w-full py-5 mx-auto bg-white md:w-3/5 mb-14 rounded-xl">
        <div class="relative pb-5" x-data="{ link: '/' }">
            <h3 class="text-[#4C535F] uppercase text-2xl text-center font-bold">Edit Profile</h3>
            <button @click="window.location = link" class="absolute right-6 top-1">
                @svg('bi-x-lg', 'w-6 h-6')
            </button>
        </div>

        @if (session()->has('success'))
        <div id="alert-3" class="flex items-center justify-center w-3/4 p-4 mx-auto mb-4 text-green-800 bg-green-200 rounded-lg dark:bg-gray-800 dark:text-green-400" role="alert">
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

        <form action="{{ route('profile.update') }}" method="POST">
            @method('PATCH')
            @csrf

            {{-- Nama Lengkap --}}
            <div class="flex flex-col items-start gap-3 py-3 px-14">
                <label for="nama_pelanggan" class="text-sm">Nama Lengkap</label>
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="w-full h-12 px-5 text-sm tracking-wide text-white border-0 rounded-lg bg-secondary-200 focus:ring-0 placeholder:text-grey-100" placeholder="isi namamu disini" value="{{ old('nama_pelanggan') ?? session()->get('user')->nama_pelanggan }}">
                <x-input-error :messages="$errors->get('nama_pelanggan')" class="mb-3"></x-input-error>
            </div>
            
            {{-- No HP --}}
            <div class="flex flex-col items-start gap-3 py-3 px-14">
                <label for="no_telepon" class="text-sm">No HP</label>
                <input type="text" name="no_telepon" id="no_telepon" class="w-full h-12 px-5 text-sm tracking-wide text-white border-0 rounded-lg bg-secondary-200 focus:ring-0 placeholder:text-grey-100" placeholder="isi nomor teleponmu disini" value="{{ old('no_telepon') ?? session()->get('user')->no_telepon }}">
                <x-input-error :messages="$errors->get('no_telepon')" class="mb-3"></x-input-error>
            </div>
            
            {{-- Jenis Kelamin --}}
            <div class="flex flex-col items-start gap-3 py-3 px-14">
                <label class="text-sm">Jenis Kelamin</label>
                <div class="flex gap-5 pt-1 pl-2 text-sm tracking-wide text-primary-base font-extralight">
                    <div>
                        <input type="radio" name="jenis_kelamin_kode" id="laki_laki" value="1" {{ session()->get('user')->jenis_kelamin_kode == 1 ? 'checked' : '' }}>
                        <label for="laki_laki" class="pl-1 font-semibold text-secondary-200">Laki-Laki</label>
                    </div>
                    <div>
                        <input type="radio" name="jenis_kelamin_kode" id="perempuan" value="2" {{ session()->get('user')->jenis_kelamin_kode == 2 || old('jenis_kelamin_kode') == 2 ? 'checked' : '' }}>
                        <label for="perempuan" class="pl-1 font-semibold text-secondary-200">Perempuan</label>
                    </div>
                </div>
            </div>
            
            {{-- Alamat --}}
            <div class="flex flex-col items-start gap-3 py-3 px-14">
                <label for="alamat" class="text-sm">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full h-12 px-5 text-sm tracking-wide text-white border-0 rounded-lg bg-secondary-200 focus:ring-0 placeholder:text-grey-100" placeholder="isi alamatmu disini" value="{{ old('alamat') ?? session()->get('user')->alamat }}">
                <x-input-error :messages="$errors->get('alamat')" class="mb-3"></x-input-error>
            </div>
            
            {{-- Password --}}
            <div class="flex flex-col items-start gap-3 py-3 px-14">
                <label for="password" class="text-sm">Password</label>
                <input type="password" name="password" id="password" class="w-full h-12 px-5 text-sm tracking-wide text-white border-0 rounded-lg bg-secondary-200 focus:ring-0 placeholder:text-grey-100" placeholder="isi passwordmu disini">
                <x-input-error :messages="$errors->get('password')" class="mb-3"></x-input-error>
            </div>
            
            {{-- Konfirmasi Password --}}
            <div class="flex flex-col items-start gap-3 py-3 px-14">
                <label for="password_confirmation" class="text-sm">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full h-12 px-5 text-sm tracking-wide text-white border-0 rounded-lg bg-secondary-200 focus:ring-0 placeholder:text-grey-100" placeholder="isi passwordmu kembali disini">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mb-3"></x-input-error>
            </div>
            
            {{-- Button--}}
            <div class="flex justify-center gap-3 py-3 px-14">
                <button type="submit" class="px-10 py-3 uppercase rounded-lg bg-primary-200 text-secondary-base">Save</button>
                <button type="reset" class="px-10 py-3 uppercase border rounded-lg border-secondary-base hover:border-transparent hover:bg-primary-200 text-secondary-base">Reset</button>
            </div>
        </form>

    </div>
</x-layout>
