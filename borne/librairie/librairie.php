<?php
if (isset($_POST['function'])) {

    $function = $_POST['function'];
    $params = $_POST['params'];

    $calledFunction = '$db = new connexion(); echo $db->' . $_POST['function'] . '(';
    foreach ($params as $param => $value) {
        $calledFunction .= $value . ', ';
    }
    $calledFunction = substr($calledFunction,0,-2);
    $calledFunction .= ');';

    eval($calledFunction);
}

function connexion($userInfo)
{
    global $db;
    $_SESSION[PROJET_NAME]['authentified'] = 0;
    $_SESSION[PROJET_NAME]['autorized'] = 0;
    //$_SESSION[PROJET_NAME]['userInfo'] = $userInfo;
    $login_ldap = is_array($userInfo['login']) ? $userInfo['login'][0] : $userInfo['login'];
    $login_ldap = strtolower($login_ldap);
	$sql = 'select LOGIN_LDAP,NOM,DROIT,ACTIF,CODE_COM,DEFAULT_COM from ARRP_USERS where LOGIN_LDAP=\'' . protegeChaineOracle($login_ldap).'\'';
	$res = executeReq($db,$sql);
	if(list($login_ldap,$nom,$droit,$actif,$code_com,$default_com) = $res->fetchRow()){
		$tabdroit = explode(',',str_replace(';',',',$droit));
		if($actif==1 && in_array('connect',$tabdroit)){
    		$_SESSION[PROJET_NAME]['login_ldap'] = $login_ldap;
    		$_SESSION[PROJET_NAME]['droit'] = $tabdroit;
            $_SESSION[PROJET_NAME]['code_com'] = '\'' . str_replace(',','\',\'',$code_com) . '\'';
            $_SESSION[PROJET_NAME]['tab_code_com'] = explode(',', $code_com);
            $_SESSION[PROJET_NAME]['default_com'] = $default_com;
            $_SESSION[PROJET_NAME]['authentified'] = 1;
    		$_SESSION[PROJET_NAME]['autorized'] = 1;
            $sql = 'update ARRP_USERS set LAST_LOGIN = SYSDATE where LOGIN_LDAP=\'' . protegeChaineOracle($login_ldap).'\'';
            $res = executeReq($db,$sql);
		}else{
		    //echo 'Droit insuffisant';
		    return false;
		}
	}
    return true;
}



function getCurrentDateAndTime() {
    $date = new DateTime('now');
    echo $date->format('d-m-Y H:i');
}
?>