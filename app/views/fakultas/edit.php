<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Fakultas</h1>
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
            <form role="form" action="<?= base_url; ?>/fakultas/updateFakultas" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="FakultasID" value="<?= $data['fakultas']['FakultasID']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Fakultas</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama fakultas..." name="NamaFakultas" value="<?= $data['fakultas']['NamaFakultas']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat Fakultas</label>
                        <textarea class="form-control" placeholder="Masukkan alamat fakultas..." name="AlamatFakultas"><?= $data['fakultas']['AlamatFakultas']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" placeholder="Masukkan deskripsi..." name="Deskripsi"><?= $data['fakultas']['Deskripsi']; ?></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url; ?>/fakultas" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->