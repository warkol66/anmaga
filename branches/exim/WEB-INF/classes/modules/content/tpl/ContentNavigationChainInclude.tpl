<div id="navigationChain">
<p>
	|-foreach from=$navigationChain item=item name=navigation-|
		<a href="Main.php?do=contentList&id_section=|-$item.id-|">|-$item.titleInMenu-|</a> |-if not $smarty.foreach.navigation.last-|&gt;|-/if-|
	|-/foreach-|
</p>
</div>