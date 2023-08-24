<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <?= $this->include('admin/partials/head') ?>
</head>

<body class="login-page" style="min-height: 496.8px;">
    <div class="login-box">
        <div class="card shadow-lg rounded-5">
            <div class="card-body login-card-body">
                <div class="login-logo">
                    <a href="<?= base_url() ?>"><b>Admin</b> Slabina</a>
                </div>
                <p class="login-box-msg">Sign in to start your session</p>
                <?php if (session()->getFlashdata('msg') !== NULL) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('msg'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                <?php endif; ?>
                <form id="formAuth" action="<?= base_url() ?>/admin/auth">
                    <div class="input-group mb-3">
                        <input type="input" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?= $this->include('admin/partials/scripts') ?>
</body>

</html>