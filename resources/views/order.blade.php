<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>
  
  <div class="flex flex-wrap justify-center max-w-5xl gap-12 pt-5 mx-2 md:flex-nowrap md:mx-auto">
    <div class="px-5 py-6 bg-white rounded-lg md:px-10 md:py-8 md:basis-4/5">
      <div class="text-center md:text-left">
        <h1 class="pb-3 text-secondary-base">PEMESANAN</h1>
        <h3 class="text-2xl font-bold text-secondary-base">Detail Pesanan</h3>
      </div>
      
      <form action="" class="flex flex-wrap justify-center gap-3 pt-3 md:flex-nowrap md:justify-between">
        <div class="order-2 px-1 py-3 md:order-1 md:basis-4/6">
          <div class="form-head">
            <div class="flex w-full pt-4 titik-jemput">
              <label for="">
                <svg class="w-8 h-8 text-secondary-base dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"/>
              </svg>
              </label>
              <input type="text" placeholder="Pilih Titik Jemput" class="border-0">
            </div>
            <div class="w-full pt-4 maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.9848403210676!2d112.72050577414473!3d-7.127749469903781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd803dd886bbff5%3A0x9777ca139b28195d!2sUniversitas%20Trunojoyo%20Madura!5e0!3m2!1sid!2sid!4v1714999929988!5m2!1sid!2sid" class="w-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="py-4 input-group">
              <div class="w-full pt-4 wisata">
                <label class="flex items-center">
                  <svg class="w-8 h-8 text-secondary-base" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 12A2.5 2.5 0 0 1 21 9.5V7a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v2.5a2.5 2.5 0 0 1 0 5V17a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                  </svg> <span class="pl-3 text-secondary-base">Tambah Wisata</span>            
                </label>
              </div>
              <div class="w-full pt-4" x-data="{ inputs: [{}] }">
                <template x-for="(input, index) in inputs" :key="index">
                  <div class="flex input-group dropdown">
                    <select class="mr-2" x-data="{ wisata: { 1: 'Museum Lawang Sewu', 2: 'Oleh-Oleh Khas Semarang', 3: 'Masjid Agung Jawa Tengah' } }">
                      <option></option>
                      <template x-for="(name, id) in wisata">
                        <option x-text="name" :value="id"></option>
                      </template>
                    </select>
                    <button type="button" class="ml-2 border border-transparent rounded hover:border-gray-400" @click="inputs.push({})">
                      <svg class="w-6 h-6 text-secondary-base" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                      </svg>
                    </button>
                  </div>
                </template>
              </div>
            </div>
            <div class="py-4 input-group">
              <div class="w-full pt-4 wisata">
                <label class="flex items-center">
                  <svg class="w-8 h-8 text-secondary-base" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>
                    <span class="pl-3 text-secondary-base">Jumlah Penumpang</span>            
                </label>
              </div>
              <div class="flex w-full pt-4">
                <input type="text" name="jumlah-penumpang" class="w-3/4 border-0" placeholder="Berupa angka">
              </div>
            </div>
          </div>

          <div class="py-6 border-t form-foot border-secondary-base">
            <h3 class="pb-4 text-2xl font-bold text-secondary-base">Include</h3>

            <div class="flex items-center py-3 input-group" x-data="{ isOpen: false }">
              <input type="checkbox" name="makan" id="makan" class="border-2 border-secondary-base active:bg-secondary-base focus:ring-0 focus:ring-transparent checked:bg-secondary-base checked:focus:bg-secondary-base checked:hover:bg-secondary-base" @click="isOpen = !isOpen" />
              <label for="makan" class="pl-3 text-secondary-base">Makan</label>
              <div x-show="isOpen" class="flex">
                <input type="text" name="jumlah-makan" class="w-3/4 border-0 focus:border-0 focus:ring-0" placeholder="Jumlah makan">
                <input type="text" name="harga-mulai" class="w-3/4 border-0 focus:border-0 focus:ring-0" placeholder="Harga mulai">
              </div>
            </div>
            <div class="py-3 input-group">
              <input type="checkbox" name="htm" class="border-2 border-secondary-base active:bg-secondary-base focus:ring-0 focus:ring-transparent checked:bg-secondary-base checked:focus:bg-secondary-base checked:hover:bg-secondary-base">
              <label class="pl-3 text-secondary-base">HTM</label>  
            </div>
          </div>

          <button type="submit" class="w-full py-3 font-bold rounded-lg bg-primary-200 text-secondary-base">Pesan</button>
        </div>
        <div class="order-1 px-1 md:order-2 md:basis-2/6">
            <div class="flex flex-col w-full pt-4 jam-berangkat">
              <label class="flex items-center">
                <svg class="w-8 h-8 text-secondary-base" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <span class="pl-3 text-secondary-base">Jam Berangkat</span>            
              </label>
              <div class="w-full px-4 py-2 mt-4 rounded-lg bg-secondary-100 text-secondary-base">
                <span class="block">Pilih Jam</span>
                <input type="time" name="jam-berangkat" class="p-0 bg-transparent border-0 text-secondary-base focus:ring-0">  
              </div>
            </div>
        </div>
      </form>
    </div>
    <div class="h-full md:basis-2/5">
      <div class="px-10 py-8 bg-white rounded-lg">
        <div class="detail-head">
          <h1 class="pb-3 text-secondary-base">DAERAH ASAL</h1>
          <h3 class="text-2xl font-bold text-secondary-base">Tuban, Jawa Timur</h3>
          <div class="pt-3 detail-bus">
            <p class="text-sm text-gray-400">Bus: Jetbus 5 by Adiputro Malang</p>
            <a href="" class="text-blue-500 text-[10px] hover:underline">informasi bus selengkapnya bisa dicek disini</a>
          </div>
        </div>
  
        <div class="flex justify-center my-8 detail-icon">
          <x-iconpark-switch-o class="p-1 rotate-90 rounded-full h-7 w-7 bg-primary-base" />
        </div>
  
        <div class="detail-foot">
          <h1 class="pb-3 text-secondary-base">DAERAH TUJUAN</h1>
          <h3 class="text-2xl font-bold text-secondary-base">Semarang, Jawa Tengah</h3>
  
          <div class="pt-3 text-gray-400 detail-tujuan">
            <div class="detail-wisata">
              <p>Wisata</p>
              <ul class="pl-8 list-disc">
                <li class="text-sm">Museum Lawang Sewu <a href="" class="text-blue-500 text-[10px] hover:underline">detail</a></li>
                <li class="text-sm">Oleh-Oleh Khas Semarang <a href="" class="text-blue-500 text-[10px] hover:underline">detail</a></li>
                <li class="text-sm">Masjid Agung Jawa Tengah <a href="" class="text-blue-500 text-[10px] hover:underline">detail</a></li>
              </ul>
            </div>
            <div class="detail-tambahan">
              <p>Include</p>
              <ul class="pl-8 list-disc">
                <li class="text-sm">Makan <a href="" class="text-blue-500 text-[10px] hover:underline">detail</a></li>
                <li class="text-sm">HTM <a href="" class="text-blue-500 text-[10px] hover:underline">detail</a></li>
              </ul>
            </div>
          </div>
        </div>
  
        <div class="w-full py-3 font-semibold text-center rounded-lg total bg-primary-200 mt-7 text-secondary-base ">
          TOTAL Rp 700.000,-
        </div>
      </div>

      <div class="flex justify-center p-4 mt-10 rounded-lg bg-primary-base">
        <a href="/search/1" class="font-semibold text-secondary-base">KEMBALI?</a>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() { 
      $("#wisata1").select2({
        placeholder: "Isi destinasi yang diinginkan",
      }); 
    });
  </script>
</x-layout>