<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Aeglos Upload</title>
	<!--Import Google Icon Font-->
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
	<nav>
		<div class="nav-wrapper">
			<a href="index.php" class="brand-logo">Aeglos Upload</a>
		</div>
	</nav>
	<div class="container">
		<!-- ROW -->
		<div class="row">
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel blue-grey darken-1">
					<h5 class="white-text">Basic upload</h5>
					<form enctype="multipart/form-data" action="uploadfile.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel light-blue darken-4">
					<h5 class="white-text">Original name upload</h5>
					<form enctype="multipart/form-data" action="uploadfile_original_name.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
		</div>
		<!-- END ROW -->

		<!-- ROW -->
		<div class="row">
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel green darken-1">
					<h5 class="white-text">Prepend name upload</h5>
					<form enctype="multipart/form-data" action="uploadfile_prepend.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel teal darken-1">
					<h5 class="white-text">Personal name upload</h5>
					<form enctype="multipart/form-data" action="uploadfile_personal_name.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
		</div>
		<!-- END ROW -->

		<!-- ROW -->
		<div class="row">
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel deep-purple darken-1">
					<h5 class="white-text">Maxsize upload (300ko)</h5>
					<form enctype="multipart/form-data" action="uploadfile_maxsize.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel red darken-1">
					<h5 class="white-text">Resize upload (width or height = 500px, only for image)</h5>
					<form enctype="multipart/form-data" action="uploadfile_resize.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
		</div>
		<!-- END ROW -->

		<!-- ROW -->
		<div class="row">
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel pink darken-1">
					<h5 class="white-text">Quality image (75%, only when resize)</h5>
					<form enctype="multipart/form-data" action="uploadfile_quality.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
			<!-- CARD -->
			<div class="col s12 m6">
				<div class="card-panel amber darken-1">
					<h5 class="white-text">Crop upload (width and height = 500px)</h5>
					<form enctype="multipart/form-data" action="uploadfile_crop.php" method="post">
						<div class="file-field input-field">
							<div class="btn">
								<span>File(s)</span>
								<input type="file" name="userfile[]" multiple>
							</div>
							<div class="file-path-wrapper">
								<input class="file-path validate" type="text" placeholder="Upload one or more files">
							</div>
						</div>
						<button class="btn waves-effect waves-light" type="submit" name="action">Upload
							<i class="material-icons right">send</i>
						</button>
					</form>
				</div>
			</div>
			<!-- END CARD -->
		</div>
		<!-- END ROW -->


		<div class="row">
			<h2>Uploaded File(s)</h2>

			<?php include 'uploadedFilesList.php'; ?>
		</div>
	</div>
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Aeglos Upload</h5>
					<p class="grey-text text-lighten-4">You can find aeglos upload on <a href="#">Bitbucket</a> and <a href="#">Github</a>.</p>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2014 Copyright <a href="http://paularthurfradin.fr">Paul-Arthur Fradin</a>
			</div>
		</div>
	</footer>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="assets/js/materialize.min.js"></script>
</body>
</html>
