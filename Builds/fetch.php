<?php
    $doc = new DOMDocument();
    $doc->loadHTMLFile( "HTMLChangeLog/" . $_POST['text'] );
    echo $doc->saveHTML();
?>