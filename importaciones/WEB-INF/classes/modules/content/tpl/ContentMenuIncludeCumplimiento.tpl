<ul>
|-foreach from=$result.menu item=item-|
	<li><a href="Main.php?do=contentShow&id=|-$item.id-|">|-$item.titleInMenu-|</a></li>
|-/foreach-|
</ul>
