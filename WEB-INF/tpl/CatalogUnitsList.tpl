<h2>Catálogo</h2>
<h1>Administración de Unidades</h1>
<div id="div_units"> 
|-if $message eq "ok"-|<span class="message_ok">Unidad guardada correctamente</span>|-/if-| 
|-if $message eq "deleted_ok"-|<span class="message_ok">Unidad eliminada correctamente</span>|-/if-|
	<table class='tableTdBorders' cellpadding='5' cellspacing='1' width='400' id="tabla-units"> 
		<thead> 
			<tr>
				 <th colspan="4" class="thFillTitle"><div class="rightLink"><a href="Main.php?do=catalogUnitsEdit" class="agregarNueva">Agregar Unidad</a></div></th>
			</tr>
			<tr> 
				<th width="20%" nowrap class="thFillTitle">Id</th> 
				<th width="50%" nowrap class="thFillTitle">Nombre</th> 
				<th width="20%" nowrap class="thFillTitle">Cantidad</th> 
				<th width="10%" nowrap class="thFillTitle">&nbsp;</th> 
			</tr> 
		</thead> 
		<tbody>  
		|-foreach from=$units item=unit name=for_units-|
		<tr> 
			<td align="center">|-$unit->getId()-|</td> 
			<td>|-$unit->getName()-|</td> 
			<td align="right">|-$unit->getUnitQuantity()-|</td> 
			<td nowrap> <form action="Main.php" method="get"> 
					<input type="hidden" name="do" value="catalogUnitsEdit" /> 
					<input type="hidden" name="id" value="|-$unit->getid()-|" /> 
					<input type="submit" name="submit_go_edit_unit" value="Editar" class="buttonImageEdit" /> 
				</form> 
				<form action="Main.php" method="post"> 
					<input type="hidden" name="do" value="catalogUnitsDoDelete" /> 
					<input type="hidden" name="id" value="|-$unit->getid()-|" /> 
					<input type="submit" name="submit_go_delete_unit" value="Borrar" onclick="return confirm('Seguro que desea eliminar esta unidad?')" class="buttonImageDelete" /> 
				</form></td> 
		</tr> 
		|-/foreach-|
		</tbody> 
	</table> 
</div>
