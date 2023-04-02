<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="canonical" href="https://josevarela.net/SMArchive/PastUpdates" />
	<title>ChangeLog - StepMania Build Archive </title>
	<style>
        body {
            background-color: #002211;
        }
    </style>
</head>
<?php
$CurrentPage = "About";
?>
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
				<?php
					if( array_key_exists('MarkdownChange', $CurrentChanges) )
					{ 
						?>
						<?php
					}
					else
						foreach( $CurrentChanges['Changes'] as $Changes ) { ?>
						<h2>
							<?php if( array_key_exists('Icon', $Changes) ) { ?>
								<img style="width: 24px" src="../VersionIcon/<?php echo $Changes['Icon'] ?>">
							<?php } ?>
							<?php echo$Changes['Name'] ?>
						</h2>
						<ul>
							<?php foreach( $Changes['List'] as $Points ) { ?>
								<?php if( $Points == null) { ?>
									<br>
								<?php } else { ?>
									<li><?php echo $Points ?></li>
								<?php } ?>
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