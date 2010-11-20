<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sidemik
 *
 * @author user
 */
class Sidemik {

    public static function calculateIP($nim, $semester = NULL) {
        $pmks= new Model_Pengambilanmk();
        if ($semester == NULL) {
            $pmks = $pmks->where('nim_mahasiswa', '=', $nim)->find_all();
        } else {
            $pmks = $pmks->where('nim_mahasiswa', '=', $nim)->where('semester', '=', $semester)->find_all();
        }
        $sks = 0;
        $nilai = 0;
        $indeks = array (
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            'E' => 0,
        );
        foreach ($pmks as $pmk) {
            $matakuliah = new Model_Matakuliah($pmk->kode_kuliah);
            if (isset($indeks[$pmk->nilai])) {
                $nilai += $indeks[$pmk->nilai] * $matakuliah->jumlah_sks;
                $sks += $matakuliah->jumlah_sks;
            }
        }

        if ($sks == 0) {
            return 0;
        } else {
            return substr(floatval($nilai / $sks), 0, 4);
        }
    }

    public static function calculateIPK($nim) {
       return Sidemik::calculateIP($nim);
    }

    public static function getSemester($nim) {
        $config = new Model_Config();
        $mahasiswa = new Model_Mahasiswa($nim);

        $tahun = $config->where('name', '=', 'tahun')->find()->value;
        $semester = $config->where('name', '=', 'semester')->find()->value;

        return ($tahun - $mahasiswa->tahun_masuk) * 2 + $semester;
    }
}
?>
