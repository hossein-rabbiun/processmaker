// اطلاعات کاربر لاگین شده
$user_info = PMFInformationUser(@@USER_LOGGED);
$translatorName = $user_info['lastname'];

// آرایه گرید (اطلاعات قبلی را اگر وجود دارد حفظ شود)
$translators_feedback = isset(@@translators_feedback) ? @@translators_feedback : [];

// اطلاعات جدید مترجم
$new_feedback = [
    'txt_translatorName' => $translatorName, // نام مترجم
    'txt_cost' => @@txt_cost,                // هزینه وارد شده توسط مترجم
    'date_maximumDate' => @@date_maximumDate                // زمان وارد شده توسط مترجم
];

// اضافه کردن اطلاعات جدید به آرایه
$translators_feedback[] = $new_feedback;

// ذخیره آرایه در متغیر فرآیند
@@translators_feedback = $translators_feedback;

// درج خودکار نام مترجم در گرید
@@grd_translators[1]['txt_translatorName'] = $translatorName;
