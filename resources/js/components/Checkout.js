$('.save').click(function(e) {
    e.preventDefault();
    var $this = $(this);
    $this.text('Saving...');
    var name = $(".name").val();
    var phone = $(".phone").val();
    var email = $(".email").val();
    var state = $(".state").val();
    var address = $(".address").val();
    var warning = document.getElementById('warning');
    var success = document.getElementById('success');

    if (phone=== "") {
        warning.style.display = 'block';
        $this.text('Save');
    }else if(state === ""){
        warning.style.display = 'block';
        $this.text('Save');
    }else if(address === ""){
        warning.style.display = 'block';
        $this.text('Save');
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
            data: {
                name: name,
                phone: phone,
                email: email,
                state: state,
                address: address
            },
            success: function (response) {
                console.log(response);
                success.style.display = 'block';
                warning.style.display = 'none';
                $this.text('Saved');
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
                window.location.reload();
             }
        });
    }

});
