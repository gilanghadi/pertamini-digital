<?php

use Carbon\Carbon;

?>

<section id="dashboard">
    <div class="container mt-5">
        <div class="row d-flex justify-content-lg-start">
            <div class="col-12 col-lg-8">
                <div class="row d-flex align-items-center">
                    <div class="col-12 text-center text-lg-start col-lg-3">
                        <?php if ($data['user_login']['image'] !== null) : ?>
                            <img src="<?= BASEURL ?>/public/img/profile/<?= $data['user_login']['image'] ?>" alt="" class="rounded-circle overflow-hidden" height="150" width="150">
                        <?php else : ?>
                            <img src="<?= BASEURL ?>/public/img/profile.png" alt="" class="rounded-circle img-fluid">
                        <?php endif; ?>
                    </div>
                    <div class="col-12 text-center text-lg-start col-lg-4 mt-3 mt-lg-0">
                        <h5 class="text-capitalize fw-bold">
                            <?= $data['user_login']['nama_lengkap'] ?>
                        </h5>
                        <p class="text-capitalize">
                            <?= $data['user_login']['username'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 pt-3 pb-5">
            <table id="myTable" class="display table table-striped table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Bahan Bakar</th>
                        <th>Harga/Liter</th>
                        <th>Jumlah Uang (Rp.)</th>
                        <th>Jumlah Liter</th>
                        <th>Tanggal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $number = 1 ?>
                    <?php foreach ($data['order_user_id'] as $order) : ?>
                        <tr>
                            <td><?= $number ?></td>
                            <td><?= $order['bahan_bakar'] ?></td>
                            <td>Rp. <?= number_format($order['harga'])  ?></td>
                            <td>Rp. <?= number_format($order['jumlah_uang']) ?></td>
                            <td><?= $order['jumlah_liter'] ?> L</td>
                            <td><?= Carbon::parse($order['created_at'])->format('d M Y h:i A') ?></td>
                            <td><a href="<?= BASEURL ?>/dashboard/destroy/<?= $order['order_id'] ?>" class="btn btn-danger" id="delete"><i class="bi bi-trash2-fill"></i></a></td>
                        </tr>
                        <?php $number++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>