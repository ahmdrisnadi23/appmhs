<?php
class MahasiswaModel
{
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT mahasiswa.*, programstudi.NamaProgramStudi FROM mahasiswa LEFT JOIN programstudi ON mahasiswa.ProgramStudiID = programstudi.ProgramStudiID');

        return $this->db->resultSet();
    }

    public function getMahasiswaByNIM($nim)
    {
        $this->db->query('SELECT mahasiswa.*, programstudi.NamaProgramStudi FROM mahasiswa LEFT JOIN programstudi ON mahasiswa.ProgramStudiID = programstudi.ProgramStudiID WHERE NIM=:nim');
        $this->db->bind('nim', $nim);

        return $this->db->single();
    }

    public function tambahMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa(NIM, Nama, Alamat, Email, NomorTelepon, TanggalLahir, JenisKelamin, ProgramStudiID) VALUES (:nim, :nama, :alamat, :email, :nomor_telepon, :tanggal_lahir, :jenis_kelamin, :program_studi_id)";
        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('nomor_telepon', $data['nomor_telepon']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('program_studi_id', $data['program_studi_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMahasiswa($data)
    {
        $query = 'UPDATE mahasiswa SET Nama=:nama, Alamat=:alamat, Email=:email, NomorTelepon=:nomor_telepon, TanggalLahir=:tanggal_lahir, JenisKelamin=:jenis_kelamin, ProgramStudiID=:program_studi_id WHERE NIM=:nim';
        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('nomor_telepon', $data['nomor_telepon']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('program_studi_id', $data['program_studi_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMahasiswa($nim)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE NIM=:nim');
        $this->db->bind('nim', $nim);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariMahasiswa()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT mahasiswa.*, programstudi.NamaProgramStudi FROM mahasiswa LEFT JOIN programstudi ON mahasiswa.ProgramStudiID = programstudi.ProgramStudiID WHERE Nama LIKE :key');
        $this->db->bind('key', "%$key%");

        return $this->db->resultSet();
    }
}
