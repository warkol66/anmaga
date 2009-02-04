				<h2>Suppliers</h2>
				<div id="div_suppliers">
					|-if $message eq "ok"-|<span class="message_ok">Supplier guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Supplier eliminado correctamente</span>|-/if-|
					|-if $message eq "activated_ok"-|<span class="message_ok">Supplier activado correctamente</span>|-/if-|

					<h3><a href="Main.php?do=importSuppliersEdit">Agregar Supplier</a></h3>
					<table id="tabla-suppliers" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
                								<th class="thFillTitle">id</th>
																<th class="thFillTitle">name</th>
																<th class="thFillTitle">email</th>
																<th class="thFillTitle">active</th>
																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$suppliers item=supplier name=for_suppliers-|
							<tr>
																<td>|-$supplier->getid()-|</td>
																<td>|-$supplier->getname()-|</td>
																<td>|-$supplier->getEmail()-|</td>
																<td>|-$supplier->getactive()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="importSuppliersEdit" />
																				<input type="hidden" name="id" value="|-$supplier->getid()-|" />
																				<input type="submit" name="submit_go_edit_supplier" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importSuppliersDoDelete" />
																				<input type="hidden" name="id" value="|-$supplier->getid()-|" />
																				<input type="submit" name="submit_go_delete_supplier" value="Borrar" onclick="return confirm('Seguro que desea eliminar el supplier?')" class="boton" />
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
						<table id="tabla-suppliers" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
                								<th class="thFillTitle">id</th>
																<th class="thFillTitle">name</th>
																<th class="thFillTitle">active</th>
																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$inactiveSuppliers item=supplier name=for_suppliers-|
							<tr>
																<td>|-$supplier->getid()-|</td>
																<td>|-$supplier->getname()-|</td>
																<td>|-$supplier->getactive()-|</td>
																<td>

									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importSuppliersDoActivate" />
																				<input type="hidden" name="id" value="|-$supplier->getid()-|" />
																				<input type="submit" name="submit_go_delete_supplier" value="Activar" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						
						</tbody>
					</table>

</div>
