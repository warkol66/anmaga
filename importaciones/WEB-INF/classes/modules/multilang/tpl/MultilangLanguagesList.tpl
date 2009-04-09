<h2>Languages</h2>
<div id="div_languages"> |-if $message eq "ok"-|<span class="message_ok">Idioma guardado correctamente</span>|-/if-|
  |-if $message eq "deleted_ok"-|<span class="message_ok">Idioma eliminado correctamente</span>|-/if-|
  <h3><a href="Main.php?do=multilangLanguagesEdit">Agregar Idioma</a></h3>
  <table border="0" cellpadding="3" cellspacing="1" id="tabla-languages" class="tablaborde">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Code</th>
        <th width="5%">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    |-foreach from=$languages item=language name=for_languages-|
    <tr>
      <td class="celldato">|-$language->getid()-|</td>
      <td class="celldato">|-$language->getname()-|</td>
      <td class="celldato">|-$language->getcode()-|</td>
      <td class="celldato"><form action="Main.php" method="get">
          <input type="hidden" name="do" value="multilangLanguagesEdit" />
          <input type="hidden" name="id" value="|-$language->getid()-|" />
          <input type="submit" name="submit_go_edit_language" value="Editar" class="boton" />
        </form>
        <form action="Main.php" method="post">
          <input type="hidden" name="do" value="multilangLanguagesDoDelete" />
          <input type="hidden" name="id" value="|-$language->getid()-|" />
          <input type="submit" name="submit_go_delete_language" value="Borrar" onclick="return confirm('Seguro que desea eliminar el language?')" class="boton" />
        </form></td>
    </tr>
    |-/foreach-|
    </tbody>
  </table>
</div>
