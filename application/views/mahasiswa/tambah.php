<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Mahasiswa
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="text-danger"><?= form_error('nama'); ?></small>

                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                            <small class="text-danger"><?= form_error('nim'); ?></small>

                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="jurusan">Example select</label>
                                <select class="form-control" id="jurusan" name="jurusan">

                                    <option value="Informatika">Informatika </option>
                                    <option value="Sistem Informasi">Sistem Informasi </option>
                                    <option value="Teknik tambang">Teknik tambang </option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary float-right">Tambah</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>