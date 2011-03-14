|-if $ajax eq ''-|
	<h2>Encuestas</h2>
	<h1>Resultado de Encuestas</h1>	
|-/if-|
<div id="surveyResults|-$survey->getId()-|">
	
	<p>Resultados de la encuesta</p>
	
	|-foreach from=$survey->getSurveyQuestions() item=surveyQuestion-|
	<p>
		<img src="Main.php?do=surveysDisplayBar&amp;id=|-$survey->getId()-|&amp;questionId=|-$surveyQuestion->getId()-|" />
	</p>
	|-/foreach-|
	
</div>