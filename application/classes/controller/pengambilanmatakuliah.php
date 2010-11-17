<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pengambilanmatakuliah extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Pengambilan matakuliah";
    }

    public function action_ambil($nim) {
        $this->template->title = "Ambil matakuliah";

        if (isset ($_POST['ambil'])) {
            // hapus data yang telah ada
            $pengambilanmks = new Model_Pengambilanmk();
            $pengambilanmks->where('semester', '=', $_POST['semester_ambil'])
                    ->where('nim_mahasiswa', '=', $nim)
                    ->delete_all();

            // simpan data
            foreach ($_POST['ambil'] as $key => $val) {
                $pengambilanmks = new Model_Pengambilanmk();
                $pengambilanmks->kode_kuliah    = $key;
                $pengambilanmks->nim_mahasiswa  = $nim;
                $pengambilanmks->semester       = $_POST['semester_ambil'];
                $pengambilanmks->save();
            }
        }

        $matakuliah = new Model_Matakuliah();
        $mahasiswa = new Model_Mahasiswa($nim);
        $pengambilanmks = new Model_Pengambilanmk();
        $kurikulum = array();
        $matakuliah = $matakuliah->find_all();

        foreach($matakuliah as $_matakuliah) {
            if ($_matakuliah->semester_buka != 1 && $_matakuliah->semester_buka != 2) {// buka di semester ganjil dan genap
                // simpan ke kurikulum
                $kurikulum[$_matakuliah->tingkat][1][] =
                        $_matakuliah;
            } else {
                // simpan ke kurikulum
                $kurikulum[$_matakuliah->tingkat][$_matakuliah->semester_buka][] =
                        $_matakuliah;
            }
        }

        $this->template->content->mahasiswa = $mahasiswa;
        $this->template->content->pengambilanmks = $pengambilanmks;
        $this->template->content->kurikulum = $kurikulum;
    }

    public function action_ksm($nim) {
        $this->template->title = "KSM";
        $matakuliahs = array();
        $pengambilanmks = new Model_Pengambilanmk();
        $pengambilanmks = $pengambilanmks
                            ->where('nim_mahasiswa', '=', $nim)
                            ->where('semester', '=', 2)
                            ->find_all();
        foreach ($pengambilanmks as $pengambilanmk) {
            $kode = $pengambilanmk->kode_kuliah;
            $matakuliah = new Model_Matakuliah($kode);
            $matakuliahs[] = $matakuliah;
        }

        $this->template->content->matakuliahs = $matakuliahs;
    }

    public function action_transkrip() {
        $this->template->title = "Transkrip mahasiswa";

        
    }

    public function action_inputnilai($kode_mata_kuliah = NULL, $tahun = NULL, $semester = NULL) {
        $this->template->title = "Input Nilai Mahasiswa";
        $request = Request::instance();

        if (isset($_POST['pilih']) && $_POST['tahun']!='0' &&
                $_POST['semester']!='0' && $_POST['matakuliah']!='0') {
            $request->redirect($request->controller . '/' . $request->action .
                    '/' . $_POST['matakuliah'] . '/' . $_POST['tahun'] . '/' .
                    $_POST['semester']);
        }

        if (isset($_POST['simpan'])) {
            foreach($_POST['nilai'] as $nim => $nilai) {
                $mahasiswa = new Model_Mahasiswa($nim);
                $_sems = $this->tahun_semester_to_semester($tahun,
                        $semester, $mahasiswa->tahun_masuk);
                $id = array(
                    'nim_mahasiswa' => $nim,
                    'kode_kuliah'   => $kode_mata_kuliah,
                    'semester'      => $_sems
                );
                $pmk = new Model_Pengambilanmk($id);
                $pmk->nilai = $nilai;
                $pmk->save();
            }
        }

        $matakuliahs = new Model_Matakuliah();
        $matakuliahs = $matakuliahs->find_all();
        $list_matakuliah = array();
        $list_matakuliah[0] = ' ';
        foreach ($matakuliahs as $matakuliah) {
            $list_matakuliah[$matakuliah->kode] = $matakuliah->kode . ' ' .
                    $matakuliah->nama;
        }

        $list_tahun = array();
        $list_tahun[0] = ' ';
        $tahun_sekarang = date('Y');
        for ($t = $tahun_sekarang - 4; $t <= $tahun_sekarang + 4; ++$t) {
            $list_tahun[$t] = $t;
        }

        $list_input_nilai = array();
        if ($kode_mata_kuliah != NULL && $tahun != NULL && $semester != NULL) {
            //echo $kode_mata_kuliah;
            $pengambilan_mks = new Model_Pengambilanmk();
            $pengambilan_mks = $pengambilan_mks->
                    where('kode_kuliah', '=', $kode_mata_kuliah)->
                    order_by('nim_mahasiswa', 'ASC')->find_all();
            foreach($pengambilan_mks as $p_mk) {
                $mahasiswa = new Model_Mahasiswa($p_mk->nim_mahasiswa);
                $convert_result = ($tahun - $mahasiswa->tahun_masuk) * 2 + $semester;
                if ($convert_result == $p_mk->semester) {
                    $nilai;
                    if ($p_mk->nilai == NULL) {
                        $nilai = 0;
                    } else {
                        $nilai = $p_mk->nilai;
                    }
                    
                    $list_input_nilai[] = array (
                        'nim'   => $mahasiswa->nim,
                        'nama'  => $mahasiswa->nama,
                        'nilai' => $nilai
                    );
                }
            }

            $this->template->content->selected_matakuliah = $kode_mata_kuliah;
            $this->template->content->selected_tahun = $tahun;
            $this->template->content->selected_semester = $semester;
        } else {
            $this->template->content->selected_matakuliah = 0;
            $this->template->content->selected_tahun = 0;
            $this->template->content->selected_semester = 0;
        }
        $this->template->content->list_input_nilai = $list_input_nilai;
        $this->template->content->list_matakuliah = $list_matakuliah;
        $this->template->content->list_tahun = $list_tahun;
    }

    public function tahun_semester_to_semester($tahun, $semester, $tahun_masuk) {
        return ($tahun - $tahun_masuk) * 2 + $semester;
    }

    public function action_jadwal($nim) {
        $this->template->title = "Jadwal Kuliah";
    }
} // End Pengambilan matakuliah
