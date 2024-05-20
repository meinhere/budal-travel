<div class="{{ request()->is('/') ? 'mt-14 md:mt-20' : 'mx-auto w-full' }} md:w-3/4 md:h-3/5 text-secondary-base"
    x-data="{ data = '' }">
    <div class="relative flex justify-between bg-white shadow-lg rounded-r-xl rounded-xl">
        <div class="flex flex-col items-start w-full px-5 py-5 md:px-12">
            <label for="kota" class="text-slate-400">DAERAH</label>
            
            <input list="list-kota" id="kota" name="kota"
                class="w-full px-0 border-0 border-b-2 outline-none focus:ring-0 md:mt-2 border-secondary-base focus:border-primary-300 text-secondary-base">
            <datalist id="list-kota">
                @foreach ($kota as $k)
                    <option class="cursor-pointer" data-kode="{{ $k->kode_kota }}"
                        value="{{ $k->nama_kota }}, {{ $k->provinsi->nama_provinsi }}" id="{{ $k->kode_kota }}">
                    </option>
                @endforeach
            </datalist>
        </div>

        <div class="flex items-center justify-center px-6 text-center rounded-r-xl bg-secondary-base">
            <a id="search-link" href="#" class="text-primary-base">
                Cari dan Pesan Tiket
                @svg('bi-arrow-right', ['class' => 'inline-block w-6 h-6 text-primary-base'])
            </a>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputKota = document.getElementById('kota');
        const searchLink = document.getElementById('search-link');
        const datalist = document.getElementById('list-kota');

        inputKota.addEventListener('input', function() {
            const options = datalist.options;
            let kodeKota = '';

            for (let i = 0; i < options.length; i++) {
                if (options[i].value === inputKota.value) {
                    kodeKota = options[i].getAttribute('data-kode');
                    break;
                }
            }
            if (kodeKota) {
                searchLink.href = `/search/${kodeKota}`;
            } else {
                searchLink.href = '#';
            }
        });
    });
</script>
