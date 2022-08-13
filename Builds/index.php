<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StepMania Build Archive</title>
	<meta property="og:image" content="https://jose.heysora.net/SMArchive/VersionIcon/SM40.png" />
	<meta property="og:site_name" content="StepMania Archive" />
	<meta property="og:description" content="A continuously growing collection of StepMania builds from 2001 up to today; Official and Unofficial Fan made builds."/>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://jose.heysora.net/SMArchive" />

	<meta name="title" content="Builds Archive" />
	<meta name="description" content="A continuously growing collection of StepMania builds from 2001 up to today; Official and Unofficial Fan made builds."/>
	<meta name="theme-color" content="#f0d01f" />

	<?php $CurrentPage = "Builds"; ?>
	
	<script>
		function getOption(el) {
			const option = el.value
			window.location = option
			return option
		}

		function toggleHeader(el) {
			const Container = el.parentNode.children[1]
			const state = Container.style.display
			Container.style.display = state !== "none" ? "none" : "block"
			// document.location.href = `#${Version}`
		}
	</script>
</head>
<?php
$JSONContent = file_get_contents( "BuildListing.json" );
$decoded_data = json_decode($JSONContent, true);
?>
<body>
	<div id="container">
		<div id="menu-box">
			<div id="site-logo"></div>
			<div class="top-menu" id="top-menu"></div>
		</div>
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
					<li>If you want the source files for these builds <i>-if i get enough requests-</i> I'll start searching for them too.</li>
					<li>Some build dates might be wrong. The ones marked with <strong>"?"</strong> are builds that I was not able to find their exact build dates and thus, are my predictions.
					If you know the date of the build, please let me know.</li>
					<li>Most links will send you to their available sites to download, if any of those is down, i'll provide a download replacement for it.</li>
					<li>More obscure SM versions (Alphas, Betas, Release Candidates) are being added, so come back regularly to find more!</li>
					<li>Old Mac Builds (from 3.9 to 3.95) use PowerPC architecture! You'll need a PowerPC Mac or use a emulator like SheepShaver running MacOS X to run them as modern Macs (2009 - recent) have PowerPC removed and have been replaced with Intel x64 architecture.</li>
					<li>Build dates are in MONTH/DAY/YEAR.</li>
				</ul>
				<?php include 'ArchiveHistoryQuick.php' ?> 
				<?php
				function FindBuildFromKey( $Item, $Key )
				{
					// First, check if there's an actual data available for this entry.
					if( !array_key_exists($Key, $Item) )
						// Nothing, so just return the dash.
						return "-";

					// So the key exists, check how many entries are available.
					if( is_array( $Item[$Key] ) )
					{
						if( count($Item[$Key]) == 1 )
							// This entry is just a special singular item, report as such.
							return "<a href='". $Item[$Key][0]['Link'] ."'>".$Item[$Key][0]['Name']."</a>";
						// This is a multi-array entry, iterate through them.
						// When the option tag is generated, we need to still send a command to JS
						// to get what kind of input was selected.
						$Result = "<select onchange='getOption(this)'><option value='' hidden disabled selected>Choose</option>";

						foreach( $Item[$Key] as $Entry ) {
							$Result = $Result . "<option value='". $Entry['Link'] ."'>". $Entry['Name'] ."</option>";
						}

						return $Result . "</select>";
					} else {
						// Singular item, just report the link to the item.
						return "<a href='". $Item[$Key] ."'>Available</a>";
					}
				}

				foreach( $decoded_data as $category=>$itemCat ) {
				?>
				<div id="div<?php echo $category ?>">
					<h1 onclick="toggleHeader(this)" class="VersionTitle" style="cursor: pointer; color: white;">▸ <?php echo $itemCat['Name'] ?></h1>
					<div id="ContentContainer">
						<?php if( array_key_exists('Description', $itemCat) ) { ?>
							<p><?php echo $itemCat['Description'] ?></p>
						<?php } ?>
						<?php if( array_key_exists('Website', $itemCat) ) { ?>
							<a src="<?php echo $itemCat['Website'] ?>">Visit Website (<?php echo $itemCat['Website'] ?>)</a>
						<?php } ?>
						<table class="TableBuildSet">
							<thead>
								<th>Icon</th>
								<th>Name</th>
								<th>Date</th>
								<th>Windows</th>
								<th>Mac</th>
								<th>Linux</th>
								<th>Src</th>
							</thead>
							<tbody>
								<?php
									foreach($itemCat['Listing'] as $BuildItem) {
									$ItemIcon = array_key_exists('Icon', $BuildItem) ? $BuildItem['Icon'] : $itemCat['DefaultIcon'];
									$DateEntry = array_key_exists('Date', $BuildItem) ? $BuildItem['Date'] : "????-??-??";
								?><tr>
									<td><img style="width: 24px" src="VersionIcon/<?php echo $ItemIcon ?>"></td>
									<td><?php echo $BuildItem['Name'] ?></td>
									<td><?php echo $DateEntry ?></td>
									<td><?php echo FindBuildFromKey( $BuildItem, 'Windows' ) ?></td>
									<td><?php echo FindBuildFromKey( $BuildItem, 'Mac' ) ?></td>
									<td><?php echo FindBuildFromKey( $BuildItem, 'Linux' ) ?></td>
									<td><?php echo FindBuildFromKey( $BuildItem, 'Src' ) ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="footer" id="Footer"></div>
		</div>
	</div>
</body>
</html>