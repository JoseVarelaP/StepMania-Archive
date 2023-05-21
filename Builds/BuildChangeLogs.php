<!DOCTYPE html>
<html lang="en">
<?php
    $CurrentPage = 'Builds';

    $JSONContent = file_get_contents( "ChangeLogs.json" );
    $decoded_data = json_decode($JSONContent, true);

    $EntriesPath = "HTMLChangeLog/";

    if( !array_key_exists('Version', $_GET) )
        echo "This is an invalid entry!";

    $EntryToLook = $EntriesPath . $decoded_data[ $_GET['Version'] ];
?>
<head>
    <link type="text/css" href="../theme.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://josevarela.net/SMArchive/Builds/BuildChangeLogs.php?Version=<?php echo $_GET['Version']?>" />
    <title>StepMania Build Archive</title>
</head>
<body>
    <div id="container">
        <?php include '../php/TopPage.php' ?>
        <div class="content-container wide-container">
            <div class="content content-Changelog" id="changelog">
                <?php
                    include '../php/Parsedown.php';
                    include '../php/Yaml.php';
                    $Parsedown = new Parsedown();
                    $Yaml = new Yaml();

                    $TextContent = file_get_contents(
                        $EntryToLook
                    );

                    // https://github.com/erusev/parsedown/issues/791
                    // Has front-matter
                    if (0 === strpos($TextContent, "---\n")) {
                        $parts = explode("\n---\n", $TextContent, 2);
                        $data = $Yaml->loadString(substr($parts[0], 4));
                        $TextContent = $Parsedown->text($parts[1] ?? "");
                    // No front-matter
                    } else {
                        $data = [];
                        $TextContent = $Parsedown->text($TextContent);
                    }
                ?>
                <?php if( array_key_exists("title", $data) ) { ?>
                    <h5><?php echo $data["title"] ?></h5>
                <?php } ?>
                <div style="width: 98%; margin-left: 10px; margin-top: 10px;">
                    <?php
                        echo $TextContent;
                    ?>
                </div>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>