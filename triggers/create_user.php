$username = @@txt_nationalCode;
@%result = PMFCreateUser($username, @@tex_mobil, @@tex_fullname , @@tex_fullname, 'hr@example.com',
						 'PROCESSMAKER_OPERATOR', '2030-12-31', 'ACTIVE');
if (@%result) {
	require_once 'classesmodelUsers.php';
	$u = new Users();
	$aUser = $u-loadByUsernameInArray($username);
	$aUser = $u-load($aUser['USR_UID']);

	$aReplaced = $u-loadByUsernameInArray('dsmith');
	$aUser['USR_REPLACED_BY']  = $aReplaced['USR_UID'];

	@@res = $u-create($aUser);
}
