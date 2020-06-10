<?php

$stl = "<!-- Bootstrap core CSS --> \n";
$stl .= HTML::style("storage/styles/bootstrap4/css/bootstrap.min.css") . "\n";
$stl .= "<!-- Custom styles for this template --> \n";
foreach ($addressStyles as $value) {
    $stl .= HTML::style($value) . "\n";
}

echo $stl;
