
// شناسه گروه "مترجمین"
$groupId = '895482679676ac87ca5f8f5009815373';

// اجرای کوئری برای گرفتن تمام کاربران عضو گروه "مترجمین"
$query = "SELECT U.USR_UID 
          FROM GROUP_USER GU 
          INNER JOIN USERS U ON GU.USR_UID = U.USR_UID 
          WHERE GU.GRP_UID = '$groupId'";
$result = executeQuery($query);

// شناسه فرآیند و شناسه تسک
$processID = "7566704546756a0c6201eb4098078316";
$taskUID = "6354780426757f5af566c26035394645";

// انتقال فرم به تمام مترجمین
foreach ($result as $user) {
    $translator = $user['USR_UID'];
    $newCaseId = PMFNewCase($processID, $translator, $taskUID, [
        "txt_fullName" => @@txt_fullName,
        "txt_email" => @@txt_email,
        "txt_mobile" => @@txt_mobile,
        "txt_tell" => @@txt_tell,
        "drp_typeTrainslation" => @@drp_typeTrainslation,
        "date_deadline" => @@date_deadline,
        "multi_translationFile" => @@multi_translationFile,
        "rad_managerOpinion" => @@rad_managerOpinion,
        "txr_managerDescription" => @@txr_managerDescription,
		"UID"=>@@APPLICATION
    ], "TO_DO");

}
