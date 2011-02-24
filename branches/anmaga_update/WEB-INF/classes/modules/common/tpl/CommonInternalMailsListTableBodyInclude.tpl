|-if $internalMails|@count eq 0-|
	<tr>
		 <td colspan="7">|-if isset($filter)-|No hay mensajes que concuerden con la búsqueda|-else-|No hay mensajes disponibles|-/if-|</td>
	</tr>
|-else-|
	|-foreach from=$internalMails item=internalMail name=for_internalMails-|
	<tr |-if $internalMail->hasBeenRead()-|class="read"|-/if-|> 
		|-assign var=fromObj value=$internalMail->getFrom()-|
		<td nowrap><input class="selector" type="checkbox" name="selectedIds[]" value="|-$internalMail->getId()-|" /></td>
		<td>|-$fromObj->getName()-|</td> 
		<td>|-$internalMail->getSubject()-|</td>
	</tr> 
	|-/foreach-|
	|-if isset($pager) && ($pager->getTotalPages() gt 1)-|
	<tr> 
		<td colspan="7" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
	</tr>
	|-/if-|
	<tr>
		 <th colspan="7" class="thFillTitle">|-if $internalMails|@count gt 5-|<div class="rightLink"><a href="Main.php?do=commonInternalMailsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addNew">Nuevo mensaje</a></div>|-/if-|</th>
	</tr>
|-/if-|
