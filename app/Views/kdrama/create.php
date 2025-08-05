<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="my-3">Form Tambah Data K-Drama</h2>

            <div class="row">
                <!-- Kolom kiri 70% untuk semua input -->
                <div class="col-8">
                    <form action="/kdrama/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= old('judul'); ?>" autofocus>
                                <div class="invalid-feedback">
                                    <small><?= validation_show_error('judul') ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="judul" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select class="form-select <?= (validation_show_error('kategori')) ? 'is-invalid' : ''; ?>" name="kategori" id="kategori">
                                    <option selected disabled>Pilih Kategori</option>
                                    <?php foreach ($kategori as $kt) : ?>
                                        <option value="<?= $kt['id']; ?>"><?= $kt['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <small><?= validation_show_error('kategori') ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sutradara" class="col-sm-3 col-form-label">Sutradara</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= (validation_show_error('sutradara')) ? 'is-invalid' : ''; ?>" id="sutradara" name="sutradara" value="<?= old('sutradara'); ?>">
                                <div class="invalid-feedback">
                                    <small><?= validation_show_error('sutradara') ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="penayangan" class="col-sm-3 col-form-label">Penayangan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= (validation_show_error('penayangan')) ? 'is-invalid' : ''; ?>" id="penayangan" name="penayangan" value="<?= old('penayangan'); ?>">
                                <div class="invalid-feedback">
                                    <small><?= validation_show_error('penayangan') ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= old('deskripsi'); ?></textarea>
                                <div class="invalid-feedback">
                                    <small><?= validation_show_error('deskripsi') ?></small>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="rate" class="col-sm-3 col-form-label">Rate</label>
                            <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate1" value="1">
                                    <label class="form-check-label" for="rate1">1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate2" value="2">
                                    <label class="form-check-label" for="rate2">2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate3" value="3">
                                    <label class="form-check-label" for="rate3">3</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate4" value="4">
                                    <label class="form-check-label" for="rate4">4</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate5" value="5">
                                    <label class="form-check-label" for="rate5">5</label>
                                </div>
                                <!-- <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate6" value="6">
                                    <label class="form-check-label" for="rate6">6</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate7" value="7">
                                    <label class="form-check-label" for="rate7">7</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate8" value="8">
                                    <label class="form-check-label" for="rate8">8</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate9" value="9">
                                    <label class="form-check-label" for="rate9">9</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rate" id="rate10" value="10">
                                    <label class="form-check-label" for="rate10">10</label>
                                </div> -->
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="poster" class="col-sm-3 col-form-label">Poster</label>
                            <div class="col-sm-9">
                                <input class="form-control <?= (validation_show_error('poster')) ? 'is-invalid' : ''; ?>" type="file" id="poster" name="poster" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <small><?= validation_show_error('poster') ?></small>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-5">Tambah Data</button>
                    </form>
                </div>

                <!-- Kolom kanan 30% untuk preview image -->
                <div class="col-4">
                    <div class="sticky-top px-5" style="top: 20px;">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview" style="width: 100%; max-width: 270px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>