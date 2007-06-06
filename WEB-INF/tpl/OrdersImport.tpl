				<h2>Importar Orden</h2>
				
				|-if $results ne ""-|
					<ul>
						<li>Ordenes Creadas: |-$results.ordersCreated-|</li>
						<li>Ordenes No Creadas: |-$results.ordersNotCreated-|</li>
						<li>Productos Encontrados: |-$results.productsFound-|</li>
						<li>Productos No Encontrados: |-$results.productsNotFound-|</li>
					</ul>
				|-/if-|
					
				<div>
					<form action="Main.php" method="post" enctype="multipart/form-data">
						|-if $affiliates|@count gt 0-|
						<p>
							<label for="affiliateId">Affiliate:</label>
							<select name="affiliateId">
								<option value="" selected="selected">Seleccionar</option>
								|-foreach from=$affiliates item=affiliate-|
								<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
								|-/foreach-|
							</select>
						</p>						
						|-/if-|
						<p>
							<label for="csv">Archivo CSV de ordenes:</label>
							<input type="file" name="csv" id="csv" />
						</p>
						<p>
							<input type="hidden" name="do" id="do" value="ordersDoImport" />
							<input type="submit" value="Import" />
						</p>
					</form>
				</div>
