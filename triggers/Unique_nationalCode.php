$act=$_POST["act"];
if ($act=="check"){

	$nationalCode = $_POST["txt_nationalCode"]; // دریافت کد ملی از ورودی فرم
	// اجرای کوئری برای بررسی وجود کد ملی
	$query = "SELECT COUNT(*) As count FROM USERS WHERE USR_USERNAME = '$nationalCode'";
	$result = executeQuery($query);
	
    $response = ["isDuplicate" => false];
	// ذخیره نتیجه در متغیرهای فرآیند
	if ($result && $result[1]['count'] > 0) {
		$response["isDuplicate"] = true;}
       die(json_encode($response));
	
}
