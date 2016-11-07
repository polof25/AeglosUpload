<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setPrename("prename");
$fileUpload->upload();
