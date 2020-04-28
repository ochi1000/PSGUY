import React  from 'react'
//Service form, address bar shows only if state location is enugu
// $(function(){
//     // $("#address").hide();  // By default use jQuery to hide the second modal

//     // We can use the change(); function to watch the state of the select box and run some conditional logic every time it's changes to hide or show the second select box
//     $("select#state").change(function(){
//         var state = $("#state option:selected").val();
//         if(state === 'Abia'){
//             $('.no-display').css('display','block');
//         }else{
//             $('.no-display').css('display','none');
//         }
//     });

// });

// $('.addFixDiv').click(function(e){
//     e.preventDefault();
//     $('.name').prop('checked',false);
//     $('.description').val('');
//     $('.additionalDescription').val('');
//     $('.marker').val('');
// });


$('.fixButton').click(function(e) {
    e.preventDefault();

    var fixName = $(".name:checked").val();
    var fixDescription = $(".description").val();
    var fixAdditionalDescription = $(".additionalDescription").val();
    var fixMark = $(".marker").val();

    if (fixName == ""|| fixDescription == "") {
        console.log("we need this info bro");
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
                window.location.reload();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(errorThrown);
             }
        });
    }

});

$('.editFix').click(function(e){

    e.preventDefault();
    var rowId = e.target.id;

    $.ajax({
        type: 'GET',
        url: '/fixing/' + rowId,
        success: function(data) {
            console.log(data);
            $(".editFixForm textarea[name=mark]").val(data.cartItem.options.mark);
            $(".editFixForm textarea[name=description]").val(data.cartItem.options.description);
            $(".editFixForm textarea[name=additionalDescription]").val(data.cartItem.options.additionalDescription);
            $(".editFixForm input[name=rowId]").val(data.cartItem.rowId);
            $('.editFixModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });

});

$('.deleteFix').click(function(e){

    e.preventDefault();
    var rowId = e.target.id;

    $.ajax({
        type: 'GET',
        url: '/fixing/' + rowId,
        success: function(data) {
            $(".deleteForm input[name=rowId]").val(data.cartItem.rowId);
            $('.deleteModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });

});

$('.updateButton').click(function(e){

    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'PUT',
        url: '/fixing/' + $(".editFixForm input[name=rowId]").val(),
        data: {
            mark: $(".editFixForm textarea[name=mark]").val(),
            description: $(".editFixForm textarea[name=description]").val(),
            additionalDescription: $(".editFixForm textarea[name=additionalDescription]").val(),
        },
        dataType: 'json',
        success: function(data) {
            // console.log(data);
            $('.deleteForm').trigger("reset");
            $(".deleteForm .close").click();
            window.location.reload();
        },
        error: function(data) {
            var errors = $.parseJSON(data.responseText);
            $('#edit-task-errors').html('');
            $.each(errors.messages, function(key, value) {
                $('#edit-task-errors').append('<li>' + value + '</li>');
            });
            $("#edit-error-bag").show();
        }
    });

});

$('.deleteButton').click(function(e){

    e.preventDefault();
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
            // console.log(data);
            $('.deleteForm').trigger("reset");
            $(".deleteForm .close").click();
            window.location.reload();
        },
        error: function(data) {
            var errors = $.parseJSON(data.responseText);
            $('#edit-task-errors').html('');
            $.each(errors.messages, function(key, value) {
                $('#edit-task-errors').append('<li>' + value + '</li>');
            });
            $("#edit-error-bag").show();
        }
    });
});
