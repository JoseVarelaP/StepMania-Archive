<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../Builds/VersionIcon/SM40.png"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StepMania Footage Archive</title>
</head>
<?php
$CurrentPage = "Footage";
$JSONContent = file_get_contents( "data.json" );
$decoded_data = json_decode($JSONContent, true);

function FetchFootageInfo( $Entry, $Parent, $ID, $CollectionID )
{
    // First check if this entry is even allowed.
    if( !is_array( $Entry ) )
        // It is not a valid item, so skip it.
        return "";

    // Begin the process.
    $Result = "<tr>";

    $Result = $Result . "<td>" . $Entry["Name"] . "</td>";
    $Result = $Result . "<td><a href='FootageLookup.php?Category=" . $Parent . "&Col=". $CollectionID ."&ID=" . $ID . "'>Video" . "</td>";

    $Result = $Result . "</tr>";

    return $Result;
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
        <div class="content-container" onload="GenerateFootageList()">
            <div class="content" id="BuildListing">
                <?php foreach( $decoded_data as $Game=>$Category ) {  ?>
                    <h1 id="<?php echo $Game?>"><?php echo $Category['Name'] ?></h1>
                    <?php foreach( $Category['Collections'] as $CatID=>$CatObj ) {  ?>
                        <h2><?php echo $CatObj['Name'] ?></h2>
                        <table>
                            <thead>
                                <?php foreach( $CatObj as $entryID=>$Entry ) {  ?>
                                    <?php echo FetchFootageInfo( $Entry, $Game, $entryID, $CatID ) ?>
                                <?php } ?>
                            </thead>
                        </table>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>