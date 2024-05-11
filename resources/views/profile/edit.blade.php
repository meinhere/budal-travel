<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>

    <div class="mx-auto w-full md:w-3/5 flex flex-col py-5 mb-14 justify-center bg-white rounded-xl">
        <div class="pb-5 relative" x-data="{ link: '/' }">
            <h3 class="text-[#4C535F] uppercase text-2xl text-center font-bold">Edit Profile</h3>
            <button @click="window.location = link" class="absolute right-6 top-1">
                <x-bi-x-lg class="w-6 h-6" />
            </button>
        </div>

        <form action="" method="POST">
            @method('PUT')
            @csrf

            {{-- Nama Lengkap --}}
            <div class="px-14 py-3 flex flex-col items-start gap-3">
                <label for="nama_pelanggan" class="text-sm">Nama Lengkap</label>
                <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="w-full h-12 rounded-lg bg-secondary-200 border-0 text-sm tracking-wide text-white focus:ring-0 placeholder:text-grey-100 px-5" placeholder="isi namamu disini">
            </div>

            {{-- No HP --}}
            <div class="px-14 py-3 flex flex-col items-start gap-3">
                <label for="no_hp" class="text-sm">No HP</label>
                <input type="text" name="no_hp" id="no_hp" class="w-full h-12 rounded-lg bg-secondary-200 border-0 text-sm tracking-wide text-white focus:ring-0 placeholder:text-grey-100 px-5" placeholder="isi nomor teleponmu disini">
            </div>

            {{-- Alamat --}}
            <div class="px-14 py-3 flex flex-col items-start gap-3">
                <label for="alamat" class="text-sm">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full h-12 rounded-lg bg-secondary-200 border-0 text-sm tracking-wide text-white focus:ring-0 placeholder:text-grey-100 px-5" placeholder="isi alamatmu disini">
            </div>

            {{-- Password --}}
            <div class="px-14 py-3 flex flex-col items-start gap-3">
                <label for="password" class="text-sm">Password</label>
                <input type="text" name="password" id="password" class="w-full h-12 rounded-lg bg-secondary-200 border-0 text-sm tracking-wide text-white focus:ring-0 placeholder:text-grey-100 px-5" placeholder="isi passwordmu disini">
            </div>

            {{-- Konfirmasi Password --}}
            <div class="px-14 py-3 flex flex-col items-start gap-3">
                <label for="password_confirmation" class="text-sm">Konfirmasi Password</label>
                <input type="text" name="password_confirmation" id="password_confirmation" class="w-full h-12 rounded-lg bg-secondary-200 border-0 text-sm tracking-wide text-white focus:ring-0 placeholder:text-grey-100 px-5" placeholder="isi passwordmu kembali disini">
            </div>

            {{-- Button--}}
            <div class="px-14 py-3 flex justify-center gap-3">
                <button type="submit" class="uppercase py-3 px-10 rounded-lg bg-primary-200  text-secondary-base">Save</button>
                <button type="reset" class="uppercase py-3 px-10 rounded-lg border border-secondary-base hover:border-transparent hover:bg-primary-200 text-secondary-base">Reset</button>
            </div>
        </form>

    </div>
</x-layout>
