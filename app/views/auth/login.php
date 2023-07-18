    <section id="login">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-6">
                    <img src="<?= BASEURL ?>/public/img/login-image.jpg" alt="login image" class="img-fluid rounded shadow">
                </div>
                <div class="col-lg-6 mt-3 mt-lg-0">
                    <form action="<?= BASEURL ?>/login/authenticate" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <i class="bi bi-eye-slash position-absolute top-0 end-0 py-2 me-3" id="iconPass" style="cursor: pointer;"></i>
                            </div>
                        </div>
                        <p>you dont have already account? <a href="<?= BASEURL ?>/register">register</a></p>
                        <span>
                            <button type="submit" name="login" class="btn btn-outline-primary me-1">Login</button>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </section>