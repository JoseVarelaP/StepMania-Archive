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
		$JSONContent = file_get_contents( "../ArchiveChanges.json" );
		$decoded_data = json_decode($JSONContent, true);
		?>
		<div class="content-container wide-container">
			<div class="content" id="History">
				<?php foreach( $decoded_data as $CurrentChanges ) { ?>
				<h1><?php echo $CurrentChanges['Date'] ?></h1>
				<div>
					<?php foreach( $CurrentChanges['Changes'] as $Changes ) { ?>
					<h2><img style="width: 24px" src="../VersionIcon/<?php echo $Changes['Icon'] ?>"> <?php echo$Changes['Name'] ?></h2>
					<ul>
						<?php foreach( $Changes['List'] as $Points ) { ?>
							<li><?php echo $Points ?></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			</div>
			<?php include '../php/Footer.php' ?>
		</div>
	</div>
</body>
</html>