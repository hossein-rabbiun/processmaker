$("#but_01").click(function() {
  var rowCount = $("#grd_01").getNumberRows();
  var total = 0;
  for (var i = 1;i <= rowCount;i++) {
    total += parseFloat($("#grd_01").getValue(i, '4'));
  }

  $('#txt_sum_total').setValue(total);

});

$("#but_01").click(function() {
  var rowCount = $("#grd_01").getNumberRows();
  var score =0;var rate =0;var sum=0;

  for (var i = 1; i <= rowCount; i++) {
    score = parseFloat($("#grd_01").getValue(i, '4')); // فرض کنید 'score' آیدی ستون است
    rate = parseFloat($("#grd_01").getValue(i, '5')); // فرض کنید 'rate' آیدی ستون است
    sum = score * rate;
    //   $('#tex').setValue(sum,i, '6');

    // قرار دادن نتیجه ضرب در ستون 'sum'
    $('#grd_01').setValue(sum, i, '6');
  }

});
  
  