<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- HERO SECTION: Jangan dibungkus oleh row/col agar bisa full width -->
<div class="hero">
    <div class="overlay">
        <div class="content">
            <h1 class="display-4 fw-bold">Welcome to <span class="text-info">My K-Drama Diary</span></h1>
            <p class="lead">Sharing my love for Korean Dramas through honest reviews, favorite picks, and the latest updates!</p>
        </div>
    </div>
</div>

<div class="container mt-5">

    <div class="about bg-light p-4 rounded shadow-sm my-5">
        <h2 class="mb-3 ">About Me</h2>
        <p class="lead">Hello! I'm <strong>Aisa</strong>, a passionate K-Drama enthusiast who loves watching, analyzing, and reviewing Korean dramas. This website is my cozy corner to share my thoughts, favorite shows, and recommendations for fellow drama lovers around the world. Let’s fangirl together!</p>
    </div>

    <div class="reviews">
        <h2 class="mb-4 text-center">✨ Latest Reviews ✨</h2>
        <div class="row g-4 mt-5">
            <?php foreach ($kdrama as $k) : ?>
                <div class="col-20">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="/img/<?= $k['poster']; ?>" class="card-img-top" alt="<?= $k['judul']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $k['judul']; ?></h5>
                            <p class="card-text">
                            <div class="star-rating">
                                <?php
                                $rating = (int)$k['rate'];
                                for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="<?= $i <= $rating ? 'bi bi-star-fill text-warning' : 'bi bi-star text-muted'; ?>"></i>
                                <?php endfor; ?>
                                <span class="ms-2">(<?= $k['rate']; ?>)</span>
                            </div><br><?= $k['deskripsi']; ?></p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="/pages/<?= $k['slug']; ?>" class="btn btn-sm btn-outline-primary">Read Full Review</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>