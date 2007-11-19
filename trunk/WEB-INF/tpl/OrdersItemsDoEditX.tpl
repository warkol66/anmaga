|- if isset($value) -|
|-$value-|
|-/if-|

<script type="text/javascript">
    
    	$('totalItem|-$item->getId()-|').innerHTML = '|- $itemTotal-|';
        $('product_total_value').innerHTML = '|-$order->getTotalFormat()-|';
    
</script>