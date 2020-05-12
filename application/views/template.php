<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title><?= $appName ?></title>
        <?= $styles ?>
        <!--Library Jquery-->
        <?= HTML::script("storage/styles/js/jquery/jquery-3.3.1.js") . "\n" ?>
        <?= HTML::script("storage/styles/js/functions.js") ?>
    </head>
    <body>
        <?= $contents ?>
    </body>
</html>
