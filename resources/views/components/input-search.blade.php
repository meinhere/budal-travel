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
          @svg('bi-arrow-right', ['class' => 'inline-block w-6 h-6 text-primary-base'])
        </a>
      </div>
    </div>
  </div>