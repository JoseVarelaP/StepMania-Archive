<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ChangeLog - StepMania Build Archive </title>
	<script src="History.js"></script>
	<script defer src="../js/functions.js"></script>
	<script defer src="../js/TopMenu.js"></script>
</head>
<script>
	let CurrentPage = 'Builds';
	// GenerateHistoryInfo(false)
</script>
<body>
	<div id="container">
		<div id="menu-box">
			<div id="site-logo"></div>
			<div class="top-menu" id="top-menu"></div>
		</div>
		<?php
		$JSONContent = file_get_contents( "ArchiveChanges.json" );
		$decoded_data = json_decode($JSONContent, true);
		?>
		<div class="content-container wide-container">
			<div class="content" id="History"></div>
				<?php foreach( $decoded_data as $CurrentChanges ) { ?>
				<h1>Updates - <?php echo $CurrentChanges['Date'] ?> <a href="PastUpdates.php">(Past Updates)</a></h1>
				<div>
					<?php foreach( $CurrentChanges['Changes'] as $Changes ) { ?>
					<h2><img style="width: 24px" src="VersionIcon/<?php echo $Changes['Icon'] ?>"> <?php echo$Changes['Name'] ?></h2>
					<ul>
						<?php foreach( $Changes['List'] as $Points ) { ?>
							<li><?php echo $Points ?></li>
						<?php } ?>
					</ul>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<div class="footer" id="Footer"></div>
		</div>
	</div>
</body>
</html>