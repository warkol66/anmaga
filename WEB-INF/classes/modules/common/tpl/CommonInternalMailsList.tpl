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
					<div id="divSearch" style="display:|-if $filters|@count gt 0-|block|-else-|none|-/if-|;">
						<form action='Main.php' method='get' style="display:inline;">
							<input type="hidden" name="do" value="commonInternalMailsList" />
							Texto a buscar: <input name="filters[searchString]" type="text" value="|-if isset($filters.searchString)-||-$filters.searchString-||-/if-|" size="30" title="Ingrese el texto a buscar" />
							&nbsp;&nbsp;<input type='submit' value='Buscar' class='tdSearchButton' />
						</form>
						|-if $filters|@count gt 0-|
						<form  method="get">
							<input type="hidden" name="do" value="commonSchedulesSubscriptionsList" />
							<input type="submit" value="Quitar Filtros" />
						</form>
						|-/if-|
					</div>
				</td>
			</tr>
			|-/if-|
			<tr>
				<th colspan="3" class="thFillTitle">
					<div class="rightLink">
						<a href="Main.php?do=commonInternalMailsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addNew">Nuevo mensaje</a>
					</div>
					<div class="rightLink">
						<a href="#" class="addNew" onClick="javascript:deleteMessages();return false;">Eliminar</a>
					</div>
					<div class="rightLink">
						<a href="#" class="addNew" onClick="javascript:markAsRead();return false;">Marcar como leido</a>
					</div>
					<div class="rightLink">
						<a href="#" class="addNew" onClick="javascript:markAsUnread();return false;">Marcar como no leido</a>
					</div>
				</th>
			</tr>
			<tr class="thFillTitle"> 
				<th width="2.5%">&nbsp;</th> 
				<th width="30%">Remitente</th> 
				<th width="67.5%">Asunto</th> 
			</tr> 
		</thead> 
		<tbody id="internalMailsList">
			|-include file="CommonInternalMailsListTableBodyInclude.tpl"-|
		</tbody> 
	</table> 
</div>
<script type="text/javascript" language="javascript" charset="utf-8">
	function deleteMessages() {
		var fields = Form.serializeElements($$('.selector')) + Form.serializeElements($$('#page'));
		var myAjax = new Ajax.Updater(
			{success: 'internalMailsList'},
			'Main.php?do=commonInternalMailsDoDeleteX',
			{
				method: 'post',
				postBody: fields,
				evalScripts: true
			}
		);
		return true;
	}
	
	function markAsRead() {
		var fields = Form.serializeElements($$('.selector')) + Form.serializeElements($$('#page'));
		var myAjax = new Ajax.Updater(
			{success: 'internalMailsList'},
			'Main.php?do=commonInternalMailsDoMarkAsReadX',
			{
				method: 'post',
				postBody: fields,
				evalScripts: true
			}
		);
		return true;
	}
	
	function markAsUnread() {
		var fields = Form.serializeElements($$('.selector')) + Form.serializeElements($$('#page')) + '&reverse=true';
		var myAjax = new Ajax.Updater(
			{success: 'internalMailsList'},
			'Main.php?do=commonInternalMailsDoMarkAsReadX',
			{
				method: 'post',
				postBody: fields,
				evalScripts: true
			}
		);
		return true;
	}
</script>
