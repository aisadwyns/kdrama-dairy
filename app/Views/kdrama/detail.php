<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt2">Detail K-Drama</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <?php if ($kdrama) : ?>
                        <div class="col-md-4">
                            <img src="/img/<?= $kdrama['poster']; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $kdrama['judul']; ?></h5>
                                <p class="card-text">Sutradara : <?= $kdrama['sutradara']; ?></p>
                                <p class="card-text"><small class="text-muted">Penayangan : <?= $kdrama['penayangan']; ?></small></p>
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Delete</a>
                                <br>
                                <br>
                                <a href="/kdrama">Kembali ke daftar K-Drama</a>
                            </div>
                        </div>
                    <?php else : ?>
                        <p>Data tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>