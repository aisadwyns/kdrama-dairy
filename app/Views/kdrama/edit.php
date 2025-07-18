<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data K-Drama</h2>

            <form action="/kdrama/save/<?= $kdrama['id']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $kdrama['slug'] ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= $kdrama['judul'] ?>" autofocus>
                        <div class="invalid-feedback">
                            <small><?= validation_show_error('judul') ?></small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sutradara" class="col-sm-2 col-form-label">Sutradara</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sutradara" name="sutradara" value="<?= $kdrama['sutradara'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="penayangan" class="col-sm-2 col-form-label">Penayangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penayangan" name="penayangan" value="<?= $kdrama['penayangan'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="poster" name="poster" value="<?= $kdrama['poster'] ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>