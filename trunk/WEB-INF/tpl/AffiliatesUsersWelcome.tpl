<table border='0' cellpadding='0' cellspacing='0' width='100%'>
	<tr>
		<td class='title'>|-assign var="userInfo" value=$loginAffiliateUser->getAffiliateUserInfo()-|
|-$userInfo->getName()-|, |-$userInfo->getSurname()-| - Bienvenido al Sistema |-$parameters.siteName-|</td>
	</tr>
	<tr>
		<td class='underlineTitle'><img src="images/clear.gif" height='3' width='1'></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>Su último ingreso al sistema fue el <strong>|-$loginAffiliateUser->getLastLogin()|date_format:"%d-%m-%Y a las %R"-|</strong></td>
	</tr>
|-if $parameters.news ne ''-|	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>|-$parameters.news-|</td>
	</tr>
|-/if-|
</table>
