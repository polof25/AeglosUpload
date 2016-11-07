<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setCrop(0,0,500,500);
$fileUpload->upload();
