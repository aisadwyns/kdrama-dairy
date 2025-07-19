<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- HERO SECTION: Jangan dibungkus oleh row/col agar bisa full width -->
<div class="hero">
    <div class="overlay">
        <div class="content">
            <h1 class="display-4 fw-bold">Welcome to <span class="text-info">My K-DramaDiary</span></h1>
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
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="/img/crash-landing.jpg" class="card-img-top" alt="Crash Landing on You">
                    <div class="card-body">
                        <h5 class="card-title">Crash Landing on You</h5>
                        <p class="card-text">⭐⭐⭐⭐⭐<br> Kisah cinta lintas negara yang bikin baper dan deg-degan! Chemistry-nya gak main-main!</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-sm btn-outline-primary">Read Full Review</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="/img/twenty-five.jpg" class="card-img-top" alt="Twenty-Five Twenty-One">
                    <div class="card-body">
                        <h5 class="card-title">Twenty-Five Twenty-One</h5>
                        <p class="card-text">⭐⭐⭐⭐⭐<br> Drama yang menyentuh banget. Tentang mimpi, perjuangan, dan cinta yang nggak bisa bersama 😭.</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-sm btn-outline-primary">Read Full Review</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <img src="/img/business-proposal.jpg" class="card-img-top" alt="Business Proposal">
                    <div class="card-body">
                        <h5 class="card-title">Business Proposal</h5>
                        <p class="card-text">⭐⭐⭐⭐<br> Komedi romantis yang ringan tapi bikin senyum-senyum sendiri. Visual dan chemistry-nya TOP!</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="#" class="btn btn-sm btn-outline-primary">Read Full Review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>