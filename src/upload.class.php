<?php

class FileUpload {

	private $_dir;
	private $_inputname;
	private $_fileName;
	private $_orignalName = false;
	private $_preName = false;
	private $_noSizeLimit = true;
	private $_maxSizeAllowed;
	private $_resize = false;
	private $_imageWidth;
	private $_imageHeight;
	private $_crop;
	private $_quality = 100;

	public function __construct($dir = 'myuploads', $inputname = 'userfile') {

		$this->setDir($dir);
		$this->setInputName($inputname);
		$this->_fileName  = "";

	}

	public function setDir($dir) {
		$this->_dir = $dir;
	}

	public function setInputName($inputname) {
		$this->_inputname = $inputname;
	}

	public function setOriginalName () {
		$this->_orignalName = true;
	}

	public function setPreName ($prename) {
		$this->_preName = true;
		$this->_fileName = $prename;
	}

	public function setName($newname = "") {
		$this->_fileName = $newname;
	}

	public function setMaxSizeAllowed($maxSizeAllowed) {
		$this->_noSizeLimit = false;
		$this->_maxSizeAllowed = $maxSizeAllowed;
	}

	public function setResize($width, $height) {
		$this->_resize = true;
		$this->_imageWidth = $width;
		$this->_imageHeight = $height;
	}

	public function setQuality($quality) {
		$this->_quality = $quality;
	}

	public function setCrop($x,$y,$width,$height) {
		$this->_crop = true;
		$this->_coordCrop = array(
			'x' => $x,
			'y' => $y,
			'width' => $width,
			'height' => $height
		);
	}

	private function isSizeAllowed($fileSize) {
		if ($this->_noSizeLimit == false && ($this->_maxSizeAllowed < $fileSize)) {
			return false;
		}
		return true;
	}

	private function isImage($fileType) {
		$extensions = array('jpg', 'jpeg', 'png', 'gif');
		if (in_array($fileType, $extensions)) {
			return true;
		}
		return false;
	}

	public function upload() {
		if (!is_dir($this->_dir)) {
			mkdir($this->_dir, 0777, true);
		}

		$totalfiles = count($_FILES[$this->_inputname]['name']);

		for($i=0; $i < $totalfiles; $i++) {

			$tmpFilePath = $_FILES[$this->_inputname]['tmp_name'][$i];
			$fileName 	 = $_FILES[$this->_inputname]['name'][$i];
			$fileSize 	 = $_FILES[$this->_inputname]['size'][$i];
			$fileType 	 = $_FILES[$this->_inputname]['type'][$i];

			if (!$this->isSizeAllowed($fileSize)) {
				throw new Exception("Max Size Allowed reach", 1);
			}
			$this->uploadFile($tmpFilePath, $fileName, $fileSize, $fileType);
		}
	}

	public function uploadFile($tmpFilePath, $fileName, $fileSize, $fileType) {
		if ($tmpFilePath != ""){

			$newFilePath = $this->_dir . DIRECTORY_SEPARATOR;
			$extension = strtolower(substr(strrchr($fileName, '.'), 1));

			if ($this->_orignalName == true) {
				$newFilePath .= $fileName;
			} elseif ($this->_preName == true && $this->_fileName != "") {

				$newFilePath .= $this->_fileName;
				$newFilePath .= "_";
				$newFilePath .= md5(uniqid(mt_rand()));
				$newFilePath .= ".";
				$newFilePath .= $extension;
			} elseif ($this->_fileName != ""){

				$newFilePath .= $this->_fileName;
				$newFilePath .= ".";
				$newFilePath .= $extension;
			} else {
				$this->_fileName = md5(uniqid(mt_rand())) . "." . $extension;

				$newFilePath .= $this->_fileName;
			}

			if ($this->isImage($extension)) {
				$sizes = getimagesize($tmpFilePath);
			}

			if(move_uploaded_file($tmpFilePath, $newFilePath)) {

				if ($this->isImage($extension) && $sizes) {

					if ($this->_resize)
						$this->resizeImage($newFilePath, $extension);

					if ($this->_crop)
						$this->cropImage($newFilePath, $extension);

					header('Location: ' . $_SERVER['HTTP_REFERER']);
					return true;

				} else {
					throw new Exception("Not an image", 1);
				}
				return true;
			}
		} else {
			throw new Exception("No tmp file found", 1);
		}

	}

	public function resizeImage($newFilePath, $extension) {

		if ($extension == 'jpg') {
			$imgfrom = "imagecreatefromjpeg";
			$createimg    = "imagejpeg";
		} else {
			$imgfrom = "imagecreatefrom" . $extension;
			$createimg    = "image" . $extension;
		}

		$image = $imgfrom($newFilePath);
		$width = imagesx($image);
		$height = imagesy($image);

		if ($width>$height) {
			//FORMAT HORIZONTAL
			$new_width = $this->_imageWidth;
			$new_height = ($new_width * $height) / $width ;

		} else{
			//FORMAT VERTICAL
			$new_height = $this->_imageHeight;
			$new_width = ($new_height * $width) / $height ;
		}

		$thumb = imagecreatetruecolor($new_width, $new_height);

		if (imagecopyresampled($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height)) {
			if ($extension == 'gif') {
				$createimg($thumb, $newFilePath);
			} else {
				$createimg($thumb, $newFilePath, $this->_quality);
			}
			chmod ($newFilePath,0777);
			imagedestroy($image);
			$return = true;
		} else {
			throw new Exception("Resampled NOK", 1);
			$return = false;
		}

		return $return;

	}

	public function cropImage($newFilePath, $extension) {
		if ($extension == 'jpg') {
			$imgfrom = "imagecreatefromjpeg";
			$createimg    = "imagejpeg";
		} else {
			$imgfrom = "imagecreatefrom" . $extension;
			$createimg    = "image" . $extension;
		}

		$image = $imgfrom($newFilePath);

		$imagecrop = imagecrop($image, $this->_coordCrop);

		if ($extension == 'gif') {
			$createimg($imagecrop, $newFilePath);
		} else {
			$createimg($imagecrop, $newFilePath, $this->_quality);
		}
		chmod ($newFilePath,0777);
		imagedestroy($image);

		return true;
	}

}
