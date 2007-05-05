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
								<td class='fondotitulo'>Bienvenido al Sistema de |-$parameters.siteName-|</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table>
						|-if $message eq "wrongUser"-|
						<div align='center' class='textoerror'>Usuario desconocido o contrase&ntilde;a incorrecta!</div>
						|-/if-|
						<form method='post' action="Main.php?do=usersByAffiliateDoLogin">
							<center>
								<table width='520' border="0" cellpadding='5' cellspacing='1' class='tableTdBorders'>
									<tr>
										<td colspan='2' class='titulodato1'>Si usted es un usuario afiliado, ingrese mediante este formulario</td>
									</tr>
									<tr>
										<td width='20%' nowrap class='titulodato1'>Identificaci&oacute;n de Usuario</td>
										<td class='celldato'><input type='text' name='usernameAff' size='35' /></td>
									</tr>
									<tr>
										<td class='titulodato1'>Contrase&ntilde;a</td>
										<td class='celldato'><input type='password' name='passwordAff' size='20' /></td>
									</tr>
									<tr>
										<td colspan='2' class='celldato' align='center'><input type='submit' value='Ingresar' class='boton' /></td>
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
						<!--inicio de pie -->
					</td>
					</tr>
			</table>
