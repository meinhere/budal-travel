<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>
  
  <div class="max-w-6xl gap-4 pt-8 mx-2 md:pt-14 md:mx-auto">
    <div class="max-w-xl px-4 py-4 mx-2 bg-white shadow md:mx-auto rounded-xl">
      {{-- Kota dan Bus --}}
      <div class="relative py-2" x-data="{ link: '/transaction' }">
        <h3 class="text-2xl text-secondary-base">Semarang, Jawa Tengah</h3>
        <p class="pt-1 text-sm text-gray-500">Jetbus 5 by Adiputro Malang</p>
        
        <button @click="window.location = link" class="absolute right-1 top-2">
          {{-- <x-bi-x-lg class="w-6 h-6" /> --}}
        </button>
      </div>

      {{-- Detail Wisata --}}
      <div class="flex flex-wrap py-2 sm:gap-8">
        <div>
          <p>Wisata:</p>
          <ul class="pl-8 list-disc">
            <li>Museum Lawang Sewu</li>
            <li>Oleh-Oleh Khas Semarang</li>
            <li>Masjid Agung Jawa Tengah</li>
          </ul>
        </div>
        <div>
          <p>Include:</p>
          <ul class="pl-8 list-disc">
            <li>HTM</li>
            <li>Makan</li>
          </ul>
        </div>
      </div>
      
      {{-- Status Pembayaran --}}
      <div class="flex gap-4 py-2">
        <h3 class="inline-block text-secondary-base">Status Pembayaran:</h3>
        <div class="flex items-center gap-1">
          {{-- <x-bi-circle-fill class="w-3 h-3 text-green-400" /> --}}
          <span>Lunas</span>
        </div>
      </div>

      {{-- Total & Detail --}}
      <div class="flex items-center justify-between gap-4 py-2">
        <div class="flex gap-2">
          <span class="text-sm">Total</span>
          <h3 class="text-3xl text-primary-300">Rp 700.000</h3>
        </div>
      </div>
      
      {{-- Button --}}
      <div class="flex justify-center gap-3 py-4">
        <!-- Modal toggle -->
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block py-3 text-sm font-medium text-center text-white uppercase bg-blue-500 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 px-7" type="button">
          Berikan Ulasan
        </button>
        
        <a href="/transaction" class="px-6 py-3 text-sm font-medium text-white uppercase rounded-lg bg-primary-200">Kembali</a>
      </div>
    </div>
  </div>

  <!-- Main modal -->
  <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-center p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="flex text-xl font-semibold text-gray-900 dark:text-white">
                    Berikan Ulasan
                    📝
                </h3>
            </div>
            <form action="">
              <!-- Modal body -->
              <div class="p-4 space-y-4 md:p-5">
                  {{-- Ekspresi --}}
                  <div x-data="{ emoji: 1, active: false }">
                    <h4 class="text-lg font-semibold leading-relaxed">Pilih Ekspresi Anda</h4>
                    <div class="flex justify-center gap-6">
                      @svg('bi-emoji-smile', ['class' => 'w-8 h-8 hover:cursor-pointer', '@click' => 'emoji = 1', ':class' => 'emoji == 1 ? "text-blue-500" : "text-primary-300"'])
                      @svg('bi-emoji-frown', ['class' => 'w-8 h-8 hover:cursor-pointer', '@click' => 'emoji = 2', ':class' => 'emoji == 2 ? "text-blue-500" : "text-primary-300"'])
                      @svg('bi-emoji-neutral', ['class' => 'w-8 h-8 hover:cursor-pointer', '@click' => 'emoji = 3', ':class' => 'emoji == 3 ? "text-blue-500" : "text-primary-300"'])

                      <input type="hidden" name="kode_kategori" id="kode_kategori" :value="emoji">
                    </div>
                  </div>

                  {{-- Komentar --}}
                  <div>
                    <h4 class="text-lg font-semibold leading-relaxed">Berikan Ulasan</h4>
                    <textarea class="w-full p-2 border border-gray-200 rounded-lg focus:border-transparent focus:outline-none focus:ring-2 focus:ring-primary-300" name="ulasan" id="ulasan" cols="30" rows="5" placeholder="Jika anda memiliki masukan tambahan, silahkan ketik disini..."></textarea>
                  </div>
              </div>
              <!-- Modal footer -->
              <div class="flex items-center justify-center gap-4 p-4 border-gray-200 rounded-b md:p-5">
                  <button data-modal-hide="default-modal" type="button" class="py-2.5 px-12 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-black hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Back to Homepage</button>
                  <button type="sumbit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 text-center">Submit Feedback</button>
              </div>
            </form>
        </div>
    </div>
</div>
  
</x-layout>
