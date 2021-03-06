<?php

require_once("BaseAction.php");
require_once("GroupPeer.php");
require_once("GroupCategoryPeer.php");

class UsersGroupsListAction extends BaseAction {


	// ----- Constructor ---------------------------------------------------- //

	function UsersGroupsListAction() {
		;
	}


	// ----- Public Methods ------------------------------------------------- //

	/**
	* Process the specified HTTP request, and create the corresponding HTTP
	* response (or forward to another web component that will create it).
	* Return an <code>ActionForward</code> instance describing where and how
	* control should be forwarded, or <code>NULL</code> if the response has
	* already been completed.
	*
	* @param ActionConfig		The ActionConfig (mapping) used to select this instance
	* @param ActionForm			The optional ActionForm bean for this request (if any)
	* @param HttpRequestBase	The HTTP request we are processing
	* @param HttpRequestBase	The HTTP response we are creating
	* @public
	* @returns ActionForward
	*/
	function execute($mapping, $form, &$request, &$response) {

    BaseAction::execute($mapping, $form, $request, $response);

		//////////
		// Access the Smarty PlugIn instance
		// Note the reference "=&"
		$plugInKey = 'SMARTY_PLUGIN';
		$smarty =& $this->actionServer->getPlugIn($plugInKey);
		if($smarty == NULL) {
			echo 'No PlugIn found matching key: '.$plugInKey."<br>\n";
		}

		$module = "Users";
		$section = "Groups";

    $smarty->assign("module",$module);
    $smarty->assign("section",$section);

		$groups = GroupPeer::getAll();
		$smarty->assign("groups",$groups);

    $smarty->assign("message",$_GET["message"]);

    if ( !empty($_GET["group"]) ) {
			//voy a editar un grupo

			try {
				$group = GroupPeer::get($_GET["group"]);
				$smarty->assign("currentGroup",$group);
				$groupCategories = $group->getCategories();
				$smarty->assign("currentGroupCategories",$groupCategories);
        $notAssignedCategories = $group->getNotAssignedCategories();
		    $smarty->assign("categories",$notAssignedCategories);
	    	$smarty->assign("accion","edicion");
	  	}
			catch (PropelException $e) {
			}
		}

		return $mapping->findForwardConfig('success');
	}

}
?>
