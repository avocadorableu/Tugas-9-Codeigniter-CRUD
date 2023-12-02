<?php 
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use App\Models\PesertaModel;
 
class Peserta extends Controller
{
 
    public function __construct() {
 
        // Mendeklarasikan class PesertaModel menggunakan $this->peserta
        $this->peserta = new PesertaModel();
        /* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Peserta 
        */
    }
 
    public function index()
    {
        $data['peserta'] = $this->peserta->getPeserta();
        echo view('peserta/index', $data);
    } 

    public function create()
    {
        return view('peserta/create');
    } 

    public function store()
    {
        // Mengambil value dari form dengan method POST
        $name = $this->request->getPost('peserta_name');
        $alam = $this->request->getPost('peserta_alamat');
        $mail = $this->request->getPost('peserta_email');
        $telp = $this->request->getPost('peserta_telp');

        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'peserta_name' => $name,
            'peserta_alamat' => $alam,
            'peserta_email' => $mail,
            'peserta_telp' => $telp
        ];

        /* 
        Membuat variabel simpan yang isinya merupakan memanggil function 
        insert_peserta dan membawa parameter data 
        */
        $simpan = $this->peserta->insert_peserta($data);

        // Jika simpan berhasil, maka ...
        if($simpan)
        {
            // Deklarasikan session flashdata dengan tipe success
            session()->setFlashdata('success', 'Created peserta successfully');
            // Redirect halaman ke peserta
            return redirect()->to(base_url('peserta')); 
        }
    } 

    public function edit($id)
    {
        // Memanggil function getPeserta($id) dengan parameter $id di dalam PesertaModel dan menampungnya di variabel array peserta
        $data['peserta'] = $this->peserta->getPeserta($id);
        // Mengirim data ke dalam view
        return view('peserta/edit', $data);
    } 

    public function update($id)
    {
        // Mengambil value dari form dengan method POST
        $name = $this->request->getPost('peserta_name');
        $alam = $this->request->getPost('peserta_alamat');
        $mail = $this->request->getPost('peserta_email');
        $telp = $this->request->getPost('peserta_telp');
    
        // Membuat array collection yang disiapkan untuk insert ke table
        $data = [
            'peserta_name' => $name,
            'peserta_alamat' => $alam,
            'peserta_email' => $mail,
            'peserta_telp' => $telp
        ];
    
        /* 
        Membuat variabel ubah yang isinya merupakan memanggil function 
        update_peserta dan membawa parameter data beserta id
        */
        $ubah = $this->peserta->update_peserta($data, $id);
        
        // Jika berhasil melakukan ubah
        if($ubah)
        {
            // Deklarasikan session flashdata dengan tipe info
            session()->setFlashdata('info', 'Updated peserta successfully');
            // Redirect ke halaman peserta
            return redirect()->to(base_url('peserta')); 
        }
    } 

    public function delete($id)
    {
        // Memanggil function delete_peserta() dengan parameter $id di dalam PesertaModel dan menampungnya di variabel hapus
        $hapus = $this->peserta->delete_peserta($id);
    
        // Jika berhasil melakukan hapus
        if($hapus)
        {
                // Deklarasikan session flashdata dengan tipe warning
            session()->setFlashdata('warning', 'Deleted peserta successfully');
            // Redirect ke halaman peserta
            return redirect()->to(base_url('peserta'));
        }
    } 
}