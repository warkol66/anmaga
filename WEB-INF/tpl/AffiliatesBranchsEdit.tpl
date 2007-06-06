				<div id="div_branch">
					<form name="form_edit_branch" id="form_edit_branch" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el branch</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Branch</h3>
						<p>
							Ingrese los datos del branch.
						</p>
						<fieldset title="Formulario de edición de datos de un branch">
							|-if $all eq "1"-|
							<p>
								<label for="affiliateId">affiliateId</label>
								<select id="affiliateId" name="affiliateId">
									<option value="">Seleccionar Afiliado</option>
									|-foreach from=$affiliates item=affiliate-|
									<option value="|-$affiliate->getId()-|"|-if $action eq "edit" and $branch->getAffiliateId() eq $affiliate->getId()-| selected="selected"|-/if-|>|-$affiliate->getName()-|</option>
									|-/foreach-|									
								</select> 
							</p>
							|-/if-|
							<p>
								<label for="number">number</label>
								<input type="text" id="number" name="number" value="|-if $action eq "edit"-||-$branch->getnumber()-||-/if-|" title="number" />
							</p>
							<p>
								<label for="name">name</label>
								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$branch->getname()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								<label for="phone">phone</label>
								<input type="text" id="phone" name="phone" value="|-if $action eq "edit"-||-$branch->getphone()-||-/if-|" title="phone" maxlength="100" />
							</p>
							<p>
								<label for="contact">contact</label>
								<input type="text" id="contact" name="contact" value="|-if $action eq "edit"-||-$branch->getcontact()-||-/if-|" title="contact" maxlength="50" />
							</p>
							<p>
								<label for="contactEmail">contactEmail</label>
								<input type="text" id="contactEmail" name="contactEmail" value="|-if $action eq "edit"-||-$branch->getcontactEmail()-||-/if-|" title="contactEmail" maxlength="100" />
							</p>
							<p>
								<label for="memo">memo</label>
								<textarea id="memo" name="memo">|-if $action eq "edit"-||-$branch->getmemo()-||-/if-|</textarea>
							</p>
							<p>
								|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$branch->getid()-||-/if-|" />
								|-/if-|
								<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="affiliatesBranchsDoEdit" />
								<input type="submit" id="button_edit_branch" name="button_edit_branch" title="Aceptar" value="Aceptar" class="boton" />
							</p>
						</fieldset>
					</form>
				</div>
