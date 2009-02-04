				<div id="div_product">
					<form name="form_edit_product" id="form_edit_product" action="Main.php" method="post">
						|-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el product</span>|-/if-|
						<h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Product</h3>
						<p>
							Ingrese los datos del product.
						</p>
						<fieldset title="Formulario de edición de datos de un product">
																																						 			<p>
								<label for="code">code</label>
																								<input type="text" id="code" name="product[code]" value="|-if $action eq "edit"-||-$product->getcode()-||-/if-|" title="code" maxlength="255" />
							</p>
							<p>
								<label for="name">name</label>
								<input type="text" id="name" name="product[name]" value="|-if $action eq "edit"-||-$product->getname()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								<label for="description">description</label>
								<input type="text" id="description" name="product[description]" value="|-if $action eq "edit"-||-$product->getdescription()-||-/if-|" title="description" />
							</p>
							<p>
								<label for="name">name in spanish</label>
								<input type="text" id="nameSpanish" name="product[nameSpanish]" value="|-if $action eq "edit"-||-$product->getnamespanish()-||-/if-|" title="name" maxlength="255" />
							</p>
							<p>
								<label for="description">description in spanish</label>
								<input type="text" id="descriptionSpanish" name="product[descriptionSpanish]" value="|-if $action eq "edit"-||-$product->getdescriptionspanish()-||-/if-|" title="description" />
							</p>															
							<p>
								<label for="supplierId">Supplier</label>
								<select name="productSupplier[supplierId]" name="supplierId">
									|- foreach from=$suppliers item=supplier-|	
									<option value="|-$supplier->getId()-|" |-if ($product->getSupplierId() == $supplier->getId())-|selected="selected"|-/if-|>|-$supplier->getName()-|</option>
									|-/foreach-|
								</select>			
							</p>
							<p>
								<label for="code">supplier product code</label>
								<input type="text" id="productSupplier[code]" name="productSupplier[code]" value="|-if $action eq "edit"-||-$product->getSupplierProductCode()-||-/if-|" title="code" maxlength="255" />
							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="product[id]" id="product[id]" value="|-if $action eq "edit"-||-$product->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="importProductsDoEdit" />
								<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" class="boton" />
							</p>
			      </fieldset>
					</form>
				</div>
