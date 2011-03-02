|-if $internalMails|@count eq 0-|
	<tr>
		 <td colspan="5">|-if isset($filter)-|No hay mensajes que concuerden con la búsqueda|-else-|No hay mensajes disponibles|-/if-|</td>
	</tr>
|-else-|
	|-foreach from=$internalMails item=internalMail name=for_internalMails-|
	<tr |-if $internalMail->hasBeenRead()-|class="read"|-else-|class="unread"|-/if-| > 
		|-assign var=fromObj value=$internalMail->getFrom()-|
		<td nowrap><a rel="lightbox1" class="lbOn"><img src="images/clear.png" |-if $internalMail->hasBeenRead()-|class="iconRead"|-else-|class="iconUnread"|-/if-| onClick="view(|-$internalMail->getId()-|);return false;"></a></td>
		<td nowrap><input class="selector" type="checkbox" name="selectedIds[]" value="|-$internalMail->getId()-|" /></td>
		<td onClick="view(|-$internalMail->getId()-|);return false;"><a rel="lightbox1" class="lbOn">|-if $internalMail->getFromType() eq 'user' && $internalMail->getFromid() lt 3-||-$fromObj->getName()-||-else-||-$fromObj->getName()-| |-$fromObj->getSurname()-||-/if-|</a></td> 
		<td  nowrap="nowrap" onClick="view(|-$internalMail->getId()-|);return false;"><a rel="lightbox1" class="lbOn" >|-$internalMail->getCreatedAt()|change_timezone|date_format:"%d-%m-%Y %H:%M:%S"-|</a></td> 
		<td onClick="view(|-$internalMail->getId()-|);return false;"><a rel="lightbox1" class="lbOn">|-$internalMail->getSubject()-|</a></td>
	</tr> 
	|-/foreach-|
	|-if isset($pager) && ($pager->getTotalPages() gt 1)-|
	<tr> 
		<td colspan="5" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
	</tr>
	|-/if-|
|-if $internalMails|@count gt 5-|	<tr>
		 <th colspan="5"><div class="rightLink"><a href="Main.php?do=commonInternalMailsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="linkMailNew">Nuevo mensaje</a></div></th>
	</tr>|-/if-|
|-/if-|
