<h2>Tablero de Gestión</h2>
<h1>Administración de Mensajes.</h1>
<p>A continuación se muestra la lista de mensajes.</p>
<div id="div_internalMails"> 
	|-if $message eq "ok"-|
		<div class="successMessage">Mensaje enviado correctamente</div>
	|-elseif $message eq "deleted_ok"-|
		<div class="successMessage">Mensaje eliminado correctamente</div>
	|-/if-|
	<table id="tabla-internalMails" class='tableTdBorders' cellpadding='5' cellspacing='0' width='100%'> 
		<thead> 
			|-if 0-||-*esto no lo queremos por ahora*-|
			<tr>
				<td colspan="7" class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch">Busqueda de suscripciones a agendas</a>
					<div id="divSearch" style="display:|-if $filters|@count gt 0-|block|-else-|none|-/if-|;"><form action='Main.php' method='get' style="display:inline;">
						<input type="hidden" name="do" value="commonInternalMailsList" />
						Texto a buscar: <input name="filters[searchString]" type="text" value="|-if isset($filters.searchString)-||-$filters.searchString-||-/if-|" size="30" title="Ingrese el texto a buscar" />
	
						&nbsp;&nbsp;<input type='submit' value='Buscar' class='tdSearchButton' />
				</form>
						|-if $filters|@count gt 0-|<form  method="get">
					<input type="hidden" name="do" value="commonSchedulesSubscriptionsList" />
					<input type="submit" value="Quitar Filtros" />
			</form>|-/if-|</div></td>
			|-/if-|
			</tr>
			<tr>
				<th colspan="7" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=commonInternalMailsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addNew">Nuevo mensaje</a></div></th>
			</tr>
			<tr class="thFillTitle"> 
				<th width="55%">Remitente</th> 
				<th width="40%">Asunto</th> 
				<th width="5%">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>
		|-if $internalMails|@count eq 0-|
			<tr>
				 <td colspan="7">|-if isset($filter)-|No hay mensajes que concuerden con la búsqueda|-else-|No hay mensajes disponibles|-/if-|</td>
			</tr>
		|-else-|
			|-foreach from=$internalMails item=internalMail name=for_internalMails-|
			<tr> 
				|-assign var=fromObj value=$internalMail->getFrom()-|
				<td>|-$fromObj->getName()-|</td> 
				<td>|-$internalMail->getSubject()-|</td>
				<td nowrap>
					<form action="Main.php" method="get" style="display:inline;"> 
						<input type="hidden" name="do" value="commonInternalMailsEdit" /> 
							|-include file="FiltersRedirectInclude.tpl" filters=$filters-|
							|-if isset($pager) && ($pager->getPage() ne 1)-| <input type="hidden" name="page" id="page" value="|-$pager->getPage()-|" />|-/if-|
						<input type="hidden" name="id" value="|-$internalMail->getid()-|" /> 
						<input type="submit" name="submit_go_edit_internalMail" value="Editar" disabled class="buttonImageEditDisabled" /> 
					</form>
					|-if $loginUser ne '' && ($loginUser->isAdmin() || $loginUser->isSupervisor())-|
					<form action="Main.php" method="post" style="display:inline;"> 
						<input type="hidden" name="do" value="commonInternalMailsDoDelete" /> 
							|-include file="FiltersRedirectInclude.tpl" filters=$filters-|
							|-if isset($pager) && ($pager->getPage() ne 1)-| <input type="hidden" name="page" id="page" value="|-$pager->getPage()-|" />|-/if-|
						<input type="hidden" name="id" value="|-$internalMail->getid()-|" /> 
						<input type="submit" name="submit_go_delete_internalMail" value="Borrar" disabled onclick="return confirm('Seguro que desea eliminar este acto?')" class="buttonImageDeleteDisabled" /> 
					</form>
					|-/if-|
				</td> 
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
		</tbody> 
	</table> 
</div>
