|-popup_init src="js/overlib.js"-|

<form method="get" action="Main.php"> 
	<input type="hidden" name="do" value="multilangTextsList" /> 
	<table class="tablaborde" border="0" cellpadding="3" cellspacing="1" width="100%"> 
		<tr> 
			<td class="celltitulo2" nowrap="nowrap" width="35%">Seleccione un módulo</td> 
			<td class="celldato">
				<select name="moduleName" onchange="if (this.options[this.selectedIndex].value) this.form.submit()" > 
					<option value="">Seleccione un módulo</option> 
		    		|-foreach from=$modules item=module name=for_module-|
	    			<option value="|-$module->getName()-|" |-if $moduleName eq $module->getName()-|selected="selected"|-/if-|>|-$module->getName()-|</option>
    				|-/foreach-|					
				</select> </td> 
		</tr> 
		<tr> 
			<td class="cellboton" colspan="2">
				<input value="Continuar" class="boton" type="submit" />
			</td> 
		</tr> 
	</table> 
</form>


|-if $moduleName-|

<h2>Texts &quot;|-$moduleName-|&quot;</h2>
<div id="div_texts"> |-if $message eq "ok"-|<span class="message_ok">Text guardado correctamente</span>|-/if-|
  |-if $message eq "deleted_ok"-|<span class="message_ok">Text eliminado correctamente</span>|-/if-|
  <h3><a href="Main.php?do=multilangTextsEdit&amp;moduleName=|-$moduleName-|">Agregar Text</a></h3>
  |-include file="MultilangTextsIncludeSearch.tpl"-|
	<table width="100%" border="0" cellpadding="3" cellspacing="1" id="tabla-texts" class="tablaborde">
    <thead>
      <tr>
        <th width="5%">id</th>
				|-math equation = "90 / lang" lang=$appLanguages|@count assign="colwidth" format="%.0f"-|		
        |-foreach from=$appLanguages item=language name=for_languages-|
        <th width="|-$colwidth-|%">|-$language->getName()-|</th>
        |-/foreach-|
        <th width="5%">&nbsp;</th>
      </tr>
    </thead>
    <tbody>   
    |-foreach from=$texts item=textLanguages key=textId name=for_texts-|
    <tr>
      <td class="celldato">|-$textId-|</td>
      |-foreach from=$appLanguages item=language name=for_languages-|
      |-assign var="languageId" value=$language->getId()-|
      |-assign var="text" value=$textLanguages[$languageId]-|
      |-if $text ne ""-|
      	|-assign var="textContent" value=$text->getText()-|
      |-/if-|
      <td class="celldato">|-if $text ne ""-||-$text->gettext()-|<div align="right" style="margin-top:8px;margin-right:8px;">
			<a href="#" |-popup sticky=true caption="Text Code" trigger="onClick" text="Codigo: #&#0035;$textId,$textContent#&#0035;" snapx=10 snapy=10-| class="deta"><img src="images/copycode14.png" border="0" /></a></div>
      |-/if-|</td>
      |-/foreach-|
      <td align="center" nowrap="nowrap" class="celldato"><form action="Main.php" method="get" name='formTextsEdit|-$textId-|' style="display:inline">
          <input type="hidden" name="do" value="multilangTextsEdit" />
          <input type="hidden" name="id" value="|-$textId-|" />
          <input type="hidden" name="moduleName" value="|-$moduleName-|" />
          <input type="hidden" name="currentPage" value="|-$pager->getPage()-|" />
					[&nbsp; <a href="javascript:document.formTextsEdit|-$textId-|.submit();" class='edit'>Editar</a> &nbsp;]</form><br />
        <form action="Main.php" method="post" name='formTextsDoDelete|-$textId-|' style="display:inline">
          <input type="hidden" name="do" value="multilangTextsDoDelete" />
          <input type="hidden" name="id" value="|-$textId-|" />
          <input type="hidden" name="moduleName" value="|-$moduleName-|" />
          <input type="hidden" name="currentPage" value="|-$pager->getPage()-|" />
					[ <a href="javascript:document.formTextsDoDelete|-$textId-|.submit();" class='elim' onclick="return confirm('Are you sure you want to delete this text?')">Eliminar</a> ]</form></td>
    </tr>
    |-/foreach-|
    </tbody>
    
  </table>

				|-include file="include_paginate.tpl"-|
</div>

|-/if-|
