<script type="text/javascript">

		var elements = document.getElementsByName('clientQuoteItems[]');
		
		for (var i=0; i < elements.length; i++) {
			elements[i].checked = false;
		};

		|-foreach from=$items item=item name=for_clientQuotationsItems-|
			|-if not $item->hasASupplierQuotationRelated()-|
			if ($('checkboxItem|-$item->getId()-|'))
				$('checkboxItem|-$item->getId()-|').checked = true;
			|-/if-|
		|-/foreach-|
</script>