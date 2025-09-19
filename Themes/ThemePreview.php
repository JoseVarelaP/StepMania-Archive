<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<?php
$JSONContent = file_get_contents( "./db.json" );
$decoded_data = json_decode($JSONContent, true);
$CurrentPage = "Themes";

// Look up the entry from what we recieved from GET.
$Category = $_GET['Category'];
$ID = $_GET['ID'];

// If either of these items are not present, then stop rendering.
if( is_null($Category) || is_null($ID) )
	return;

$Entry = $decoded_data[$Category][$ID];

function CheckForHttp( $convtext, $location )  {
	$parse = parse_url($convtext);
	if( array_key_exists('scheme', $parse) ) {
		if( $parse['scheme'] == "https" || $parse['scheme'] == "http" ) {
			return $convtext;
	}
	} else if( strpos( $convtext, 'Category=' ) !== false ) {
		return "ThemePreview/?".$convtext;
	}

	return "https://objects-us-east-1.dream.io/smthemes/".$location."/".$convtext;
}

function GetFirstAvailableItem( $Entry )
{
	if( !array_key_exists('Link', $Entry) )
		return null;

	if( is_array( $Entry['Link'] ) ) {
 	       	return $Entry['Link'][0];
	}
	return $Entry;
}

$DownloadItem = GetFirstAvailableItem($Entry);
$Author = array_key_exists('Author', $Entry) ? $Entry['Author'] : "";
$Date = $DownloadItem && array_key_exists('Date', $DownloadItem) ? $DownloadItem['Date'] : "????-??-??";
// Get the number for possible images before iterating.
$NumImages = array_key_exists('NumImages', $Entry) ? $Entry['NumImages'] : 0;
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
        body {
            background-color: #001177;
        }
    </style>
	<title><?php echo $Entry['Name'] ?> - StepMania Themes Archive</title>
	<meta property="og:type" content="website">
	<link rel="canonical" href="https://josevarela.net/SMArchive/Themes/ThemePreview.php?Category=<?php echo $Category ?>&ID=<?php echo $ID ?>" />
	<meta property="og:url" content="https://josevarela.net/SMArchive/Themes">
	<meta property="og:title" content="<?php echo $Entry['Name'] ?>">
	<meta property="og:description" content="A theme for <?php echo $decoded_data[$Category]['Name'] ?>.">
	<?php if( $NumImages > 0 ) { ?>
		<meta property="og:image" content="https://objects-us-east-1.dream.io/smthemes/<?php echo $Category ?>/Screenshots/<?php echo $ID ?>/screen1.png">
	<?php } ?>
</head>
<script> let CurrentPage = 'Themes'; </script>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<div class="content-container wide-container">
			<div class="content" id="BuildListing">
				<h1 id="HeaderTitle"><?php echo $Entry['Name'] ?></h1>
				<?php if( array_key_exists( 'Explicit', $Entry ) ) { ?>
					<div class="explicitTheme">
						<img src="../static/explicititem.svg" width="32px" title="This theme has explicit content!" alt="This theme has explicit content!">
						<p>This theme has explicit content!</p>
					</div>
				<?php } ?>
				<div>
					<?php if( array_key_exists( 'Link', $Entry ) ) { ?>
						<div class="Download-Theme">
							<?php
								$DownloadBaseLink = "https://objects-us-east-1.dream.io/smthemes/" . $Category . "/";
								if ( array_key_exists('Link', $Entry) ) {
							?>
								<p id="Download-Area" style="padding: 6px"><img src="../static/download.gif"> <a href="<?php echo ($DownloadBaseLink . $DownloadItem['Link']) ?>" id="DownloadButton">Download Now</a> <small>Right click to save.</small></p>
							<?php } if( is_array( $Entry['Link'] ) ) { ?>
								<select onchange="toggleVersionData(this)" id="Version-Chooser">
								<?php foreach( $Entry['Link'] as $Item ) {
									$HasInternalLink = array_key_exists('Link', $Item);
								?>
								<option
									value="<?php
									if( $HasInternalLink )
										echo ($DownloadBaseLink . $Item['Link'])
								?>"><?php
									echo $Item['Name'];
									if( !$HasInternalLink )
										echo " [unavailable]";
								?>
								</option>
								<?php } ?>
								</select>
							<?php } ?>
						</div>
					<?php } ?>
					<p id="Author">By: <?= $Author; ?></p>
					<p id="Date">Release Date: <?= $Date ?></p>
				</div>
				<center>
					<?php
						if( $NumImages == 0 ) {
					?>
					<!-- Message for non-present images. -->
					<div style="max-width: 400px; padding: 12px; color:white; background:#000;">
						<div>
							<img src="../static/missingitem.svg" width="64">
							<p>There are no images for this theme!</p>
							<a style="color:#FFD123" href="https://github.com/JoseVarelaP/StepMania-Archive/issues/">Could you help out by contributing to the archive?</a>
						</div>
					</div>
					<?php } ?>
					<br>
					<div id="imageset" class="ThemeFlexSet">
						<?php
							if( $NumImages > 0 )
								for( $x = 1; $x <= $NumImages; $x++ ) {
							?>
								<a href="https://objects-us-east-1.dream.io/smthemes/<?php echo $Category ?>/Screenshots/<?php echo $ID ?>/screen<?php echo $x ?>.png">
									<img style="order: <?php echo $x ?>" src="https://objects-us-east-1.dream.io/smthemes/<?php echo $Category ?>/Screenshots/<?php echo $ID ?>/screen<?php echo $x ?>.png">
								</a>
							<?php } ?>
					</div>
				</center>
			</div>
			<?php include '../php/Footer.php'?>
		</div>
	</div>
	<?php if( gettype($Entry['Link']) == "array" ) { ?>
		<script type="text/javascript">
			var entryData = new Array();
			<?php foreach( $Entry['Link'] as $Item ) { ?>
				entryData.push('<?php echo json_encode($Item)?>')
			<?php } ?>
			function toggleVersionData( object )
			{
				let entry = JSON.parse(entryData[object.selectedIndex])
				// Since this object exists, as the multiple version table, we need to update the current chooser
				// so it can update the download button to have the latest version (which is usually stored on top).
				let Date = document.getElementById("Date")
				Date.textContent = `Release Date: ${entry.Date || "????-??-??"}`

				let Dwn = document.getElementById("DownloadButton")
				Dwn.style.display = entry.Link ? "inline" : "none"
				Dwn.href = `https://objects-us-east-1.dream.io/smthemes/<?php echo $Category ?>/${entry.Link}`
			}
		</script>
	<?php } ?>
</body>
</html>
