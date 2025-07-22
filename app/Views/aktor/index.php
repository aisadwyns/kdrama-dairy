<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-4">Daftar Aktor Korean Drama</h1>
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="cari nama" name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">


            <!-- <a href="/kdrama/create" class="btn btn-primary mb-2">Tambah Data K-Drama</a> -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Agensi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($currentPage - 1)); ?>
                    <?php foreach ($aktor as $a) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $a['nama']; ?></td>
                            <td><?= $a['agensi']; ?></td>
                            <td><a href="" class="btn btn-primary">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('aktor', 'aktor_pagination'); ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>