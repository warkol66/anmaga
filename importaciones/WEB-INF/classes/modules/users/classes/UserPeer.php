<?php
// The parent class
require_once 'users/classes/om/BaseUserPeer.php';

// The object class
include_once 'User.php';

include_once 'UserInfo.php';
include_once 'UserInfoPeer.php';

include_once 'UserGroup.php';
include_once 'UserGroupPeer.php';

//soporte GMT
require_once('TimezonePeer.php');

/** 
 *
 * @package    users
 */
class UserPeer extends BaseUserPeer {

		//Setea si se eliminan realmente los usuarios de la base de datos o se marcan como no activos
		const DELETEUSERS = false;

	/**
	* Obtiene todos los usuarios.
	*
	*	@return array Informacion sobre todos los usuarios
	*/
	function getAll() {
		$cond = new Criteria();
		$cond->add(UserPeer::ACTIVE, 1);
		$cond->addJoin(UserPeer::ID,UserInfoPeer::USERID,Criteria::LEFT_JOIN);
		$todosObj = UserPeer::doSelect($cond);
		return $todosObj;
  }
  
	 /**
	* Obtiene todos los usuarios desactivados.
	*
	*	@return array Informacion sobre los usuarios
	*/
	function getDeleteds() {
		$cond = new Criteria();
		$cond->add(UserPeer::ACTIVE, 0);
		$cond->addJoin(UserPeer::ID,UserInfoPeer::USERID,Criteria::LEFT_JOIN);
		$todosObj = UserPeer::doSelect($cond);
		return $todosObj;
  }

  /**
  * Crea un usuario nuevo.
  *
  * @param string $username Nombre de usuario
  * @param string $name Nombre del usuario
  * @param string $surname Apellido del usuario
  * @param string $pass Contraseņa del usuario
  * @param int $levelId Id del nivel de usuarios
  * @param string $mailAddress Email del usuario
  * @return boolean true si se creo el usuario correctamente, false sino
	*/
  function create($username,$name,$surname,$pass,$levelId,$mailAddress,$timezone) {
		$user = new User();
		$user->setUsername($username);
		$user->setPassword(md5($pass."ASD"));
		$user->setCreated(time());
		$user->setUpdated(time());
		$user->setLevelId($levelId);		
		$user->setActive(1);
		$user->setTimezone($timezone);
		$user->save();
		$userInfo = new UserInfo();
		$userInfo->setUserId($user->getId());
		$userInfo->setName($name);
		$userInfo->setSurname($surname);
		$userInfo->setMailAddress($mailAddress);
		$userInfo->save();
		return true;
  }
  
  /**
  * Obtiene la informacion de un usuario.
  *
  * @param int $id Id del usuario
  * @return array Informacion del usuario
  */
  function get($id) {
		$cond = new Criteria();
		$cond->add(UserPeer::ID, $id);
		$cond->addJoin(UserPeer::ID,UserInfoPeer::USERID,Criteria::LEFT_JOIN);
		$todosObj = UserPeer::doSelect($cond);
		return $todosObj[0];
  }
  
  /**
  * Obtiene los grupos de usuarios en los cuales es miembro un usuario.
  *
  * @param int $id Id del usuario
  * @return array Grupos de Usuarios
  */
  function getGroupsByUser($id) {
		$cond = new Criteria();
		$cond->add(UserGroupPeer::USERID, $id);
		$todosObj = UserGroupPeer::doSelectJoinGroup($cond);
		return $todosObj;
  }
  
  /**
  * Agrega un usuario a un grupo de usuarios.
  *
  * @param int $user Id del usuario
  * @param int $group Id del grupo de usuarios
  * @return boolean true si se agrego correctamente, false sino
  */
	function addUserToGroup($user,$group) {
		try {
			$userGroup = new UserGroup();
			$userGroup->setUserId($user);
			$userGroup->setGroupId($group);
			$userGroup->save();
			return true;
		}
		catch (PropelException $e) {
			return false;
		}
	}
	
  /**
  * Elimina un usuario de un grupo de usuarios.
  *
  * @param int $user Id del usuario
  * @param int $group Id del grupo de usuarios
  * @return boolean true si se elimino correctamente, false sino
  */
	function removeUserFromGroup($user,$group) {
		try {
			$cond = new Criteria();
			$cond->add(UserGroupPeer::USERID, $user);
			$cond->add(UserGroupPeer::GROUPID, $group);
			$todosObj = UserGroupPeer::doSelect($cond);
			$obj = $todosObj[0];
			$obj->delete();
			return true;
		}
		catch (PropelException $e) {
			return false;
		}
	}

  /**
  * Actualiza la informacion de un usuario.
  *
  * @param int $id Id del usuario
  * @param string $username Nombre de usuario
  * @param string $name Nombre del usuario
  * @param string $surname Apellido del usuario
  * @param string $pass Contraseņa del usuario
  * @param int $levelId Id del nivel de usuarios
  * @param string $mailAddress Email del usuario
  * @return boolean true si se actualizo la informacion correctamente, false sino
	*/
  function update($id,$username,$name,$surname,$pass,$levelId,$mailAddress,$timezone) {
		try {
			$user = UserPeer::retrieveByPK($id);
			$user->setUsername($username);
			$user->setUpdated(time());
			$user->setLevelId($levelId);
			$user->setTimezone($timezone);
			if ( !empty($pass) )
				$user->setPassword(md5($pass."ASD"));
			$user->save();
			$userInfo = UserInfoPeer::retrieveByPK($id);
			$userInfo->setName($name);
			$userInfo->setSurname($surname);
			$userInfo->setMailAddress($mailAddress);			
			$userInfo->save();
			return true;
		}
		catch (PropelException $e) {
			return false;
		}
  }

	/**
	* Elimina un usuario a partir del id.
	*
	* @param int $id Id del usuario
	* @return boolean true
	*/
  function delete($id) {
		$user = UserPeer::retrieveByPk($id);
		if (UserPeer::DELETEUSERS)
			$user->delete();
		else {
			$user->setActive(0);
			$user->save();
		}
		return true;
  }

	/**
	* Activa un usuario a partir del id.
	*
  * @param int $id Id del usuario
	*	@return boolean true si se activo correctamente al usuario, false sino
	*/
  function activate($id) {
		$user = UserPeer::retrieveByPk($id);
		$user->setActive(1);
		$user->save();
		return true;
  }

	/**
	* Autentica a un usuario.
	*
	* @param string $username Nombre de usuario
	* @param string $password Contraseņa 
	* @return User Informacion sobre el usuario, false si no fue exitosa la autenticacion
	*/
  function auth($username,$password) {
		$cond = new Criteria();
		$cond->add(UserPeer::USERNAME, $username);
		$cond->add(UserPeer::ACTIVE, "1");
		$cond->addJoin(UserPeer::ID,UserInfoPeer::USERID,Criteria::LEFT_JOIN);
		$todosObj = UserPeer::doSelect($cond);
		$user = $todosObj[0];
		if ( !empty($user) ) {
			if ( $user->getPassword() == md5($password."ASD") ) {
				$user->setLastLogin(time());
				$user->save();
				return $user;
			}
		}
		return false;
  }


	/**
	* Autentica a un usuario.
	*
	* @param string $username Nombre de usuario
	* @param string $mailAddress Email
	* @return array [0] -> User Informacion sobre el usuario; [1] -> New password, false si no fue exitosa la autenticacion de usuario e email
	*/
  function generatePassword($username,$mailAddress) {
		$cond = new Criteria();
		$cond->add(UserPeer::USERNAME, $username);
		$cond->add(UserPeer::ACTIVE, "1");
		$cond->addJoin(UserPeer::ID,UserInfoPeer::USERID,Criteria::LEFT_JOIN);
		$todosObj = UserPeer::doSelect($cond);
		$user = $todosObj[0];
		if ( !empty($user) ) {
			$userInfo = $user->getUserInfo();
			if ( !empty($userInfo) && $userInfo->getMailAddress() == $mailAddress ) {
				$newPassword = UserPeer::getNewPassword();
				$user->setPassword(md5($newPassword."ASD"));
				$user->save();
				$result = array();
				$result[0] = $user;
				$result[1] = $newPassword;
				return $result;
			}
		}
		return false;
  }

  /**
  * Genera una nueva contraseņa.
  *
  * @param int $length [optional] Longitud de la contraseņa
  * @return string Contraseņa
  */
	function getNewPassword($length = 8)
	{
  	// start with a blank password
	  $password = "";

  	// define possible characters
	  $possible = "0123456789bcdfghjkmnpqrstvwxyz";

	  // set up a counter
  	$i = 0;

	  // add random characters to $password until $length is reached
  	while ($i < $length) {

	    // pick a random character from the possible ones
  	  $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

	    // we don't want this character if it's already in the password
  	  if (!strstr($password, $char)) {
	      $password .= $char;
  	    $i++;
	    }
	  }
  	// done!
	  return $password;
	}

  /**
  * Obtiene la cantidad de filas por pagina por defecto en los listado paginados.
  *
  * @return int Cantidad de filas por pagina
  */
  function getRowsPerPage() {
    global $system;
    return $system["config"]["system"]["rowsPerPage"];
  }

  /**
  * Obtiene todos los noticias paginados con las opciones de filtro asignadas al peer.
  *
  * @param int $page [optional] Numero de pagina actual
  * @param int $perPage [optional] Cantidad de filas por pagina
  *	@return array Informacion sobre todos los newsarticles
  */
  function getAllPaginated($page=1,$perPage=-1) {  
    if ($perPage == -1)
      $perPage = 	UserPeer::getRowsPerPage();
    if (empty($page))
      $page = 1;
    require_once("propel/util/PropelPager.php");
		$cond = new Criteria();
		$cond->add(UserPeer::ACTIVE, 1);
		$cond->addJoin(UserPeer::ID,UserInfoPeer::USERID,Criteria::LEFT_JOIN);
    $pager = new PropelPager($cond,"UserPeer", "doSelect",$page,$perPage);
    return $pager;
   }

}
