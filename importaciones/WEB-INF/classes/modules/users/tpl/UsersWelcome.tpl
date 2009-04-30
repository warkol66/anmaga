<h2>|-assign var="userInfo" value=$loginUser->getUserInfo()-||-$userInfo->getName()-|, |-$userInfo->getSurname()-|<br>
Bienvenido al Sistema |-$parameters.siteName-|</h2>
<p>Su último ingreso al sistema fue el <strong>|-$loginUser->getLastLogin()|change_timezone|date_format:"%d-%m-%Y a las %R"-|</strong>
|-if $parameters.news ne ''-|
<br>
<br>|-$parameters.news-|
|-/if-|
</p>
|-include file='UsersWelcomeInclude.tpl'-|


|-multilang_get_text module="users" textId="13" code="esp"-|

|-multilang_get_text module="users" textId="15" code="esp" text="pepe"-|

|-multilang_get_text module="users" text="prueba11" code="eng"-|

##users,13,no##
