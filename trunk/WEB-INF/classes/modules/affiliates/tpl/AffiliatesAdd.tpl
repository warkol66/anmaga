<h2>Administración de Afiliados</h2>
<h1>Agregar Distribuidor / Mayorista</h1>
	<form method="post" action="Main.php?do=affiliatesDoAddAffiliate"> 
	<fieldset title="Formulario para Alta de Afiliado"> 
		<legend>Datos del Mayorista</legend>
		<p>Ingrese los datos del Mayorista</p> 
		<p>
		<label for="name">Nombre</label> 
				<input name="name" type="text" value="" size="45">
		</p>
		<p>
		<label for="affiliateInternalNumber">Código de identificació interno</label> 
			 <input name="affiliateInternalNumber" type="text" value="" size="15">
		</p>
		<p>
		<label for="address">Dirección</label> 
				 <input name="address" type="text" value="" size="55">
		</p>
		<p>
		<label for="phone">Teléfono</label> 
				 <input name="phone" type="text" value="" size="25">
		</p>
		<p>
		<label for="mail">E-mail </label> 
		 <input name="mail" type="text" value="" size="35">
		</p>
		<p>
		<label for="contact">Persona contacto</label> 
		 <input name="contact" type="text" value="" size="40">
		</p>
		<p>
		<label for="contactEmail">Email persona contacto</label> 
			<input name="contactEmail" type="text" value="" size="45">
		</p>
		<p>
		<label for="web">Sitio WEB</label> 
				<input name="web" type="text" value="" size="55">
		</p>
		<p>
		<label for="name">Información Adiconal</label> 
				<textarea name="memo" cols="50" rows="6" wrap="virtual"></textarea>
		</p>
<p>Ingrese a continuación la información del Usuario Administrador para este Mayorista</p>
		<p>
		<label for="username">##162,Identificación del Usuario Administrador##</label> 
			<input name='username' type='text'  class='textodato' value='' size="40" />
		</p>
		<p>
		<label for="name">##163,Nombre##</label> 
			<input name='nameuser' type='text'  class='textodato' value='' size="70" />
		</p>
		<p>
		<label for="name">##164,Apellido##</label> 
			<input name='surname' type='text'  class='textodato' value='' size="70" />
		</p>
		<p>
		<label for="name">E-mail</label> 
			<input name='mailAddress' type='text'  class='textodato' value='' size="70" />
		</p>
		<p>
		<label for="pass">##165,Contraseña##</label> 
			<input name='pass' type='password' class='textodato' value='' size="20" />
		</p>
		<p>
		<label for="pass2">##166,Repetir Contraseña##</label> 
			<input name='pass2' type='password' class='textodato' value='' size="20" />
		</p>
		<p>
			<input name="save" type="submit" class="botonchico" value="Agregar afiliado">
		</p>
		</fieldset>
	</form>

