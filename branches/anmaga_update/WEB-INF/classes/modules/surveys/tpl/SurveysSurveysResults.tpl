|-if $ajax eq ''-|
	<h2>Encuestas</h2>
	<h1>Resultado de Encuestas</h1>	
|-/if-|
<div id="surveyResults|-$survey->getId()-|">
	
	<p>Resultados de la encuesta</p>
	<p>
		<img src="Main.php?do=surveysSurveysDisplayBar&amp;id=|-$survey->getId()-|" />
	</p>
	
</div>