<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ChangeLog - StepMania Build Archive </title>
</head>
<?php $CurrentPage = "Builds"; ?>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<?php
			$JSONContent = file_get_contents("Credits/data.json");
			$decoded_data = json_decode($JSONContent, true);
		?>
		<div class="content-container wide-container">
			<div class="content">
				<h1>Quick Travel</h1>
				<center>
					<a href="#StepMania"><img src="Credits/StepmaniaLogo.png" style="width:200px"></a>&nbsp;
					<a href="#Pulsen"><img src="Credits/PulsenLogo.png" style="width:100px"></a>&nbsp;
					<a href="#Mung1"><img src="Credits/Mung1Logo.png" style="width:200px; margin-top: 30px"></a>&nbsp;
					<a href="#Mung3"><img src="Credits/Mung3Logo.png" style="width:100px; margin-top: 30px"></a>&nbsp;
					<a href="#Keys6"><img src="Credits/Keys6Logo.png" style="width:100px; margin-top: 30px"></a>&nbsp;
					<a href="#OpenITG"><img src="Credits/OpenITGLogo.png" style="width:100px; margin-top: 30px"></a>&nbsp;
					<p><small>Find out who made your favorite fork.</small></p>
				</center>
				<div class="creditsContent" id="creditsContent">
					<?php foreach( $decoded_data as $Build=>$Content ) { ?>
						<br>
						<div>
							<img src="./Credits/<?php echo $Build?>Logo.png" name="<?php echo $Build?>" id="<?php echo $Build?>" style="width: 300px;">
							<?php foreach( $Content as $Section ) { ?>
								<div style="max-width: 800px; margin-left: auto; margin-right: auto">
									<strong>
										<h2 style="margin: 5px -5px 5px -5px;"><?php echo $Section["title"] ?></h1>
									</strong>
									<?php foreach( $Section["members"] as $Member ) { ?>
										<p><?php echo $Member ?></p>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						<hr>
					<?php } ?>
				</div>
			</div>
		</div>
		<?php include '../php/Footer.php' ?>
	</div>
</body>
</html>