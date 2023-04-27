function click_cb() {
    var check_count = 0;
    $(".chkbx input[type='checkbox']").each(function () {
      if ($(this).prop('checked')) {
        check_count = check_count + 1;
      }
    });
    if (check_count > 2) {
      $(".chkbx input[type='checkbox']").each(function () {
        if (!$(this).prop('checked')) {
          $(this).prop('disabled', true);
        }
      });
    } else {
      $(".chkbx input[type='checkbox']").each(function () {
        if (!$(this).prop('checked')) {
          $(this).prop('disabled', false);
        }
      });
    }
    return false;
  }