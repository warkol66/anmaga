function cambiaclase(element,clase) {
	var NAME = document.getElementById(element);
	NAME.className=clase;
}
		function logout(){
			return window.confirm("Esta seguro que quiere salir del sistema?")
		}

<!-- Script usado para hacer un checkbox masivo -->

<!-- Begin
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
return "Deseleccionar Todos"; }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
return "Seleccionar Todos"; }
}
//  End -->


function addConfigAttribute(li) {
	ul = document.getElementById(li.id+"_ul");
	newName=window.prompt("Nombre del nuevo atributo:",'');
	ul.innerHTML += "<li>"+newName+": <input type='text' name='"+li.id+"["+newName+"]' value='' />"+
		'<a class="a_image" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)">'+
		'<img src="images/delete-comment-blue.gif" alt="Eliminar" /></a></li>';
}

function addConfigSection(li) {
	ul = document.getElementById(li.id+"_ul");
	newName=window.prompt("Nombre de la nueva seccion:",'');
	ul.innerHTML += "<li id='"+li.id+"["+newName+"]'>"+newName+
		' <a class="a_image" href="#" onclick="javascript:addConfigAttribute(this.parentNode)"><img src="images/add-comment-blue.gif" alt="Agregar Atributo" title="Agregar Atributo" /></a>'+
		' <a class="a_image" href="#" onclick="javascript:addConfigSection(this.parentNode)"><img src="images/add-folder-green.gif" alt="Agregar Secci&oacute;n" title="Agregar Secci&oacute;n" /></a>'+
		' <a class="a_image" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)">'+
		'<img src="images/delete-folder-green.gif" alt="Eliminar" /></a>'+
		"<ul id='"+li.id+"["+newName+"]_ul'></ul></li>";
}

function deleteConfigAttribute(li) {
	ul = li.parentNode;
	ul.removeChild(li);
}



var myGlobalHandlers = {
	onCreate: function(){
		Element.show('systemWorking');
	},
	onFailure: function(){
		alert('Sorry. There was an error.');
	},
	onComplete: function() {
		if(Ajax.activeRequestCount == 0){
			Element.hide('systemWorking');
		}
	}
};

Ajax.Responders.register(myGlobalHandlers);

function categoriesDoEditX() {
	var pars = 'do=categoriesDoEditX';
	var fields = Form.serialize('form_category_add');

	var myAjax = new Ajax.Updater(
				{success: 'table_categories_list'},
				url,
				{
					method: 'post',
					parameters: pars,
					postBody: fields,
					insertion: Insertion.Bottom
				});
	$('name').value = "";
}



