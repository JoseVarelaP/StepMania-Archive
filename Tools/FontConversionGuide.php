<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StepMania Build Archive</title>
	<meta property="og:image" content="https://josevarela.xyz/SMArchive/VersionIcon/SM40.png" />
	<meta property="og:site_name" content="StepMania Archive" />
	<meta property="og:description" content="A continuously growing collection of StepMania builds from 2001 up to today; Official and Unofficial Fan made builds."/>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://josevarela.xyz/SMArchive" />

	<meta name="title" content="Font Conversion Guide - StepMania Tool Archive" />
	<meta name="description" content="A continuously growing collection of StepMania builds from 2001 up to today; Official and Unofficial Fan made builds."/>
	<meta name="theme-color" content="#f0d01f" />

	<style>
        body {
            background-color: rgb(0, 85, 153);
        }
    </style>

	<?php $CurrentPage = "Tools"; ?>
	
	<script>
		function getOption(el) {
			const option = el.value
			window.location = option
			return option
		}
	</script>
</head>
<link rel="shortcut icon" type="image/png" href="../../Builds/VersionIcon/SM40.png"/>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<div class="content-container wide-container">
			<div class="content">
				<h1>Font Conversion Guide</h1>
				<center>
					A tutorial on how to convert fonts generated with the Texture Font Generator to older StepMania versions.
					<br>
					<strong>Keep in mind: This is meant for older versions like anything below StepMania 4.</strong>
					<hr>
				
					<div style="display: flex; padding: 20px 0px; width: 70%; align-items: center;">
						<p style="flex-grow: 1;">To begin, you'll need to have a ini file already exported of the font you want to convert.</p>
						<img style="flex-grow: 1; max-width: 200px;" src="FCG/FilesList.png">
					</div>
					<div style="display: flex; padding: 20px 0px; width: 70%; align-items: center;">
						<div style="flex-grow: 1; display: flex; flex-direction: column; align-items: center;">
							<p>Open that file with the text editor of your choice, and head down to the segment, where <text style="color:orange">Line NN</text> can be found.</p>
							<i><p>You could just, load the font directly on StepMania, and just use it. Right?</p></i>
							<p>Well, no. Older StepMania's did not have a way to appropiate Row Intergers in font files. So, because of the spacing of the first 10 lines, it will cause a crash.</p>
						</div>
						<img style="flex-grow: 3; max-width: 200px;" src="FCG/BeforeCode.png">
					</div>
					<div style="display: flex; width: 70%; align-items: center;">
						<p style="flex-grow: 1;">The way to fix this, is by simply deleting a space on those first 10 lines, like so.</p>
						<img style="flex-grow: 1; max-width: 200px;" src="FCG/AfterCode.png">
					</div>
					<p>And with that, the font is ready to go for older versions of StepMania!</p>
				</center>
			</div>
		</div>
		<?php include '../php/Footer.php' ?>
	</div>
</body>
</html>