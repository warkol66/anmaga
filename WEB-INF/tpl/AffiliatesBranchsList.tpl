<h2>Clientes y Distribuidores Mayoristas </h2> 
<h1>Administración de Sucursales </h1> 
<p>A continuación podrá editar la información de las sucursales.</p> 
<div id="div_branchs">
|-if $message eq "ok"-|<span class="message_ok">Sucursal guardada correctamente</span>|-/if-|
|-if $message eq "deleted_ok"-|<span class="message_ok">Sucursal eliminada correctamente</span>|-/if-|
|-if $all eq "1"-|
	<div class="filter"> 
		<form action="Main.php" method="get"> 
				<label for="affiliateId">Afiliado:</label> 
				<select name="affiliateId"> 
					<option value="" selected="selected">Todos&nbsp;&nbsp;&nbsp;</option> 
					|-foreach from=$affiliates item=affiliate-|
					<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|&nbsp;&nbsp;&nbsp;</option> 
					|-/foreach-|
				</select>
				<input type="hidden" name="do" value="affiliatesBranchsList" /> 
				<input type="submit" value="Buscar" class="button" /> 
		</form> 
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
				<th width="5%" class="thFillTitle">C&oacute;digo</th>
				<th width="15%" class="thFillTitle">Sucursal</th> 
				<th width="10%" class="thFillTitle">Teléfono</th> 
				<th width="10%" class="thFillTitle">Contacto</th> 
				<th width="30%" class="thFillTitle">Memo</th> 
				<th width="5%" nowrap class="thFillTitle">&nbsp;</th> 
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
			<td class="tdSize1 top">|-$branch->getcontact()-|, email: |-$branch->getcontactEmail()-|</td> 
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
	<tr>
		<td colspan="9" class="pages">|-include file="PaginateInclude.tpl"-|</td>
	</tr>
		</tbody> 
	</table> 
</div>
