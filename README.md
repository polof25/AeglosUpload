# README #

This README will document you how to use this Upload Library.

## What is this repository for? ##

* Upload some file(s)

## How to use it ? ##

```HTML
<form enctype="multipart/form-data" action="uploadfile.php" method="post">
  Upload File(s): <br /><br />
  <input name="userfile[]" type="file" multiple="multiple"/>
  <input type="submit" />
</form>
```

## How do I get set up? ##

### Create a file called uploadfile.php (into which you have first loaded the class) ###

* You can optionally give the name/path of the directory you want to upload to.
* You can optionally give the input's name of your form. By default, "userfile".

```PHP
$directory = "path/to/directory";
$inputname = "userfile";

$fileUpload = new fileUpload(opt $directory, opt $inputname);
```

### Call the method(s) you want ###

#### Rename your file(s), by default uniqid ####

* If you want to keep original name(s)

```PHP
$fileUpload->setOriginalName();
```

* If you want to prepend a file name, concat with uniqid (ex : whatEverYouWant_123123123123.jpg)

```PHP
$prename = "whatEverYouWant";
$fileUpload->setPreName($prename);
```

* If you just want to set your own name

```PHP
$newname = "whatEverYouWant";
$fileUpload->setName($newname);
```

#### Set a MaxSize (in bytes) ####

```PHP
$maxSizeAllowed = 2000000000; //2GB
$fileUpload->setMaxSizeAllowed($maxSizeAllowed);
```

#### Set a Resize (in px), will respect initial shape(s) and modify only width or height  ####

```PHP
$width = 100;
$height = 200;
$fileUpload->setResize($width, $height);
```

#### Set image quality for resize and/or crop (in %), default 100  ####

```PHP
$quality = 75;
$fileUpload->setQuality($quality);
```

#### Set Crop, x and y value of initial px, width and height  ####

```PHP
$x = 0;
$y = 0;
$width = 500;
$height = 500;
$fileUpload->setCrop($x, $y, $width, $height);
```

### Launch the upload ###

```PHP
$fileUpload->upload();
//Return true if all was good
```

### LICENSE ###

* GPL-3
* Created by [Paul-Arthur Fradin](http://paularthurfradin.fr) (Aeglos)

### DEMO ###

[Click here to test the Demo](http://fradin.etudiant-eemi.com/perso/3a/AeglosUpload/test/)
