				<h2>Cuentas bancarias</h2>
				<div id="div_bankaccounts">
					|-if $message eq "ok"-|<span class="message_ok">Cuentas bancaria guardada correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Cuentas bancaria eliminada correctamente</span>|-/if-|
					<h3><a href="Main.php?do=importBankAccountsEdit">Agregar Cuentas bancaria</a></h3>
					<table id="tabla-bankaccounts">
						<thead>
							<tr>
                				<th>ID</th>
								<th>Banco</th>                				
								<th>Número</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$bankaccounts item=bankaccount name=for_bankaccounts-|
							<tr>
								<td>|-$bankaccount->getid()-|</td>
								<td>|-$bankaccount->getbank()-|</td>
								<td>|-$bankaccount->getaccountNumber()-|</td>
								<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="importBankAccountsEdit" />
										<input type="hidden" name="id" value="|-$bankaccount->getid()-|" />
										<input type="submit" name="submit_go_edit_bankaccount" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="importBankAccountsDoDelete" />
										<input type="hidden" name="id" value="|-$bankaccount->getid()-|" />
										<input type="submit" name="submit_go_delete_bankaccount" value="Borrar" onclick="return confirm('Seguro que desea eliminar la cuenta?')" class="boton" />
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