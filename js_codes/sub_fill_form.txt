
$(document).ready(function () {
    const mainform = $("#72321366967383cce387c03058240915"); // شناسه mainform

    // اضافه کردن رویداد کلیک به پنل با آیدی pnl_01
    mainform.find("#pnl_01").on("click", function () {
        mainform
            .find(
                "#txt_nationalCode, #tex_fullname, #tex_faderName, #dat_birthday, #tex_shenasnameh_code, #tex_birthCity, #tex_tellNumber, #tex_mobil, #tex_shenasnameh_code, #rad_gender"
            )
            .slideToggle("fast");
    });

    // اضافه کردن رویداد کلیک به پنل با آیدی pnl_02
    mainform.find("#pnl_02").on("click", function () {
        mainform
            .find(
                "#tex_personalCodeNemayandeh, #tex_fullNameNemayandeh, #tex_tellNumberNemayandeh, #tex_mobileNemayandeh"
            )
            .slideToggle("fast");
    });
  
      mainform.find("#pnl_03").on("click", function () {
        mainform.find(
        // باز و بسته کردن پنل
        "#tex_mobileMalek, #tex_tellNumberMalek, #txt_postalCode, #drp_city, #txt_address"
        )
          .slideToggle("fast");

    });
        // اضافه کردن رویداد focusout به فیلد کد ملی
 
        mainform.find("#txt_nationalCode").on("focusout", function () {
        const nationalCode = $(this).getValue();  
        let isValid = true;

            let sum = 0;
            for (let i = 0; i < 9; i++) {
                sum += parseInt(nationalCode.charAt(i)) * (10 - i);
            }

            const lastDigit = parseInt(nationalCode.charAt(9));
            const divideRemaining = sum % 11;

            if (divideRemaining < 2) {
                isValid = (lastDigit == divideRemaining);
            } else {
                isValid = (lastDigit == (11 - divideRemaining));
            }
        
        if (!isValid) {
            $(this).css("border", "2px solid red"); // تغییر حاشیه به رنگ قرمز در صورت عدم صحت کد ملی
            alert("کد ملی وارد شده معتبر نمی‌باشد.");}
          else{
             $(this).css("border", "1px solid #ccc");    
        }
    });

	mainform.find("#btn_firstSubmit").on("click", function (e) {
        e.preventDefault(); // جلوگیری از ارسال پیش‌ فرض فرم
        const nationalCode = mainform.find("#txt_nationalCode").val();
        // ارسال کد ملی برای بررسی یکتا بودن
        $.ajax({
            url: window.location, 
            type: "POST",
            data: { txt_nationalCode: nationalCode, act: "check" },
            dataType: "json",
            success: function (data) {
            console.log(data); 
                if (data.isDuplicate) {
                    alert("این کد ملی قبلاً ثبت شده است.");
                } else {
                    mainform.saveForm();
                    mainform.submit();
                   // alert("کد ملی صحیح");
                }
            },
            error: function () {
                alert("خطایی در سرور رخ داده است.");
            }
        });
    });

    

});


