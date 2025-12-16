<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="VersionIcon/SM40.png"/>
<head>
    <meta charset="UTF-8">
    <link rel="canonical" href="https://josevarela.net/SMArchive/NoteSkins" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StepMania NoteSkins Archive</title>
	<meta name="title" content="StepMania NoteSkins Archive">
    <meta name="description" content="The noteskin version of the StepMania Archive, with constantly updating items for each build.">

	<meta property="og:type" content="website">
    <meta property="og:url" content="https://josevarela.net/SMArchive/NoteSkins/">
    <meta property="og:title" content="StepMania NoteSkins Archive">
    <meta property="og:description" content="The noteskin version of the StepMania Archive, with constantly updating items for each build.">
    <meta property="og:image" content="">

	<link rel="canonical" href="https://josevarela.net/SMArchive/NoteSkins" />
	<meta name="theme-color" content="#f0d01f" />
</head>
<?php $CurrentPage = "NoteSkins"; ?>
<?php
$JSONContent = file_get_contents( "db.json" );
$decoded_data = json_decode($JSONContent, true);
?>
<body>
    <div id="container">
        <?php include '../php/TopPage.php' ?>
		<div class="rightBox">
            <div style="padding:0 10px">
                <h2>Quick Travel</h2>
                <div id="quickaccess">
                    <?php include 'QuickTravel.php' ?>
                </div>
            </div>
        </div>
        <div class="content-container">
            <div class="content" id="BuildListing">
				<div>
					<center>
					<p>This is a preliminary version of the NoteSkins archive. THERE WILL BE MISSING CONTENT.</p>
					<p>If you have NoteSkins you want to send, <a href="jose@josevarela.net?subject=NoteSkin%20Submission%20Request">please email me!</a></p>
					</center>
					<br>
				</div>
                <?php

				function CheckForHttp( $convtext, $location )  {
					$parse = parse_url($convtext);
					if( array_key_exists('scheme', $parse) ) {
						if( $parse['scheme'] == "https" || $parse['scheme'] == "http" ) {
							return $convtext;
					}
					} else if( strpos( $convtext, 'Category=' ) !== false ) {
						return "ThemePreview/?".$convtext;
					}

					return "https://s3.us-east-005.dream.io/smthemes/".$location."/".$convtext;
				}

                function hasImage( $Item )
				{
					return array_key_exists('hasImage', $Item);
				}

                function isCollection( $Item )
                {
                    return array_key_exists('isCollection', $Item);
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
											$DateEntry = "date here";
											?><tr>
												<td>
													<?php if( hasImage($ThemeItem) ) { ?>
														<img src="../static/missingitem.svg" width="20px" title="This theme listing has no screenshots!" alt="This theme listing has no screenshots!">
													<?php } ?>
												</td>
                                                <td>
													<?php if( isCollection($ThemeItem) ) { ?>
														<img src="../static/smzip-pack.png" width="20px" title="This is a package! It contains multiple noteskins." alt="This is a package! It contains multiple noteskins.">
													<?php } ?>
												</td>
												<td><a href='Preview.php?Category=<?php echo $category ?>&ID=<?php echo $ThemeID ?>'><?php echo $ThemeItem['Name'] ?></td>
												<td><?php echo $ThemeItem['Author'] ?? "?" ?></td>
												<td><a href="https://s3.us-east-005.dream.io/smnoteskins/<?php echo $category ?>/<?php echo $ThemeItem['Link'] ?>">
														Download
												</a></td>
											</tr>
											<?php } ?>
									<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
				<?php } ?>
            </div>
        </div>
        <?php include '../php/Footer.php' ?>
    </div>
</body>
</html>