<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Primary Meta Tags -->
    <title>StepMania Themes Archive</title>
    <meta name="title" content="StepMania Themes Archive">
    <meta name="description" content="The theme version of the StepMania Archive, with constantly updating items for each build.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://josevarela.net/SMArchive/Themes/">
    <meta property="og:title" content="StepMania Themes Archive">
    <meta property="og:description" content="The theme version of the StepMania Archive, with constantly updating items for each build.">
    <meta property="og:image" content="">

	<link rel="canonical" href="https://josevarela.net/SMArchive/Themes" />
	<meta name="theme-color" content="#001177" />

	<style>
        body {
            background-color: #001177;
        }
    </style>

	<?php $CurrentPage = "Themes"; ?>

	<script>
		function getOption(el) {
			const option = el.value
			window.location = option
			return option
		}
	</script>
	<script defer>
		// Get the url, and check if there's a valid ID to find.
		window.onload = function(){
			const url = window.location.href
			if( url.lastIndexOf('#') !== -1 )
			{
				const GroupOpen = `${url.substring( url.lastIndexOf('#') + 1 )}`
				if( GroupOpen.length > 1 && document.getElementById(GroupOpen) )
				{
					const base = document.getElementById(GroupOpen)
					document.getElementById(GroupOpen).scrollIntoView(true)
				}
			}
		}
	</script>
</head>
<?php
$JSONContent = file_get_contents( "db.json" );
$decoded_data = json_decode($JSONContent, true);

?>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<div class="rightBox">
			<div style="padding:0 10px 0 0">
				<h2>Quick Travel</h2>
				<div id="quickaccess">
					<?php include 'QuickTravel.php' ?>
				</div>
			</div>
		</div>
		<div class="content-container">
			<div class="content" id="BuildListing">
				<h1>Notes</h1>
				<ul>
					<li>Most of the listings here don't have screenshots yet, those will come eventually.</li>
					<li>The download button on this part of the page will give you the latest version of the theme.
						This is also referenced below the date to indicate the most recent version.</li>
					<li>If you need a specific version, click on the theme name to have a list of available versions.</li>
				</ul>
				<h2>Need images!</h2>
				<p>
					Most items in the themes archive do not have images to showcase the theme in action! You can see
					these by the following icon: <img src="../static/missingitem.svg" width="18px">.<br>
					You can help out by sending an <a href="https://github.com/JoseVarelaP/StepMania-Archive/issues">
					issue with images to the StepMania Archive's Github Repository</a>
					or sending the images on <a href="https://discord.gg/uMkVUrr">The archive's discord server</a>.
				</p>
				<p><br></p>
				<?php include '../Builds/ArchiveHistoryQuick.php' ?>
				<?php

				function DecorateDate( $Item )
				{
					$Date = FetchDateForLatestEntry( $Item );
					$Result = $Date;

					if( array_key_exists('Link', $Item) )
						if( is_array( $Item['Link'] ) && array_key_exists('Name', $Item['Link'][0]) )
							$Result = $Result . "<br><small>(" . $Item['Link'][0]['Name'] . ")</small>";

					return $Result;
				}

				function FetchDateForLatestEntry( $Item )
				{
					// So the key exists, check how many entries are available.
					if( array_key_exists('Link', $Item) && is_array( $Item['Link'] ) )
					{
						if( array_key_exists('Date', $Item['Link'][0]) )
							return $Item['Link'][0]['Date'];

						return "????-??-??";
					}

					// First, check if there's an actual data available for this entry.
					if( !array_key_exists('Date', $Item) )
						// Nothing, so just return the nil date.
						return "????-??-??";

					return $Item['Date'];
				}

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

				function FindThemeFromKey( $Item, $cat )
				{
					// First, check if there's an actual data available for this entry.
					if( !array_key_exists('Link', $Item) )
						// Nothing, so just return the dash.
						return "-";

					// Find which version of the theme to download.
					// So if the key exists, check how many entries are available and fetch the latest available version
					// of the theme to be shown.
					// Otherwise, it's a singular item, so just report that back.
					$LinkSet = is_array( $Item['Link'] ) ? $Item['Link'][0]['Link'] : $Item['Link'];
					$SMArchiveLinkLocation = CheckForHttp( $LinkSet, $cat );

					return "<a href='". $SMArchiveLinkLocation ."'>Available</a>";
				}

				function NeedsImages( $Item )
				{
					return !array_key_exists('HasImages', $Item) && !array_key_exists('NumImages', $Item);
				}

				// Sort the data so it's alphabetically sorted.
				foreach( $decoded_data as $itemCat=>$table ) {
					uasort( $decoded_data[$itemCat], function($a,$b){
						if( is_string($a) || is_string($b) )
							return 0;

						return strcasecmp($a["Name"], $b["Name"]);
					   }
					);
				}

				foreach( $decoded_data as $category=>$itemCat ) {
				?>
				<div id="<?php echo $category ?>">
					<h1 class="VersionTitle" style="cursor: pointer; color: white; position: sticky; top: 0; display: flex; justify-content: center">
						<img style="width: 18px; margin-right: 6px" src="../VersionIcon/<?php echo $itemCat['DefaultIcon'] ?>">
						<?php echo $itemCat['Name'] ?>
					</h1>
					<div id="ContentContainer">
						<table class="TableBuildSet">
							<tbody>
								<?php
									foreach($itemCat as $ThemeID=>$ThemeItem ) {
										if( is_array($ThemeItem) ) {
											// echo $ThemeID;
											$DateEntry = DecorateDate($ThemeItem);
											?><tr>
												<td><a href='ThemePreview.php?Category=<?php echo $category ?>&ID=<?php echo $ThemeID ?>'><?php echo $ThemeItem['Name'] ?></td>
												<td>
													<?php if( NeedsImages($ThemeItem) ) { ?>
														<img src="../static/missingitem.svg" width="14px" title="This theme listing has no screenshots!" alt="This theme listing has no screenshots!">
													<?php } ?>
												</td>
												<td><?php echo $DateEntry ?></td>
												<td><?php echo FindThemeFromKey( $ThemeItem, $category ) ?>
											</tr>
											<?php } ?>
									<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php include '../php/Footer.php' ?>
		</div>
	</div>
</body>
</html>
