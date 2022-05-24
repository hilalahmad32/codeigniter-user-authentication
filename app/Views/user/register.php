<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-xl-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4>User Register</h4>
                </div>
                <?php $validation = \Config\Services::validation(); ?>
                <div class="card-body">
                    <?php if (session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger">
                        <strong><?= session()->getFlashdata('error') ?></strong>
                    </div>
                    <?php } ?>
                    <form action="" method="post">
                        <div class="my-2">
                            <label for="">Enter your Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                            <?php if ($validation->getError('name')) { ?>
                            <span class="text-danger"><?= $error = $validation->getError('name') ?></span>
                            <?php } ?>
                        </div>
                        <div class="my-2">
                            <label for="">Enter your Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                placeholder="Enter your email">
                            <?php if ($validation->getError('email')) { ?>
                            <span class="text-danger"><?= $error = $validation->getError('email') ?></span>
                            <?php } ?>
                        </div>
                        <div class="my-2">
                            <label for="">Enter your Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your password">
                            <?php if ($validation->getError('password')) { ?>
                            <span class="text-danger"><?= $error = $validation->getError('password') ?></span>
                            <?php } ?>
                        </div>
                        <button class="btn btn-success" type="submit">Signup</button>
                        <div class="d-flex align-items-center">
                            <span>Already Have account </span> <a href="/user/login" class="nav-link ml-1 text-danger">
                                Login</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
