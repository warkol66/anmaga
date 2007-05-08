<br><br>
<table width="75%" border="0" align="center" cellpadding="0" cellspacing="1" class="tablaborde"> 
	<form name="moduleEdit" action="Main.php?do=modulesDoEdit" method="POST">
		<tr> 
			<th scope="col">Modulo</th>
			<td class="celldato">|-$module->getName()-|
				<input type=hidden name="moduleName" value="|-$module->getName()-|" />
			</td>			
		</tr>
		<tr>
			<th scope="col">Descripcion</th>
			<td class="celldato">
				<textarea rows="2" cols="20" name="description">|-$module->getDescription()-|</textarea>
			</td>
		</tr> 
		<tr> 
			<th scope="col">Etiqueta</th>
			<td class="celldato">
				<input type="text" name="label" value="|-$module->getLabel()-|" />
			</td>
		</tr>
		<tr>
			<th scope="col">Guardar</th> 
			<td class="celldato">
				<input type="submit" name="Activar" value="guardar cambios"/> 
			</td> 
		</tr>
	</form>
</table> 
	

 