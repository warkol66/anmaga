				<h2>Ordenes de Pedido</h2>
				<div id="div_incoterms">
					|-if $message eq "ok"-|<span class="message_ok">Orden de pedido guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Orden de Pedido eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=importRequestEdit">Agregar Order de Pedido</a></h3>
					<table id="tabla-incoterms">
						<thead>
							<tr>
                								<th>id</th>
																<th>creada</th>
																<th>id de usuario</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$requests item=request name=for_request-|
							<tr>
																<td>|-$request->getid()-|</td>
																<td>|-$request->getCreatedAt()-|</td>
																<td>|-$request->getUserId()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="importRequestEdit" />
																				<input type="hidden" name="id" value="|-$request->getid()-|" />
																				<input type="submit" name="submit_go_edit_request" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="" />
																				<input type="hidden" name="id" value="|-$request->getid()-|" />
																				<input type="submit" name="submit_go_delete_request" value="Borrar" onclick="return confirm('Seguro que desea eliminar el incoterm?')" class="boton" />
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
