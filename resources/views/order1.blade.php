<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <x-slot:background>{{ $background }}</x-slot:background>
  
  <div class="flex flex-wrap justify-center max-w-6xl gap-12 pt-5 mx-2 lg:flex-nowrap lg:mx-auto">
    <div class="px-5 py-6 bg-white rounded-lg basis-full md:basis-3/4 lg:px-10 lg:py-8 lg:basis-4/5">
      <div class="text-center lg:text-left">
        <h1 class="pb-3 text-secondary-base">PEMESANAN</h1>
        <h3 class="text-2xl font-bold text-secondary-base">Detail Pesanan</h3>
      </div>
      
      <form action="" class="flex flex-wrap justify-center gap-3 pt-3 lg:flex-nowrap lg:justify-between">
        <div class="order-2 px-1 py-3 lg:order-1 sm:basis-3/4 md:basis-4/6 lg:basis-4/6">
          <div class="form-head">
            <div class="flex w-full pt-4 titik-jemput">
              @svg('iconpark-localtwo-o', ['class' => 'w-8 h-8 text-secondary-base'])
              <div id="geocoder" class="geocoder"></div>
              {{-- <input type="text" placeholder="Pilih Titik Jemput" class="border-0 jemput"> --}}
            </div>
            <div class="w-full pt-4">
                <div id="map" style="height: 200px; width: 500px;"></div>
                <script>

                  let startLocation = [111.623011, -7.4176117];
                  const warehouseLocation = [111.623011, -7.4176117];
                  const lastAtRestaurant = 0;
                  let keepTrack = [];
                  const pointHopper = {};
                  const bound = [
                    [109.035960, -8.802369],
                    [114.375734, -6.407968]
                  ];

                  mapboxgl.accessToken = 'pk.eyJ1IjoiY2FsbGViMjEiLCJhIjoiY2xvdXlxOWxyMGs0NjJqbzlrcHZsbjB3OCJ9.k2r8cKpCDJKIepppdBmcZQ';
                  const map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/mapbox/outdoors-v12', // style URL
                    center: startLocation, // starting position [lng, lat]
                    zoom: 6, // starting zoom
                    cooperativeGestures: true,
                    maxBounds: bound
                  });

                  // menambah navigasi map plus minus
                  map.addControl(new mapboxgl.NavigationControl());
                  map.addControl(new mapboxgl.FullscreenControl());

                  // menambah geocoder
                  const geocoder = new MapboxGeocoder({
                    accessToken: mapboxgl.accessToken,
                    mapboxgl: mapboxgl,
                    language: 'id',
                    country: 'ID'
                  });

                  // membuat input geocoder
                  let input = document.getElementById('geocoder')
                  input.appendChild(geocoder.onAdd(map));
                  document.querySelector('.mapboxgl-ctrl-geocoder--input').setAttribute('placeholder', 'Pilih Titik Jemput');

                  // membuat marker
                  var marker = new mapboxgl.Marker({
                    draggable: true
                  })

                  const warehouse = turf.featureCollection([turf.point(warehouseLocation)]);

                  // Create an empty GeoJSON feature collection for drop off locations
                  const dropoffs = turf.featureCollection([]);

                  // Create an empty GeoJSON feature collection, which will be used as the data source for the route before users add any new data
                  const nothing = turf.featureCollection([]);

                  map.on('load', async () => {

                    // Create a circle layer
                    map.addLayer({
                      id: 'warehouse',
                      type: 'circle',
                      source: {
                        data: warehouse,
                        type: 'geojson'
                      },
                      paint: {
                        'circle-radius': 20,
                        'circle-color': 'white',
                        'circle-stroke-color': '#3887be',
                        'circle-stroke-width': 3
                      }
                    });

                    // Create a symbol layer on top of circle layer
                    map.addLayer({
                      id: 'warehouse-symbol',
                      type: 'symbol',
                      source: {
                        data: warehouse,
                        type: 'geojson'
                      },
                      layout: {
                        'icon-image': 'grocery',
                        'icon-size': 1.5
                      },
                      paint: {
                        'text-color': '#3887be'
                      }
                    });

                    map.addLayer({
                      id: 'dropoffs-symbol',
                      type: 'symbol',
                      source: {
                        data: dropoffs,
                        type: 'geojson'
                      },
                      layout: {
                        'icon-allow-overlap': true,
                        'icon-ignore-placement': true,
                        'icon-image': 'marker-15'
                      }
                    });

                    map.addSource('route', {
                      type: 'geojson',
                      data: nothing
                    });

                    map.addLayer(
                      {
                        id: 'routeline-active',
                        type: 'line',
                        source: 'route',
                        layout: {
                          'line-join': 'round',
                          'line-cap': 'round'
                        },
                        paint: {
                          'line-color': '#3887be',
                          'line-width': ['interpolate', ['linear'], ['zoom'], 12, 3, 22, 12]
                        }
                      },
                      'waterway-label'
                    );

                    map.addLayer(
                      {
                        id: 'routearrows',
                        type: 'symbol',
                        source: 'route',
                        layout: {
                          'symbol-placement': 'line',
                          'text-field': '▶',
                          'text-size': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            12,
                            24,
                            22,
                            60
                          ],
                          'symbol-spacing': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            12,
                            30,
                            22,
                            160
                          ],
                          'text-keep-upright': false
                        },
                        paint: {
                          'text-color': '#3887be',
                          'text-halo-color': 'hsl(55, 11%, 96%)',
                          'text-halo-width': 3
                        }
                      },
                      'waterway-label'
                    );

                    // Listen for a click on the map
                    await map.on('click', addWaypoints);
                  });

                  async function addWaypoints(event) {
                    // When the map is clicked, add a new drop off point
                    // and update the `dropoffs-symbol` layer
                    await newDropoff(map.unproject(event.point));
                    updateDropoffs(dropoffs);
                  }

                  async function newDropoff(coordinates) {
                    // Store the clicked point as a new GeoJSON feature with
                    // two properties: `orderTime` and `key`
                    const pt = turf.point([coordinates.lng, coordinates.lat], {
                      orderTime: Date.now(),
                      key: Math.random()
                    });
                    dropoffs.features.push(pt);
                    pointHopper[pt.properties.key] = pt;

                    // Make a request to the Optimization API
                    const query = await fetch(assembleQueryURL(), { method: 'GET' });
                    const response = await query.json();

                    // Create an alert for any requests that return an error
                    if (response.code !== 'Ok') {
                      const handleMessage =
                        response.code === 'InvalidInput'
                          ? 'Refresh to start a new route. For more information: https://docs.mapbox.com/api/navigation/optimization/#optimization-api-errors'
                          : 'Try a different point.';
                      alert(`${response.code} - ${response.message}\n\n${handleMessage}`);
                      // Remove invalid point
                      dropoffs.features.pop();
                      delete pointHopper[pt.properties.key];
                      return;
                    }

                    // Create a GeoJSON feature collection
                    const routeGeoJSON = turf.featureCollection([
                      turf.feature(response.trips[0].geometry)
                    ]);

                    // Update the `route` source by getting the route source
                    // and setting the data equal to routeGeoJSON
                    map.getSource('route').setData(routeGeoJSON);
                  }

                  function updateDropoffs(geojson) {
                    map.getSource('dropoffs-symbol').setData(geojson);
                  }

                  // Here you'll specify all the parameters necessary for requesting a response from the Optimization API
                  function assembleQueryURL() {
                    // Store the location of the truck in a variable called coordinates
                    let coordinates = [startLocation];
                    const distributions = [];
                    let restaurantIndex;
                    keepTrack = [startLocation];

                    // Create an array of GeoJSON feature collections for each point
                    const restJobs = Object.keys(pointHopper).map(
                      (key) => pointHopper[key]
                    );

                    // If there are actually orders from this restaurant
                    if (restJobs.length > 0) {
                      // Check to see if the request was made after visiting the restaurant
                      const needToPickUp =
                        restJobs.filter((d) => d.properties.orderTime > lastAtRestaurant)
                          .length > 0;

                      // If the request was made after picking up from the restaurant,
                      // Add the restaurant as an additional stop
                      if (needToPickUp) {
                        restaurantIndex = coordinates.length;
                        // Add the restaurant as a coordinate
                        coordinates.push(warehouseLocation);
                        // push the restaurant itself into the array
                        keepTrack.push(pointHopper.warehouse);
                      }

                      for (const job of restJobs) {
                        // Add dropoff to list
                        keepTrack.push(job);
                        coordinates.push(job.geometry.coordinates);
                        // if order not yet picked up, add a reroute
                        if (needToPickUp && job.properties.orderTime > lastAtRestaurant) {
                          distributions.push(
                            `${restaurantIndex},${coordinates.length - 1}`
                          );
                        }
                      }
                    }

                    // Set the profile to `driving`
                    // Coordinates will include the current location of the truck,
                    return `https://api.mapbox.com/optimized-trips/v1/mapbox/driving/${coordinates.join(
                      ';'
                    )}?distributions=${distributions.join(
                      ';'
                    )}&overview=full&steps=true&geometries=geojson&source=first&access_token=${
                      mapboxgl.accessToken
                    }`;
                  }


                  // Mengembalikan nama daerah asal
                  var gantiTempat = (lngLat) => {
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', `https://api.mapbox.com/search/geocode/v6/reverse?country=id&language=id&longitude=${lngLat.lng}&latitude=${lngLat.lat}&access_token=${mapboxgl.accessToken}`);
                    xhr.send();
                    xhr.onload = function() {
                      if (xhr.status != 200) {
                        alert(`Error ${xhr.status}: ${xhr.statusText}`);
                      } else {
                        var response = JSON.parse(xhr.response);
                        document.querySelector('.daerah-asal').textContent = response.features[3]['properties']["full_address"].substring(0, response.features[3]['properties']["full_address"].lastIndexOf(', '));
                      }
                    };
                  }
                  
                  // input marker
                  geocoder.on('result', function(e) {
                    geocoder.clear();
                    marker.setLngLat(e.result.center).addTo(map)  
                    const lngLat = marker.getLngLat();
                    gantiTempat(lngLat);
                  });

                  // input marker by click
                  map.on('click', function(e) {
                    var coordinates = e.lngLat;
                    marker.setLngLat(coordinates).addTo(map);
                    gantiTempat(coordinates);
                  });

                  // input marker by drag
                  marker.on('dragend', function(e) {
                    const lngLat = marker.getLngLat();
                    gantiTempat(lngLat);
                  });
                </script>
            </div>
            <div class="py-4 input-group">
              <div class="w-full pt-4 wisata">
                <label class="flex items-center">
                  @svg('iconpark-ticketone-o', ['class' => 'w-8 h-8 text-secondary-base'])
                  <span class="pl-3 text-secondary-base">Tambah Wisata</span>            
                </label>
              </div>
              <div class="w-full pt-4" x-data="{ inputs: [{}] }" id="list-wisata">
                <template x-for="(input, index) in inputs" :key="index">
                  <div class="flex mt-3 input-group dropdown">
                    <select class="mr-2" x-data="{ wisata: {{$wisata}} }" name="wisata[]">
                      <template x-for="(name, id) in wisata">
                        <option x-text="name" :value="id"></option>
                      </template>
                    </select>
                    
                    <button type="button" class="ml-2 border border-transparent rounded" @click="inputs.pop({})">
                      @svg("bi-trash", ['class' => 'w-6 h-6 text-secondary-base hover:text-black'])
                    </button>
                    
                    <button type="button" class="ml-2 border border-transparent rounded" @click="inputs.push({})">
                      @svg("iconpark-plus", ['class' => 'w-6 h-6 text-secondary-base hover:text-black'])
                    </button>
                  </div>
                </template>
              </div>
            </div>
            <div class="py-4 input-group">
              <div class="w-full pt-4 wisata">
                <label class="flex items-center">
                    @svg('iconpark-peoples-o', ['class' => 'w-8 h-8 text-secondary-base'])
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
        <div class="order-1 px-1 py-3 lg:order-2 sm:basis-3/4 md:basis-4/6 lg:basis-2/6">
            <div class="flex flex-col w-full pt-4 jam-berangkat">
              <label class="flex items-center">
                @svg('bi-clock', ['class' => 'w-7 h-7 text-secondary-base'])
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
    <div class="h-full basis-full md:basis-3/4 lg:basis-2/5">
      <div class="px-10 py-8 text-center bg-white rounded-lg lg:text-left">
        <div class="detail-head">
          <h1 class="pb-3 text-secondary-base">DAERAH ASAL</h1>
          <h3 class="text-2xl font-bold text-secondary-base daerah-asal">Tuban, Jawa Timur</h3>
          <div class="pt-3 detail-bus">
            <p class="text-sm text-gray-400">Bus: {{ $bus->nama_bus }}</p>
            <span data-modal-target="bus-modal" data-modal-toggle="bus-modal" class="text-blue-500 text-[10px] hover:underline cursor-pointer">informasi bus selengkapnya bisa dicek disini</span>
          </div>
        </div>
  
        <div class="flex justify-center my-8 detail-icon">
          @svg('iconpark-switch-o', ['class' => 'p-1 rotate-90 rounded-full h-7 w-7 bg-primary-base'])
        </div>
  
        <div class="detail-foot">
          <h1 class="pb-3 text-secondary-base">DAERAH TUJUAN</h1>
          <h3 class="text-2xl font-bold text-secondary-base">{{ $kota->nama_kota }}, {{ $kota->provinsi->nama_provinsi }}</h3>
  
          <div class="w-3/4 pt-3 mx-auto text-left text-gray-400 md:w-1/2 lg:w-full detail-tujuan">
            <div class="detail-wisata">
              <p>Wisata</p>
              <ul class="pl-8 list-disc">
                <li class="text-sm">Museum Lawang Sewu <span data-modal-target="wisata-modal" data-modal-toggle="wisata-modal" class="text-blue-500 text-[10px] hover:underline cursor-pointer">detail</span></li>
                <li class="text-sm">Oleh-Oleh Khas Semarang <span data-modal-target="wisata-modal" data-modal-toggle="wisata-modal" class="text-blue-500 text-[10px] hover:underline cursor-pointer">detail</span></li>
                <li class="text-sm">Masjid Agung Jawa Tengah <span data-modal-target="wisata-modal" data-modal-toggle="wisata-modal" class="text-blue-500 text-[10px] hover:underline cursor-pointer">detail</span></li>
              </ul>
            </div>
            <div class="detail-tambahan">
              <p>Include</p>
              <ul class="pl-8 list-disc">
                <li class="text-sm">Makan <span class="text-blue-500 text-[10px] hover:underline cursor-pointer">detail</span></li>
                <li class="text-sm">HTM <span class="text-blue-500 text-[10px] hover:underline cursor-pointer">detail</span></li>
              </ul>
            </div>
          </div>
        </div>
  
        <div class="w-full py-3 font-semibold text-center rounded-lg total bg-primary-200 mt-7 text-secondary-base ">
          TOTAL Rp 700.000,-
        </div>
      </div>

      <div class="block mt-10 text-center rounded-lg bg-primary-base">
        <a href="{{ route('show', $kota->kode_kota) }}" class="block p-4 font-semibold text-secondary-base">KEMBALI?</a>
      </div>
    </div>
  </div>

  {{-- Bus Modal --}}
  <div id="bus-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-center p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="flex items-center gap-2 text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Informasi Bus
                    @svg('bi-bus-front', 'w-6 h-6')
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-2 md:p-5">
                <p class="font-bold text-gray-700">Nama Bus: <span class="font-normal text-gray-600">{{ $bus->nama_bus }}</span></p>
                <p class="font-bold text-gray-700">Kecepatan Maks: <span class="font-normal text-gray-600">{{ $bus->kecepatan }} km/jam</span></p>
                <p class="font-bold text-gray-700">Kapasitas Solar: <span class="font-normal text-gray-600">{{ $bus->kapasitas_solar }} L</span></p>
                <p class="font-bold text-gray-700">Jumlah Penumpang: <span class="font-normal text-gray-600">{{ $bus->jumlah_kursi }} orang</span></p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-center gap-4 p-4 border-gray-200 rounded-b md:p-5">
                <button data-modal-hide="bus-modal" type="button" class="py-2.5 px-12 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-black hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</button>
            </div>
        </div>
    </div>
  </div>

  {{-- Wisata Modal --}}
  <div id="wisata-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-center p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="flex items-center gap-2 text-xl font-semibold text-gray-900 dark:text-white">
                    Detail Informasi Wisata
                    @svg('bi-houses', 'w-6 h-6')
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-2 md:p-5">
                <p class="font-bold text-gray-700">Nama Wisata: <span class="font-normal text-gray-600">...</span></p>
                <p class="font-bold text-gray-700">Alamat Wisata: <span class="font-normal text-gray-600">...</span></p>
                <p class="font-bold text-gray-700">Jam Buka/Jam Tutup: <span class="font-normal text-gray-600">.../...</span></p>
                <p class="font-bold text-gray-700">Tarif Masuk Wisata: <span class="font-normal text-gray-600">...</span></p>
                <p class="font-bold text-gray-700">Tarif Parkir: <span class="font-normal text-gray-600">...</span></p>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-center gap-4 p-4 border-gray-200 rounded-b md:p-5">
                <button data-modal-hide="wisata-modal" type="button" class="py-2.5 px-12 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-black hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Kembali</button>
            </div>
        </div>
    </div>
  </div>


  <script>
    $(document).ready(function() { 
      $('.jemput').on("keyup", function() {
        const jemput = $(this).val();
        console.log(jemput)
      })
      const jmlOption = $('#list-wisata select option').length;

      $('#list-wisata select').select2();
      $('#list-wisata button').eq(0).hide();
      if (jmlOption < 2) $('#list-wisata button').eq(1).hide();
      
      $('#list-wisata').on('click', 'button', function() {
        const jmlSelect = $('#list-wisata select').length;
        toSelect2(jmlSelect);
      });
      
      function toSelect2(jmlSelect) {
        $('#list-wisata select').each((i) => {
          $('#list-wisata select').eq(i).select2();
          const tombolHapus = $('#list-wisata button').eq(i * 2);
          const tombolTambah = $('#list-wisata button').eq(i * 2 + 1);
          
          tombolTambah.show();
          tombolHapus.show();
          if (i < jmlSelect - 1 || jmlSelect >= 4 || jmlSelect + 1 > jmlOption) tombolTambah.hide();
          if (jmlSelect == 1) tombolHapus.hide();
        });
      }
    });
  </script>
</x-layout>
