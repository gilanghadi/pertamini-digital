<section id="profile">
    <div class="container mt-5">
        <div class="row d-flex justify-content-lg-start">
            <div class="col-12 col-lg-8">
                <div class="row d-flex align-items-center">
                    <div class="col-12 text-center text-lg-start col-lg-3">
                        <img src="<?= BASEURL ?>/public/img/profile.png" alt="" class="rounded-circle">
                    </div>
                    <div class="col-12 text-center text-lg-start col-lg-4 mt-3 mt-lg-0">
                        <h5 class="text-capitalize fw-bold"><?= $data['user_login']['nama_lengkap'] ?></h5>
                        <p class="text-capitalize"><?= $data['user_login']['username'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 pb-5">
            <div class="col mx-3 mx-md-0">
                <form action="<?= BASEURL ?>/profile/update" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" value="<?= $data['user_login']['nama_lengkap'] ?>" name="nama_lengkap" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" value="<?= $data['user_login']['tanggal_lahir'] ?>" name="tanggal_lahir" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" value="<?= $data['user_login']['username'] ?>" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['user_login']['email'] ?>" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image Profile</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                </form>
            </div>
        </div>
    </div>
</section>