<ul style="list-style-type: none; margin-left: -30px; margin-bottom: 20px;">
<?php
// Generate the items for the quick access pane.
foreach( $decoded_data as $category=>$itm ) {
?>
<li style="margin-bottom: 6px;">
	<a href="#div<?php echo $category ?>"><?php echo $itm['Name'] ?></a><br>
</li>
<?php } ?>
</ul>