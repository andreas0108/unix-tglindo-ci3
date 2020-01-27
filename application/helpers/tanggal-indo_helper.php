<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('unix_indo2')) {
	/** 
	 * Konversi UNIX Time stamp ke Tanggal Indonesia
	 * 
	 * Format : 
	 * 
	 * * Single Digit
	 * d = detik, m = menit, j = jam
	 * h = hari (full)
	 * t = tanggal, b = bulan, T = Tahun
	 * 
	 * * Kombinasi
	 * jm = 10:20
	 * jam = 10:20:30
	 * 
	 * tgl = 10 Desember 2019
	 * htg = Selasa, 10 Desember 2019
	 * htj = Selasa, 10 Desember 2019 10:20
	 * htjs = Selasa, 10 Desember 2019 10:20:30
	 * 
	 * Author : Andreas Ardi 
	 */

	function unix_indo2($tgl, $format)
	{
		switch ($format) {
				// Single Digit
			case "d":
				return gmdate("s", $tgl);
				break;

			case "m":
				return gmdate("i", $tgl);
				break;

			case "j":
				return gmdate("H", $tgl);
				break;

			case "h":
				return hari(gmdate("l", $tgl));
				break;

			case "t":
				return gmdate("n", $tgl);
				break;

			case "b":
				return bulan(gmdate("m", $tgl));
				break;

			case "T":
				return gmdate("Y", $tgl);
				break;

				// Kombinasi
			case "jm":
				return gmdate("H:i", $tgl);
				break;

			case "jam":
				return gmdate("H:i:s", $tgl);
				break;

			case "tgl":
				$x = explode("-", gmdate("n-m-Y", $tgl));
				return $x[0] . ' ' . bulan($x[1]) . ' ' . $x[2];
				break;

			case "htg":
				$a = hari(gmdate("l", $tgl));
				$x = explode("-", gmdate("n-m-Y", $tgl));
				$b = $x[0] . ' ' . bulan($x[1]) . ' ' . $x[2];
				return $a . ', ' . $b;
				break;

			case "htjs":
				$a = hari(gmdate("l", $tgl));
				$x = explode("-", gmdate("n-m-Y", $tgl));
				$b = $x[0] . ' ' . bulan($x[1]) . ' ' . $x[2];
				$c = gmdate("H:i:s", $tgl);
				return $a . ', ' . $b . ' ' . $c;
				break;
		}
	}
}

if (!function_exists('hari')) {
	function hari($hri)
	{
		switch ($hri) {
			case "Sunday":
				return "Minggu";
				break;
			case "Monday":
				return "Senin";
				break;
			case "Tuesday":
				return "Selasa";
				break;
			case "Wednesday":
				return "Rabu";
				break;
			case "Thursday":
				return "Kamis";
				break;
			case "Friday":
				return "Jumat";
				break;
			case "Saturday":
				return "Sabtu";
				break;
		}
	}
}


if (!function_exists('bulan')) {
	function bulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}
