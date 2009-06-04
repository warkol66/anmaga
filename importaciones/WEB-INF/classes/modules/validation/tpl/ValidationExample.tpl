<form id='validationTestForm' action="Main.php" method="post" >
	<fieldset title="Formulario de edición de datos de un proveedor">
		<legend>Validators Example</legend>
		<p>Client Side Validators</p>
		<p>
			<label for="text_validation">Text Validation</label><input type="text" name="text_validation" value="" id="text_validation" class="textValidation"/>
		</p>
		<p>
			<label for="mail_validation">Mail Validation</label><input type="text" name="mail_validation" value="" id="mail_validation" class="mailValidation"/>
		</p>
		<p>
			<label for="numeric_validation">Numeric Validation</label><input type="" name="numeric_validation" value="" id="numeric_validation" class="numericValidation"/>		
		</p>
		<p>
			<label for="date_validation">Date Validation</label><input type="text" name="date_validation" value="" id="date_validation" class="dateValidation"/>
		</p>
		<p>Ajax Validators</p>
		<p>
			<label for="input_text_validation">Input Text Ajax Validation</label><input type="input" name="input_text_validation" value="" id="input_text_validation" />
		</p>
		<p>
			<label>Select Ajax Validation</label>
			<select name="some_name" id="some_name">
				<option value="option1">option1</option>
				<option value="option2">option2</option>
				<option value="option2">option2</option>				
			</select>
		</p>
		<p>
			<input type="hidden" name="do" value="validationExampleDo" id="do"/>
			<input type="button" value="Send" onClick='javascript:validationValidateFormClienSide(this.form);'>
		</p>
		</legend>
</form>