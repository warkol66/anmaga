	<table width="75%" border="0" align="center" cellpadding="0" cellspacing="1" class="tablaborde"> 
		<tr> 
			<th scope="col">Modulo</th>
			<th scope="col">Descripcion</th>
			<th scope="col">Etiqueta</th>
			<th scope="col">Guardar</th> 
		</tr> 
			<form name="moduleEdit" action="Main.php?do=modulesDoEdit" method="POST">
		<tr> 
			<td class="celldato">|-$module->getName()-|
				<input type=hidden name="moduleName" value="|-$module->getName()-|" />
			</td>
			<td class="celldato">
				<textarea rows="2" cols="20" name="description">|-$module->getDescription()-|</textarea>
			</td>
			<td class="celldato">
				<input type="text" name="label" value="|-$module->getLabel()-|" />
			</td>
			<td class="celldato">
				<input type="submit" name="Activar" value="guardar cambios"/> 
			</td> 
		</tr>
		
		</form>
			

	</table> 
	

 