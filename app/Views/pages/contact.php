<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Korean Drama Enthusiast</h2>
            <p>
                forum buat bahas k drama,
            </p>
            <?php foreach ($alamat as $a) : ?>
                <ul>
                    <li> <?php echo $a['tipe']; ?> </li>
                    <li> <?php echo $a['alamat']; ?> </li>
                    <li> <?php echo $a['kota']; ?> </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>