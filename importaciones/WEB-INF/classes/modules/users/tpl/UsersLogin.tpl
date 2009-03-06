<script type="text/javascript" language="javascript" src="scripts/login.js"></script>
<form method='post' action="Main.php"> 
	<!-- Begin Login --> 
	<div id="login"> 
		 <!-- Begin LoginTop --> 
		 <div id="loginTop"></div> 
		 <!-- End LoginTop --> 
		 <!-- Begin LoginContent --> 
		 <div id="loginContent"><br>
			<p>|- if isset($unifiedLogin) -|Selecciones el tipo de usuario e i|-else-|I|-/if-|ngrese su usuario y contraseña para ingresar al sistema</p> 
			|-if $message eq "wrongUser"-|
				<div align='center' class='errorMessage'>Usuario desconocido o contraseña incorrecta!. Intente nuevamente.</div> 
			|-elseif $message eq "passwordSent"-|
				<div align='center' class='successMessage'>Se envio una nueva contraseña a su casilla de correo.</div> 
			|-/if-| 
			|- if isset($unifiedLogin) -|
				|-if !$onlyAdmin -|
				<p>Tipo de Usuario
					 <select name="select"> 
						<option value="user" |-if $cookieSelection eq 'user'-|selected="selected"|-/if-| onClick="javascript:changeActionToAdminLogin(this.form)">Administrador</option> 
						<option value="affiliate" |-if $cookieSelection eq 'affiliateUser'-|selected="selected"|-/if-| onClick="javascript:changeActionToAffiliate(this.form)">Cliente</option> 
					</select> 
				 </p> 
				|-/if-|
				<input type="hidden" name="do" value="|-if $cookieSelection eq 'affiliateUser'-|affiliatesUsersDoLogin|-else-|usersDoLogin|-/if-|" id="loginFormDo" />
			|-else-|
				<input type="hidden" name="do" value="usersDoLogin" id="loginFormDo" />
			|-/if-| 
			<p></p> 
			<h1>Usuario</h1> 
			<p><input type='text' name='loginUsername' size='35' class="inputLogin" /> 
			 </p> 
			<h1>Contraseña</h1> 
			<p><input type='password' name='loginPassword' size='20' class="inputLogin" /> 
			 </p> 
		</div> 
		 <!-- End LoginContent --> 
		 <!-- Begin LoginBottom --> 
		 <div id="loginBottom">
			<input type='submit' value='Ingresar' id="loginButton" /> 
		</div> 
		 <!-- End LoginBottom --> 
	 </div> 
	<!-- End Login --> 
	<script>
	self.moveTo(0,0); self.resizeTo(screen.availWidth,screen.availHeight)
	self.focus()
</script> 
</form> 
