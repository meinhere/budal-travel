<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:background>{{ $background }}</x-slot:background>
    
    <x-input-search />

    <div class="text-base">
      <div class="items-center hidden w-full gap-4 px-3 py-2 mx-auto mt-5 bg-white shadow-lg sm:flex md:w-3/4 md:h-3/5 text-secondary-base rounded-xl md:px-8">
        <div class="basis-1/4">Bus</div>
        <div class="text-center basis-1/5">Kecepatan Maks</div>
        <div class="basis-1/6">Total Kursi</div>
        <div class="text-center basis-1/6">Status</div>
        <div class="text-center basis-1/6">Detail</div>
      </div>
  
      <div class="flex flex-wrap items-center w-full gap-4 px-3 mx-auto mt-5 bg-white shadow-lg md:w-3/4 md:h-3/5 text-secondary-base rounded-xl sm:flex-nowrap md:px-8 py-7">
        <div class="text-2xl text-center basis-full sm:basis-1/4 sm:text-base sm:text-left">Jetbus 5 Adiputro Malang</div>
        <div class="basis-full sm:basis-3/4">
          <div class="flex justify-between">
            <div class="text-center basis-1/3 sm:basis-full">127km/jam</div>
            <div class="text-center basis-1/3 sm:basis-3/4 sm:text-left">60 Penumpang</div>
            <div class="flex items-center justify-center basis-1/3 sm:basis-full">
              @svg('bi-check-circle-fill', ['class' => 'w-4 h-4 mr-1 text-lime-500'])
              Tersedia
            </div>
          </div>
        </div>
        <div class="flex justify-center basis-full sm:basis-1/6">
          <a href="/order/1" class="px-5 py-3 text-sm font-medium rounded-md bg-primary-200 text-secondary-base">PESAN</a>
        </div>
      </div>

      <div class="flex flex-wrap items-center w-full gap-4 px-3 mx-auto mt-5 bg-white shadow-lg md:w-3/4 md:h-3/5 text-secondary-base rounded-xl sm:flex-nowrap md:px-8 py-7">
        <div class="text-2xl text-center basis-full sm:basis-1/4 sm:text-base sm:text-left">Jetbus 3+ Voyager by Adiputro Malang</div>
        <div class="basis-full sm:basis-3/4">
          <div class="flex justify-between">
            <div class="text-center basis-1/3 sm:basis-full">116km/jam</div>
            <div class="text-center basis-1/3 sm:basis-3/4 sm:text-left">55 Penumpang</div>
            <div class="flex items-center justify-center basis-1/3 sm:basis-full">
              @svg('bi-check-circle-fill', ['class' => 'w-4 h-4 mr-1 text-lime-500'])
              Tersedia
            </div>
          </div>
        </div>
        <div class="flex justify-center basis-full sm:basis-1/6">
          <a href="#" class="px-5 py-3 text-sm font-medium rounded-md bg-primary-200 text-secondary-base">PESAN</a>
        </div>
      </div>

      <div class="flex flex-wrap items-center w-full gap-4 px-3 mx-auto mt-5 bg-white shadow-lg md:w-3/4 md:h-3/5 text-secondary-base rounded-xl sm:flex-nowrap md:px-8 py-7">
        <div class="text-2xl text-center basis-full sm:basis-1/4 sm:text-base sm:text-left">Jetbus 4+ Voyager by Adiputro Malang</div>
        <div class="basis-full sm:basis-3/4">
          <div class="flex justify-between">
            <div class="text-center basis-1/3 sm:basis-full">112km/jam</div>
            <div class="text-center basis-1/3 sm:basis-3/4 sm:text-left">65 Penumpang</div>
            <div class="flex items-center justify-center basis-1/3 sm:basis-full">
              @svg('bi-x-circle-fill', ['class' => 'w-4 h-4 mr-1 text-red-500'])
              Habis 
            </div>
          </div>
        </div>
        <div class="flex justify-center basis-full sm:basis-1/6">
          <a class="px-5 py-3 text-sm font-medium rounded-md bg-grey-100 text-secondary-base">PESAN</a>
        </div>
      </div>
      
    </div>
</x-layout>