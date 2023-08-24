<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - Slabina Group</title>

    <?= $this->include('partials/head') ?>
    <?= $this->renderSection('css') ?>
</head>

<body>
    <?= $this->include('partials/header') ?>
    <main id="main">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('partials/footer') ?>
    <?= $this->include('partials/script') ?>
</body>

</html>