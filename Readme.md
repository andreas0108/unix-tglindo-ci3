Konversi UNIX Time stamp ke Tanggal Indonesia
======
Fungsi ini pada dasarnya menggunakan gmdate untuk merubah ```1575973230``` -> ```Selasa, 10 Desember 2019 10:20:30```

Cara penggunaan 
------------
Load terlebih dulu file helper ini lewat autoload / controller
* Autoload
```$autoload['helper'] = array(..., 'tanggal-indo');```

* Controller
```
public function __construct(){
	parent::__construct();
	$this->load->helper('tanggal-indo');
}
```

Kemudian panggil fungsi tersebut menggunakan cara :
```
// controller
unix_indo($unixtime, "format");

// view
<?= unix_indo($unixtime, "format"); ?>
```

## Contoh Penggunaan
```
$unixtime = 1575973230

<?= unix_indo($unixtime, "jam"); ?> // 10:20:30
<?= unix_indo($unixtime, "h"); ?> // Selasa
<?= unix_indo($unixtime, "tgl"); ?> // 10 Desember 2019
<?= unix_indo($unixtime, "htjs"); ?> // Selasa, 10 Desember 2019 10:20:30
```

## Format
Single Digit :
```
"d" (detik) = 30
"m" (menit) = 20
"j" (jam)   = 10

"h" (hari)    = Selasa
"t" (tanggal) = 10
"b" (bulan)   = 12
"T" (Tahun)   = 2019
```
## Kombinasi
```
"jm"  = 10:20
"jam" = 10:20:30

"tgl"  = 10 Desember 2019
"htg"  = Selasa, 10 Desember 2019
"htj"  = Selasa, 10 Desember 2019 10:20
"htjs" = Selasa, 10 Desember 2019 10:20:30
```
Versi ini masih versi awal, akan dikembangkan untuk lebih baik lagi, silahkan bagi yang ingin berkontribusi saya persilahkan
