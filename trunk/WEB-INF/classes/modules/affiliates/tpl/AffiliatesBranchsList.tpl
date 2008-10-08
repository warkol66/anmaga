<h2>Clientes y Distribuidores Mayoristas </h2> 
<h1>Administración de Sucursales </h1> 
<p>A continuación podrá editar la información de las sucursales.</p> 
<div id="div_branchs">
|-if $message eq "ok"-|
	<div class="successMessage">Sucursal guardada correctamente</div>
|-elseif $message eq "deleted_ok"-|
	<div class="successMessage">Sucursal eliminada correctamente</div>
|-/if-|
|-if $all eq "1"-|
	<div class="filter">
	<p> 
		<form action="Main.php" method="get"> 
				<label for="affiliateId">Afiliado:</label> 
				<select name="affiliateId"> 
					<option value="">Todos</option> 
					|-foreach from=$affiliates item=affiliate-|
					<option value="|-$affiliate->getId()-|"|-if $affiliate->getId() eq $smarty.get.affiliateId-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option> 
					|-/foreach-|
				</select>
				<input type="hidden" name="do" value="affiliatesBranchsList" /> 
				<input type="submit" value="Buscar" class="button" /> 
		</form> 
		</p>
	</div>
	<br>
|-/if-|
	<table width="100%" border="0" cellpadding="5" cellspacing="0" id="tabla-branchs" class="tableTdBorders"> 
		<thead> 
			<tr>
				<th colspan="9"><div class="rightLink"><a href="Main.php?do=affiliatesBranchsEdit" class="agregarNueva">Agregar Sucursal</a></div></th>
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
				<th width="5%"  class="thFillTitle">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>  |-foreach from=$branchs item=branch name=for_branchs-|
		<tr> 
			<td nowrap class="tdSize1 top center">|-$branch->getid()-|</td> 
			|-if $all eq "1"-| 
			<td class="tdSize1 top">|-assign var=affiliate value=$branch->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td> 
			|-/if-|
			<td class="tdSize1 top center">|-$branch->getnumber()-|</td> 
      <td class="tdSize1 top center">|-$branch->getCode()-|</td> 
			<td class="tdSize1 top">|-$branch->getname()-|</td> 
			<td class="tdSize1 top">|-$branch->getphone()-|</td> 
			<td class="tdSize1 top">|-$branch->getcontact()-||-if $branch->getcontactEmail() ne ''-|, email: |-$branch->getcontactEmail()-||-/if-|</td> 
			<td class="tdSize1 top">|-$branch->getmemo()-|</td> 
			<td class="tdSize1 center" nowrap="nowrap"> <form action="Main.php" method="get" style="display:inline;"> 
					<input type="hidden" name="do" value="affiliatesBranchsEdit" /> 
					<input type="hidden" name="id" value="|-$branch->getid()-|" /> 
					<input type="submit" name="submit_go_edit_branch" value="Editar" class="buttonImageEdit" /> 
				</form> 
				<form action="Main.php" method="post" style="display:inline;"> 
					<input type="hidden" name="do" value="affiliatesBranchsDoDelete" /> 
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
				<th colspan="9"><div class="rightLink"><a href="Main.php?do=affiliatesBranchsEdit" class="agregarNueva">Agregar Sucursal</a></div></th>
			</tr>
		</tbody> 
	</table> 
</div>
