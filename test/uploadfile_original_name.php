<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setOriginalName();
$fileUpload->upload();
