<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Furniture;

class FurnitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $furnitures = [
            [
                'name' => 'Sofa Neo Minimalis',
                'price' => 8500000,
                'description' => 'Sofa futuristik dengan desain minimalis yang cocok untuk ruang tamu modern. Dilengkapi dengan lampu LED ambien yang dapat diubah warnanya sesuai suasana dan pengisi daya wireless terintegrasi di sandaran tangan.',
                'image' => 'images/furniture/sofa.jpg',
                'dimensions' => '250cm x 90cm x 85cm',
                'material' => 'Kulit Sintetis Premium, Rangka Aluminium',
                'color' => 'Abu-abu, Putih, Hitam',
                'features' => 'Lampu LED Ambient, Pengisi Daya Wireless, Koneksi Bluetooth',
                'warranty' => '5 Tahun',
                'is_featured' => true
            ],
            [
                'name' => 'Meja Hologram Touch',
                'price' => 12750000,
                'description' => 'Meja futuristik dengan teknologi layar sentuh terintegrasi dan kemampuan proyeksi hologram. Permukaan meja dapat digunakan sebagai layar sentuh interaktif untuk berbagai keperluan multimedia.',
                'image' => 'images/furniture/meja.jpg',
                'dimensions' => '120cm x 80cm x 75cm',
                'material' => 'Kaca Tempered, Aluminium, Komponen Elektronik',
                'color' => 'Hitam, Transparan',
                'features' => 'Layar Sentuh, Proyeksi Hologram, Konektivitas Wi-Fi',
                'warranty' => '3 Tahun',
                'is_featured' => true
            ],
            [
                'name' => 'Kursi Smart Ergonomis',
                'price' => 5990000,
                'description' => 'Kursi pintar yang dapat menyesuaikan bentuk dengan tubuh pengguna. Dilengkapi dengan fitur pemanas dan pijat yang dapat dikontrol melalui aplikasi smartphone.',
                'image' => 'images/furniture/kursi.jpg',
                'dimensions' => '65cm x 70cm x 110cm',
                'material' => 'Memory Foam, Kulit Premium, Rangka Karbon',
                'color' => 'Hitam, Biru Navy',
                'features' => 'Penyesuaian Bentuk Otomatis, Pemanas, Pijat, Kontrol Aplikasi',
                'warranty' => '2 Tahun',
                'is_featured' => true
            ],
            [
                'name' => 'Lemari Modular Futura',
                'price' => 9250000,
                'description' => 'Lemari modular dengan sistem yang dapat diatur sesuai kebutuhan. Dilengkapi dengan pengatur suhu otomatis untuk penyimpanan barang sensitif terhadap suhu.',
                'image' => 'images/furniture/lemari.jpg',
                'dimensions' => '180cm x 60cm x 200cm',
                'material' => 'Metal, Kaca, Komposit Premium',
                'color' => 'Putih, Silver',
                'features' => 'Pengatur Suhu, Modul Fleksibel, Pencahayaan LED',
                'warranty' => '5 Tahun',
                'is_featured' => true
            ],
            [
                'name' => 'Lampu Gantung Neon Flex',
                'price' => 3490000,
                'description' => 'Lampu gantung modern dengan teknologi penyesuaian warna dan intensitas melalui aplikasi smartphone. Desain geometris yang unik memberikan aksen futuristik pada ruangan.',
                'image' => 'images/furniture/lampu.jpg',
                'dimensions' => '60cm x 60cm x 100cm',
                'material' => 'Aluminium, Akrilik, LED',
                'color' => 'Multi-warna (dapat disesuaikan)',
                'features' => '16 juta pilihan warna, Kontrol Aplikasi, Pengaturan Waktu',
                'warranty' => '2 Tahun',
                'is_featured' => true
            ],
            [
                'name' => 'Rak Levitasi Magnetik',
                'price' => 7750000,
                'description' => 'Rak dengan teknologi levitasi magnetik yang memberikan kesan melayang dan futuristik. Setiap tingkat rak dapat diatur posisinya dan dapat menahan beban hingga 2kg per tingkat.',
                'image' => 'images/furniture/rak.jpg',
                'dimensions' => '120cm x 30cm x 120cm',
                'material' => 'Kayu Oak, Komponen Magnetik, Metal',
                'color' => 'Coklat Natural, Hitam',
                'features' => 'Levitasi Magnetik, Pencahayaan LED, Posisi Adjustable',
                'warranty' => '3 Tahun',
                'is_featured' => true
            ],
        ];
        
        foreach ($furnitures as $furniture) {
            Furniture::create($furniture);
        }
    }
}