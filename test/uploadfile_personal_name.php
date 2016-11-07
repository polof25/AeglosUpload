<?php

require '../src/upload.class.php';

$fileUpload = new fileUpload();
$fileUpload->setName("MyOwnName");
$fileUpload->upload();
