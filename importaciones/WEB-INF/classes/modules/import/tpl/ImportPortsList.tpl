				<h2>Ports</h2>
				<div id="div_ports">
					|-if $message eq "ok"-|<span class="message_ok">Port guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Port eliminado correctamente</span>|-/if-|
					|-if $message eq "activated_ok"-|<span class="message_ok">Port activado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=importPortsEdit">Agregar Port</a></h3>
					<table id="tabla-ports" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
																<th class="thFillTitle">code</th>
																<th class="thFillTitle">name</th>																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$ports item=port name=for_ports-|
							<tr>
																<td>|-$port->getcode()-|</td>
																<td>|-$port->getname()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="importPortsEdit" />
																				<input type="hidden" name="id" value="|-$port->getid()-|" />
																				<input type="submit" name="submit_go_edit_port" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importPortsDoDelete" />
																				<input type="hidden" name="id" value="|-$port->getid()-|" />
																				<input type="submit" name="submit_go_delete_port" value="Borrar" onclick="return confirm('Seguro que desea eliminar el port?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|						
							<tr> 
								<td colspan="9">|-include file="PaginateInclude.tpl"-|</td> 
							</tr>							
						
						</tbody>
					</table>
				</div>
<br />
<h3>Inactivos</h3>
<div >
						<table id="tabla-ports-inactive" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
																<th class="thFillTitle">code</th>
																<th class="thFillTitle">name</th>																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$inactivePorts item=port name=for_ports-|
							<tr>
																<td>|-$port->getcode()-|</td>
																<td>|-$port->getname()-|</td>
																<td>
									
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importPortsDoActivate" />
																				<input type="hidden" name="id" value="|-$port->getid()-|" />
																				<input type="submit" name="submit_go_delete_port" value="Activar" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|												
						</tbody>
					</table>

</div>
