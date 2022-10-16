<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="VersionIcon/SM40.png"/>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StepMania Build Archive</title>
</head>
<?php
    $CurrentPage = 'Builds';

    $JSONContent = file_get_contents( "ChangeLogs.json" );
    $decoded_data = json_decode($JSONContent, true);

    $EntriesPath = "HTMLChangeLog/";

    if( !array_key_exists('Version', $_GET) )
        echo "This is an invalid entry!";

    $EntryToLook = $EntriesPath . $decoded_data[ $_GET['Version'] ]['HTMLParse'];
?>
<body>
    <div id="container">
        <?php include '../php/TopPage.php' ?>
        <div class="content-container wide-container">
            <div class="content content-Changelog" id="changelog">
                <?php
                    include '../php/Parsedown.php';
                    $Parsedown = new Parsedown();

                    $TextContent = file_get_contents(
						$EntryToLook
					);

                    echo $Parsedown->text($TextContent);
                ?>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
<script src="db.js"></script>
</html>