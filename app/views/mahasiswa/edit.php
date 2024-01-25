<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Mahasiswa</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/mahasiswa/updateMahasiswa" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="nim" value="<?= $data['mahasiswa']['NIM']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama mahasiswa..." name="nama" value="<?= $data['mahasiswa']['Nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan alamat mahasiswa..." name="alamat"><?= $data['mahasiswa']['Alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email mahasiswa..." name="email" value="<?= $data['mahasiswa']['Email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon mahasiswa..." name="nomor_telepon" value="<?= $data['mahasiswa']['NomorTelepon']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" value="<?= $data['mahasiswa']['TanggalLahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <option value="Pria" <?= $data['mahasiswa']['JenisKelamin'] == 'Pria' ? 'selected' : ''; ?>>Pria</option>
                            <option value="Wanita" <?= $data['mahasiswa']['JenisKelamin'] == 'Wanita' ? 'selected' : ''; ?>>Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Program Studi</label>
                        <select class="form-control" name="program_studi_id">
                            <?php foreach ($data['programstudi'] as $programstudi) : ?>
                                <option value="<?= $programstudi['ProgramStudiID']; ?>" <?= $data['mahasiswa']['ProgramStudiID'] == $programstudi['ProgramStudiID'] ? 'selected' : ''; ?>><?= $programstudi['NamaProgramStudi']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->