<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setQuality(75);
$fileUpload->setResize(500,500);
$fileUpload->upload();
