// $('.editFix').click(function(e){

//     e.preventDefault();
//     var rowId = e.target.id;
//     // console.log(rowId);
//     $.ajax({
//         type: 'GET',
//         url: '/fixing/' + rowId,
//         success: function(data) {
//             $(".editFixForm textarea[name=mark]").val(data.cartItem.options.mark);
//             $(".name").text(data.cartItem.name);
//             $(".description").text(data.cartItem.options.description);
//             $(".editFixForm textarea[name=additionalDescription]").val(data.cartItem.options.additional_description);
//             $(".editFixForm input[name=rowId]").val(data.cartItem.rowId);
//             $('.editFixModal').modal('show');
//         },
//         error: function(data) {
//             console.log(data);
//         }
//     });

// });

// $('.updateButton').click(function(e){

//     e.preventDefault();
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//     $.ajax({
//         type: 'PUT',
//         url: '/fixing/' + $(".editFixForm input[name=rowId]").val(),
//         data: {
//             mark: $(".editFixForm textarea[name=mark]").val(),
//             description: $(".description").innerHTML,
//             additionalDescription: $(".editFixForm textarea[name=additional-description]").val(),
//         },
//         dataType: 'json',
//         success: function(data) {
//             // console.log(data);
//             $('.editFixForm').trigger("reset");
//             $(".editFixModal .close").click();
//             window.location.reload();
//             success.style.display = 'block';
//             // success.delay(2000).fadeOut();
//         },
//         error: function(data) {
//             var errors = $.parseJSON(data.responseText);
//             $('#edit-task-errors').html('');
//             $.each(errors.messages, function(key, value) {
//                 $('#edit-task-errors').append('<li>' + value + '</li>');
//             });
//             $("#edit-error-bag").show();
//         }
//     });

// });

$(document).ready(function(){
    $("input[name$='name'").click(function(){
        var problem = $(this).val();
        if(problem == 'Ps4 Pad'){
            $('.consoleProblems').hide();
            $('.padProblems').show();
        }
        if(problem == 'Ps4 Console'){
            $('.padProblems').hide();
            $('.consoleProblems').show();
        }
    })
})


$('.fixButton').click(function(e) {
    e.preventDefault();
    var $this = $(this);
    $this.text('Saving...');
    var fixName = $(".name:checked").val();
    var fixDescription = $(".description").val();
    var fixAdditionalDescription = $(".additionalDescription").val();
    var fixMark = $(".marker").val();
    var warning = document.getElementById('warning');
    var success = document.getElementById('success');

    if(fixName === undefined){
        warning.style.display = 'block';
        $this.text('Save Request');
    }else if(fixDescription === undefined){
        warning.style.display = 'block';
        $this.text('Save Request');
    }else{
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

        $.ajax({
            url: '/fixing/save-fix-request',
            type: 'POST',
            data: {name: fixName, description: fixDescription, additionalDescription: fixAdditionalDescription, mark: fixMark },
            success: function (response) {
                console.log(response);
                success.style.display = 'block';
                window.location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
                window.location.reload();
             }
        });
    }

});

$('.deleteFix').click(function(e){

    e.preventDefault();
    var rowId = e.target.id;

    $.ajax({
        type: 'GET',
        url: '/fixing/' + rowId,
        success: function(data) {
            $(".deleteForm input[name=rowId]").val(data.cartItem.rowId);
            $(".name").text(data.cartItem.name);
            $(".description").text(data.cartItem.options.description);
            $(".additionalDescription").text(data.cartItem.options.additional_description);
            $(".marker").text(data.cartItem.options.mark);
            $('.deleteModal').modal('show');
        },
        error: function(data) {
            console.log(data);
            window.location.reload();
        }
    });

});

$('.deleteButton').click(function(e){

    e.preventDefault();
    var success = document.getElementById('success');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'DELETE',
        url: '/fixing/' + $(".deleteForm input[name=rowId]").val(),
        data: {
            rowId: $(".deleteForm input[name=rowId]").val(),
        },
        dataType: 'json',
        success: function(data) {
            $('.deleteForm').trigger("reset");
            $(".deleteForm .close").click();
            success.style.display = 'block';
            window.location.reload();
        },
        error: function(data) {
            console.log(data);
            window.location.reload();
        }
    });
});

$('.deleteModal').on('hidden.bs.modal', function () {
    location.reload();
});
