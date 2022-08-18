<?php
$TopPage_LinkList = array(
	array("Name" => "Announcers", "Color" => "#227700"),
	array(
		"Name" => "Builds",
		"Color" => "#F1CD00",
		"Subpages" => array(
			"Builds Listing" => "index.php",
			"Credits" => "Credits.php"
		)
	),
	array("Name" => "NoteSkins", "Color" => "#772200"),
	array(
		"Name" => "Themes",
		"Color" => "#001177",
		"Subpages" => array(
			"Theme List" => "index.php",
			"Theme Update (WIP)" => "ThemeUpdate.php"
		)
	),
	array("Name" => "Characters", "Color" => "#772200"),
	array("Name" => "Footage", "Color" => "#550055"),
	array(
		"Name" => "Tools",
		"Color" => "#005599",
		"Subpages" => array(
			"Tools List" => "index.php",
			"Font Conversion Guide" => "ThemeUpdate2.php"
		)
	),
	array("Name" => "About", "Color" => "#002211"),
)
?>
<div id="menu-box">
    <div id="site-logo">
		<a href="index.html"><img src="../Headers/<?php echo $CurrentPage ?>.png" id="logo"></a>
	</div>
    <div class="top-menu" id="top-menu">
		<a href="https://discord.gg/uMkVUrr"><img src="../static/discord_icon.png" id="toprighticon"></a>
		<a href="https://github.com/JoseVarelaP/StepMania-Archive"><img src="../static/GitHub-Mark-Light-120px-plus.png" id="toprighticon"></a>
		<div class="PageList">
			<?php foreach( $TopPage_LinkList as $Entries ) { ?>
				<li>
					<a id="<?php echo $CurrentPage == $Entries['Name'] ? "current" : "" ?>" href="../<?php echo $Entries['Name']  ?>/index.php">
					<?php echo $Entries['Name'] ?>
					<?php if( array_key_exists('Subpages', $Entries) ) { ?>
						<ul>
							<?php foreach( $Entries['Subpages'] as $SubPageTitle=>$SubPageLink ) { ?>
								<a href="../<?php echo $Entries['Name']."/".$SubPageLink ?>"><?php echo $SubPageTitle ?></a>
							<?php } ?>
						</ul>
					<?php } ?>
					</a>
				</li>
			<?php } ?>
		</div>
	</div>
</div>