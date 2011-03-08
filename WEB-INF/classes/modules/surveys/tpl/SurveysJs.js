function submitAnswerToQuestionX(form) {	
	
	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'msgBoxAnswerAdd'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				}
			);		
	
	$('msgBoxAnswerAdd').innerHTML = '<span class="inProgress">Agregando opción de respuesta...</span>';
	
}

function deleteAnswerOptionX(form) {	
	
	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'msgBoxAnswerAdd'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				}
			);		
	
	$('msgBoxAnswerAdd').innerHTML = '<span class="inProgress">Eliminando opción de respuesta...</span>';
	
}

function submitSurveyX(form) {

	var fields = Form.serialize(form);
	var myAjax = new Ajax.Updater(
				{success: 'msgBoxSurveyForm'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				}
			);		
	
	$('msgBoxSurveyForm').innerHTML = '<span class="inProgress">enviando encuesta...</span>';


	return true;
}

function submitSurveyWithoutAnswerX(form) {
	
	var fields = Form.serialize(form);
	
	noresponse = document.createElement('input');
	noresponse.name = 'noResponse';
	noresponse.value = '1';
	noresponse.type = 'hidden';
	
	form.appendChild(noresponse);
	
	var myAjax = new Ajax.Updater(
				{success: 'msgBoxSurveyForm'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				}
			);		
	
	$('msgBoxSurveyForm').innerHTML = '<span class="inProgress">procesando...</span>';


	return true;
	
}

function validateOneAnswer() {

	var elements = document.getElementsByTagName('input');
	var checked = 0;
	for (var i=0; i < elements.length; i++) {
		if (elements[i].type == 'radio' && elements[i].name == 'answers[]' && elements[i].checked == true)
			checked++;
	};
	
	if (checked > 0) {
		return true;
	}
	return false;
}

function validateAnswer() {

	var elements = document.getElementsByTagName('input');
	var checked = 0;
	for (var i=0; i < elements.length; i++) {
		if (elements[i].type == 'checkbox' && elements[i].name == 'answers[]' && elements[i].checked == true)
			checked++;
	};
	
	if (checked == 0) {
		return false;
	}
	return true;
}

function submitOneAnswerSurveyX(form) {

	if (!validateOneAnswer()) {
		$('msgBoxSurveyForm').innerHTML = '<span class="resultFailure">Debe seleccionar una opción</span>'
		return false;
	}
	submitSurveyX(form);
}

function submitMultipleAnswerSurveyX(form) {

	if(!validateAnswer()) {
		$('msgBoxSurveyForm').innerHTML = '<span class="resultFailure">Debe seleccionar al menos una respuesta.</span>'
		return false;		
	}
	
	submitSurveyX(form);
}

/**
 * Carga los resultados de la encuesta en un determinado div
 */
function loadSurveyResultsX(surveyId,targetDivId) {
	var url = 'Main.php?do=surveysSurveysResults&id='+surveyId+'&ajax=1';
	var myAjax = new Ajax.Updater(
				{success: targetDivId},
				url,
				{
					method: 'get',
					evalScripts: true
				}
			);		

	return true;
}

