<h3>Información de embalaje del Item</h3>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="tableTdBorders">
	<COL width="15%" />
	<COL width="30%" />
	<COL width="30%" />
	<COL width="25%" />
	<tr>
		<th>Cantidad</th>
		<th>Peso</th>
		<th>Volúmen</th>
		<th>Densidad</th>
	</tr>
	<tr>
		<td rowspan="2" align="center" >|-$supplierQuotationItem->getQuantity()-|</td>
		<td>	|-if $supplierQuotationItem->getUnitGrossWeigth() neq ''-|Unidad: |-$supplierQuotationItem->getUnitGrossWeigth()|number_format:3:",":"."-| kg.<br />|-/if-|
	|-if $supplierQuotationItem->getCartonGrossWeigth() neq ''-|Bulto: |-$supplierQuotationItem->getCartonGrossWeigth()|number_format:3:",":"."-| kg.|-/if-|</td>
		<td>
	|-if $supplierQuotationItem->getUnitVolume() neq 0-|Unidad: |-$supplierQuotationItem->getUnitVolume()|number_format:3:",":"."-| metros cúbicos.<br />
	|-/if-|
|-if $supplierQuotationItem->getCartonVolume()-|Bulto: |-$supplierQuotationItem->getCartonvolume()|number_format:3:",":"."-| metros cúbicos.|-/if-|</p></td>
		<td rowspan="2" align="center" nowrap="nowrap">
	|-if $supplierQuotationItem->getUnitDensity() neq 0-|Unidad: |-$supplierQuotationItem->getUnitDensity()|number_format:3:",":"."-| kg / m3 <br />
	|-/if-|
	|-if $supplierQuotationItem->getCartonDensity()-|Bulto: |-$supplierQuotationItem->getCartonDensity()|number_format:3:",":"."-| kg / m3|-/if-|</td>
	</tr>
	<tr>
		<td>Total: |-$supplierQuotationItem->getTotalWeigth()|number_format:2:",":"."-| kg</td>
		<td>Total: |-$supplierQuotationItem->getTotalVolume()|number_format:3:",":"."-| metros cúbicos</td>
	</tr>
</table>
<br />
	|-if $supplierQuotationItem->getUnitDensity() neq 0-|
		|-assign var=density value=$supplierQuotationItem->getUnitDensity()-|
	|-else-|
		|-assign var=density value=$supplierQuotationItem->getCartonDensity()-|
	|-/if-|
	|-if $density gt 320-|
		|-math equation="totalWeight / containerWeight" containerWeight=21800 totalWeight=$supplierQuotationItem->getTotalWeigth() assign=weightLimit-|
		|-math equation="totalVolume / conteinerVolume" conteinerVolume=33 totalVolume=$supplierQuotationItem->getTotalVolume() assign=volumeLimit-|
		<p>Se recomienda contenedor de 20'.<br />(Límite por peso: |-$weightLimit|number_format:3:",":"."-| Contenedores / Límite por volumen: |-$volumeLimit|number_format:3:",":"."-| Contenedores )</p>
	|-else-|
		|-math equation="totalWeight / containerWeight" containerWeight=26000 totalWeight=$supplierQuotationItem->getTotalWeigth() assign=weightLimit-|
		|-math equation="totalVolume / conteinerVolume" conteinerVolume=67 totalVolume=$supplierQuotationItem->getTotalVolume() assign=volumeLimit-|
		<p>Se recomienda contenedor de 40'.<br />(Límite por peso: |-$weightLimit|number_format:3:",":"."-| Contenedores / Límite por volumen: |-$volumeLimit|number_format:3:",":"."-| Contenedores )</p>
	|-/if-|
