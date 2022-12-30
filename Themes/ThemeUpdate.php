<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
	<title>StepMania Themes Archive</title>
	<style>
        body {
            background-color: #001177;
        }
    </style>
</head>
<style>
	#content-container { width:1024px; }
	.content { min-height: 100px; }
</style>
<?php $CurrentPage = "Themes"; ?>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<div class="content-container wide-container">
			<div class="content" id="BuildListing">
				<h1>StepMania Archive Theme Update</h1>
				<center>
					<p>The purpose of this site is to provide information about the themes that are currentlty being worked on, and their status.</p>
				</center>

				<h3>Legend</h3>
				<table style="border: 1px solid black">
					<tr>
						<th>Color</th>
						<th>Description</th>
					</tr>
					<tr>
						<td style="background-color: green;" >Green</td>
						<td>Theme is in active development, and has frequent updates.</td>
					</tr>
					<tr>
						<td style="background-color: yellow;" >Yellow</td>
						<td>Theme is in semi-active development, and has infrequent updates.</td>
					</tr>
					<tr>
						<td style="background-color: orange;" >Orange</td>
						<td>Theme is in sparse development, and has infrequent updates.</td>
					</tr>
					<tr>
						<td style="background-color: red;" >Red</td>
						<td>Theme has development either stopped or halted, with unclear information about future content.</td>
					</tr>
				</table>

				<p>Theme Listings will have no alphabetical order, but instead in order of most recent update.</p>

<!--
				<h2>StepMania 5</h2>
<table>
	<tr>
		<th>Theme Name</th>
		<th>Status</th>
		<th>Author</th>
		<th>Description</th>
		<th>Compatible Versions</th>
		<th>SMArchive Backup</th>
	</tr>
	<tr>
		<td><a href="https://docs.google.com/document/d/1q04NIICoE6qzB7EF8s8RAQypYpAJ-DGYrvcw1Iw343U/">DDR X2 Plus (CS/PS2)</a></td>
		<td style="background-color: yellow;" >  </td>
		<td>Musashi</td>
		<td>Theme based on the X2 version of DDR.</td>
		<td>5 Beta 4</td>
		<td>
			<a href="https://objects-us-east-1.dream.io/smthemes/StepMania%205/DDR%20X2%20Plus%2010%2013%202014.zip">Original Version</a>
			<hr>
			<a href="https://objects-us-east-1.dream.io/smthemes/StepMania%205/DDR%20X2%20Plus%20SD15.zip">SD Version (573)</a>
		</td>
	</tr>
	<tr>
		<td><a href="https://docs.google.com/document/d/1q04NIICoE6qzB7EF8s8RAQypYpAJ-DGYrvcw1Iw343U/">WaterFall (ECFA 7)</a></td>
		<td style="background-color: green;" >  </td>
		<td>SteveReen</td>
		<td>A theme for the ECFA 7 tournament that was originally planned to be in July 2020 but had to be moved due to world events (PREVIEW / Includes NoteSkins).</td>
		<td>5.0.12+</td>
		<td><a href="https://objects-us-east-1.dream.io/smthemes/StepMania%205/WF_ECFA7.zip">Available</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/Sereni/Simply-Love-SM5-Vertical">Simply Love Vertical</a></td>
		<td style="background-color: green;" >  </td>
		<td>Sereni</td>
		<td>Modification of Simply Love to make it playable in monitors that support portrait mode.</td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/Sereni/Simply-Love-SM5-Vertical/archive/release.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/Hayoreo/digital-dance/">Digital Dance</a></td>
		<td style="background-color: green;" >  </td>
		<td>Hayoreo</td>
		<td>Modification of Simply Love with visual/profile tweaks.</td>
		<td>5.0.12+</td>
		<td><a href="https://objects-us-east-1.dream.io/smthemes/StepMania%205/Digital.Dance.v0.9.5.zip">Available</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/jordando/Simply-Love-Tweaks">Simply Love Tweaks</a></td>
		<td style="background-color: green;" >  </td>
		<td>jordando</td>
		<td>Modification of Simply Love with massive tweaks. <a href="https://github.com/quietly-turning/Simply-Love-SM5/releases/download/4.8.7/Simply-Love-v4.8.7.zip">(Requires the Base Simply Love 4.8.7 package)</a></td>
		<td>5.0.12 - 5.1-b2</td>
		<td><a href="https://github.com/jordando/Simply-Love-Tweaks/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://zenius-i-vanisher.com/v5.2/thread?threadid=10425">DanceDanceRevolution A ~EDIT~ & ~GOLD EDIT~</a></td>
		<td style="background-color: red;" >  </td>
		<td>pupsi</td>
		<td>DDR A but with a different firey tone.<br><i>(Download link for it is down. Anyone has a backup of it to put it on the archive?)</i></td>
		<td>5.0.12+</td>
	</tr>
	<tr>
		<td><a href="https://zenius-i-vanisher.com/v5.2/thread?threadid=10174">DanceDanceRevolution X2 AC</a></td>
		<td style="background-color: yellow;" >  </td>
		<td>chaoseater1034</td>
		<td>Recreation of X2's Arcade build to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://objects-us-east-1.dream.io/smthemes/StepMania%205/DanceDanceRevolution%20X2.rar">Available</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDREX2">DanceDanceRevolution Extreme 2</a></td>
		<td style="background-color: orange;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of Extreme 2 to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDREX2/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDREX2">DDR A (Kenp)</a></td>
		<td style="background-color: orange;" >  </td>
		<td>trav358</td>
		<td>Recreation of DDR A to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://objects-us-east-1.dream.io/smthemes/StepMania%205/DDR%20A%20-%20KENP_Mod%2020180115.zip">Available</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDRMarioMix">DDR Mario Mix</a></td>
		<td style="background-color: orange;" >  </td>
		<td>MadkaT / Jose_Varela</td>
		<td>Recreation of Gamecube's DDR Mario Mix for SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDRMarioMix/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/MGD3">Mungyodance 3</a></td>
		<td style="background-color: orange;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of Mungyodance 3 for SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDRMarioMix/MGD3/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/JoseVarelaP/SM5-GrooveNights/">GrooveNights</a></td>
		<td style="background-color: orange;" >  </td>
		<td>Jose_Varela</td>
		<td>Recreation of GrooveNights for SM5.</i></td>
		<td>5.3+</td>
		<td><a href="https://github.com/JoseVarelaP/SM5-GrooveNights/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDR3rdMix">DDR 3rd Mix</a></td>
		<td style="background-color: orange;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of DDR 3rd Mix to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDR3rdMix/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDR1st">DDR 1st Mix</a></td>
		<td style="background-color: orange;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of DDR 1st Mix to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDR1st/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDR2ndMix">DDR 2nd Mix</a></td>
		<td style="background-color: orange;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of DDR 2nd Mix to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDR2ndMix/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/NewNovAE">DDR NewNovAE</a></td>
		<td style="background-color: red;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of NewNovAE to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/NewNovAE/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDRPC">DDR PC</a></td>
		<td style="background-color: red;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of DDR PC to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDRPC/archive/master.zip">Github</a></td>
	</tr>
	<tr>
		<td><a href="https://github.com/MadkaT182/DDR4th">DDR 4th Mix</a></td>
		<td style="background-color: red;" >  </td>
		<td>MadkaT</td>
		<td>Recreation of DDR 4th Mix to SM5.</i></td>
		<td>5.0.12+</td>
		<td><a href="https://github.com/MadkaT182/DDR4th/archive/master.zip">Github</a></td>
	</tr>
</table>

<h2>StepMania 3.9</h2>
<table>
	<tr>
		<th>Theme Name</th>
		<th>Status</th>
		<th>Author</th>
		<th>Description</th>
		<th>Compatible Versions</th>
	</tr>
	<tr>
		<td><a href="https://zenius-i-vanisher.com/v5.2/thread?threadid=10267">DDR A20 (PLUS)</a></td>
		<td style="background-color: green;" >  </td>
		<td>VR0</td>
		<td>DDR Ace but for StepMania 3.9+ redux.</td>
		<td>3.9+ REDUX</td>
	</tr>
</table>
-->
			<!-- Start generating the PHP content -->
			<?php
				$JSONContent = file_get_contents( "UpdateListJson.json" );
				$decoded_data = json_decode($JSONContent, true);
				$StatusColor = array("green","yellow","orange","red");

				function CheckForHttp( $convtext, $location )  {
					$parse = parse_url($convtext);
					if( array_key_exists('scheme', $parse) ) {
						if( $parse['scheme'] == "https" || $parse['scheme'] == "http" ) {
							return $convtext;
					}
					} else if( strpos( $convtext, 'Category=' ) !== false ) {
						return "ThemePreview.html?".$convtext;
					}

					return "https://objects-us-east-1.dream.io/smthemes/".$location."/".$convtext;
				}

				function PrintThemeNameWithLink( $item )
				{
					echo "<td>";
					if( array_key_exists('Link', $item) )
						echo "<a href='".$item['Link']."'>";

					echo $item['Name'];

					if( array_key_exists('Link', $item) )
						echo "</a>";

					echo "</td>";
				}

				// For each category...
				foreach($decoded_data as $category) {
					// Before going, sort the items by the update date.
					usort($category['Items'], function($a, $b) {
						if( !array_key_exists('LastUpdate', $a) || !array_key_exists('LastUpdate', $b) ) {
							// One of the items doesn't have a date assigned, so don't bother moving it.
							return 1;
						}
						// They're on the same day, sort by the index set.
						if( $a['LastUpdate'] == $b['LastUpdate'] ) {
							return $b['Index'] - $a['Index'];
						}
						return strtotime($b['LastUpdate']) - strtotime($a['LastUpdate']);
					});
				?>
				<h2><?php echo $category['Name'] ?></h2>
				<table>
					<th>Theme Name</th>
					<th>Status</th>
					<th>Author</th>
					<th>Description</th>
					<th>Compatible Versions</th>
					<th>SMArchive Backup</th>
					<?php foreach( $category['Items'] as $item ) { ?>
					<tr>
						<?php echo PrintThemeNameWithLink($item) ?>
						<td style='background-color: <?php echo $StatusColor[ $item['State'] ] ?>'></td>
						<td><?php echo $item['Author'] ?></td>
						<td><?php echo $item['Description'] ?></td>
						<td><?php echo $item['Build'] ?></td>
						<td><a href="<?php echo CheckForHttp($item['Download'], $category['Folder']) ?>">Available</a></td>
					</tr>
					<?php } ?>
				</table>
				<?php } ?>
			<div class="footer" id="Footer"></div>
		</div>
	</div>
</body>
</html>