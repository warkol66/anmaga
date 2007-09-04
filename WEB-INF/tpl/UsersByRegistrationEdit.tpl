<table width='760' border='0' cellpadding='0' cellspacing="0" class='fondoffffff'>
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
				|-if $message eq "error_fields"-|
				<tr> 
					<td><div align='center' class='errorMessage'>Error. Complete todos los campos correctamente.</div></td> 
				</tr> 
				|-/if-|
				|-if $message eq "error_passwd"-|
				<tr>
					<td><div align='center' class='errorMessage'>Error. Los passwords proporcionados no concuerdan.</div></td> 
				</tr> 
				|-/if-|
				|-if $message eq "error_username_used"-|
				<tr>
					<td><div align='center' class='errorMessage'>El nombre de usuario se encuentra en uso, por favor ingrese uno distinto.</div></td> 
				</tr> 
				|-/if-|

				<tr> 
					<td>&nbsp;</td> 
				</tr> 

			</table> 
			<form method='post' action="Main.php?do=usersByRegistrationDoEdit"> 
				<center> 
					<table width='520' border="0" cellpadding='5' cellspacing='0' class='tableTdBorders'> 
						<tr> 
							<td colspan='2' class='tdTitle'>Registro de Usuarios.</td> 
						</tr> 
						<tr> 
							<td width='20%' nowrap class='tdTitle'>Identificaci&oacute;n de Usuario</td> 
							<td class='tdData'>
								<input type='text' name='username' size='35' value="|-if isset($userByRegistration)-||-assign var="userinfo" value=$userByRegistration->getUserInfo()-||- $userByRegistration->getUsername() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.username-||-/if-|"/>
							</td> 
						</tr> 
						<tr> 
							<td class='tdTitle'>Contrase&ntilde;a</td> 
							<td class='tdData'>
								<input type='password' name='password' size='20' />
							</td> 
						</tr>
						<tr>
							<td class='tdTitle'>Reingrese Contrase&ntilde;a</td> 
							<td class='tdData'>
								<input type='password' name='check_password' size='20' />
							</td> 
 						</tr>
						<tr>
							<td class='tdTitle'>Apellido</td> 
							<td class='tdData'>
								<input type='text' name='surname' size='20' value="|-if isset($userinfo)-||- $userinfo->getSurname() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.surname-||-/if-|" />
							</td> 
 						</tr>
						<tr>
							<td class='tdTitle'>Nombre</td> 
							<td class='tdData'>
								<input type='text' name='name' size='20'value="|-if isset($userinfo)-||- $userinfo->getName() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.name-||-/if-|" />
							</td> 
 						</tr>
						<tr>
							<td class='tdTitle'>Email</td> 
							<td class='tdData'>
								<input type='text' name='email' size='20' value="|-if isset($userinfo)-||- $userinfo->getMailAddress() -||- /if -||-if $message eq "error_passwd" or $message eq "error_fields"-||-$values.email-||-/if-|" />
								
							</td> 
 						</tr>
						<tr> 
							<td colspan='2' class='buttonCell' align='center'>
								|-if isset($userByRegistration) or isset($values.user_id) -|
									<input type='hidden' name="action" value='update' class='button' />
									<input type='hidden' name="user_id" value='|- if isset($userByRegistration) -||-$userByRegistration->getId() -||-else-||-$values.user_id -||-/if-|'/>
								|- else -|
									<input type='hidden' name="action" value='new' class='button' />
								|-/if-|
									<input type='submit' value='Guardar' class='button' />
								
							</td> 
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
