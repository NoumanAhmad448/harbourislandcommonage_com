$("#land_reg").submit(function (e) {
    e.preventDefault();
    var data = new FormData($(this).get(0));
    if(debug){
        console.log(data)
    }

    $.ajax({
      url: land_save,
      type: 'post',
      contentType: false,
      processData: false,
      data: data,
      success: function success(d) {
        console.log(d)
      },
      error: function error(d) {
        popup_message(d)
      },
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType: 'JSON'
    });
  });