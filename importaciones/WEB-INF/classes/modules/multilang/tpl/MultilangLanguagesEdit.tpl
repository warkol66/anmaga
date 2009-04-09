<div id="div_language">
    |-if $message eq "error"-|<span class="message_error">Ha ocurrido un error al intentar guardar el idioma</span>|-/if-|
    <h3>|-if $action eq "edit"-|Edit|-else-|Create|-/if-| Idioma</h3>
    <p> Ingrese los datos del idioma. </p>
  <form name="form_edit_language" id="form_edit_language" action="Main.php" method="post">
    <fieldset title="Formulario de edición de datos de un language">
    <p>
      <label for="name">name</label>
      <input type="text" id="name" name="name" value="|-if $action eq "edit"-||-$language->getname()-||-/if-|" title="name" maxlength="50" /> </p>
    <p>
      <label for="code">code</label>
      <input type="text" id="code" name="code" value="|-if $action eq "edit"-||-$language->getcode()-||-/if-|" title="code" maxlength="30" /> </p>
    <p> |-if $action eq "edit"-|
      <input type="hidden" name="id" id="id" value="|-if $action eq "edit"-||-$language->getid()-||-/if-|" />
      |-/if-|
      <input type="hidden" name="action" id="action" value="|-$action-|" />
      <input type="hidden" name="do" id="do" value="multilangLanguagesDoEdit" />
      <input type="submit" id="button_edit_language" name="button_edit_language" title="Aceptar" value="Aceptar" class="boton" />
    </p>
    </fieldset>
  </form>
</div>
