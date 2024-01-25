<?php
class FakultasModel
{
    private $table = 'fakultas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllFakultas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getFakultasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE FakultasID=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahFakultas($data)
    {
        $query = "INSERT INTO fakultas(NamaFakultas, AlamatFakultas, Deskripsi) VALUES (:nama_fakultas, :alamat_fakultas, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('nama_fakultas', $data['NamaFakultas']);
        $this->db->bind('alamat_fakultas', $data['AlamatFakultas']);
        $this->db->bind('deskripsi', $data['Deskripsi']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataFakultas($data)
    {
        $query = 'UPDATE fakultas SET NamaFakultas=:nama_fakultas, AlamatFakultas=:alamat_fakultas, Deskripsi=:deskripsi WHERE FakultasID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['FakultasID']);
        $this->db->bind('nama_fakultas', $data['NamaFakultas']);
        $this->db->bind('alamat_fakultas', $data['AlamatFakultas']);
        $this->db->bind('deskripsi', $data['Deskripsi']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteFakultas($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE FakultasID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariFakultas()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE NamaFakultas LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
