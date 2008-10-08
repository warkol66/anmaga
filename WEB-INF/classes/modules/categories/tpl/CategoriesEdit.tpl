<h2>##40,Configuración del Sistema##</h2>
	<h1>##139,Editar categorías##</h1>
	<p>##254,A continuación podrá editar las propiedades de la categoría. Para cambiar el nombre modifique el texto y presione aceptar. Para modificar la cantidad de Actores clave de la categoría ingrese el número en la casilla correspondiente. Para finalizar, haga click en "Aceptar" para guardar los cambios.##</p>
<form method='post'>
	<table class='tablaborde' width='100%' border='0' cellspacing='1' cellpadding='0'>
		<tr>
			<th colspan="2">##146,Editar Categoría##</th>
		</tr>
		<tr>
			<td width="30%" nowrap="nowrap" class='titulodato1'>##147,Nombre de la categoría##:</td>
			<td class='celldato'><input name="name" type="text" value='|-$category->getName()-|' size="50" class='textodato' /></td>
		</tr>
		<tr>
			<td colspan="2" class='cellboton'><input type="hidden" name="id" id="id" value="|-$category->getId()-|" />
				<input type="hidden" name="accion" id="accion" value="edicion" />
				<input type="hidden" name="do" id="do" value="categoriesDoEdit" />
				<input type='submit' name="ncat" value="##149,Aceptar##" class='boton' />
			</td>
		</tr>
	</table>
</form>
