<tr>
	<td>|-$stateChange->getCreated()-|</td>
	<td>|-assign var=affiliate value=$stateChange->getAffiliate()-||-if $affiliate-||-$affiliate->getName()-||-/if-|</td>
	<td>|-assign var=user value=$stateChange->getUser()-||-if $user-||-$user->getUsername()-||-/if-|</td>
	<td>|-$stateChange->getState()-|</td>
	<td>|-$stateChange->getComment()-|</td>
</tr>

<script language="JavaScript" type="text/javascript">
	$('state_actual').innerHTML = "|-$state-|";
	$('messageState').innerHTML = "State Changed";
	$('comment').value = "";
</script>
