				<h2>Branchs</h2>
				<div id="div_branchs">
					|-if $message eq "ok"-|<span class="message_ok">Branch guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Branch eliminado correctamente</span>|-/if-|
					<h3><a href="Main.php?do=affiliatesBranchsEdit">Agregar Branch</a></h3>
		
					|-if $all eq "1"-|								
					<div class="filter">
						<form action="Main.php" method="get">								
							<p>
								<label for="affiliateId">Affiliate</label>
								<select name="affiliateId">
									<option value="" selected="selected">Todos</option>
									|-foreach from=$affiliates item=affiliate-|
									<option value="|-$affiliate->getId()-|">|-$affiliate->getName()-|</option>
									|-/foreach-|
								</select>
							</p>		
							<p>
								<input type="hidden" name="do" value="affiliatesBranchsList" />
								<input type="submit" value="Buscar" class="boton" />
							</p>
						</form>
					</div>	
					|-/if-|				
					
					<table id="tabla-branchs">
						<thead>
							<tr>
                								<th>id</th>
																|-if $all eq "1"-|<th>affiliate</th>|-/if-|
																<th>number</th>
																<th>name</th>
																<th>phone</th>
																<th>contact</th>
																<th>contactEmail</th>
																<th>memo</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$branchs item=branch name=for_branchs-|
							<tr>
																<td>|-$branch->getid()-|</td>
																|-if $all eq "1"-|<td>|-assign var=affiliate value=$branch->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>|-/if-|
																<td>|-$branch->getnumber()-|</td>
																<td>|-$branch->getname()-|</td>
																<td>|-$branch->getphone()-|</td>
																<td>|-$branch->getcontact()-|</td>
																<td>|-$branch->getcontactEmail()-|</td>
																<td>|-$branch->getmemo()-|</td>
																<td>
									<form action="Main.php" method="get">
										<input type="hidden" name="do" value="affiliatesBranchsEdit" />
										<input type="hidden" name="id" value="|-$branch->getid()-|" />
										<input type="submit" name="submit_go_edit_branch" value="Editar" class="boton" />
									</form>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="affiliatesBranchsDoDelete" />
										<input type="hidden" name="id" value="|-$branch->getid()-|" />
										<input type="submit" name="submit_go_delete_branch" value="Borrar" onclick="return confirm('Seguro que desea eliminar el branch?')" class="boton" />
									</form>
								</td>
							</tr>
						|-/foreach-|
						</tbody>
					</table>
				</div>
