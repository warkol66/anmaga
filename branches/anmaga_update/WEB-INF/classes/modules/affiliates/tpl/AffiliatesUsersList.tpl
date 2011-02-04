<h2>Configuración del Sistema</h2>
	<h1>Administración de Usuarios por Afiliados</h1>
	<p>A continuación podrá editar la lista de Usuarios por Afiliados del sistema.</p>
|-if $message eq "deleted"-|
<div align='center' class='successMessage'>Usuario eliminado</div>
|-/if-|
|-if $message eq "activated"-|
<div align='center' class='successMessage'>Usuario reactivado</div>
|-/if-|
|-if $message eq "ownerEdited"-|
<div align='center' class='successMessage'>El dueño ha sido modificado</div>
|-/if-|
|-if $message eq "ownerNotEdited"-|
<div align='center' class='errorMessage'>El dueño no ha sido modificado</div>
|-/if-|

<table cellpadding='5' cellspacing='1' width='100%' class='tableTdBorders'>
|-if $loginUser ne ''-|
<tr>
<td colspan="3">
			<form action="Main.php" method="get">
			<p>Filtrar por Afiliado
			<select name="filters[searchAffiliateId]" onchange="this.form.submit();">
					<option value="0">Seleccione un Afiliado</option>
					<option value="-1">Todos</option>
				|-foreach from=$affiliates item=affiliate name=for_affiliate-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $filters.searchAffiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
				|-/foreach-|
			</select> 
				|-if $filters.searchAffiliateId gt 0-|<input name="rmoveFilters" type="button" value="Quitar filtros" onclick="location.href='Main?do=affiliatesUsersList'" class='boton' />|-/if-|</p>
			<input type="hidden" name="do" value="affiliatesUsersList" />
		</form>
</td>
</tr>
|-/if-|
	<tr class="thFillTitle">
			<th colspan="8"><div class="rightLink"><a href="Main.php?do=affiliatesUsersEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addLink">Agregar ##affiliates,1,Afiliado##</a></div></th>
	</tr>
	<tr>
		<th>Identificación de Usuario</th>
		<th>Afiliado</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$users item=user name=for_users-|
	<tr>
		<td width="64%">|-$user->getUsername()-|</td>
		<td width="34%">|-$user->getAffiliate()-|</td>
		<td width="1%" nowrap>
		    |-if $loginUser ne ''-|
				|-if $user->isAffiliateOwner()-|
					<img src="images/clear.png" class="iconActivate disabled" title="Este es el usuario dueño del afiliado" />
				|-else-|
					<form method="post">
						<input type="hidden" name="userId" value="|-$user->getId()-|" />
						<input type="hidden" name="affiliateId" value="|-$user->getAffiliateId()-|" />
						<input type="hidden" name="do" value="affiliatesSetOwner" />
						<input type="submit" title="Fijar como dueño" value="Fijar como dueño" class="iconActivate" />
					</form>
				|-/if-| 
			|-/if-|
			<form action="Main.php" method="get" style="display:inline;"> 
			  <input type="hidden" name="do" value="affiliatesUsersEdit" /> 
			  <input type="hidden" name="id" value="|-$user->getId()-|" /> 
			  <input type="submit" name="submit_go_edit_affiliate" title="Editar" value="Editar" class="iconEdit" /> 
			</form>
			<form action="Main.php" method="post" style="display:inline;"> 
			  <input type="hidden" name="do" value="affiliatesUsersDoDelete" /> 
			  <input type="hidden" name="id" value="|-$user->getId()-|" /> 
			  <input type="submit" name="submit_go_delete_affiliate" value="Borrar" |-if $user->isAffiliateOwner()-|title="Para eliminar este usuario debe asignar la administración del afiliado a otro usuario" class="iconDelete disabled" onclick="return false;"|-else-|title="Eliminar" class="iconDelete" onclick="return confirm('Seguro que desea eliminar el usuario?')"|-/if-|  /> 
			</form>
		</td>
	</tr>
	|-/foreach-|
	|-if isset($pager) && ($pager->getTotalPages() gt 1)-|
			<tr> 
				<td colspan="8" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
	|-/if-|
	<tr class="thFillTitle">
			<th colspan="8"><div class="rightLink"><a href="Main.php?do=affiliatesUsersEdit|-include file="FiltersRedirectUrlInclude.tpl" filters=$filters-||-if isset($pager) && ($pager->getPage() ne 1)-|&page=|-$pager->getPage()-||-/if-|" class="addLink">Agregar ##affiliates,1,Afiliado##</a></div></th>
	</tr>
</table>

|-if $deletedUsers|@count gt 0-|
<br />
<table width='100%' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'>
	<tr>
		<td colspan='4' class='celltitulo2'>Usuarios Eliminados&nbsp;<a href="javascript:void(null)" class='deta' onClick="alert('Si quiere dar de alta a un usuario que estuvo registrado alguna vez, debe reactivarlo desde esta opción. Si lo intenta desde un usuario nuevo el sistema le informará que ese usuario ya está en uso.')">Ayuda</a> </td>
	</tr>
	<tr>
		<th>Identificación de Usuario</th>
		<th>&nbsp;</th>
	</tr>
	|-foreach from=$deletedUsers item=user name=for_deleted_users-|
	<tr>
		<td width="90%"><div class='titulo2'>|-$user->getUsername()-|</div></td>
		<td width="10%" nowrap class='cellTextOptions'> [ <a href='Main.php?do=affiliatesUsersDoActivate&user=|-$user->getId()-|' class='edit'>Reactivar</a> ] </td>
	</tr>
	|-/foreach-|
</table>
|-/if-|
