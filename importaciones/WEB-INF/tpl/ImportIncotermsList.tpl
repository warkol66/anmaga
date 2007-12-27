				<h2>Incoterms</h2>
				<div id="div_incoterms">
					|-if $message eq "ok"-|<span class="message_ok">Incoterm guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Incoterm eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=importIncotermsEdit">Agregar Incoterm</a></h3>
					<table id="tabla-incoterms" class='tableTdBorders' cellpadding='5' cellspacing='1' width='100%'>
						<thead>
							<tr>
                								<th class="thFillTitle">id</th>
																<th class="thFillTitle">name</th>
																<th class="thFillTitle">description</th>
																<th class="thFillTitle">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$incoterms item=incoterm name=for_incoterms-|
							<tr>
																<td>|-$incoterm->getid()-|</td>
																<td>|-$incoterm->getname()-|</td>
																<td>|-$incoterm->getdescription()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="importIncotermsEdit" />
																				<input type="hidden" name="id" value="|-$incoterm->getid()-|" />
																				<input type="submit" name="submit_go_edit_incoterm" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importIncotermsDoDelete" />
																				<input type="hidden" name="id" value="|-$incoterm->getid()-|" />
																				<input type="submit" name="submit_go_delete_incoterm" value="Borrar" onclick="return confirm('Seguro que desea eliminar el incoterm?')" class="boton" />
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
