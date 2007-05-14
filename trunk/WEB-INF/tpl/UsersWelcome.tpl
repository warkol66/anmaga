<p>Bienvenido al Sistema |-$parameters.siteName-|</p>
<p><strong>|-$loginUser->getUsername()-| </strong>, su último ingreso al sistema fue el <strong>|-$loginUser->getUpdated()-|</strong></p>
	|-assign var="userInfo" value=$loginUser->getUserInfo()-|
|-$userInfo->getName()-|, 
|-$userInfo->getSurname()-|
