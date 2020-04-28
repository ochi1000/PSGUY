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
