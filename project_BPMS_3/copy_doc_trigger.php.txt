$app_uid = @@APPLICATION;
$resultMain = @@grd_01;

if (count($resultMain) > 0) {
	$review_list = [];
	foreach ($resultMain as $key => $app) {
		$review_list[$key] = [
			'txt_g2_doc' => $app['txt_doc']
		];
	}

	// تنظیم مقادیر گرید
	@@grd_02 = $review_list; // اصلاح شده
}

