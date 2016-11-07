<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setMaxSizeAllowed(300000);
$fileUpload->upload();
