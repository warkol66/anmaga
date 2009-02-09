<div id="clientQuotationItemLister">
	<fieldset title="Productos">
		<legend>Listado de productos en la cotizacion<legend>
		<ul id="clientQuotationItemList">
			|-foreach from=$clientQuotation->getClientQuotationItems() item=item name=for_clientQuotationsItems-|
				<li id="itemList_|-$item->getId()-|">

						|-assign var=product value=$item->getProduct()-|
						<strong>Codigo: |-$product->getCode()-|</strong>
						<strong>Nombre: |-$product->getName()-|</strong>
						<strong>Cantidad:</strong> |-$item->getQuantity()-|</strong>
						<strong>Precio Unitario:</strong> |-$item->getPrice()-|</strong>						

				</li> 
			|-/foreach-|
			</ul>
	</fieldset>
</div>
