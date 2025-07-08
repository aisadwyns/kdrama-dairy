<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data K-Drama</h2>

            <form action="/kdrama/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sutradara" class="col-sm-2 col-form-label">Sutradara</label>
                    <div class="col-sm-10">
                        <input type="sutradara" class="form-control" id="sutradara" name="sutradara">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penayangan" class="col-sm-2 col-form-label">Penayangan</label>
                    <div class="col-sm-10">
                        <input type="penayangan" class="form-control" id="penayangan" name="penayangan">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                    <div class="col-sm-10">
                        <input type="poster" class="form-control" id="poster" name="poster">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>