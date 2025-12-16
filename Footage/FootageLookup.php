<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<?php
$CurrentPage = 'Footage';
$JSONContent = file_get_contents( "data.json" );
$decoded_data = json_decode($JSONContent, true);

$Category = $_GET["Category"];
$Pack = $_GET["Col"];
$VidID = $_GET["ID"];
$VideoContainerPath = $decoded_data[$Category]["Collections"][$Pack];

// https://s3.us-east-005.dream.io/smarchivefootage/In%20The%20Groove/ITGVideoPack1/Chef%20-%20Marathon%20Course%20-%20Far%20East.mp4
if (array_key_exists('Container', $VideoContainerPath))
    $VideoLink = "https://s3.us-east-005.dream.io/smarchivefootage/" . $VideoContainerPath["Container"] . "/" . $VideoContainerPath[$VidID]["VideoLink"];
else
    $VideoLink = "https://s3.us-east-005.dream.io/smarchivefootage/" . $VideoContainerPath[$VidID]["VideoLink"];

function GetTitle( $Cont, $Path )
{
    if( !array_key_exists('Name', $Cont[$Path]) )
        return "";

    return $Cont["Name"] . " - " . $Cont[$Path]["Name"];
}

function GenerateMatchStats( $Path )
{
    if( !array_key_exists('ScoreInfo', $Path) )
        return "";

    return "<table id='MatchInfo'></table>";
}

function ObtainItemFromPossibleArea( $Path, $VidID, $ItemName )
{
    if( array_key_exists($ItemName, $Path[$VidID]) )
        return $Path[$VidID][$ItemName];
        
    if( array_key_exists($ItemName, $Path) )
        return $Path[$ItemName];

    return NULL;
}

function GetFootageDate( $Item, $ID )
{
    $DateStr = ObtainItemFromPossibleArea( $Item, $ID, 'RecordDate' );
    if( is_null( $DateStr ) )
        return "?";

    $DateObject = date_create($DateStr);
    if( !is_bool( $DateObject ) )
        return date_format( $DateObject, "m/d/Y" );
}
function GetItemForFootage( $Item, $ID, $NameItem )
{
    $DateStr = ObtainItemFromPossibleArea( $Item, $ID, $NameItem );
    if( is_null( $DateStr ) )
        return "?";
    
    return $DateStr;
}

function GetVideoLinkSource( $Item, $ID, $Type )
{
    $VidArray = ObtainItemFromPossibleArea( $Item, $ID, 'Src' );
    if( is_null( $VidArray ) )
        if( $Type == "Link" )
            return "";
        else
            return "?";

    if( !array_key_exists( $Type, $VidArray ) )
        return "";
    
    return $VidArray[$Type];
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo GetTitle($VideoContainerPath, $VidID) ?>StepMania Footage Archive</title>
</head>
<style>
    table {
        width: 100%;
    }
</style>
<body>
    <div id="container">
        <?php include '../php/TopPage.php' ?>
        <div class="content-container wide-container">
            <div class="content" id="BuildListing">
                <h1 id="VideoTitle"><?php echo GetTitle($VideoContainerPath, $VidID) ?></h1>
                <img class="VideoIcon" src="../static/news_icon_movie.png" style="position: absolute;">
                <div class="Video-InfoBoard">
                    <h3>Information</h3>
                    <hr>
                    <p id="Info-Recorded"> Recorded: <?php echo GetFootageDate( $VideoContainerPath, $VidID ) ?> </p>
                    <p id="Info-Location"> Location: <?php echo GetItemForFootage( $VideoContainerPath, $VidID, 'Location' ) ?> </p>
                    <p id="Info-Game"> Game: <?php echo GetItemForFootage( $VideoContainerPath, $VidID, 'Game' ) ?></p>
                    <p id="Info-Source"> Source: <a id="Info-Source-Link" href="<?=GetVideoLinkSource( $VideoContainerPath, $VidID, 'Link' )?>"><?=GetVideoLinkSource( $VideoContainerPath, $VidID, 'Name' )?></a> </p>
                </div>

                <p class="video-desc-container" id="VideoDescription">
                    <?php
                        if( array_key_exists('Description', $VideoContainerPath[$VidID]) )
                            echo $VideoContainerPath[$VidID]['Description'];
                    ?>
                </p>
                <!-- Generate match stats if available. -->
                <?php
                    if( array_key_exists('ScoreInfo', $VideoContainerPath[$VidID]) ) {
                ?>
                    <table id="MatchInfo">
                        <tr>
                            <td>Song</td>
                            <!-- Get each participant -->
                            <?php foreach( $VideoContainerPath[$VidID]['ScoreInfo']['Participants'] as $participant  ) { ?>
                                <td><?php echo $participant ?></td>
                            <?php } ?>
                        </tr>
                        <?php foreach( $VideoContainerPath[$VidID]['ScoreInfo']['Stages'] as $Stage  ) { ?>
                            <tr>
                                <td><?php echo $Stage['Song'] ?></td>
                                <?php
                                    $HighestScore = 0;
                                    foreach( $Stage['Scores'] as $Percentage ) {
                                        if ($Percentage > $HighestScore)
                                            $HighestScore = $Percentage;
                                    }
                                    foreach( $Stage['Scores'] as $Percentage ) {
                                ?>
                                    <td class="matchinfo-<?php echo $Percentage == $HighestScore ? "winner" : "loser" ?>"><?php echo $Percentage ?></td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </table>
                <?php
                   }
                ?>
                <div class="VideoFrame">
                    <video id="VideoActor" controls>
                        <source id="VideoSource" type="video/mp4" src="<?php echo $VideoLink ?>">
                    </video>
                </div>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>