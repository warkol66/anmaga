<div id='surveyShowHolder|-$survey->getId()-|'>
|-if not $alreadyAnswered and not $surveyExpired or $forcedForm-|
	<form action="Main.php" method="post" id="surveySubmitForm">
		<fieldset>
			<legend>|-$surveyQuestion->getQuestion()-|</legend>
			<p>
			|-assign var=options value=$surveyQuestion->getSurveyAnswerOptions()-|
			<ul>
			|-if $surveyQuestion->acceptsMultipleAnswers() eq true-|
			|-foreach from=$options item=option name=for_option-|
				<li>
					<input type="checkbox" name="answers[]" value="|-$option->getId()-|" /> |-$option->getAnswer()-|
				</li>
			|-/foreach-|
			|-else-|
			|-foreach from=$options item=option name=for_option-|
				<li>
					<input type="radio" name="answers[]" value="|-$option->getId()-|" /> |-$option->getAnswer()-|
				</li>
			|-/foreach-|
			|-/if-|
			</ul>
			</p>
				|-if $surveyQuestion->acceptsMultipleAnswers() eq true-|
					<p>Puede seleccionar más de una opción</p>
				|-/if-|
			|-if isset($useCaptcha) and $useCaptcha-|
			<p>
				Código de Seguridad: <img src="Main.php?do=surveysCaptchaGeneration&width=120&height=45&characters=5" />
			</p>
			<p>
					Ingrese el código de seguridad de la imagen <br />
					<input id="security_code" name="securityCode" type="text" size="10" />
			</p>
			|-/if-|

			<p>
				<input type="hidden" name="questionId" value="|-$surveyQuestion->getId()-|" />
				<input type="hidden" name="do" value="surveysSurveysRespondX"/>
				<input type="button" value="Votar" onClick="|-if $surveyQuestion->acceptsMultipleAnswers() eq true-|javascript:submitMultipleAnswerSurveyX(this.form);|-else-|javascript:submitOneAnswerSurveyX(this.form);|-/if-|"/> 
				<input type="button" value="Ver resultados" onClick="javascript:submitSurveyWithoutAnswerX(this.form)"/>
				 <span id="msgBoxSurveyForm"></span>
			</p>

		</fieldset>
	</form>
|-elseif $surveyExpired or $alreadyAnswered-|
	<p><span class="inProgress">Cargando resultados de la encuesta...</span>

	<script type="text/javascript">

		loadSurveyResultsX(|-$survey->getId()-|,'surveyShowHolder|-$survey->getId()-|');

	</script>
	</p>

|-/if-|
</div>