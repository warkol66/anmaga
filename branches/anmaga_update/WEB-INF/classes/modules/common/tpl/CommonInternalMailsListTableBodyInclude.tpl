|-if $internalMails|@count eq 0-|
	<tr>
		 <td colspan="4">|-if isset($filter)-|No hay mensajes que concuerden con la búsqueda|-else-|No hay mensajes disponibles|-/if-|</td>
	</tr>
|-else-|
	|-foreach from=$internalMails item=internalMail name=for_internalMails-|
	<tr |-if $internalMail->hasBeenRead()-|class="read"|-else-|class="unread"|-/if-| > 
		|-assign var=fromObj value=$internalMail->getFrom()-|
		<td nowrap><input class="selector" type="checkbox" name="selectedIds[]" value="|-$internalMail->getId()-|" /></td>
		<td onClick="view(|-$internalMail->getId()-|);return false;"><a rel="lightbox1" class="lbOn">|-$fromObj->getName()-|</a></td> 
		<td onClick="view(|-$internalMail->getId()-|);return false;"><a rel="lightbox1" class="lbOn" nowrap="nowrap" >|-$internalMail->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y %H:%M:%S"-|</a></td> 
		<td onClick="view(|-$internalMail->getId()-|);return false;"><a rel="lightbox1" class="lbOn">|-$internalMail->getSubject()-|</a></td>
	</tr> 
	|-/foreach-|
	|-if isset($pager) && ($pager->getTotalPages() gt 1)-|
	<tr> 
		<td colspan="4" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
	</tr>
	|-/if-|
|-if $internalMails|@count gt 5-|	<tr>
		 <th colspan="4"><div class="rightLink"><a href="Main.php?do=commonInternalMailsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addNew">Nuevo mensaje</a></div></th>
	</tr>|-/if-|
|-/if-|
