<script language="JavaScript" type="text/javascript">
function getLabel(id) {
	var textMessage = document.getElementsByTagName("label")[id].textContent;
	alert ('El campo "' + textMessage + '" tiene este label');
}
</script>


<form id='validationTestForm' action="Main.php" method="post" >
	<fieldset title="Formulario de edición de datos de un proveedor">
		<legend>Validators Example</legend>
		<p>Client Side Validators</p>
		<p>
			<label for="empty_validation">Empty Validation</label><input type="text" name="empty_validation" value="" id="empty_validation" class="emptyValidation" />
			
		</p>
		<p>
			<label for="text_validation">Text Validation</label><input type="text" name="text_validation" value="" id="text_validation" class="textValidation emptyValidation" onClick="javascript:getLabel();" />
		</p>
		<p>
			<label for="mail_validation">Mail Validation</label><input type="text" name="mail_validation" value="" id="mail_validation" class="mailValidation emptyValidation" />
		</p>
		<p>
			<label for="numeric_validation">Numeric Validation</label><input type="" name="numeric_validation" value="" id="numeric_validation" class="numericValidation emptyValidation" />		
		</p>
		<p>
			<label for="date_validation">Date Validation</label><input type="text" name="date_validation" value="" id="date_validation" class="dateValidation emptyValidation" /> Format (dd/mm/yyyy)
		</p>
		<p>Ajax Validators</p>
		<p>
			<label for="input_text_validation">Input Text Ajax Validation</label><input type="text" name="input_text_validation" value="" id="input_text_validation" class="emptyValidation" |-ajax_onchange_validation_attribute actionName=validationAjaxExample-| /> |-ajax_onchange_validation_msg_box idField=input_text_validation-|		
		</p>
		<p>
			<input type="hidden" name="do" value="validationExampleDo" id="do" />
			<!-- boton para validacion generado via helper de smarty -->
			<!-- el valor value permite indicar el valor del boton -->
			|-javascript_form_validation_button value=Send-|
		</p>
		<span onClick="getLabel(3)">Trae el label 3</span>
	</fieldset>
</form>