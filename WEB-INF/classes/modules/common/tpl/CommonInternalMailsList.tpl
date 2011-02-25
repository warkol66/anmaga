<h2>Servicios</h2>
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
			<tr>
				<td colspan="7" class="tdSearch"><a href="javascript:void(null);" onClick='switch_vis("divSearch");' class="tdTitSearch">Filtros de busqueda</a>
					<div id="divSearch" style="display:|-if $filters|@count gt 0-|block|-else-|none|-/if-|;">
						<form action='Main.php' method='get' style="display:inline;">
							<input type="hidden" name="do" value="commonInternalMailsList" />
							<p>
								<label for="filters[searchSentOnly]" >Enviados</label>
								<input type="checkbox" name="filters[searchSentOnly]" value="true" |-if isset($filters.searchSentOnly)-|checked |-/if-|/>
							</p>
							<p>
								<label for="filters[searchUnreadOnly]" >No leidos</label>
								<input type="checkbox" name="filters[searchUnreadOnly]" value="true" |-if isset($filters.searchUnreadOnly)-|checked |-/if-|/>
							</p>
							<p>
								<label for="filters[searchString]" >Texto a buscar: </label>
								<input name="filters[searchString]" type="text" value="|-if isset($filters.searchString)-||-$filters.searchString-||-/if-|" size="30" title="Ingrese el texto a buscar" />
							</p>
							<p>
								<input type='submit' value='Buscar' class='tdSearchButton' />
							</p>
						</form>
						|-if $filters|@count gt 0-|
						<form  method="get">
							<input type="hidden" name="do" value="commonInternalMailsList" />
							<input type="submit" value="Quitar Filtros" />
						</form>
						|-/if-|
					</div>
				</td>
			</tr>
			<tr>
				<th colspan="4">
					<div class="rightLink">
						<a href="Main.php?do=commonInternalMailsEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="linkMailNew">Nuevo mensaje</a>
					</div>
					<div class="rightLink">&nbsp;&nbsp;
						<a href="#" class="linkMailDelete" onClick="javascript:deleteMessages();return false;">Eliminar</a>&nbsp;&nbsp;
					</div>
					<div class="rightLink">&nbsp;&nbsp;
						<a href="#" class="linkMailMarkRead" onClick="javascript:markAsRead();return false;">Marcar como leido</a>&nbsp;&nbsp;
					</div>
					<div class="rightLink">&nbsp;&nbsp;
						<a href="#" class="linkMailMarkUnread" onClick="javascript:markAsUnread();return false;">Marcar como no leido</a>&nbsp;&nbsp;
					</div>
				</th>
			</tr>
			<tr> 
				<th width="5%">&nbsp;</th> 
				<th width="20%">Remitente</th> 
				<th width="10%">Fecha</th> 
				<th width="65%">Asunto</th> 
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
	
	function view(id) {
		location.href='Main.php?do=commonInternalMailsView&id='+id;
	}
</script>
