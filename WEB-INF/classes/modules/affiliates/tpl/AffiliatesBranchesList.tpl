<h2>##40,Configuración del Sistema##</h2>
<h1>Administración de Sucursales</h1>
<!-- Link VOLVER -->
<!-- /Link VOLVER -->
|-if $accion eq "edit"-|
	<p class='paragraphEdit'>##180,Realice los cambios en la sucursal y haga click en "Guardar Cambios" para guardar las modificaciones. ##</p>
|-else-|
	<p>A continuación podrá editar la información de las sucursales.</p>
|-/if-|
<div id="div_branches">
|-if $message eq "ok"-|
	<span class="successMessage">Sucursal guardada correctamente</span>
|-elseif $message eq "deleted_ok"-|
	<span class="successMessage">Sucursal eliminada correctamente</span>
|-/if-|
|-if $all eq "1"-|
	<div class="filter"> 
		<form action="Main.php" method="get"> 
				<label for="affiliateId">Afiliado:</label> 
				<select name="affiliateId"> 
					<option value="" selected="selected">Todos los afiliados</option> 
					|-foreach from=$affiliates item=affiliate-|
					<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option> 
					|-/foreach-|
				</select>
				<input type="hidden" name="do" value="affiliatesBranchesList" /> 
				<input type="submit" value="Buscar" class="button" /> 
		</form> 
	</div>
	<br>
	|-/if-|
	<table width="100%" border="0" cellpadding="5" cellspacing="0" id="tabla-branches" class="tableTdBorders"> 
		<thead> 
			<tr>
				 <th colspan="|-if $all eq '1'-|9|-else-|8|-/if-|" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=affiliatesBranchesEdit" class="addLink">Agregar Sucursal</a></div></th>
			</tr>
			<tr> 
				<th width="5%" class="thFillTitle">Id</th> 
				|-if $all eq "1"-| 
				<th width="20%" class="thFillTitle">Afiliado</th> 
				|-/if-|
				<th width="5%" class="thFillTitle">Nro.</th> 
				<th width="5%" class="thFillTitle">Código</th>
				<th width="15%" class="thFillTitle">Sucursal</th> 
				<th width="10%" class="thFillTitle">Teléfono</th> 
				<th width="10%" class="thFillTitle">Contacto</th> 
				<th width="30%" class="thFillTitle">Memo</th> 
				<th width="5%" nowrap class="thFillTitle">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>  |-foreach from=$branches item=branch name=for_branches-|
			<tr> 
				<td nowrap class="tdSize1 top center">|-$branch->getid()-|</td> 
				|-if $all eq "1"-| 
				<td class="tdSize1 top">|-assign var=affiliate value=$branch->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td> 
				|-/if-|
				<td class="tdSize1 top center">|-$branch->getnumber()-|</td> 
				<td class="tdSize1 top center">|-$branch->getCode()-|</td> 
				<td class="tdSize1 top">|-$branch->getname()-|</td> 
				<td class="tdSize1 top">|-$branch->getphone()-|</td> 
				<td class="tdSize1 top">|-$branch->getcontact()-|, email: |-$branch->getcontactEmail()-|</td> 
				<td class="tdSize1 top">|-$branch->getmemo()-|</td> 
				<td class="tdSize1 center" nowrap="nowrap"> <form action="Main.php" method="get" style="display:inline;"> 
						<input type="hidden" name="do" value="affiliatesBranchesEdit" /> 
						<input type="hidden" name="id" value="|-$branch->getid()-|" /> 
						<input type="submit" name="submit_go_edit_branch" value="Editar" class="buttonImageEdit" /> 
					</form> 
					<form action="Main.php" method="post" style="display:inline;"> 
						<input type="hidden" name="do" value="affiliatesBranchesDoDelete" /> 
						<input type="hidden" name="id" value="|-$branch->getid()-|" /> 
						<input type="submit" name="submit_go_delete_branch" value="Borrar" onclick="return confirm('¿Seguro que desea eliminar la sucursal?')" class="buttonImageDelete" /> 
				</form></td> 
			</tr> 
			|-/foreach-|
		|-if $pager->getTotalPages() gt 1-|
			<tr> 
				<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td> 
			</tr>							
		|-/if-|						
			<tr>
				 <th colspan="|-if $all eq '1'-|9|-else-|8|-/if-|" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=affiliatesBranchesEdit" class="addLink">Agregar Sucursal</a></div></th>
			</tr>
		</tbody> 
	</table> 
</div>
