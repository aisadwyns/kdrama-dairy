<?php
// helper aman HTML sederhana
if (!function_exists('h')) {
    function h($s)
    {
        return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
    }
}

// ambil data
$k = $kdrama ?? [];
$titlePage = $title ?? 'Detail KDrama';

// hitung bintang (jika rate decimal, bulatkan ke bawah untuk ikon)
$rateNum = isset($k['rate']) && $k['rate'] !== null ? (float)$k['rate'] : 0;
$fullStars = (int) floor($rateNum);
$halfStar  = ($rateNum - $fullStars) >= 0.5;
$emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

// fallback poster
$poster = !empty($k['poster']) ? $k['poster'] : 'default.jpg';
// kalau poster di folder public/img
$posterUrl = base_url('img/' . $poster);
?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">

            <div class="container py-4">
                <!-- breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('/') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('/kdrama') ?>">K-Drama</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= h($k['judul'] ?? '-') ?></li>
                    </ol>
                </nav>

                <div class="row g-4">
                    <div class="col-lg-4">
                        <img src="<?= h($posterUrl) ?>" alt="<?= h($k['judul'] ?? 'Poster') ?>" class="poster shadow">
                    </div>

                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h1 class="h3 mb-2"><?= h($k['judul'] ?? '-') ?></h1>

                                <!-- rating -->
                                <div class="d-flex align-items-center gap-2 mb-3 star-lg">
                                    <div>
                                        <?php for ($i = 0; $i < $fullStars; $i++): ?>
                                            <i class="fa-solid fa-star text-warning"></i>
                                        <?php endfor; ?>
                                        <?php if ($halfStar): ?>
                                            <i class="fa-solid fa-star-half-stroke text-warning"></i>
                                        <?php endif; ?>
                                        <?php for ($i = 0; $i < $emptyStars; $i++): ?>
                                            <i class="fa-regular fa-star text-warning"></i>
                                        <?php endfor; ?>
                                    </div>
                                    <span class="text-muted">(<?= number_format($rateNum, 1) ?>)</span>
                                </div>

                                <!-- kategori -->
                                <?php if (!empty($k['nama_kategori'])): ?>
                                    <span class="badge text-bg-primary badge-cat mb-3"><?= h($k['nama_kategori']) ?></span>
                                <?php endif; ?>

                                <!-- meta -->
                                <dl class="row meta small text-muted">
                                    <dt class="col-sm-3">Sutradara</dt>
                                    <dd class="col-sm-9"><?= h($k['sutradara'] ?? '-') ?></dd>
                                    <dt class="col-sm-3">Penayangan</dt>
                                    <dd class="col-sm-9"><?= h($k['penayangan'] ?? '-') ?></dd>
                                    <?php if (isset($k['tahun_tayang'])): ?>
                                        <dt class="col-sm-3">Tahun Tayang</dt>
                                        <dd class="col-sm-9"><?= h($k['tahun_tayang']) ?></dd>
                                    <?php endif; ?>
                                    <dt class="col-sm-3">Slug</dt>
                                    <dd class="col-sm-9"><code><?= h($k['slug'] ?? '-') ?></code></dd>
                                </dl>

                                <!-- deskripsi / sinopsis -->
                                <h2 class="h5 mt-4">Sinopsis</h2>
                                <p class="mb-0"><?= nl2br(h($k['deskripsi'] ?? 'Belum ada sinopsis.')) ?></p>

                                <div class="d-flex gap-2 mt-4">
                                    <a href="<?= site_url('/kdrama') ?>" class="btn btn-outline-secondary">
                                        <i class="fa-solid fa-arrow-left"></i> Kembali
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>