|-popup_init src="scripts/overlib.js"-|
<h2>Módulo de Encuetas</h2>
<h1>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-| Encuesta</h1>
<div id="div_survey">
|-if $action eq "edit"-|
<p>A continuación puede modificar la encuesta seleccionada. Para guardar los cambios haga click en "Aceptar". 
Puede también agregar o eliminar opciones de pregunta. No se puede modificar el tipo de pregunta;
Si quere cambiar el tipo de pregunta, debe eliminar esta encuesta y crear una nueva.</p>
|-else-|
<p>A continuación puede crear una nueva encuesta. Seleccione el tipo de pregunta, una vez guardado el tipo de pregunta, no lo puede modificar.
Para guardar los cambios haga click en "Aceptar". Luego de guardar la encuesta se le presentará un formulario para ingresar las opciones de respuesta.</p>
|-/if-|
<form name="form_edit_survey" id="form_edit_survey" action="Main.php" method="post">
		|-if $message eq "error"-|
			<div class="resultFailure">Ha ocurrido un error al intentar guardar la encuesta. </div>
		|-elseif $message eq "created"-|
			<div class="resultSuccess">Se ha creado la encuesta. <br />Puede generar las opciones en el formulario de "Opciones de Respuesta" en la parte inferior de esta página.</div>
		|-/if-|
		<fieldset title="Formulario de datos de encuesta">
		<legend>|-if $action eq "edit"-|Editar|-else-|Crear|-/if-|</legend>
		<p>
			Ingrese los datos de la encuesta.
		</p>
			<p>
				<label for="survey_name">Nombre de la Encuesta</label>
				<input type="text" size="45" id="survey_name" name="survey[name]" value="|-$survey->getname()-|" title="name" maxlength="255" />
			</p>
			<p>
			<label for="survey_startDate">Inicia</label>
			<input name="survey[startDate]" type="text" id="survey_startDate" title="startDate" value="|-if $action eq 'edit'-||-$survey->getstartDate()|date_format:"%d-%m-%Y"-||-else-||-$smarty.now|date_format:"%d-%m-%Y"-||-/if-|" size="12" /> 
			<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('survey[startDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="survey_endDate">Termina</label>
				<input name="survey[endDate]" type="text" id="survey_endDate" title="endDate" value="|-$survey->getendDate()|date_format:"%d-%m-%Y"-|" size="12" /> 
				<img src="images/calendar.png" width="16" height="15" border="0" onclick="displayDatePicker('survey[endDate]', false, '|-$parameters.dateFormat.value|lower|replace:'-':''-|', '-');" title="Seleccione la fecha">
			</p>
			<p>
				<label for="survey_isPublic">Visibilidad</label>
				<select name="survey[isPublic]">
						<option value="1" |-if $survey neq '' and $survey->getisPublic() eq 1-|selected="selected"|-/if-|>Pública</option>
						<option value="0" |-if $survey neq '' and $survey->getisPublic() eq 0-|selected="selected"|-/if-|>Para Usuarios Registrados</option>
				</select>
			</p>
			<p>
				<label for="surveyQuestion_question">Pregunta</label>
				<input type="text" size="65" name="surveyQuestion[question]" value="|-if $surveyQuestion neq ''-||-$surveyQuestion->getQuestion()-||-/if-|" id="surveyQuestion[question]" />
				|-if $surveyQuestion neq ''-|
				<input type="hidden" name="surveyQuestion[id]" value="|-$surveyQuestion->getId()-|" />
				|-/if-|
			</p>
			<p>
			<label for="survey_isPublic">Tipo de Pregunta</label>
			|-if $survey->getId() eq ''-|
			<select name="surveyType" onChange="javascript:create(this);">
					<option value="yesno">Si / No</option>
					<option value="multipleAnswers">Múltiples opciones, respuestas múltiples</option>
					<option value="oneAnswer">Múltiples opciones, respuesta única</option>
			</select>
			<a href="#" |-popup sticky='true' fgcolor='#ffffff' bgcolor='#ffffff' closecolor='#cdcdcd' closetext='Cerrar' closetitle='Cerrar' capcolor='#ffffff' bgcolor='#0054A4' snapx='10' snapy='10' width='350' trigger='onMouseOver' caption="Tipos de Preguntas" text="Dependiendo del tipo de pregunta, el usuario puede responder una o varias opciones.<br />Una vez guardada la encuesta, no podrá modificar el tipo de pregunta.<br /> El tipo Si/NO es un caso particular de Opciones múltiples con una sola respuesta. Luego puede agregar mas opciones a esta pregunta, el sistema autimáticamente generará las opciones Si y NO"-|><img src="images/clear.png" class="linkImageInfo"></a>
			|-else-|
				|-if $surveyQuestion->acceptsMultipleAnswers()-|
					Múltiples opciones, respuestas múltiples
				|-else-|
					Múltiples opciones, respuesta única
				|-/if-|
			<a href="#" |-popup sticky='true' fgcolor='#ffffff' bgcolor='#ffffff' closecolor='#cdcdcd' closetext='Cerrar' closetitle='Cerrar' capcolor='#ffffff' bgcolor='#0054A4' snapx='10' snapy='10' width='350' trigger='onMouseOver' caption="Tipos de Preguntas" text="Dependiendo del tipo de pregunta, el usuario puede responder una o varias opciones.<br />El tipo de pregunta no se puede modificar. Si desea cambiarla debe eliminar la encuesta para crear una nueva. <br />El tipo Si/NO es un caso particular de Opciones múltiples con una sola respuesta. Luego puede agregar mas opciones a esta pregunta, el sistema autimáticamente generará las opciones Si y NO"-|><img src="images/clear.png" class="linkImageInfo"></a>
			|-/if-|
			</p>
			|-if $hasNews neq '' and $hasNews-|
			<h3>Asociar la encuesta a una noticia&nbsp;&nbsp;<a href="#" |-popup sticky='true' fgcolor='#ffffff' bgcolor='#ffffff' closecolor='#cdcdcd' closetext='Cerrar' closetitle='Cerrar' capcolor='#ffffff' bgcolor='#0054A4' snapx='10' snapy='10' width='350' trigger='onMouseOver' caption='Asociar a una noticia' text='Puede asociar una encuesta a una noticia, eso hará que la encuesta se despliegue en la parte inferior de la bajada de la misma.'-|><img src="images/clear.png" class="linkImageInfo" /></a></h3>
				<p>
				<label for="survey_articleId">Artículo</label>
				<select name="survey[articleId]">
					<option value="0">Seleccione un Artículo</option>
					|-foreach from=$articles item=article name=for_articles-|
						<option value="|-$article->getId()-|"|-if $survey->getArticleId() eq $article->getId()-| selected="selected"|-/if-|>|-$article->getTitle()|truncate:65:"...":true-|</option>
					|-/foreach-|
				</select>
				</p>
			|-/if-|
			<p>
				|-if $action eq "edit"-|
				<input type="hidden" name="survey[id]" id="survey_id" value="|-$survey->getid()-|" />
				|-/if-|
				<input type="hidden" name="action" id="action" value="|-$action-|" />
				<input type="hidden" name="do" id="do" value="surveysSurveysDoEdit" />
				<input type="submit" id="button_edit_survey" name="button_edit_survey" title="Aceptar" value="Aceptar"/>
			</p>
		</fieldset>
	</form>
</div>
				
|-if $survey->getId() neq ''-|
	<div id="surveyQuestionAdder">
<fieldset title="Formulario de opciones de respuesta de encuesta">
<legend>Opciones de respuesta </legend>
	
	<form id="surveyQuestionOptionsAddForm">
			<p>
				<label>Pregunta</label> |-$surveyQuestion->getQuestion()-|
			</p>
			<p>
				<label for="surveyQuestion_question">Respuesta</label>
				<input type="text" size="65" name="surveyAnswerOption[answer]" value="" id="surveyQuestion[answer]" />
			</p>
			<p>
				<input type="hidden" name="surveyAnswerOption[questionId]" value="|-$surveyQuestion->getId()-|" id="surveyAnswerOption">
				<input type="hidden" name="do" value="surveysAnswerOptionsAddX"></input>
			</p>
			<p>
				<input type="button" name="Agregar Respuesta" value="Agregar Respuesta" id="Agregar Respuesta" onClick="javascript:submitAnswerToQuestionX(this.form)"></input> <span id="msgBoxAnswerAdd"></span>
			</p>
	</form>

	<h4>Opciones actuales</h4>
	|-assign var=options value=$surveyQuestion->getSurveyAnswerOptions()-|
	<ul id="surveyQuestionOptionsList">
		|-foreach from=$options item=option name=for_answeroptions-|
		<li id="answerOption|-$option->getId()-|">|-$option->getAnswer()-| 
			<form action="Main.php" method="post">
				<input type="hidden" name="do" value="surveysAnswerOptionsDeleteX" />
				<input type="hidden" name="answerOptionId" value="|-$option->getId()-|"/>
				<input type="button" name="eliminar" value="eliminar" id="eliminar" onClick="javascript:deleteAnswerOptionX(this.form)" class="buttonImageDelete"/>
			</form>
		</li> 
		|-/foreach-|
	</ul>
	</fieldset>

</div>
|-/if-|				
