<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="nama_pelanggan" :value="__('Nama Lengkap')" />
            <x-text-input id="nama_pelanggan" class="block mt-1 w-full" type="text" name="nama_pelanggan" :value="old('nama_pelanggan')" autofocus />
            <x-input-error :messages="$errors->get('nama_pelanggan')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        
        <!-- Jenis Kelamin -->
        <div class="mt-4">
            <x-input-label for="jenis_kelamin_id" :value="__('Jenis Kelamin')" />

            <select name="jenis_kelamin_id" id="jenis_kelamin_id">
                <option value="1">Laki-Laki</option>
                <option value="2">Laki-Laki</option>
            </select>

            <x-input-error :messages="$errors->get('jenis_kelamin_id')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />

            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>

            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
