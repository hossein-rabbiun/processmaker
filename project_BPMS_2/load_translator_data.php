$app=@@APPLICATION;
//کوئری انتخاب نظرات مترجمین مربوط به درخواست مشتری خاص 
$query= "SELECT txt_translatorName,txt_cost,date_maximumDate
FROM pmt_translators_cost
INNER JOIN pmt_grd_translators ON pmt_translators_cost.app_uid = pmt_grd_translators.app_uid
WHERE pmt_translators_cost.uid = '$app'";

$result_grid = executeQuery($query);

if (!empty($result_grid)) {
    $gridData = []; // آرایه برای داده‌های گرید   
    // ساخت آرایه چندبعدی برای گرید
    foreach ($result_grid as $key => $row) {
        $gridData[$key] = [
            'txt_translatorName' => $row['txt_translatorName'], // ستون نام مترجم
            'txt_cost' =>$row['txt_cost'],                   // ستون هزینه
            'date_maximumDate' => $row['date_maximumDate']           // ستون تاریخ
        ];
    }
    
    // اختصاص دادهها به متغیر گرید
    @@grd_translators = $gridData;
} 