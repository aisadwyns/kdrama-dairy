<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data K-Drama</h2>

            <form action="/kdrama/save/<?= $kdrama['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $kdrama['slug'] ?>">
                <input type="hidden" name="posterLama" value="<?= $kdrama['poster']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (validation_show_error('judul')) ? 'is-invalid' : ''; ?>" id="judul" name="judul" value="<?= (old('judul')) ? old('judul') : $kdrama['judul'] ?>" autofocus>
                        <div class="invalid-feedback">
                            <small><?= validation_show_error('judul') ?></small>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sutradara" class="col-sm-2 col-form-label">Sutradara</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="sutradara" name="sutradara" value="<?= (old('sutradara')) ? old('sutradara') : $kdrama['sutradara'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="penayangan" class="col-sm-2 col-form-label">Penayangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penayangan" name="penayangan" value="<?= (old('penayangan')) ? old('penayangan') : $kdrama['penayangan'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                    <div class="col-sm-10">
                        <input class="form-control <?= (validation_show_error('poster')) ? 'is-invalid' : ''; ?>" type="file" id="poster" name="poster" onchange="previewImg()">
                        <div class="invalid-feedback">
                            <small><?= validation_show_error('poster') ?></small>
                        </div>
                        <div class="col-sm-3 mt-3">
                            <img src="/img/<?= $kdrama['poster']; ?>" class="img-thumbnail img-preview">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>