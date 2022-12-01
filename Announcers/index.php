<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../Builds/VersionIcon/SM40.png"/>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta property="og:image" content="https://jose.heysora.net/SMArchive/VersionIcon/SM40.png" />
    <meta property="og:site_name" content="StepMania Archive" />
    <meta property="og:description" content="Announcers that you can use to excite more your gameplay."/>
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://jose.heysora.net/SMArchive" />

    <meta name="title" content="Announcers Archive" />
    <meta name="description" content="Announcers that you can use to excite more your gameplay."/>
    <meta name="theme-color" content="#f0d01f" />

    <title>StepMania Announcers Archive</title>
    <?php $CurrentPage = "Announcers"; ?>
</head>
<?php
$JSONContent = file_get_contents( "db.json" );
$decoded_data = json_decode($JSONContent, true);

function GetAuthor($item)
{
    if( !array_key_exists('Author', $item) )
        return "";
    return $item['Author'];
}
?>
<body>
    <div id="container">
        <?php include '../php/TopPage.php' ?>
        <div id="content-container" class="wide-container">
            <?php include '../Builds/ArchiveHistoryQuick.php' ?> 
            <div class="content" id="BuildListing">
                <h1>Announcer List</h1>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Sample</th>
                        </tr>
                    </thead>
                    <?php foreach( $decoded_data as $Name=>$Entry ) { ?>
                        <tr>
                            <td><a href="https://objects-us-east-1.dream.io/smannouncers/<?php echo $Entry['File'] ?>"><?php echo $Name ?></a></td>
                            <td><?php echo GetAuthor($Entry) ?></td>
                            <td><a href="https://objects-us-east-1.dream.io/smannouncers/AudioPreview/<?php echo $Name ?>.ogg">Preview</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>