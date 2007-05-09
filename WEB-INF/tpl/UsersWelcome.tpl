<p>Bienvenido al Sistema |-$parameters.siteName-|</p>
<p><strong>|-$login_user->getUsername()-| </strong>, su último ingreso al sistema fue el <strong>|-$login_user->getUpdated()-|</strong></p>
	|-assign var="userInfo" value=$login_user->getUserInfo()-|
|-$userInfo->getName()-|, 
|-$userInfo->getSurname()-|
