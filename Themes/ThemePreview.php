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
</head>
<script> let CurrentPage = 'Themes'; </script>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<div class="content-container wide-container">
			<div class="content" id="BuildListing">
				<h1 id="HeaderTitle"><?php echo $Entry['Name'] ?></h1>
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
					<p id="Author">By: <? echo $Author; ?></p>
					<p id="Date">Release Date: <? echo $Date ?></p>
				</div>
				<center>
					<br>
					<div id="imageset" class="ThemeFlexSet">
						<?php
							// Get the number for possible images before iterating.
							$NumImages = array_key_exists('NumImages', $Entry) ? $Entry['NumImages'] : 0;
							if( $NumImages > 0 )
								for( $x = 1; $x <= $NumImages; $x++ ) {
							?>
								<img style="order: <?php echo $x ?>" src="https://objects-us-east-1.dream.io/smthemes/<?php echo $Category ?>/Screenshots/<?php echo $ID ?>/screen<?php echo $x ?>.png">
							<?php } ?>
					</div>
				</center>
			</div>
			<?php include '../php/Footer.php'?>
		</div>
	</div>
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
</body>
</html>
