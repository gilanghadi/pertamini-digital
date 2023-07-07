<?php

use Carbon\Carbon;

?>
<section id="pembelian" class="mx-3 mx-md-0">
    <div class="container mt-5">
        <form action="<?= BASEURL ?>/pembelian/store" class="mb-4" method="post" id="form">
            <input type="hidden" id="user_id" name="user_id" value="<?= $data['login_user']['id'] ?>">
            <input type="hidden" id="created_at" name="created_at" value="<?= Carbon::now(); ?>">
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="bahan_bakar" class="mb-2">Jenis Bahan Bakar</label>
                    <select name="bahan_bakar" id="bahan_bakar" class="form-select">
                        <option selected disabled>Bahan Bakar</option>
                        <?php foreach ($data['bahan_bakar'] as $row) : ?>
                            <option value="<?= $row['id'] ?>" id="option"><?= $row['bahan_bakar'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="jenis" class="mb-2">Harga/Liter (Rp.)</label>
                    <input type="number" class="form-control bg-transparent" name="harga" id="harga" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="jenis" class="mb-2">Jumlah Uang (Rp.)</label>
                    <input type="number" class="form-control" name="jumlah_uang" id="jumlah_uang">
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="jenis" class="mb-2">Jumlah Liter</label>
                    <input type="text" class="form-control bg-transparent" name="jumlah_liter" id="liter" readonly>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Order</button>
                <a href="<?= BASEURL ?>/dashboard" class="btn btn-outline-danger">Cancel</a>
            </div>
        </form>
        <div class="row mt-5">
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        <span class="fs-5 fw-semibold">Tanggal Pembelian</span>
                    </div>
                    <?php if (isset($_SESSION['created_at'])) : ?>
                        <div class="card-body">
                            <p class="card-text"><?= Carbon::parse($_SESSION['created_at'])->format('d M Y h:i A') ?></p>
                        </div>
                        <?php unset($_SESSION['created_at']) ?>
                    <?php else :  ?>
                        <div class="card-body">
                            <p class="card-text">.....</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        <span class="fs-5 fw-semibold">Jenis Bahan Bakar</span>
                    </div>
                    <?php if (isset($_SESSION['bahan_bakar'])) : ?>
                        <div class="card-body">
                            <p class="card-text"><?= $_SESSION['bahan_bakar']['bahan_bakar'] ?></p>
                        </div>
                        <?php unset($_SESSION['bahan_bakar']) ?>
                    <?php else : ?>
                        <div class="card-body">
                            <p class="card-text">.....</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        <span class="fs-5 fw-semibold">Jumlah Uang (Rp.)</span>
                    </div>
                    <?php if (isset($_SESSION['jumlah_uang'])) : ?>
                        <div class="card-body">
                            <p class="card-text">Rp. <?= number_format($_SESSION['jumlah_uang']) ?></p>
                        </div>
                        <?php unset($_SESSION['jumlah_uang']) ?>
                    <?php else : ?>
                        <div class="card-body">
                            <p class="card-text">.....</p>
                        </div>
                    <?php endif;  ?>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        <span class="fs-5 fw-semibold">Jumlah Liter</span>
                    </div>
                    <?php if (isset($_SESSION['jumlah_liter'])) : ?>
                        <div class="card-body">
                            <p class="card-text"><?= $_SESSION['jumlah_liter'] ?> L</p>
                        </div>
                        <?php unset($_SESSION['jumlah_liter']) ?>
                    <?php else : ?>
                        <div class="card-body">
                            <p class="card-text">.....</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>