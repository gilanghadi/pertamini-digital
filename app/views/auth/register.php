<section id="login">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6">
                <img src="<?= BASEURL ?>/public/img/login-image.jpg" alt="login image" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6 mt-3 pb-4 mt-lg-0 pb-lg-0">
                <form action="<?= BASEURL ?>/register/store" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama_Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal_Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <i class="bi bi-eye-slash position-absolute top-0 end-0 py-2 me-3" id="iconPass" style="cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Retype Password</label>
                                <div class="position-relative">
                                    <input type="password" class="form-control <?= isset($_SESSION['flashInput']['message']) ? 'border-danger' : '' ?>" id="retype_password" name="retype_password" required>
                                    <i class="bi bi-eye-slash position-absolute top-0 end-0 py-2 me-3" id="iconPassre" style="cursor: pointer;"></i>
                                </div>
                                <?php
                                Flasher::flashInput();
                                ?>
                            </div>
                        </div>
                    </div>
                    <p>you have an already account? <a href="<?= BASEURL ?>/">login</a></p>
                    <span>
                        <button type="submit" name="submit" class="btn btn-outline-primary me-1">Register</button>
                    </span>
                </form>
            </div>
        </div>
    </div>
</section>