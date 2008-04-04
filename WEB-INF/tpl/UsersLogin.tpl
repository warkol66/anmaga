<script type="text/javascript" language="javascript" src="scripts/login.js"></script>
<table width='760' border='0' cellpadding='0' cellspacing="0" class='fondoffffff'>
	<tr> 
		<td class="cabezal">&nbsp;</td> 
	</tr> 
	<tr> 
		<td><!--fin encabezado --> 
			<table border='0' cellpadding='0' cellspacing='0' width='520' align='center'> 
				<tr> 
					<td>&nbsp;</td> 
				</tr> 
				<tr> 
					<td class='backgroundTitle'>Bienvenido al Sistema |-$parameters.siteName-|</td> 
				</tr> 
				<tr> 
					<td>&nbsp;</td> 
				</tr> 
				|-if $message eq "wrongUser"-|
				<tr> 
					<td><div align='center' class='errorMessage'>Usuario desconocido o contrase&ntilde;a incorrecta!. Intente nuevamente.</div></td> 
				</tr> 
				|-/if-|
				|-if $message eq "passwordSent"-|
				<tr>
					<td><div align='center' class='errorMessage'>Se envio una nueva contrase&ntilde;a a su casilla de correo.</div></td> 
				</tr> 
				|-/if-|
				<tr> 
					<td>&nbsp;</td> 
				</tr> 
			</table> 
			<form method='post' action="Main.php?do=usersDoLogin"> 
				<center> 
					<table width='520' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'> 
						<tr> 
							<td colspan='2' class='tdTitle'>Ingrese su Identificaci&oacute;n de usuario y contrase&ntilde;a para ingresar al sistema</td> 
						</tr> 
			|- if isset($unifiedLogin) -|
				|-if !$onlyAdmin -|				
						<tr>
							<td nowrap class='tdTitle'>Tipo de Usuario</td>
							<td class='tdData'>
								<select id="select" name="select" onchange="javascript:changeAction(this.form)">
			   						<option value="admin" selected="selected">Administrador&nbsp;&nbsp;&nbsp;</option>
			   						<option value="affiliate">Mayorista&nbsp;&nbsp;&nbsp;</option>
			   					</select>
							</td>
						</tr>
			   |-/if-|
			|-/if-|
						<tr> 
							<td width='20%' nowrap class='tdTitle'>Identificaci&oacute;n de Usuario</td> 
							<td class='tdData'><input type='text' name='username' size='35' /></td> 
						</tr> 
						<tr> 
							<td class='tdTitle'>Contrase&ntilde;a</td> 
							<td class='tdData'><input type='password' name='password' size='20' /></td> 
						</tr> 
						<tr> 
							<td colspan='2' class='buttonCell' align='center'><input type='submit' value='Ingresar' class='button' /></td> 
						</tr> 
					</table> 
				</center> 
			</form> 
			<br /> 
			<br /> 
			<br /> 
			<script>
	self.moveTo(0,0); self.resizeTo(screen.availWidth,screen.availHeight)
	self.focus()
</script> 
			<!--inicio de pie --> </td> 
	</tr> 
</table>
