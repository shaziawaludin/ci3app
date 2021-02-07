<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <?= $judul; ?>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>">
                            <small class="text-danger"><?= form_error('nama'); ?></small>

                        </div>
                        <div class="form-group">
                            <label for="nim">Nim</label>
                            <input type="text" class="form-control" id="nim" name="nim" value="<?= $mahasiswa['nim']; ?>">
                            <small class="text-danger"><?= form_error('nim'); ?></small>

                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="jurusan">Example select</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                    <?php foreach ($jurusan as $j) : ?>
                                        <?php if ($j == $mahasiswa['jurusan']) : ?>
                                            <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $j; ?>"><?= $j; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
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