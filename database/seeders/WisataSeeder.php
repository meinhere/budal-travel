<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // wisata di jawa timur
        Wisata::create([
            'kota_kode' => '3578',
            'nama_wisata' => 'Kenjeran Park Surabaya',
            'alamat_wisata' => 'Sukolilo Baru, Bulak, Surabaya, East Java 60122',
            'jam_buka' => '08:00',
            'jam_tutup' => '18:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.2522639,112.7939782'
        ]);

        Wisata::create([
            'kode_kota' => '3578',
            'nama_wisata' => 'Masjid Nasional Al Akbar Surabaya',
            'alamat_wisata' => 'Jl. Masjid Al-AkbarTimur No.1, Pagesangan, Kec. Jambangan, Surabaya, Jawa Timur 60274',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.3366617,112.711438'
        ]);


        Wisata::create([
            'kota_kode' => '3524',
            'nama_wisata' => 'Wisata Bahari Lamongan',
            'alamat_wisata' => 'Jl. Raya Paciran, Paciran, Kec. Paciran, Kabupaten Lamongan, Jawa Timur 62276',
            'jam_buka' => '08:30',
            'jam_tutup' => '16:30',
            'tarif_masuk_wisata' => 110000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-6.8664183,112.3570603'
        ]);

        Wisata::create([
            'kota_kode' => '3528',
            'nama_wisata' => 'Bukit Brukoh',
            'alamat_wisata' => 'WHRH+X6C, Brukoh, Bajang, Kec. Pakong, Kabupaten Pamekasan, Jawa Timur 69352',
            'jam_buka' => '06:00',
            'jam_tutup' => '18:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.0575629,113.5754294'
        ]);

        Wisata::create([
            'kota_kode' => '3528',
            'nama_wisata' => 'Pantai Talang Siring',
            'alamat_wisata' => 'Pacanan, Montok, Larangan, Pamekasan Regency, East Java 69383',
            'jam_buka' => '07:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.1378487,113.5871711'
        ]);

        Wisata::create([
            'kota_kode' => '3523',
            'nama_wisata' => 'Pantai Cemara',
            'alamat_wisata' => 'Nggirsapi, Sugihwaras, Jenu, Tuban Regency, East Java 62352',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-6.847467933780376, 112.01908090311767'
        ]);

        Wisata::create([
            'kota_kode' => '3528',
            'nama_wisata' => 'Api Tak Kunjung Padam',
            'alamat_wisata' => 'QFW6+2C6, Asemanis Satu, Larangan Tokol, Kec. Tlanakan, Kabupaten Pamekasan, Jawa Timur 69371',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.204815556149315, 113.46091153109991'
        ]);

        Wisata::create([
            'kota_kode' => '3515',
            'nama_wisata' => 'Candi Pari',
            'alamat_wisata' => 'Jl. Purbakala, Porong, Candipari, Candipari Kulon, Candipari, Kec. Porong, Kabupaten Sidoarjo, Jawa Timur 61274',
            'jam_buka' => '07:00',
            'jam_tutup' => '16:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.438987, 112.714905'
        ]);

        Wisata::create([
            'kota_kode' => '3515',
            'nama_wisata' => 'Alas Prambon',
            'alamat_wisata' => 'GH7P+FG, Ngingas, Simpang, Kec. Prambon, Kabupaten Sidoarjo, Jawa Timur 61264',
            'jam_buka' => '08:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 70000,
            'tarif_parkir' => 0, 
            'titik_lokasi' => '-7.4862115865908425, 112.58643646766839'
        ]);

        Wisata::create([
            'kota_kode' => '3515',
            'nama_wisata' => 'Museum Mpu Tantular',
            'alamat_wisata' => 'HP8C+G4P, Jl. Raya Buduran - Jembatan Layang, Bedrek, Siwalanpanji, Kec. Buduran, Kabupaten Sidoarjo, Jawa Timur 61252',
            'jam_buka' => '08:00',
            'jam_tutup' => '15:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.433458857955649, 112.7204352828914'
        ]);

        Wisata::create([
            'kota_kode' => '3515',
            'nama_wisata' => 'Loka Asri Park',
            'alamat_wisata' => 'Jl. Raya Sukolegok, RT.12/RW.04, Dusun Legok, Suko, Kec. Sukodono, Kabupaten Sidoarjo, Jawa Timur 61258',
            'jam_buka' => '07:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 25000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.376832479411589, 112.6974322796859'
        ]);

        Wisata::create([
            'kota_kode' => '3515',
            'nama_wisata' => 'Kampoeng Batik Jetis',
            'alamat_wisata' => 'Jalan P. Diponegoro, Lemah Putro, Lemahputro, Kec. Sidoarjo, Kabupaten Sidoarjo, Jawa Timur 61213',
            'jam_buka' => '08:00',
            'jam_tutup' => '15:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.456596849571416, 112.71435709662526'
        ]);

        Wisata::create([
            'kota_kode' => '3516', 
            'nama_wisata' => 'Gunung Penanggungan',
            'alamat_wisata' => 'Area Hutan, Hutan, Kec. Trawas, Kabupaten Mojokerto, Jawa Timur',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 15000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.613666379726427, 112.6198157449528'
        ]);

        Wisata::create([
            'kota_kode' => '3516',
            'nama_wisata' => 'Gunung Anjasmoro',
            'alamat_wisata' => 'Hutan, Kec. Gondang, Kabupaten Mojokerto, Jawa Timur',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.75250485382585, 112.50794912918407'
        ]);

        Wisata::create([
            'kota_kode' => '3516',
            'nama_wisata' => 'Candi Brahu',
            'alamat_wisata' => 'Jl. Candi Brahu No.73, Siti Inggil, Bejijong, Kec. Trowulan, Kabupaten Mojokerto, Jawa Timur 61362',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.54373260891881, 112.37442016779036'
        ]);

        Wisata::create([
            'kota_kode' => '3503',
            'nama_wisata' => 'Goa Lowo Trenggalek',
            'alamat_wisata' => 'QPQG+PXH, Kambe, Watuagung, Kec. Watulimo, Kabupaten Trenggalek, Jawa Timur 66382',
            'jam_buka' => '08:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-8.156312116710719, 111.7288597716505'
        ]);

        Wisata::create([
            'kota_kode' => '3507',
            'nama_wisata' => 'Agrowisata Teh Wonosari',
            'alamat_wisata' => 'RT.04/RW.07, Bodean Putuk, Toyomarto, Kec. Singosari, Kabupaten Malang, Jawa Timur 65153',
            'jam_buka' => '06:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 60000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.763344525336215, 112.61705765179849'
        ]);

        Wisata::create([
            'kota_kode' => '3579',
            'nama_wisata' => 'Jatim Park 1',
            'alamat_wisata' => 'Jl. Dewi Sartika Atas, Sisir, Kec. Batu, Kota Batu, Jawa Timur 65314',
            'jam_buka' => '08:00',
            'jam_tutup' => '16:30',
            'tarif_masuk_wisata' => 160000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.884471605533376, 112.52486864245427'
        ]);

        Wisata::create([
            'kota_kode' => '3579',
            'nama_wisata' => 'Jatim Park 2',
            'alamat_wisata' => 'Jl. Raya Oro-Oro Ombo No.9, Temas, Kec. Batu, Kota Batu, Jawa Timur 65315',
            'jam_buka' => '08:30',
            'jam_tutup' => '16:30',
            'tarif_masuk_wisata' => 125000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.887872209573885, 112.52951200827158' 
        ]);


        Wisata::create([
            'kota_kode' => '3579',
            'nama_wisata' => 'Jatim Park 3',
            'alamat_wisata' => 'Jl. Ir. Soekarno No.144, Beji, Kec. Junrejo, Kota Batu, Jawa Timur 65236',
            'jam_buka' => '11:00',
            'jam_tutup' => '19:00',
            'tarif_masuk_wisata' => 70000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.896965987584291, 112.55323576907442'
        ]);


        Wisata::create([
            'kota_kode' => '3579',
            'nama_wisata' => 'Museum Angkut',
            'alamat_wisata' => 'Jl. Terusan Sultan Agung No.2, Ngaglik, Kec. Batu, Kota Batu, Jawa Timur 65314',
            'jam_buka' => '12:00',
            'jam_tutup' => '20:00',
            'tarif_masuk_wisata' => 100000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.878734599197355, 112.51985667758449' 
        ]);


        Wisata::create([
            'kota_kode' => '3579',
            'nama_wisata' => 'Batu Love Garden - BALOGA',
            'alamat_wisata' => 'Jl. Raya Pandanrejo No.91, Pandanrejo, Kec. Bumiaji, Kota Batu, Jawa Timur 65332',
            'jam_buka' => '08:30',
            'jam_tutup' => '16:30',
            'tarif_masuk_wisata' => 110000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.863810584771792, 112.54284189477903'
        ]);

        Wisata::create([
            'kota_kode' => '3514',
            'nama_wisata' => 'Gunung Bromo',
            'alamat_wisata' => 'Area Gn. Bromo, Podokoyo, Kec. Tosari, Pasuruan, Jawa Timur',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 35000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.9420969654630555, 112.95271911325041'
        ]);

        Wisata::create([
            'kota_kode' => '3514',
            'nama_wisata' => 'Kebun Raya Purwodadi',
            'alamat_wisata' => 'Jl. Raya Surabaya - Malang No.Km. 65, Sembung Lor, Parerejo, Kec. Purwodadi, Pasuruan, Jawa Timur 67163',
            'jam_buka' => '07:00',
            'jam_tutup' => '16:00',
            'tarif_masuk_wisata' => 15500,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.797619447748728, 112.7369017101218'
        ]);

        Wisata::create([
            'kota_kode' => '3514',
            'nama_wisata' => 'Danau Ranu Grati',
            'alamat_wisata' => "Jl. Kabupaten No.49, Brandong, Ranu Klindungan, Kec. Grati, Pasuruan, Jawa Timur 67184",
            'jam_buka' => '07:00',
            'jam_tutup' => '18:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.7202819793955255, 113.01159675357198'
        ]);

        Wisata::create([
            'kota_kode' => '3514',
            'nama_wisata' => 'Alun-alun Pasuruan',
            'alamat_wisata' => '9W54+6MP, Jl. Alun-Alun Sel., Kebonsari, Kec. Panggungrejo, Kota Pasuruan, Jawa Timur 67116',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.636131710772297, 112.90411837697111'
        ]);

        Wisata::create([
            'kota_kode' => '3520',
            'nama_wisata' => 'Telaga Sarangan',
            'alamat_wisata' => 'Ngluweng, Sarangan, Kec. Plaosan, Kabupaten Magetan, Jawa Timur',
            'jam_buka' => '07:00',
            'jam_tutup' => '18:00',
            'tarif_masuk_wisata' =>  20000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.675690250911591, 111.21872180530706'
        ]);

        Wisata::create([
            'kota_kode' => '3506',
            'nama_wisata' => 'Simpang Lima Gumul - KEDIRI',
            'alamat_wisata' => 'Tugurejo, Kec. Ngasem, Kabupaten Kediri, Jawa Timur 64182',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.815573150392322, 112.06239595615236'
        ]);

        Wisata::create([
            'kota_kode' => '3519',
            'nama_wisata' => 'Monumen Keganasan PKI 1948 (Monumen Kresek) Madiun',
            'alamat_wisata' => '7JVJ+X99, Sewu, Kresek, Kec. Wungu, Kabupaten Madiun, Jawa Timur 63181',
            'jam_buka' => '05:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.704917812720682, 111.63102631012052' 
        ]);

        Wisata::create([
            'kota_kode' => '3514',
            'nama_wisata' => 'Gunung Arjuno',
            'alamat_wisata' => 'Pecalukan Barat, Pecalukan, Kec. Prigen, Pasuruan, Jawa Timur',
            'jam_buka' => '07:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 20000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.723468420545855, 112.5891003450392'
        ]);

        Wisata::create([
            'kota_kode' => '3508',
            'nama_wisata' => 'Air Terjun Tumpak Sewu',
            'alamat_wisata' => 'Jalan Tumpak Sewu, Besukcukit, Sidomulyo, Kec. Pronojiwo, Kabupaten Lumajang, Jawa Timur 67374',
            'jam_buka' => '07:00',
            'jam_tutup' => '15:00',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-8.229405605465438, 112.91717901927785'
        ]);


        Wisata::create([
            'kota_kode' => '3503',
            'nama_wisata' => 'Hutan Kota Trenggalek',
            'alamat_wisata' => 'WPX3+9PH, Jl. Hayam Wuruk, Area Hutan, Ngantru, Kec. Trenggalek, Kabupaten Trenggalek, Jawa Timur 66311',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-8.051335707293283, 111.70489496541113'
        ]);


        Wisata::create([
            'kota_kode' => '3503',
            'nama_wisata' => 'Goa Ngerit Sanden Kampak',
            'alamat_wisata' => 'QMWJ+C8P, Unnamed Road,, Area Hutan, Senden, Kec. Kampak, Kabupaten Trenggalek, Jawa Timur 66373',
            'jam_buka' => '08:00',
            'jam_tutup' => '16:00',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-8.203777663264919, 111.68130263472628'
        ]);


        Wisata::create([
            'kota_kode' => '3503',
            'nama_wisata' => 'Pantai Prigi Trenggalek',
            'alamat_wisata' => 'Jl. Raya Pantai Tasikmadu, Ketawang, Tasikmadu, Kec. Watulimo, Kabupaten Trenggalek, Jawa Timur 66382',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-8.285481399484564, 111.72638485236996'
        ]);


        Wisata::create([
            'kota_kode' => '3503',
            'nama_wisata' => 'Pantai Cengkrong Karanggandu',
            'alamat_wisata' => 'Tirto, Karanggandu, Kec. Watulimo, Kabupaten Trenggalek, Jawa Timur 66382',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-8.296391773449766, 111.70731371482213'
        ]); 



        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Taman Wisata Alam Pagarbatu (Boekit TAWAP)',
            'alamat_wisata' => 'Bungandun, Pagarbatu, Kec. Saronggi, Kabupaten Sumenep, Jawa Timur 69467',
            'jam_buka' => '13:00',
            'jam_tutup'=> '17:00',
            'tarif_masuk_wisata' => 15000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.124476518913123, 113.85625531381584'
        ]);


        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Pantai Lombang',
            'alamat_wisata' => 'Kec. Batang Batang, Kabupaten Sumenep, Jawa Timur',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-6.915010335109339, 114.05837267327055'
        ]);


        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Wisata Taman Tectona',
            'alamat_wisata' => 'Larangan, Torbang, Kec. Batuan, Kabupaten Sumenep, Jawa Timur 69451',
            'jam_buka' => '07:00',
            'jam_tutup' => '22:00',
            'tarif_masuk_wisata' => 15000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.015104656289915, 113.81629543524596'
        ]);

        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Gili Iyang',
            'alamat_wisata' => 'Gili Iyang, Banraas, Dungkek, Sumenep Regency, East Java',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-6.981840402535476, 114.17339643979165'
        ]);


        Wisata::create([
            'kota_kode' => '3527',
            'nama_wisata' => 'Waduk Kera Nepa Banyuates',
            'alamat_wisata' => '4622+X85, Batioh, Kec. Banyuates, Kabupaten Sampang, Jawa Timur 69263',
            'jam_buka' => '06:00',
            'jam_tutup' => '19:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-6.89472376907287, 113.20256611487827' 
        ]);


        Wisata::create([
            'kota_kode' => '3526',
            'nama_wisata' => 'Pantai Biru',
            'alamat_wisata' => 'Jl. Pelabuhan Telagabiru No.38, Tj. Bumi, Telaga Biru, Kec. Tj. Bumi, Kabupaten Bangkalan, Jawa Timur 69156',
            'jam_buka' => '08:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-6.885327038722859, 113.07901989294622'
        ]);


        Wisata::create([
            'kota_kode' => '3527',
            'nama_wisata' => 'Pantai Camplong',
            'alamat_wisata' => 'Q8J9+MJR, Jl. Raya Camplong, Kec. Camplong, Kabupaten Sampang, Jawa Timur 69281',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 20000,
            'titik_lokasi' => '-7.218101091841843, 113.3189323641153'
        ]);


        Wisata::create([
            'kota_kode' => '3507',
            'nama_wisata' => 'Paralayang Batu',
            'alamat_wisata' => 'Jl. Brigjend Abd Manan Wijaya No.186, Maron, Pandesari, Kec. Pujon, Kabupaten Malang, Jawa Timur 65391',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 15000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.854910246594545, 112.49672577339076'
        ]);

        Wisata::create([
            'kota_kode' => '3507',
            'nama_wisata' => 'Kajoetangan Heritage Village',
            'alamat_wisata' => 'JL Jend Basuki Rachmad Jl. Jenderal Bauki Rahmat Gg. 4, Kauman, Kec. Klojen, Kota Malang, Jawa Timur 65119',
            'jam_buka' => '07:00',
            'jam_tutup' => '18:30',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.9538258772404395, 112.62367188697125'
        ]);


        Wisata::create([
            'kota_kode' => '3508',
            'nama_wisata' => 'Gunung Semeru',
            'alamat_wisata' => 'Ngampo, Pasrujambe, Lumajang Regency, East Java',
            'jam_buka' => '07:00',
            'jam_tutup' => '16:00',
            'tarif_masuk_wisata' => 25000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-8.106824705378243, 112.92266490887629'
        ]);


        Wisata::create([
            'kota_kode' => '3579',
            'nama_wisata' => 'Cangar Batu',
            'alamat_wisata' => 'Tulungrejo, Sumber Brantas, Kec. Bumiaji, Kota Batu, Jawa Timur 65336',
            'jam_buka' => '08:00',
            'jam_tutup' => '15:00',
            'tarif_masuk_wisatar' => 15000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-7.742306712990577, 112.53287642179595'
        ]);


        Wisata::create([
            'kode_kota' => '3529',
            'nama_wisata' => 'Museum Kraton Sumenep',
            'alamat_wisata' => 'XVR8+32M, Jl. Dr. Sutomo No.6, Lingkungan Delama, Pajagalan, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69416',
            'jam_buka' => '07:00',
            'jam_tutup' => '15:30',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.007925916714073, 113.86293026781803'
        ]);


        Wisata::create([
            'kode_kota' => '3529',
            'nama_wisata' => 'Taman Adipura Sumenep',
            'alamat_wisata' => 'XVR6+M3X, Jl. Veteran, Lingkungan Delama, Pajagalan, Kec. Kota Sumenep, Kabupaten Sumenep, Jawa Timur 69416',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 0,
            'titik_lokasi' => "-7.008212798275347, 113.8602853389819"
        ]);


        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Pantai Matahari Lobuk',
            'alamat_wisata' => 'VR97+7M, Tarogan, Lobuk, Kec. Bluto, Kabupaten Sumenep, Jawa Timur',
            'jam_buka' =>  '00:00',
            'jam_tutup' => '23;59',
            'tarif_masuk_wisata' => 0,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.131173805332789, 113.81411930829462'
        ]);


        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Pantai Sembilan',
            'alamat_wisata' => 'Jalan Raya Bringsang, Bringsang, Giligenteng, Kabupaten Sumenep, Jawa Timur 69482',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 10000,
            'tarif_parkir' => 0,
            'titik_lokasi' => '-7.1750531998111775, 113.921837352476'
        ]);


        Wisata::create([
            'kota_kode' => '3529',
            'nama_wisata' => 'Pantai Gili Labak',
            'alamat_wisata' => 'Pulau Gili Labak, Kabupaten Sumenep, Jawa Timur 69481',
            'jam_buka' => '00:00',
            'jam_tutup' => '23:59',
            'tarif_masuk_wisata' => 5000,
            'tarif_parkir' => 20000,
            'titik_lokasi' => '-7.204519473425441, 114.04486203355103'

        ]);



































































































        // wisata di jawa tengah
        Wisata::create([
            'kota_kode' => '3374',
            'nama_wisata' => 'Taman Bunga Celosia Semarang',
            'alamat_wisata' => 'Banyukuning, Bandungan, Semarang Regency, Central Java 50614',
            'jam_buka' => '08:00',
            'jam_tutup' => '16:00',
            'tarif_masuk_wisata' => 20000,
            'tarif_parkir' => 15000,
            'titik_lokasi' => '-7.225358,110.3417579'
        ]);

        Wisata::create([
            'kota_kode' => '3374',
            'nama_wisata' => 'Museum Lawang Sewu Semarang',
            'alamat_wisata' => 'Jl. Pemuda No.160, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132',
            'jam_buka' => '08:00',
            'jam_tutup' => '20:00',
            'tarif_masuk_wisata' => 20000,
            'tarif_parkir' => 10000,
            'titik_lokasi' => '-6.9839838,110.4095893'
        ]);

        // wisata di DI Yogyakarta
        Wisata::create([
            'kota_kode' => '3471',
            'nama_wisata' => 'Candi Prambanan',
            'alamat_wisata' => 'JJl. Raya Solo - Yogyakarta No.16, Kranggan, Bokoharjo, Kec. Prambanan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571',
            'jam_buka' => '06:00',
            'jam_tutup' => '17:00',
            'tarif_masuk_wisata' => 50000,
            'tarif_parkir' => 15000,
            'titik_lokasi' => '-7.751976,110.4905482'
        ]);
    }
}