<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://josevarela.net/SMArchive/Footage" />

    <!-- Primary Meta Tags -->
    <title>StepMania Footage Archive</title>
    <meta name="title" content="StepMania Footage Archive">
    <meta name="description" content="Footage from multiple points in StepMania history.">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://josevarela.net/SMArchive/Footage/">
    <meta property="og:title" content="StepMania Footage Archive">
    <meta property="og:description" content="Footage from multiple points in StepMania history.">
    <meta property="og:image" content="">
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
            <?php include '../Builds/ArchiveHistoryQuick.php' ?>
            <div class="content" id="ITGextras">
                <h1>In The Groove Random Movie Packs</h1>
                <p>This collection of packs need to be installed in the RandomMovies folder on the install folder of your preferred StepMania install.</p>
                <table>
                    <tr>
                        <td>In The Groove 1</td>
                        <td>695.8MB</td>
                        <td><a href='https://s3.us-east-005.dream.io/smarchivefootage/BGA/In%20The%20Groove.7z'>Available</td>
                    </tr>
                    <tr>
                        <td>In The Groove 2</td>
                        <td>490.8MB</td>
                        <td><a href='https://s3.us-east-005.dream.io/smarchivefootage/BGA/In%20The%20Groove%202.7z'>Available</td>
                    </tr>
                    <tr>
                        <td>In The Groove 3</td>
                        <td>782.5MB</td>
                        <td><a href='https://s3.us-east-005.dream.io/smarchivefootage/BGA/In%20The%20Groove%203.7z'>Available</td>
                    </tr>
                    <tr>
                        <td>In The Groove Rebith</td>
                        <td>584.9MB</td>
                        <td><a href='https://s3.us-east-005.dream.io/smarchivefootage/BGA/In%20The%20Groove%20Rebirth.7z'>Available</td>
                    </tr>
                </table>
            </div>
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