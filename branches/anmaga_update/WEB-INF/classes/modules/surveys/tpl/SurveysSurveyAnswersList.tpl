<h2>Encuestas</h2>
<h1>Administracion de Respuestas a Encuestas</h1>
				<div id="div_surveyanswers">
<p>					
					|-if $message eq "ok"-|<span class="message_ok">Survey Answer guardado correctamente</span>|-/if-|
					|-if $message eq "deleted_ok"-|<span class="message_ok">Survey Answer eliminado correctamente</span>|-/if-|
</p>
					<table id="tabla-surveyanswers" class="tableTdBorders">
						<thead>
							<tr>
                								<th>id</th>
																<th>Pregunta</th>
																<th>Numero de Respuesta Seleccionada</th>
																<th>Usuario</th>
																<th>Fecha de Creacion</th>
																<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
						|-foreach from=$surveyanswers item=surveyanswer name=for_surveyanswers-|
							<tr>
																<td>|-$surveyanswer->getid()-|</td>
																<td>|-assign var=question value=$surveyanswer->getSurveyQuestion()-|
																	|-$question->getQuestion()-|</td>
																<td>|-$surveyanswer->getanswerOptionId()-|</td>
																|-assign var=user value=$surveyanswer->getRegistrationUser()-|
																<td>|-if $user eq ''-|Respuesta Publica|-else-||-$user->getUsername()-||-/if-|</td>
																<td>|-$surveyanswer->getcreatedAt()-|</td>
																<td>
									<form action="Main.php" method="post">
										<input type="hidden" name="do" value="surveysSurveyAnswersDoDelete" />
																				<input type="hidden" name="id" value="|-$surveyanswer->getid()-|" />
																				<input type="submit" name="submit_go_delete_surveyanswer" value="Borrar" onclick="return confirm('Seguro que desea eliminar el surveyanswer?')" />
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
