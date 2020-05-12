<?php

$js = "<!-- Bootstrap core JavaScript-->\n "
        . "<!--================================================== -->\n "
        . "<!-- Placed at the end of the document so the pages load faster -->\n";
$slim = URL::site("storage/styles/js/jquery-3.2.1.slim.min.js");
$js .= HTML::script("storage/styles/js/jquery-3.2.1.slim.min.js") . "\n";
$script = "<script src=\"{$slim}\"><\/script>";
$js .= "<script>window.jQuery || document.write('{$script}')</script> \n";
$js .= HTML::script("storage/styles/js/holder.min.js") . "\n";
$js .= HTML::script("storage/styles/js/popper.min.js") . "\n";
$js .= HTML::script("storage/styles/bootstrap4/js/bootstrap.min.js") . "\n";
if (isset($addressJavascript) != 0) {
    foreach ($addressJavascript as $value) {
        $js .= HTML::script($value) . "\n";
    }
}
echo $js;
?>
  