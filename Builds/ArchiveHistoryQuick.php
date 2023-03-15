<?php
$ArchiveChanges = file_get_contents( "../ArchiveChanges.json" );
$ChangeData = json_decode($ArchiveChanges, true);

// Only need the very first entry available here for the quick version.
$CurrentChanges = $ChangeData[0];
?>
<div class="content" id="History">
	<h1>Archive Updates - <?php echo $CurrentChanges['Date'] ?> <a href="../PastUpdates">(Past Updates)</a></h1>
	<div>
		<?php foreach( $CurrentChanges['Changes'] as $Changes ) { ?>
		<h2><img style="width: 24px" src="../VersionIcon/<?php echo $Changes['Icon'] ?>"> <?php echo$Changes['Name'] ?></h2>
		<ul>
			<?php foreach( $Changes['List'] as $Points ) { ?>
				<li><?php echo $Points ?></li>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>
</div>