				<h2>Measure Units</h2>
				<div id="div_measureunits">
					|-if $message eq "ok"-|<span class="message_ok">Measure Unit guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Measure Unit eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=catalogMeasureUnitsEdit">Agregar Measure Unit</a></h3>
					<table id="tabla-measureunits">
						<thead>
							<tr>
                								<th>id</th>
																<th>name</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$measureunits item=measureunit name=for_measureunits-|
							<tr>
								<td>|-$measureunit->getid()-|</td>
								<td>|-$measureunit->getname()-|</td>
								<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogMeasureUnitsEdit" />
										<input type="hidden" name="id" value="|-$measureunit->getid()-|" />
										<input type="submit" name="submit_go_edit_measureunit" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="catalogMeasureUnitsDoDelete" />
										<input type="hidden" name="id" value="|-$measureunit->getid()-|" />
										<input type="submit" name="submit_go_delete_measureunit" value="Borrar" onclick="return confirm('Seguro que desea eliminar la unidad de medida?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						</tbody>
					</table>
				</div>
