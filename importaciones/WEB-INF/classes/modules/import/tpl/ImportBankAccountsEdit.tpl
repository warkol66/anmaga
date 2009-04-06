				<div id="div_bankaccount">
					<form name="form_edit_bankaccount" id="form_edit_bankaccount" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el cuentas bancaria</span>|-/if-|
						<h3>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Cuentas bancaria</h3>
						<p>
							Ingrese los datos del cuentas bancaria.
						</p>
						<fieldset title="Formulario de edici�n de datos de un cuentas bancaria">
							<p>
								<label for="bankaccount_bank">Banco</label>
								<input type="text" id="bankaccount_bank" name="bankaccount[bank]" value="|-$bankaccount->getbank()-|" title="Banco" maxlength="255" />
							</p>						
							<p>
								<label for="bankaccount_accountNumber">Número de Cuenta</label>
								<input type="text" id="bankaccount_accountNumber" name="bankaccount[accountNumber]" value="|-$bankaccount->getaccountNumber()-|" title="Numero de Cuenta" maxlength="255" />
							</p>
							<p>
								|-if $action eq "edit"-|
								<input type="hidden" name="bankaccount[id]" id="bankaccount_id" value="|-$bankaccount->getid()-|" />
								|-/if-|
								<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="importBankAccountsDoEdit" />
								<input type="submit" id="button_edit_bankaccount" name="button_edit_bankaccount" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      		</fieldset>
					</form>
				</div>