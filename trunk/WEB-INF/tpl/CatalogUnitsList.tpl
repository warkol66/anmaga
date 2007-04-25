				<h2>Unidades</h2>
				<div id="div_units">
					|-if $message eq "ok"-|<span class="message_ok">Unidad guardada correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Unidad eliminada correctamente</span>|-/if-|
					<h3><a href="Main.php?do=catalogUnitsEdit">Agregar Unit</a></h3>
					<table id="tabla-units">
						<thead>
							<tr>
                								<th>id</th>
																<th>name</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$units item=unit name=for_units-|
							<tr>
								<td>|-$unit->getid()-|</td>
								<td>|-$unit->getname()-|</td>
								<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="catalogUnitsEdit" />
										<input type="hidden" name="id" value="|-$unit->getid()-|" />
										<input type="submit" name="submit_go_edit_unit" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="catalogUnitsDoDelete" />
										<input type="hidden" name="id" value="|-$unit->getid()-|" />
										<input type="submit" name="submit_go_delete_unit" value="Borrar" onclick="return confirm('Seguro que desea eliminar esta unidad?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						</tbody>
					</table>
				</div>
