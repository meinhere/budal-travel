<div class="{{ request()->is('/') ? 'mt-14 md:mt-20' : 'mx-auto w-full' }} md:w-3/4 md:h-3/5 text-secondary-base">
    <div class="relative flex justify-between bg-white shadow-lg rounded-r-xl rounded-xl">
      <div class="flex flex-col items-start w-full px-5 py-5 md:px-12">
        <label for="kota" class="text-slate-400">DAERAH</label>

        <input list="list-kota" id="kota" name="kota" class="w-full px-0 border-0 border-b-2 outline-none focus:ring-0 md:mt-2 border-secondary-base focus:border-primary-300 text-secondary-base">
        <datalist id="list-kota">
          <option class="cursor-pointer" value="Semarang, Jawa Tengah" selected>
          <option class="cursor-pointer" value="Lamongan, Jawa Timur">
          <option class="cursor-pointer" value="Surabaya, Jawa Timur">
          <option class="cursor-pointer" value="Malang, Jawa Timur">
        </datalist>
      </div>
      <div class="flex items-center justify-center px-6 text-center rounded-r-xl bg-secondary-base">
        <a href="/search/1" class="text-primary-base">
          Cari dan Pesan Tiket
          <svg class="inline-block w-8 h-8 text-primary-base" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
          </svg>
        </a>
      </div>
    </div>
  </div>