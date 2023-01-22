<!DOCTYPE html>
<html lang="en">
<link type="text/css" href="../theme.css" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="../VersionIcon/SM40.png"/>
<?php
    $CurrentPage = "About";
    $PageColor = "#002211";
?>
<head>
    <meta charset="UTF-8">
    <style>
        body {
            background-color: #002211;
        }
    </style>
    <title>StepMania Archive</title>
    <link rel="canonical" href="https://josevarela.net/SMArchive/About" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="StepMania Archive">
    <meta name="description" content="A project to collect and preserve almost everything from StepMania, and the contents made by the community itself.">
</head>
<body>
	<div id="container">
		<?php include '../php/TopPage.php' ?>
		<div class="content-container wide-container">
            <div class="content">
                <?php
                    $Date = 'September 23rd, 2022';
                    $Size = '226.7GB';
                    $Thanks = array(
                        "Giovanni Shawn - Allowing me to archive Sushi Violation",
                        "MadkaT - Finding Club PARASTAR and Keys-Six",
                        "Jousway - Mungyodance 2 video, Pointing out mistakes",
                        "InfinitePhantasm - Finding StepManiaX Builds",
                        "Nhan - Pointing out mistakes, ITG2PC Version history, ITG2PC R3 and ITGPC builds"
                    );
                ?>
                <h1>About</h1>
                <p>
                        The StepMania archive is a side project created by <a href="../../">Jose_Varela</a> to collect and preserve almost everything from StepMania, and the contents made by the community itself.
                        Everything done in the project and subsequent sites are all handled by himself. No use of automation or anything like that.
                </p>
                <p>
                        It started back in 2017 with the Build Archive, which initially was to keep handy older builds due to testing with simfiles and themes.
                        But eventually, it kept growing exponentially to the point that the entire archive had to do 3 reallocations due to storage limitations.<br>
                        Originally, the archive was only linked at the UKSRT server, but at mid 2018, it started to gain attention from the community at large.
                        They were really interested on a archive like site for the engine.
                </p>
                <p>
                        Currently, the StepMania Archive is expanding to more areas aside from themes, such as NoteSkins and Characters. Eventually there might be more content.
                </p>
                
                <p id="archivesize">
                    As of <?php echo $Date ?>, the Archive is curently hosting <?php echo $Size ?> of data.
                </p>
                <div id ="ThanksArea">
                    <h2>Special thanks to:</h2>
                    <?php foreach( $Thanks as $Entry ) { ?>
                        <p><?php echo $Entry ?></p>
                    <?php } ?>
                </div>
                <h2>Submission requests</h2>
                <p>
                        Everything posted and submitted to the archive is done voluntarily by the community. If you're an author of any content in this archive, and see some work that is violating some kind of distribution right set
                        on the theme's original release, you can request a takedown* by contacting Jose_Varela via Email with the buttons below.<br>

                        
                        <small>*You may be asked if at least theme information/overview/history/screenshots can remain on the archive upon a takedown request, you may choose to deny this as well.</small>

                        <center>
                            <a href="mailto:jose@josevarela.net?subject=Submission Request" target="_top">Request a submission</a> | <a href="mailto:jose@josevarela.net?subject=Submission Takedown Request" target="_top">Request a takedown</a>
                        </center>
                </p>
            </div>
            <?php include '../php/Footer.php' ?>
        </div>
    </div>
</body>
</html>