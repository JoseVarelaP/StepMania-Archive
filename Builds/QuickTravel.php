<ul style="list-style-type: none; margin-left: -30px; margin-bottom: 20px;">
<script>
	function OpenMenu(e)
	{
		const GroupOpen = `div${e.href.substring( e.href.lastIndexOf('#') + 1 )}`;
		if( GroupOpen.length > 1 && document.getElementById(GroupOpen) )
		{
			const base = document.getElementById(GroupOpen)
			base.getElementsByTagName("div")[0].style.display = "block"
			document.getElementById(GroupOpen).scrollIntoView(true)
		}
	}
</script>
<?php
// Generate the items for the quick access pane.
foreach( $decoded_data as $category=>$itm ) {
?>
<li style="margin-bottom: 6px;">
	<a onclick="OpenMenu(this)" href="#<?php echo $category ?>"><?php echo $itm['Name'] ?></a><br>
</li>
<?php } ?>
</ul>