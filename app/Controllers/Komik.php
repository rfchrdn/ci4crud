<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;

    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // Mengambil data dari model
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        return view('komik/index', $data);
    }

    public function detail($slug)
    {
        // Mengambil detail komik berdasarkan slug
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        // Jika komik tidak ditemukan
        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }

    public function save()
    {
        // Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => 'Judul komik harus diisi.',
                    'is_unique' => 'Judul komik sudah ada.'
                ]
            ],
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'is_image' => 'Yang anda upload bukan gambar.',
                    'mime_in' => 'Yang anda upload bukan gambar yang valid (jpg, jpeg, png).'
                ]
            ]
        ])) {
            return redirect()->to('/komik/create')->withInput();
        }

        // Ambil file gambar
        $fileSampul = $this->request->getFile('sampul');
        // APAKAH TIDAK ADA GAMBAR YANG DIUPLOAD
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        // Simpan data ke database
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        // Cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);

        // Hapus file gambar
        if ($komik['sampul'] != 'default.png') {
            unlink('img/' . $komik['sampul']);
        }

        // Hapus data komik dari database
        $this->komikModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');

        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));

        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }

        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Judul komik harus diisi.',
                    'is_unique' => 'Judul komik sudah ada.'
                ]
            ],
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar maksimal 1MB.',
                    'is_image' => 'Yang anda upload bukan gambar.',
                    'mime_in' => 'Yang anda upload bukan gambar yang valid (jpg, jpeg, png).'
                ]
            ]
        ])) {
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }

        // Ambil file gambar
        $fileSampul = $this->request->getFile('sampul');

        // Cek apakah user upload gambar baru
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // Generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();
            // Pindahkan file ke folder img
            $fileSampul->move('img', $namaSampul);
            // Hapus file lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        // Update data di database
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => url_title($this->request->getVar('judul'), '-', true),
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/komik');
    }
}
