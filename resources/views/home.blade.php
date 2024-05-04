<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="pt-5 max-w-4xl mx-2 md:mx-auto">
    <h1 class="text-4xl md:text-5xl text-primary-base font-bold leading-normal md:leading-relaxed">Wujudkan liburan yang tak terlupakan bersama kami!</h1>
    <p class="mt-3 text-primary-base">Pesan Bus Pariwisata untuk Jelajahi Destinasi Impian Anda!</p>

    <div class="mt-14 md:mt-20 w-full md:w-3/4 md:h-3/5 text-secondary-base">
      <form action="/search" class="rounded-r-xl shadow-lg relative justify-between bg-white flex rounded-xl">
        @method('GET')
        <div class="flex flex-col items-start w-full md:w-1/2 px-5 md:px-12 py-5">
          <label for="kota" class="text-slate-400">DAERAH</label>

          <input list="list-kota" id="kota" name="kota" class="border-0 px-0 focus:ring-0 border-b-2 md:mt-2 border-secondary-base outline-none focus:border-primary-300 text-secondary-base w-full">
          <datalist id="list-kota">
            <option class="cursor-pointer" value="Semarang, Jawa Tengah">
            <option class="cursor-pointer" value="Lamongan, Jawa Timur">
            <option class="cursor-pointer" value="Surabaya, Jawa Timur">
            <option class="cursor-pointer" value="Malang, Jawa Timur">
          </datalist>
        </div>
        <button type="submit" class="bg-secondary-base px-6 rounded-r-xl text-primary-base">
          Cari dan Pesan Tiket
          <svg class="w-8 h-8 text-primary-base inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
          </svg>
        </button>
        
      </form>
    </div>
  </div>
</x-layout>