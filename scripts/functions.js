function logout(){
	return window.confirm("Esta seguro que quiere salir del sistema?")
} // End of logout

function CheckAllBoxes(fmobj) {
  for (var i=0;i<fmobj.elements.length;i++) {
    var e = fmobj.elements[i];
    if ( (e.name != 'allbox') && (e.type=='checkbox') && (!e.disabled) ) {
      e.checked = fmobj.allbox.checked;
    }
  }
} // End of CheckAllBoxes

function checkBoxesByName(boxesName) {  
  var allbox = document.getElementById('allbox');
  var arr = new Array();
  arr = document.getElementsByName(boxesName); 
  for(var i = 0; i < arr.length; i++) {
    var e = document.getElementsByName(boxesName).item(i);
    if ( (e.id != 'allbox') && (e.type=='checkbox') && (!e.disabled) ) {
      e.checked = allbox.checked;
    }
  }
} // End of checkBoxesByName

function switch_vis(element,display) {
	var e_ref="";
	var ant="";
	e_ref=document.getElementById(element);
	if (display == undefined)	{
		display='block';
	}
	ant=e_ref.style.display;
	if (e_ref.style.display !=  'none' && e_ref.style.display != "") {
		display='none';
	}
	else {
		display=display;
	}
	e_ref.style.display=display;
} // End of switch_vis

function switch_value(element,value) {
	var e_ref="";
	var ant="";
	e_ref=document.getElementById(element);
	if (value == undefined)	{
		value='Mostrar Sección';
	}
	ant=e_ref.value;
	if (e_ref.value !=  'Ocultar Sección' && e_ref.value != "")	{
		value='Ocultar Sección';
	}
	else {
		value=value;
	}
	e_ref.value=value;
} // End of switch_value

function switch_vis_mult(elements) {
	var i=0;
	for(i=0; i<elements.length; i++) {
		switch_vis(elements[i],'none');
	}
} // End of switch_vis_mult


function addConfigAttribute(li) {
	ul = document.getElementById(li.id+"_ul");
	newName=window.prompt("Nombre del nuevo atributo:",'');
	ul.innerHTML += "<li>"+newName+": <input type='text' name='"+li.id+"["+newName+"]' value='' />"+
		'<a class="a_image" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)">'+
		'<img src="images/delete-comment-blue.gif" alt="Eliminar" /></a></li>';
} // End of addConfigAttribute

function addConfigSection(li) {
	ul = document.getElementById(li.id+"_ul");
	newName=window.prompt("Nombre de la nueva seccion:",'');
	ul.innerHTML += "<li id='"+li.id+"["+newName+"]'>"+newName+
		' <a class="a_image" href="#" onclick="javascript:addConfigAttribute(this.parentNode)"><img src="images/add-comment-blue.gif" alt="Agregar Atributo" title="Agregar Atributo" /></a>'+
		' <a class="a_image" href="#" onclick="javascript:addConfigSection(this.parentNode)"><img src="images/add-folder-green.gif" alt="Agregar Secci&oacute;n" title="Agregar Secci&oacute;n" /></a>'+
		' <a class="a_image" href="#" onclick="javascript:deleteConfigAttribute(this.parentNode)">'+
		'<img src="images/delete-folder-green.gif" alt="Eliminar" /></a>'+
		"<ul id='"+li.id+"["+newName+"]_ul'></ul></li>";
} // End of addConfigSection

function deleteConfigAttribute(li) {
	ul = li.parentNode;
	ul.removeChild(li);
} // End of deleteConfigAttribute



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

<!-- Funtions module Categories -->

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
} // End of categoriesDoEditX

<!-- End of Categories -->

<!-- Funtions module Modules -->

function modulesDoActivateX(form) {
	var pars = 'do=modulesDoActivateX';
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'message'},
				url,
				{
					method: 'post',
					parameters: pars,
					postBody: fields,
					evalScripts: true
				});
		$('messageMod').innerHTML = "<span class='inProgress'>Actualizando sistema...</span>";
} // End of modulesDoActivateX

<!-- End of Modules -->

<!-- Funtions module Orders -->

function ordersAddItemToCartX(form) {
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'messageCart'},
				url,
				{
					method: 'post',
					postBody: fields
				});
	$('messageCart').innerHTML = "<span class='inProgress'>Agregando al carrito...</span>";
} // End of ordersAddItemToCartX

function ordersChangeItemCartX(form) {
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'messageCart'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});
	$('messageCart').innerHTML = "<span class='inProgress'>Modificando carrito...</span>";
} // End of ordersChangeItemCartX

function ordersRemoveItemCartX(form) {
	var fields = Form.serialize(form);

	var myAjax = new Ajax.Updater(
				{success: 'messageCart'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true
				});
	$('messageCart').innerHTML = "<span class='inProgress'>Eliminando producto del carrito...</span>";
} // End of ordersRemoveItemCartX

function ordersStateDoChangeX(form) {
	var newState = $('state').value;
	if (newState != "") {
		var fields = Form.serialize(form);

		var myAjax = new Ajax.Updater(
				{success: 'stateChanges'},
				url,
				{
					method: 'post',
					postBody: fields,
					evalScripts: true,
					insertion: Insertion.Bottom
				});
		$('messageState').innerHTML = "<span class='inProgress'>Cambiando estado...</span>";
	} 
	else {
		alert("Select new state!");
	}
} // End of ordersStateDoChangeX

function ordersSendOrdersExport(form) {
	$('do').value = "ordersExport";
	form.submit();
	return true;
} // End of ordersSendOrdersExport

function ordersSendOrdersDelete(form) {
	$('do').value = "ordersDoDelete";
	form.submit();
	return true;
} // End of ordersSendOrdersExport

function ordersSendOrdersExportSaf(form) {
	
	$('doActions').value = "ordersExportSaf";
	form.submit();
	
	return true;
} // End of ordersSendOrdersExportSaf

<!-- End of Orders -->



function cambiaclase(element,clase) {
	var NAME = document.getElementById(element);
	NAME.className=clase;
} // End of cambiaclase

