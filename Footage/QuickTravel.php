<ul style="list-style-type: none; margin-left: -30px; margin-bottom: 20px;">
<?php
// Generate the items for the quick access pane.
foreach( $decoded_data as $Game=>$Category ) {
?>
<li style="margin-bottom: 6px;">
	<a href="#<?php echo $Game ?>"><?php echo $Category['Name'] ?></a><br>
</li>
<?php } ?>
</ul>