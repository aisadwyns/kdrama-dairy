<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container mt-5">
                <div class="hero">
                    <h1>Welcome to My K-Drama Diary</h1>
                    <p>Sharing my love for Korean Dramas through honest reviews, favorite picks, and latest updates!</p>
                </div>

                <div class="about">
                    <h2 class="mt-5 mb-3">About Me</h2>
                    <p>Hello! I'm Aisa, a passionate K-Drama enthusiast who loves watching, analyzing, and reviewing Korean dramas. This website is my cozy corner where I share my thoughts, favorite shows, and recommendations for fellow drama lovers.</p>
                </div>
                <div class="reviews">
                    <h2 class="mt-5 mb-3">Latest Reviews</h2>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card p-3 shadow-sm">
                                <h5>Crash Landing on You</h5>
                                <p>⭐⭐⭐⭐⭐<br> Kisah cinta lintas negara yang bikin baper dan deg-degan!</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 shadow-sm">
                                <h5>Twenty-Five Twenty-One</h5>
                                <p>⭐⭐⭐⭐⭐<br> Drakor yang menyentuh tentang persahabatan, mimpi, dan cinta masa muda.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card p-3 shadow-sm">
                                <h5>Business Proposal</h5>
                                <p>⭐⭐⭐⭐<br> Komedi romantis yang manis, ringan, dan penuh chemistry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>