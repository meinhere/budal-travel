<x-app-layout>
  <x-slot:title>{{ $title }}</x-slot:title>

  <div class="min-h-screen px-5 pb-8 mx-auto pt-28 lg:pt-12 max-w-7xl">
      {{-- Content Heading --}}
      <div class="overflow-hidden shadow-sm sm:rounded-lg">
          <h2 class="text-3xl font-semibold text-black">Budal Travel Dashboard</h2>
          <p class="pt-2 text-gray-400 font-xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis repudiandae odio quaerat, quasi voluptatibus sint ullam assumenda</p>
      </div>

      {{-- Card --}}
      <div class="flex flex-wrap items-center justify-center gap-6 mb-4 lg:flex-nowrap mt-14 lg:mt-20">
          <div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
              <div class="pb-8">
                  <h3 class="text-base font-normal text-gray-500">Total Pendapatan</h3>
                  <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp 100.000.000,-</span>
              </div>

              <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 text-green-500 bg-green-100 rounded-xl">+45%</span> From 4.6%</p>
          </div>
          <div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
              <div class="pb-8">
                  <h3 class="text-base font-normal text-gray-500">Sudah Dibayar</h3>
                  <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp 80.000.000,-</span>
              </div>

              <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 text-green-500 bg-green-100 rounded-xl">+45%</span> From 4.6%</p>
          </div>
          <div class="p-4 shadow basis-full lg:basis-1/3 rounded-xl">
              <div class="pb-8">
                  <h3 class="text-base font-normal text-gray-500">Belum Dibayar</h3>
                  <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl">Rp 20.000.000,-</span>
              </div>

              <p class="text-xs font-semibold text-gray-400"><span class="px-3 py-1 mr-1 text-red-500 bg-red-100 rounded-xl">-17%</span> From 4.6%</p>
          </div>
      </div>

      {{-- Detail Transaksi --}}
      <div class="mt-12">
        <h2 class="text-lg text-gray-500">Transaksi Terbaru</h2>
        <div class="flex gap-2 mt-4 text-sm">
          <a href="#" class="px-2 pb-1 font-semibold text-gray-800 border-b-2 border-transparent hover:text-primary-300 hover:border-primary-300">All</a>
          <a href="#" class="px-2 pb-1 font-semibold text-gray-800 border-b-2 border-transparent hover:text-primary-300 hover:border-primary-300">Sudah Dibayar</a>
          <a href="#" class="px-2 pb-1 font-semibold text-gray-800 border-b-2 border-transparent hover:text-primary-300 hover:border-primary-300">Belum Dibayar</a>
        </div>

        <table class="w-full mx-auto mt-8 text-sm table-auto md:w-3/4 lg:w-2/3">
          <thead>
            <tr>
              <th class="text-left">Pelanggan</th>
              <th>Wilayah Tujuan</th>
              <th>Tanggal</th>
              <th>Metode Pembayaran</th>
              <th class="text-right">Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-4 font-semibold">John Cena</td>
              <td class="py-4 text-center">Jawa Timur</td>
              <td class="py-4 text-center">17 May, 2023</td>
              <td class="py-4 text-center">BRI</td>
              <td class="py-4 font-semibold text-right">Rp 500.000,-</td>
            </tr>
            <tr>
              <td class="py-4 font-semibold">John Cena</td>
              <td class="py-4 text-center">Jawa Timur</td>
              <td class="py-4 text-center">17 May, 2023</td>
              <td class="py-4 text-center">BRI</td>
              <td class="py-4 font-semibold text-right">Rp 500.000,-</td>
            </tr>
            <tr>
              <td class="py-4 font-semibold">John Cena</td>
              <td class="py-4 text-center">Jawa Timur</td>
              <td class="py-4 text-center">17 May, 2023</td>
              <td class="py-4 text-center">BRI</td>
              <td class="py-4 font-semibold text-right">Rp 500.000,-</td>
            </tr>
          </tbody>
        </table>

        <button class="block px-8 py-3 mx-auto mt-6 text-sm font-semibold bg-primary-200 text-secondary-base">Lihat Lebih Banyak</button>
      </div>
  </div>
</x-app-layout>
