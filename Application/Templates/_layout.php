<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FW <?= $title ?></title>
    <link rel="icon" type="image/jpeg" href="favicon.jpeg">
    <link rel="stylesheet" href="<?=STEPBACK?><?= APPPATH ?>Style/style.css?p=<?= date('s') ?>">
</head>
<body>
    <?php require_once APPPATH.'Templates/headerView.php' ?>
    <?php require_once APPPATH."Templates/{$view}View.php" ?>
</body>
</html>