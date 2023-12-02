<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PesertaModel extends Model
{
    protected $table = "peserta";
 
    public function getPeserta($id = false)
    {
        if($id === false){
            return $this->table('pesertas')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('pesertas')
                        ->where('peserta_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    } 

    public function insert_peserta($data)
    {
        return $this->db->table($this->table)->insert($data);
    } 

    public function update_peserta($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['peserta_id' => $id]);
    }  

    public function delete_peserta($id)
    {
        return $this->db->table($this->table)->delete(['peserta_id' => $id]);
    } 
}