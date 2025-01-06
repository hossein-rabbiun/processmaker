
// نام متغیر گرید 
$gridVar = @=grd_translators;
$selectedTranslatorId = null;

// بررسی ردیف های گرید
foreach ($gridVar as $row) {
    if (isset($row['chk_translatorSelection']) && $row['chk_translatorSelection'] == 1) {
        $selectedTranslatorId = $row['txt_translatorName'];  
        break; // توقف در صورت یافتن اولین مترجم انتخاب‌شده
    }
}

// بررسی اینکه آیا مترجمی انتخاب شده است یا خیر
if ($selectedTranslatorId === null) {
    throw new Exception("هیچ مترجمی انتخاب نشده است.");
}
$query="SELECT USR_UID from users where usr_firstname='$selectedTranslatorId'";
$result=executeQuery($query);

@@RID =$result[1]['USR_UID'];
