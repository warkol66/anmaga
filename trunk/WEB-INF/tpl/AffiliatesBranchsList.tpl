<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr> 
		<td class='title'>Clientes y Distribuidores Mayoristas </td> 
	</tr> 
	<tr> 
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class='backgroundTitle'>Administración de Sucursales </td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
	<tr> 
		<td class="tdSize2">A continuación podrá editar la información de las sucursales.</td> 
	</tr> 
	<tr> 
		<td>&nbsp;</td> 
	</tr> 
</table>
<div id="div_branchs">
|-if $message eq "ok"-|<span class="message_ok">Sucursal guardada correctamente</span>|-/if-|
|-if $message eq "deleted_ok"-|<span class="message_ok">Sucursal eliminada correctamente</span>|-/if-|
<h3><a href="Main.php?do=affiliatesBranchsEdit">Agregar Sucursal</a></h3> 
|-if $all eq "1"-|
	<div class="filter"> 
		<form action="Main.php" method="get"> 
				<label for="affiliateId">Afiliado:</label> 
				<select name="affiliateId"> 
					<option value="" selected="selected">Todos</option> 
									|-foreach from=$affiliates item=affiliate-|
					<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option> 
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
			<td nowrap class="tdTextOptions center middle"> <form action="Main.php" method="get" style="display:inline;"> 
					<input type="hidden" name="do" value="affiliatesBranchsEdit" /> 
					<input type="hidden" name="id" value="|-$branch->getid()-|" /> 
					<input type="submit" name="submit_go_edit_branch" value="Editar" class="buttonSmall" /> 
				</form> 
				<form action="Main.php" method="post" style="display:inline;"> 
					<input type="hidden" name="do" value="affiliatesBranchsDoDelete" /> 
					<input type="hidden" name="id" value="|-$branch->getid()-|" /> 
					<input type="submit" name="submit_go_delete_branch" value="Borrar" onclick="return confirm('¿Seguro que desea eliminar la sucursal?')" class="buttonSmall" /> 
			</form></td> 
		</tr> 
		|-/foreach-|
	<tr>
		<td colspan="9">|-include file="PaginateInclude.tpl"-|</td>
	</tr>
		</tbody> 
	</table> 
</div>