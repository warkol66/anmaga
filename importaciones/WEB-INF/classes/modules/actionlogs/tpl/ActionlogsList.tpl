<script src="scripts/datePicker.js"></script>
<h2>Histórico de Operaciones</h2>
<h1>Consultar Histórico de Operaciones</h1>
|-if $message eq "purged"-|
	<div class='successMessage'>Registros históricos eliminados correctamente</div>
|-/if-|
<div id="searchOptions" style="display:|-if $DISPLAY eq 1-|inline|-else-|none|-/if-|">
<fieldset>
	<legend>Opciones de búsqueda</legend>
		<form name="form1" method="get" action="Main.php">
		<input type='hidden' name='do' value='actionlogsList' />
				<p><label for="selectUser">Usuario</label>
					<select name="selectUser" id="selectUser">
						<option value="-1" selected>Todos</option>
						|-foreach from=$users item=user name=eachuser-|
						<option value="|-$user->getId()-|" |-if $user->getId() eq $selectedUser-|selected="selected"|-/if-|>|-$user->getUsername()-|</option> 
						|-/foreach-|
					</select>
				  </p>
				<p> 
					<label for="dateFrom">Fecha Desde</label>
						<input name="dateFrom" type="text" value="|-$dateFrom-|" size="10">
						&nbsp;&nbsp;<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateFrom', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">  <span class="size4">(dd-mm-aaaa)</span>
					</p>
				<p> 
					<label for="dateTo">Fecha Hasta</label>
						<input name="dateTo" type="text" value="|-$dateTo-|" size="10">
						&nbsp;&nbsp;<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('dateTo', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">  <span class="size4">(dd-mm-aaaa)</span>
					</p>
					<p>
					<label for="selectedModule">Módulo</label>
						<select name="selectedModule" id="select">
						  <option value="-1" selected>Todos</option>
							|-foreach from=$modules item=moduleObj name=foreachModule-|
						  <option value="|-$moduleObj-|" |-if $moduleObj eq $selectedModule-|selected="selected"|-/if-|>|-$moduleObj-|</option>
						  |-/foreach-|
						</select>
					</p>
				|-if count ($affiliates) gt 0 -|
				<p> 
					<label for="affiliateId">Afiliado</label>
						<select name="affiliateId" id="affiliateId">
						  <option value="-1" selected>Todos</option>
						  |-foreach from=$affiliates item=affiliateItem name=foreachaff-|
						  <option value="|-$affiliateItem->getId()-|" |-if $affiliateItem->getId() eq $affiliateId-|selected="selected"|-/if-|>|-$affiliateItem->getName()-|</option>
						  |-/foreach-|
						</select>
					</p>
				|-/if-|
				<p>
					<input name="listButton" type="submit" class="button" id="listButton" value="Listar">
					<input name="listLogs" type="hidden" class="button" id="listLogs" value="listLogs">
			 </p>
			</form>
			 </fieldset>
			 </div>
		|-if $DISPLAY eq 1-| 
	<h4>Administración del Archivo Histórico</h4>
	<p>Puede eliminar registros históricos en 
	  <input name="btnPurgarLogs" type="submit" class="botonchico" value="Purga de Datos" onClick="location.href='Main.php?do=actionlogsPurge'" /> 
	</p>
|-else-|
<input name="showSearch" type="button" class="button" id="showSearch" value="Ver Opciones de Búsqueda" onClick="javascript:switch_vis('searchOptions');" />
	<h4>Resultado de su consulta al histórico de operaciones del Sistema |-if $affiliateId gt 0-| del afiliado |-$affiliate->getName()-||-/if-|</h4>
		<table width="100%"  border="0" cellpadding="4" cellspacing="0" class="tableTdBorders">
			<tr> 
				<th width="10%" nowrap scope="col">Fecha y Hora</th>
				<th width="10%" scope="col">Usuario</th>
				<th width="30%" scope="col">Módulo</th>
				<th width="50%" scope="col">Acción</th>
			</tr>
			|-if $logs|@count eq 0-|  
			<tr> 
				<td colspan='4' scope="col">No hay registros que coincidan con su consulta.</td>
			</tr>
			|-else-| 
			 |-foreach from=$logs item=log name=eachlog-|
			 	
			<tr> 
			  <td nowrap scope="col">|-$log->getDatetime()-|</td>
			  <td nowrap scope="col">|-assign var="user" value=$log->getUser()-||-if $user ne ''-||-$user->getUsername()-||-/if-|</td>
			  <td scope="col" >|-assign var="securityAction" value=$log->getSecurityAction()-||-if $securityAction ne ''-||-$securityAction->getModule()-|/|-/if-||-$log->getAction()-|</td>
			  <td scope="col" >|-assign var="label" value=$log->getLabel()-||-if $label ne ''-||-$label->getLabel()-||-/if-||-$log->getLabel()-||-if $log->getObject() ne ''-|:|-$log->getObject()-||-/if-|</td>
			</tr>
			|-/foreach-|
			<tr>
			<td colspan="4" class="pages">|-include file="PaginateInclude.tpl"-|</td>
			</tr>
			|-/if-| 
  <tr>
		<td colspan="4"><input name="btnRegresar" type="button" class="button" id="regresar" value="Regresar" onClick="location.href='Main.php?do=logsList'" />
	</td>
  </tr>
</table>
            
   |-/if-|
