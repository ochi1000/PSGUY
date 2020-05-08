$('.save').click(function(e) {
    e.preventDefault();
    var phone = $(".phone").val();
    var state = $(".state").val();
    var address = $(".address").val();
    var warning = document.getElementById('warning');
    var success = document.getElementById('success');
    if (phone=== "") {
        warning.style.display = 'block';
    }else if(state === ""){
        warning.style.display = 'block';
    }else if(address === ""){
        warning.style.display = 'block';
    }
    else{

        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $.ajax({
            url: '/adduserinfo',
            type: 'POST',
            data: {phone: phone, state: state, address: address},
            success: function (response) {
                console.log(response);
                success.style.display = 'block';
                success.fadeOut();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
                window.location.reload();
             }
        });
    }

});
