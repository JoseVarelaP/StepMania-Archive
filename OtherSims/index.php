<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StepMania Other Simulators Archive</title>
	<meta property="og:image" content="https://josevarela.xyz/SMArchive/VersionIcon/SM40.png" />
	<meta property="og:site_name" content="StepMania Archive" />
	<meta property="og:description" content="An archive of other rhythm game simulators that released before StepMania."/>
	<meta property="og:type" content="article" />
	<meta property="og:url" content="https://josevarela.xyz/SMArchive" />

	<meta name="title" content="Other Simulators" />
	<meta name="description" content="An archive of other rhythm game simulators that released before StepMania."/>
	<meta name="theme-color" content="#f0d01f" />

	<style>
        body {
            background-color: #BE4A3C;
        }
    </style>

	<?php $CurrentPage = "OtherSims"; ?>
	
	<script>
		function getOption(el) {
			const option = el.value
			window.location = option
			return option
		}
	</script>
</head>
<?php
$JSONContent = file_get_contents( "db.json" );
$decoded_data = json_decode($JSONContent, true);

function ReturnDescription( $Item )
{
    if( array_key_exists('Description', $Item) )
        return $Item['Description'];
    
    return "";
}

function GetSourcesForItem($itemCat)
{
    // It's empty, then we can't generate this list.
    if( !array_key_exists('Sources',$itemCat) )
        return "";

    $Final = "<br><h2>Sources:</h2><ul>";
    
    foreach( $itemCat['Sources'] as $Entry ) {
        if( array_key_exists('Link',$Entry) )
            $Final = $Final . "<li><a href='" . $Entry['Link'] . "'>" . $Entry['Name'] . "</a></li>";
        else
            $Final = $Final . "<li>". $Entry['Name'] . "</li>";
    }
    $Final = $Final . "</ul>";
    return $Final;
}

function FindBuildFromKey( $cat,  $Item, $Key )
{
    $CategoryLink = "https://objects-us-east-1.dream.io/smothersims/" . $cat . "/";
	// First, check if there's an actual data available for this entry.
	if( !array_key_exists($Key, $Item) )
		// Nothing, so just return the dash.
		return "-";

	// So the key exists, check how many entries are available.
	if( is_array( $Item[$Key] ) )
	{
		if( count($Item[$Key]) == 1 )
			// This entry is just a special singular item, report as such.
			return "<a href='$CategoryLink". $Item[$Key][0]['Link'] ."'>".$Item[$Key][0]['Name']."</a>";
		// This is a multi-array entry, iterate through them.
		// When the option tag is generated, we need to still send a command to JS
		// to get what kind of input was selected.
		$Result = "";

		foreach( $Item[$Key] as $Entry ) {
			$Result = $Result . "<a href='". $CategoryLink . $Entry['Link'] ."'>". $Entry['Name'] ."</a><hr>";
		}

		return $Result;
	} else {
		// Singular item, just report the link to the item.
		return "<a href='". $CategoryLink.  $Item[$Key] ."'>Available</a>";
	}
}
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
                <h1>Special Thanks</h1>
                <div>
                    <p>I would like to thank the following people for helping find this information:</p>
                    <ul>
                        <li><a href="https://github.com/Assimileafy">Assimileafy</a></li>
                        <li><a href="https://twitter.com/skoshche">Skoshche</a></li>
                    </ul>
                    <p>Sources of information will be included alongside the description for each item.</p>
                    <br>
                </div>
                <?php foreach( $decoded_data as $category=>$itemCat ) {  ?>
                    <div>
                        <h1 id="<?php echo $category ?>"><?php echo $itemCat['Name'] ?></h1>
                        <div class="ToolSideFlex">
                            <div style="margin-right: auto">
                                <p><?php echo ReturnDescription($itemCat) ?></p>
                                <?php echo GetSourcesForItem($itemCat) ?>
                            </div>
                            <?php if( array_key_exists( 'Picture', $itemCat ) ) { ?>
                                <img class="ToolImagePreview" src="<?php echo $itemCat['Picture'] ?>">
                            <?php } ?>
                        </div>
                        <?php
                            if( array_key_exists('Listing', $itemCat) ) {
                        ?>
                        <table class="TableToolSet">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Windows</th>
                                <th>Mac</th>
                                <th>Linux</th>
                                <th>Src</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                    usort($itemCat['Listing'], function($a, $b) {
                                        // They're on the same day, sort by the index set.
                                        if( !array_key_exists('Date', $a) || !array_key_exists('Date', $b)  )
                                            return 0;

                                        return strtotime($a['Date']) - strtotime($b['Date']);
                                    });

                                    foreach($itemCat['Listing'] as $ThemeID=>$ThemeItem ) {
                                    $DateEntry = "?";
                                    if( array_key_exists('Date', $ThemeItem) )
                                    {
                                        $DateObject = date_create($ThemeItem['Date']);
                                        if( !is_bool( $DateObject ) )
                                            $DateEntry = date_format( $DateObject, "m/d/Y" );
                                    }
                                ?>
                                <tr>
                                    <td><?php echo $ThemeItem['Name'] ?></td>
                                    <td><?php echo $DateEntry ?></td>
                                    <td><?php echo FindBuildFromKey( $category, $ThemeItem, 'Windows') ?></td>
                                    <td><?php echo FindBuildFromKey( $category, $ThemeItem, 'Mac') ?></td>
                                    <td><?php echo FindBuildFromKey( $category, $ThemeItem, 'Linux') ?></td>
                                    <td><?php echo FindBuildFromKey( $category, $ThemeItem, 'Src') ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>