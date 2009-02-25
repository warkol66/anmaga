<h3>Reporte Sobre Cotizacion de Proveedor del Item</h3>
<p>
	<strong>Peso</strong>
</p>
<p>
	|-if $supplierQuotationItem->getUnitGrossWeigth() neq ''-|Unidad: |-$supplierQuotationItem->getUnitGrossWeigth()-| kg.<br />|-/if-|
	|-if $supplierQuotationItem->getCartonGrossWeigth() neq ''-|Bulto: |-$supplierQuotationItem->getCartonGrossWeigth()-| kg.|-/if-|
</p>
<p>
	<strong>Volumen</strong>
</p>
<p>
	|-if $supplierQuotationItem->getUnitVolume() neq 0-|Unidad: |-$supplierQuotationItem->getUnitVolume()-| metros cubicos.<br />|-/if-|
	|-if $supplierQuotationItem->getCartonVolume()-|Bulto: |-$supplierQuotationItem->getCartonvolume()-| metros cubicos.|-/if-|
</p>
<p>
	<strong>Densidad</strong>
</p>
<p>
	|-if $supplierQuotationItem->getUnitDensity() neq 0-|Unidad: |-$supplierQuotationItem->getUnitDensity()-|<br />|-/if-|
	|-if $supplierQuotationItem->getCartonDensity()-|Bulto: |-$supplierQuotationItem->getCartonDensity()-||-/if-|
</p>