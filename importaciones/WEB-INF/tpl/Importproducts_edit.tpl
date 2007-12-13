|-include file="header.tpl"-|
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
																								<input type="text" id="code" name="code" value="|-if $action eq "edit"-||-$product->getcode()-||-/if-|" title="code" maxlength="255" />
																							</p>
														<p>
								<label for="name">name</label>
																								<input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$product->getname()-||-/if-|" title="name" maxlength="255" />
																							</p>
														<p>
								<label for="description">description</label>
																								<input type="text" id="description" name="description" value="|-if $action eq "edit"-||-$product->getdescription()-||-/if-|" title="description" maxlength="255" />
																							</p>
														<p>
								<label for="price">price</label>
																								<input type="text" id="price" name="price" value="|-if $action eq "edit"-||-$product->getprice()-||-/if-|" title="price" />
																							</p>
														<p>
								<label for="image">image</label>
																								<input type="text" id="image" name="image" value="|-if $action eq "edit"-||-$product->getimage()-||-/if-|" title="image" maxlength="255" />
																							</p>
														<p>
																|-if $action eq "edit"-|
								<input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$product->getid()-||-/if-|" />
								|-/if-|
																<input type="hidden" name="action" id="action" value="|-$action-|" />
								<input type="hidden" name="do" id="do" value="productsDoEdit" />
								<input type="submit" id="button_edit_product" name="button_edit_product" title="Aceptar" value="Aceptar" class="boton" onmouseover="this.className='botono'" onmouseout="this.className='boton'" />
							</p>
			      </fieldset>
					</form>
				</div>
|-include file="footer.tpl"-|