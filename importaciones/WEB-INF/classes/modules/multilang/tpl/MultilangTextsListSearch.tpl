|-popup_init src="js/overlib.js"-|
<h2>Texts &quot;|-$moduleName-|&quot;</h2>
<div id="div_texts"> |-if $message eq "ok"-|<span class="message_ok">Text guardado correctamente</span>|-/if-|
  |-if $message eq "deleted_ok"-|<span class="message_ok">Text eliminado correctamente</span>|-/if-|
  <h3><a href="Main.php?do=multilangTextsEdit&amp;moduleName=|-$moduleName-|">Agregar Text</a></h3>
	|-include file="MultilangTextsIncludeSearch.tpl"-|

	<p>Idioma: <span>|-$actualLanguage->getName()-|</span> - B&uacute;squeda: <span>|-$search-|</span> <a href="Main.php?do=multilangTextsList&moduleName=|-$moduleName-|">Ver todos</a></p>
	|-if $texts|@count eq 0-|
	<h4>Su b&uacute;squeda no obtuvo resultados.</h4>
	|-else-|
	<table width="100%" border="0" cellpadding="3" cellspacing="1" id="tabla-texts" class="tablaborde">
    <thead>
      <tr>
        <th width="5%">id</th>
        <th width="90%">|-$actualLanguage->getName()-|</th>
        <th width="5%">&nbsp;</th>
      </tr>
    </thead>
    <tbody>   
    |-foreach from=$texts item=text name=for_texts-|
    <tr>
      <td class="celldato">|-$text->getId()-|</td>
      |-assign var="textContent" value=$text->getText()-|
      |-assign var="textId" value=$text->getId()-|
      <td class="celldato">|-if $text ne ""-||-$text->gettext()-|<div align="right" style="margin-top:8px;margin-right:8px;">
			<a href="#" |-popup sticky=true caption="Text Code" trigger="onClick" text="Codigo: #&#0035;$textId,$textContent#&#0035;" snapx=10 snapy=10-| class="deta"><img src="images/copycode14.png" border="0" /></a></div>
      |-/if-|</td>
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
	|-/if-|
</div>


