@props(['kota', 'link', 'kode' => false])

<div class="{{ $link == '/' ? 'mt-14 md:mt-20' : 'mx-auto w-full' }} md:w-3/4 md:h-3/5 text-secondary-base"> 
    <div class="relative flex justify-between bg-white shadow-lg rounded-r-xl rounded-xl" x-data="{ link: '#' }" x-init="select2Alpine">
        <div class="flex flex-col items-start px-5 py-7 basis-7/12 {{ $link == '/' ? 'sm:basis-4/6' : 'sm:basis-3/4' }} md:px-12">
            <label for="kota" class="text-slate-400">DAERAH</label>
            
            <div class="w-full mt-2 border-b-2 border-secondary-base text-secondary-base">
                <select id="list-kota" x-ref="select" class="w-full border-0 outline-none focus:ring-0">
                    <option></option>
                    @foreach ($kota as $k)
                        <option value="{{ $k->kode_kota }}" {{ $k->kode_kota == $kode ? 'selected' : '' }}>
                            {{ $k->nama_kota }}, {{ $k->provinsi->nama_provinsi }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="block text-center basis-4/12 {{ $link == '/' ? 'sm:basis-2/6' : 'sm:basis-1/4' }}">
            <a id="search-link" :href="link == '#' ? '#' : '/search/' + link" class="block h-full px-6 py-12 text-primary-base rounded-r-xl bg-secondary-base">
                Cari & Pesan Tiket
                @svg('bi-arrow-right', ['class' => 'inline-block w-6 h-6 text-primary-base'])
            </a>
        </div>
    </div>
</div>

<script>
    function select2Alpine() {
        this.select2 = $(this.$refs.select).select2({
            placeholder: "Silahkan pilh kota tujuan",
            theme: "tailwind",
        });
        this.select2.on("select2:select", (event) => {
            this.link = event.target.value;
        });
        this.$watch("link", (value) => {
            this.select2.val(value).trigger("change");
        });
    }
</script>
