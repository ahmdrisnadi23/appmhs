<?php
class ProgramStudiModel
{
    private $table = 'programstudi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProgramStudi()
    {
        $this->db->query('SELECT programstudi.*, fakultas.NamaFakultas FROM programstudi LEFT JOIN fakultas ON programstudi.FakultasID = fakultas.FakultasID');

        return $this->db->resultSet();
    }


    public function getProgramStudiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ProgramStudiID=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahProgramStudi($data)
    {
        $query = "INSERT INTO programstudi(NamaProgramStudi, Deskripsi, FakultasID) VALUES (:nama_programstudi, :deskripsi, :fakultas_id)";
        $this->db->query($query);
        $this->db->bind('nama_programstudi', $data['NamaProgramStudi']);
        $this->db->bind('deskripsi', $data['Deskripsi']);
        $this->db->bind('fakultas_id', $data['FakultasID']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataProgramStudi($data)
    {
        $query = 'UPDATE programstudi SET NamaProgramStudi=:nama_programstudi, Deskripsi=:deskripsi, FakultasID=:fakultas_id WHERE ProgramStudiID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['ProgramStudiID']);
        $this->db->bind('nama_programstudi', $data['NamaProgramStudi']);
        $this->db->bind('deskripsi', $data['Deskripsi']);
        $this->db->bind('fakultas_id', $data['FakultasID']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteProgramStudi($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE ProgramStudiID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariProgramStudi()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE NamaProgramStudi LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
