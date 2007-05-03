|-foreach from=$elements item=element key=element_name-|
|-if $element|is_array and $element.element_type ne "Text" and $element.element_type ne "Options"-|
<li id="config|-$name-|[|-$element_name-|]">|-$element_name-|
	<ul id="config|-$name-|[|-$element_name-|]_ul">|-include file=ConfigSetInclude.tpl elements=$element name="$name[$element_name]"-|</ul>
</li>
|-else-|
<li>
	|-$element_name-|:
	|-if $element.element_type eq "Options"-|
	<select name="config|-$name-|[|-$element_name-|][value]">
  	|-foreach from=$element.element_options item=option name=for_options-|
		<option value="|-$option-|"|-if $option eq $element.value-| selected="selected"|-/if-|>|-$option-|</option>
		|-/foreach-|
	</select>
	|-else-|
	<input type="text" name="config|-$name-|[|-$element_name-|][value]" value="|-$element.value-|" />
	|-/if-|
	<input type="hidden" name="config|-$name-|[|-$element_name-|][element_type]" value="|-$element.element_type-|" />
	|-if $element.element_type eq "Options"-|
  	|-foreach from=$element.element_options item=option name=for_options-|
		<input type="hidden" name="config|-$name-|[|-$element_name-|][element_options][option_|-$smarty.foreach.for_options.iteration-|]" value="|-$option-|" />
		|-/foreach-|
	|-/if-|
</li>
|-/if-|
|-/foreach-|
