<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <?= $this->include("admin/partials/head") ?>
    <?= $this->renderSection('css') ?>
</head>

<body class="hold-transition sidebar-mini">
    <?= $this->include("admin/partials/sidebar") ?>
    <?= $this->include("admin/partials/navbar") ?>
    <div class="wrapper">

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->include("admin/partials/header") ?>

            <!-- Main content -->
            <div class="content">
                <?= $this->renderSection('content') ?>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?= $this->include("admin/partials/control_sidebar") ?>
        <?= $this->include("admin/partials/footer") ?>
    </div>
    <!-- ./wrapper -->

    <?= $this->include("admin/partials/scripts") ?>
    <?= $this->renderSection('js') ?>
</body>

</html>