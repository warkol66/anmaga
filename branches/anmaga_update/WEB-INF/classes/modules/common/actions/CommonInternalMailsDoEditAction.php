<?php

class CommonInternalMailsDoEditAction extends BaseAction {

	function CommonInternalMailsDoEditAction() {
		;
	}

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
		
		$params = $_POST["internalMail"];
		
		//Asociamos al usuario actual como remitente del mensaje.
		if (!$this->bindCurrentUserToParams($params)) {
			global $loginPath;
			return new ForwardConfig('Main.php?do='.$loginPath, True);
		}
		
		$smarty->assign("filters", $_POST["filters"]);
		$smarty->assign("page", $_POST["page"]);
		$smarty->assign("message", $_POST["message"]);
		
		if (empty($_POST["id"])) {
			//Generamos un objeto para cada destinatario.
			foreach ($params['to'] as $recipient) {
				$internalMail = new InternalMail;
				$params['recipientType'] = $recipient['type'];
				$params['recipientId'] = $recipient['id'];
				Common::setObjectFromParams($internalMail, $params);
				$internalMail->save();  //Si falla en este caso no hacemos nada
										//se deben enviar el resto de los mensajes.
			}
		} else {
			//No hay edición de mensajes.
			return $mapping->findForwardConfig('failure');
		}
		
		return $mapping->findForwardConfig('success');
	}

	/**
	 * Asocia el usuario actualmente logueado con el remitente del
	 * mensaje.
	 * 
	 * @param array $params, arreglo asociativo de parametros.
	 * @return true si se realizó con exito, false sino.
	 */
	protected function bindCurrentUserToParams(&$params) {
		if (Common::isAffiliatedUser()) {
			$currentUser = Common::getAffiliatedLogged();
			$params['fromType'] = 'affiliate';
			$params['fromId'] = $currentUser->getId();
		} else if (Common::isSystemUser()){
			$currentUser = Common::getAdminLogged();
			$params['fromType'] = 'user';
			$params['fromId'] = $currentUser->getId();
		} else {
			//No hay usuario logueado. El BaseAction no debería permitirlo,
			//pero por si acaso...
			return false;
		}
		return true;
	}
}