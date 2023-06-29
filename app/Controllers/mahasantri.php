<?php

namespace App\Controllers;

class mahasantri extends BaseController
{
    public function hapus($id)
    {
        $this->model->delete($id);
        return redirect()->to('mahasantri');
    }
    function __construct()
    {
        $this->model = new \App\Models\ModelMahasantri();
    }

    public function edit($id)
    {
        return json_encode($this->model->find($id));
    }
    public function simpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk {field} adalah 1 karakter'
                ]
            ],
            'nim' => [
                'label' => 'Nim',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk {field} adalah 5 karakter'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk {field} adalah 5 karakter'
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $id = $this->request->getPost('id');
            $nama = $this->request->getPost('nama');
            $nim = $this->request->getPost('nim');
            $alamat = $this->request->getPost('alamat');
            $jurusan = $this->request->getPost('jurusan');

            $data = [
                'id' => $id,
                'nama' => $nama,
                'nim'  => $nim,
                'alamat' => $alamat,
                'jurusan' => $jurusan
            ];

            $this->model->save($data);

            $hasil['sukses'] = "Berhasil Memasukkan data";
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }
    public function index()
    {

        $data['dataMahasantri'] = $this->model->orderBy('id', 'desc')->findAll();
        $data['nomor'] = ($this->request->getVar('page') == 1) ? '0' : $this->request->getVar('page');
        return view('mahasantri_view', $data);
    }
}
