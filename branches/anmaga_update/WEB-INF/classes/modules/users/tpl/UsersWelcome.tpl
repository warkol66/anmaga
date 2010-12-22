<h2>|-if !empty($loginUser)-||-assign var="userInfo" value=$loginUser->getUserInfo()-||-$userInfo->getName()-|, |-$userInfo->getSurname()-|<br>|-/if-|
Bienvenido al Sistema |-$parameters.siteName-|</h2>
<p>|-if !empty($SESSION.lastLogin)-|Su último ingreso al sistema fue el <strong>|-$SESSION.lastLogin|date_format:"%d-%m-%Y a las %R"-|</strong></p>|-/if-|
|-if $parameters.news ne ''-|
<p>|-$parameters.news-|</p>
|-/if-|
	