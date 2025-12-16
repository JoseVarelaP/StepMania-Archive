<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<head>
    <meta charset="UTF-8">
    <title>StepMania Characters Archive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://josevarela.net/SMArchive/Characters" />

    <?php $CurrentPage = "Characters"; ?>
</head>
<?php
$JSONContent = file_get_contents( "db.json" );
$decoded_data = json_decode($JSONContent, true);
?>
<body>
    <div id="container">
        <?php include '../php/TopPage.php' ?>
        <div class="content-container wide-container">
            <div class="content">
                <h1>Notes</h1>
                <div class="CenterItem">
                    <p> These can run on every version of StepMania after 3.9 Release Candidate 3.</p>
                    <p><a href="https://s3.us-east-005.dream.io/smcharacters/Animation%20%2B%20Helper%20Bones.7z">Please ensure you have the appropiate bones installed!</a></p>
                </div>
                <br/>
                <div class="CharListing" id="CharListing">
                    <?php foreach( $decoded_data as $category=>$itemCat ) {  ?>
                        <div>
                            <a href="https://s3.us-east-005.dream.io/smcharacters/<?php echo $itemCat['File'] ?>">
                                <img src="https://s3.us-east-005.dream.io/smcharacters/img/<?php echo $category ?>.png" style="max-height: 96px; padding: 1px 2px;">
                            </a>
                            <br>
                            <?php echo $category ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>