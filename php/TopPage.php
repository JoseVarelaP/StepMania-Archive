<?php
$TopPage_LinkList = array(
	array("Name" => "Announcers", "Color" => "#227700"),
	array(
		"Name" => "Builds",
		"Color" => "#F1CD00",
		"Subpages" => array(
			"Builds Listing" => "",
			"Credits" => "Credits.php"
		)
	),
	array("Name" => "NoteSkins", "Color" => "#772200"),
	array(
		"Name" => "Themes",
		"Color" => "#001177",
		"Subpages" => array(
			"Theme List" => "",
			"Theme Update (WIP)" => "ThemeUpdate.php"
		)
	),
	array("Name" => "Characters", "Color" => "#772200"),
	array("Name" => "Footage", "Color" => "#550055"),
	array(
		"Name" => "Tools",
		"Color" => "#005599",
		"Subpages" => array(
			"Tools List" => "",
			"Font Conversion Guide" => "FontConversionGuide.php"
		)
	),
	array("Name" => "OtherSims", "Text" => "Other Sims", "Color" => "#550055"),
	array(
		"Name" => "About",
		"Color" => "#002211",
		"Subpages" => array(
			"Archive Changelog" => "../PastUpdates/"
		)
	),
);

function GetName($Item)
{
	if( array_key_exists('Text', $Item) )
		return $Item['Text'];
	return $Item['Name'];
}

?>
<div id="menu-box">
    <div id="site-logo">
		<a href="/SMArchive/<?php echo $CurrentPage ?>/"><img src="/SMArchive/Headers/<?php echo $CurrentPage ?>.png" id="logo"></a>
	</div>
    <div class="top-menu" id="top-menu">
		<!--
		<div class="ShortageMessage">
			<p>Hey, the <a href="https://www.bleepingcomputer.com/news/security/internet-archive-hacked-data-breach-impacts-31-million-users/">Internet Archive is currently suffering a data breach and DDOS attacks</a>. So, for the time being, links that go there have been disabled temporarily.</p>
			<p>The SMArchive isn't affected by this, but I thought of letting you know that this is happening.</a>
		</div>
		-->
		<a href="https://discord.gg/uMkVUrr"><img src="/SMArchive/static/discord_icon.png" id="toprighticon"></a>
		<a href="https://github.com/JoseVarelaP/StepMania-Archive"><img src="/SMArchive/static/GitHub-Mark-Light-120px-plus.png" id="toprighticon"></a>
		<a href='https://ko-fi.com/josevarela' target='_blank'><img src='/SMArchive/static/kofi-icon.png' id="toprighticon" alt='ko-fi' /></a>
		<div class="PageList">
			<?php foreach( $TopPage_LinkList as $Entries ) { ?>
				<li>
					<a id="<?php echo $CurrentPage == $Entries['Name'] ? "current" : "" ?>" href="/SMArchive/<?php echo $Entries['Name']  ?>/">
					<?php echo GetName($Entries) ?>
					<?php if( array_key_exists('Subpages', $Entries) ) { ?>
						<ul>
							<?php foreach( $Entries['Subpages'] as $SubPageTitle=>$SubPageLink ) { ?>
								<a href="/SMArchive/<?php echo $Entries['Name']."/".$SubPageLink ?>"><?php echo $SubPageTitle ?></a>
							<?php } ?>
						</ul>
					<?php } ?>
					</a>
				</li>
			<?php } ?>
		</div>
	</div>
</div>