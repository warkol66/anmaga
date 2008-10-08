|-assign var="userInfo" value=$loginAffiliateUser->getAffiliateUserInfo()-|
<h2>|-$userInfo->getName()-|, |-$userInfo->getSurname()-| - Bienvenido al Sistema</h2>
 <h1>|-$parameters.siteName-|</h1>
	<p>Su último ingreso al sistema fue el <strong>|-$loginAffiliateUser->getLastLogin()|date_format:"%d-%m-%Y a las %R"-|</strong></p>
|-if $parameters.news ne ''-|<p>|-$parameters.news-|</p>|-/if-|
