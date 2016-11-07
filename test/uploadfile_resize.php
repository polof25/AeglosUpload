<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setResize(500,500);
$fileUpload->upload();
