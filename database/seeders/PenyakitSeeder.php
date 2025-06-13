<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    // Mengisi data penyakit terkait ISPA pada balita berdasarkan aturan dari PDF
    $penyakitData = [
        [
            'kode_solusi' => 'P001',
            'penyakit' => 'Demam ',
            'solusi' => 'Pengobatan gejala seperti batuk dapat dilakukan dengan obat yang sesuai anjuran dokter, terutama dengan memperhatikan riwayat alergi pasien. Mata merah mungkin memerlukan penanganan tambahan seperti tetes mata jika disebabkan oleh iritasi atau infeksi ringan. Selain itu, penting untuk meningkatkan asupan protein dalam diet pasien untuk mendukung Banyak minum air putih'
        ],
        [
            'kode_solusi' => 'P002',
            'penyakit' => 'Mata Merah , Sakit Tenggorokan , Hidung Tersumbat',
            'solusi' => 'Untuk ISPA ringan dengan mata merah, hidung tersumbat, dan sakit tenggorokan, serta riwayat rawat inap dan rendahnya asupan serat, disarankan untuk meningkatkan konsumsi buah dan sayur. Gunakan kompres air hangat untuk mata merah dan jaga kebersihan tangan untuk mencegah infeksi lanjutan.'
        ],
        [
            'kode_solusi' => 'P003',
            'penyakit' => 'Batuk , Pilek , Suara serak',
            'solusi' => 'Untuk ISPA ringan dengan batuk, pilek, dan suara serak, serta imunisasi lengkap dan gizi baik, pastikan anak cukup istirahat, minum air putih, dan makan makanan bergizi untuk mendukung pemulihan dan sistem imun.'
        ],
        [
            'kode_solusi' => 'P004',
            'penyakit' => 'Pilek , Suara serak , Hidung tersumbat',
            'solusi' => 'Untuk ISPA ringan dengan hidung tersumbat, suara serak, dan pilek di lingkungan berdebu serta kekurangan vitamin A, bersihkan rumah secara rutin untuk mengurangi iritasi, dan tingkatkan asupan vitamin A dari wortel, sayuran hijau, dan ubi jalar. Pastikan anak tetap terhidrasi dan cukup istirahat untuk mempercepat pemulihan.'
        ],
        [
            'kode_solusi' => 'P005',
            'penyakit' => 'Batuk , Suara serak , Hidung tersumbat',
            'solusi' => 'Untuk ISPA ringan dengan hidung tersumbat, suara serak, dan pilek di lingkungan berdebu serta kekurangan vitamin A, bersihkan rumah secara rutin untuk mengurangi iritasi, dan tingkatkan asupan vitamin A dari wortel, sayuran hijau, dan ubi jalar. Pastikan anak tetap terhidrasi dan cukup istirahat untuk mempercepat pemulihan'
        ],
        [
            'kode_solusi' => 'P006',
            'penyakit' => 'Pilek , Mata Merah , Hidung tersumbat',
            'solusi' => 'Selain meningkatkan asupan serat dengan buah dan sayur, pastikan anak sering cuci tangan, gunakan kompres hangat untuk mata merah, jaga kebersihan lingkungan, dan beri cukup istirahat. Jika gejala berlanjut, konsultasikan ke dokter.'
        ],
        [
            'kode_solusi' => 'P007',
            'penyakit' => 'Demam , Pilek , Hidung tersumbat',
            'solusi' => 'Disarankan pasien cukup istirahat, terhidrasi, dan minum obat sesuai anjuran dokter, sambil memperhatikan riwayat alergi. Tingkatkan asupan protein dan vitamin A untuk mendukung pemulihan. Jaga lingkungan bersih dari alergen. Jika gejala memburuk, segera konsultasi dokter.'
        ],
        [
            'kode_solusi' => 'P008',
            'penyakit' => 'Demam , Batuk , Mata Merah',
            'solusi' => 'Pastkan banyak makan buah, istirahat yang cukup. Perbanyak minum air putih, dan minum obat sesuai anjuran dokter'
        ],
        [
            'kode_solusi' => 'P009',
            'penyakit' => 'Demam , Batuk , Muntah',
            'solusi' => 'Disarankan untuk meningkatkan asupan makanan bergizi dan berprotein untuk mendukung sistem imun, gunakan obat yang sesuai dengan gejala di atas dan banyak minum air putih'
        ],
        [
            'kode_solusi' => 'P010',
            'penyakit' => 'Batuk , Sakit tenggorokan , Hidung tersumbat ',
            'solusi' => 'Perbaiki pola makan dan konsumsi makana yang bergizi dan berprotein untuk memperkuat daya tahan tubuh, istirahat yang cukup, dan minum air putih, dan minum obat yang sesuai dengan gejala'
        ],
        [
            'kode_solusi' => 'P011',
            'penyakit' => 'Demam , Batuk , Suara Bengek ',
            'solusi' => 'Meningkatkan asupan vitamin A dan C untuk memperkuat sistem imun. Penggunaan obat yang tepat sesuai anjuran dokter sangat diperlukan untuk mengatasi gejala, jika kondisi tidak membaik segera konsultasikan ke dokter, selain itu pasien mendapat istirahat yang cukup.'
        ],
        [
            'kode_solusi' => 'P012',
            'penyakit' => 'Sesak Nafas , Muntah , Suara Bengek ',
            'solusi' => 'Untuk mengatasi ISPA sedang dengan gejala sesak napas, suara bengek, dan muntah serta riwayat paparan asap rokok, segera hindari asap rokok dan pastikan kualitas udara bersih. Berikan makanan bergizi tinggi yang mendukung sistem imun, seperti protein, sayuran, dan buah, serta pastikan anak terhidrasi dengan baik. Jika gejala memburuk, segera konsultasikan ke dokter.'
        ],
        [
            'kode_solusi' => 'P013',
            'penyakit' => 'Demam , Batuk , Suara Serak ',
            'solusi' => 'Untuk mengatasi ISPA sedang dengan gejala demam, batuk, dan sesak napas, serta kondisi lingkungan yang lembab dan kekurangan vitamin C, disarankan untuk melakukan langkah-langkah berikut. Pertama, tingkatkan asupan vitamin C dengan mengonsumsi buah-buahan seperti jeruk, kiwi, dan stroberi, yang dapat membantu memperkuat sistem imun dan mempercepat proses pemulihan.'
        ],
        [
            'kode_solusi' => 'P014',
            'penyakit' => 'Demam , Batuk , Suara Serak ',
            'solusi' => 'Pasien disarankan cukup istirahat, menjaga hidrasi, dan menggunakan obat batuk-pilek sesuai anjuran dokter, terutama jika ada riwayat alergi. Jaga lingkungan bersih dan bebas polusi untuk mencegah kondisi memburuk'
        ],
        [
            'kode_solusi' => 'P015',
            'penyakit' => 'Batuk , Sesak Nafas , Suara Serak ',
            'solusi' => 'Hindari paparan asap rokok, perbanyak istirahat,kurangi aktivitas diluar yang mengakibatkan terkena paparan asap rokok dan konsultasi dengan dokter untuk pengobatan yang tepat.'
        ],
        [
            'kode_solusi' => 'P016',
            'penyakit' => 'Demam , Sakit Tenggorokan , Suara Serak ',
            'solusi' => 'Pastikan juga untuk menjaga kebersihan lingkungan rumah dengan rutin membersihkan debu dan menghindari penggunaan karpet yang bisa menjadi tempat berkembangnya alergen. Istirahat yang cukup dan menjaga hidrasi tubuh dengan minum air putih yang cukup juga sangat penting dalam proses penyembuhan. Jika gejala tidak membaik atau semakin parah, segera konsultasikan dengan tenaga medis untuk mendapatkan penanganan yang lebih tepat.'
        ],
        [
            'kode_solusi' => 'P017',
            'penyakit' => 'Demam , Sakit Tenggorokan , Muntah ',
            'solusi' => 'penting untuk menghindari makanan atau pemicu lingkungan yang dapat memperburuk gejala. Pilihlah makanan yang kaya serat namun rendah risiko alergi, seperti sayuran hijau, buah-buahan yang aman, dan biji-bijian. Serat akan membantu memperbaiki pencernaan dan mendukung sistem imun tubuh dalam melawan infeksi. Pastikan juga untuk menjaga lingkungan tetap bersih dan bebas dari alergen potensial seperti debu atau bulu hewan peliharaan.
            Selain itu, istirahat yang cukup sangat diperlukan untuk memulihkan kondisi tubuh. Suhu tubuh yang meningkat akibat demam bisa diredakan dengan kompres hangat dan menjaga ruangan tetap sejuk namun nyaman. Jika gejala tidak membaik dalam beberapa hari atau ada tanda-tanda alergi yang memburuk, Batasi makanan yang bisa memicu alergi, perbanyak konsumsi serat dari buah dan sayur, dan pastikan anak tetap terhidrasi.segera konsultasikan dengan dokter untuk penanganan lebih lanjut'
        ],
        [
            'kode_solusi' => 'P018',
            'penyakit' => 'Batuk , Suara Serak , Hidung tersumbat',
            'solusi' => 'Penting untuk menjaga kesehatan membran mukosa pada saluran pernapasan, yang bisa membantu meredakan gejala dan mempercepat pemulihan. Anda juga bisa menambahkan makanan kaya antioksidan lainnya untuk mendukung sistem imun tubuh, seperti buah-buahan dan sayuran berwarna cerah.
            Selain itu, pastikan tubuh tetap terhidrasi dengan baik dengan minum air putih yang cukup dan cairan hangat seperti teh herbal atau sup, yang dapat membantu meredakan batuk dan hidung tersumbat. Istirahat yang cukup juga sangat penting untuk mendukung proses penyembuhan. Jika gejala tidak menunjukkan perbaikan dalam beberapa hari atau memburuk, segera konsultasikan dengan dokter untuk mendapatkan penanganan yang lebih lanjut dan tepat.'
        ],
        [
            'kode_solusi' => 'P019',
            'penyakit' => 'Sesak Nafas , Muntah , Suara Bengek ',
            'solusi' => 'Tingkatkan asupan vitamin C, kurangi kelembaban dengan dehumidifier, dan pastikan sirkulasi udara baik. Jaga kamar kering. Jika sesak napas berlanjut, segera konsultasi dokter. Pastikan anak cukup istirahat dan terhidrasi.'
        ],
        [
            'kode_solusi' => 'P020',
            'penyakit' => 'Demam , Batuk , Suara Serak ',
            'solusi' => 'Kondisi ini memerlukan penanganan medis segera, termasuk kemungkinan rawat inap untuk pemantauan dan terapi oksigen jika sesak napas memburuk. Status gizi harus diperhatikan untuk memastikan pasien mendapatkan nutrisi yang cukup, mendukung kekuatan tubuh dalam melawan infeksi. Lingkungan pasien perlu dijaga kebersihannya, bebas dari polusi dan alergen, untuk mencegah perburukan kondisi. Penting juga untuk mengevaluasi dan memperbarui status imunisasi jika diperlukan. Segera konsultasikan dengan dokter untuk menentukan langkah penanganan yang tepat dan memastikan pasien mendapatkan perawatan yang optimal.'
        ],
        [
            'kode_solusi' => 'P021',
            'penyakit' => 'Demam , Sesak Nafas , Muntah ',
            'solusi' => 'Mengingat kondisi yang serius, diperlukan perawatan medis segera, termasuk kemungkinan rawat inap untuk pemantauan intensif dan terapi oksigen untuk mengatasi sesak napas. Status gizi pasien, terutama kekurangan protein, harus segera diperbaiki dengan pemberian nutrisi yang tepat untuk memperkuat sistem imun dan mendukung pemulihan.'
        ],
        [
            'kode_solusi' => 'P022',
            'penyakit' => 'Demam , Mata Merah , Suara Serak , Muntah ',
            'solusi' => 'Pemantauan  intensif dan perawatan khusus, terutama untuk mengatasi suara sesak yang mengindikasikan kesulitan bernapas. Mengingat riwayat paparan asap rokok, sangat penting untuk menjaga pasien dari paparan lebih lanjut terhadap asap dan alergen lainnya yang dapat memperburuk kondisi. Status gizi pasien juga perlu dievaluasi dan ditingkatkan untuk mendukung pemulihan. Mata merah kemungkinan disebabkan oleh iritasi atau infeksi, sehingga memerlukan perawatan tambahan. Konsultasikan segera dengan dokter untuk menentukan langkah penanganan yang tepat dan memastikan pasien mendapatkan perawatan yang optimal.'
        ],
        [
            'kode_solusi' => 'P023',
            'penyakit' => 'Demam , Sesak Nafas , Muntah , Suara Bengek , Hidung Tersumbat ',
            'solusi' => 'Penanganan segera dan intensif sangat penting untuk kondisi ini, termasuk kemungkinan rawat inap untuk pemantauan dan terapi oksigen guna mengatasi sesak napas dan suara sesak. Selain perawatan medis, pemulihan nutrisi sangat krusial; pastikan pasien mendapatkan asupan protein, vitamin A, dan vitamin C yang cukup melalui diet atau suplemen, serta meningkatkan konsumsi serat untuk mendukung kesehatan pencernaan. Lingkungan pasien harus bersih dan bebas dari polusi atau alergen yang dapat memperburuk kondisi. Jika gejala berlanjut atau memburuk, konsultasikan segera dengan dokter untuk penanganan yang lebih komprehensif dan evaluasi berkelanjutan.'
        ],
        [
            'kode_solusi' => 'P024',
            'penyakit' => 'Batuk , Sesak Nafas , Suara Bengek ',
            'solusi' => 'Segera bawa anak ke dokter untuk evaluasi dan penanganan medis karena gejala menunjukkan ISPA berat, yang memerlukan perhatian segera. Pastikan anak mendapatkan imunisasi yang belum lengkap sesuai jadwal untuk mencegah infeksi lebih lanjut. Untuk memperbaiki status gizi yang kurang, fokus pada pemberian makanan yang bergizi tinggi seperti protein dari daging, ikan, telur, dan kacang-kacangan, serta karbohidrat kompleks dari biji-bijian dan sayuran. Tambahkan juga asupan vitamin dan mineral penting melalui buah-buahan, sayuran hijau, dan suplemen jika diperlukan. Selain itu, jaga agar anak tetap terhidrasi dengan memberikan cairan yang cukup, dan hindari paparan asap rokok atau polusi udara yang dapat memperburuk kondisi. Pantau gejala dengan ketat, dan pastikan anak mendapatkan istirahat yang cukup untuk mendukung pemulihan.'
        ],
        [
            'kode_solusi' => 'P025',
            'penyakit' => 'Demam , Sesak Nafas , Suara Bengek ',
            'solusi' => 'Selain segera menghindari paparan asap rokok dan berkonsultasi dengan dokter untuk penanganan medis yang tepat, pastikan untuk menciptakan lingkungan rumah yang bersih dan bebas dari alergen yang dapat memicu alergi dan memperburuk gejala. Gunakan pembersih udara atau sering membuka jendela untuk meningkatkan sirkulasi udara yang bersih. Tingkatkan asupan protein dengan memberikan makanan seperti daging tanpa lemak, ikan, telur, dan kacang-kacangan, yang akan membantu memperkuat sistem imun dan mempercepat pemulihan. Jika anak memiliki kesulitan makan akibat sesak napas, berikan makanan dalam porsi kecil tetapi sering, dan pertimbangkan untuk menambahkan suplemen protein jika direkomendasikan oleh dokter. Selain itu, pastikan anak tetap terhidrasi dengan baik dan beristirahat secara optimal untuk mendukung pemulihan tubuh. Pantau gejala dengan cermat dan segera kembali ke dokter jika kondisi tidak membaik atau memburuk'
        ],
        [
            'kode_solusi' => 'P026',
            'penyakit' => 'Suara Serak , Muntah , Suara Bengek ',
            'solusi' => 'Untuk mengatasi ISPA berat dengan gejala muntah, sesak napas, dan suara bengek, serta riwayat paparan asap rokok dan alergi, lakukan langkah-langkah berikut. Pertama, hindari paparan asap rokok dan lingkungan yang dapat memperburuk kondisi, serta pastikan anak berada di lingkungan yang bersih dan bebas dari alergen. Kedua, pastikan anak mendapatkan imunisasi yang diperlukan untuk melindungi dari infeksi tambahan. Tingkatkan asupan protein dengan makanan bergizi tinggi, seperti daging tanpa lemak, ikan, telur, dan kacang-kacangan, untuk mendukung pemulihan dan memperkuat sistem imun. Jaga agar anak tetap terhidrasi dengan memberikan banyak cairan dan makanan bergizi, serta hindari makanan yang dapat memicu iritasi pada tenggorokan. Selain itu, pertimbangkan penggunaan humidifier untuk menjaga kelembapan udara dan mengurangi iritasi pada saluran pernapasan. Segera konsultasikan dengan dokter untuk mendapatkan evaluasi dan penanganan medis yang tepat agar kondisi dapat ditangani secara efektif.'
        ],
    ];

    // Iterasi melalui setiap data penyakit dan simpan ke dalam database
    foreach ($penyakitData as $data) {
        Penyakit::create($data); // Menggunakan model Penyakit untuk menyimpan data
    }
}

    
    
}
