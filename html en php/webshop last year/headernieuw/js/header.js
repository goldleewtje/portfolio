$(function(){
    $('#login').popover({

        placement: 'bottom',
        title: 'Inloggen',
        html:true,
        content:  $('#inlogform').html()
    }).on('click', function(){
        // had to put it within the on click action so it grabs the correct info on submit
        $('.btn-primary').click(function(){
            $.post('/echo/html/',  {
                email: $('#email').val(),
                name: $('#password').val(),
            }, function(r){
                $('#pops').popover('hide')
                $('#result').html('resonse from server could be here' )
            })
        })
    })
})
$(function(){
    $('#winkelwagen button').popover({

        placement: 'bottom',
        title: 'Winkelwagen',
        html:true,

        content:  $('#mand').html()
    }).on('click', function(){
        $('.btn-primary').click(function(){

            $.post('/echo/html/',  {

            }, function(r){
                $('#pops').popover('hide')
                $('#result').html('resonse from server could be here' )
            })
        })
    })

})
$(function(){
    $('#catlist .button1').popover({

        placement: 'bottom',
        title: 'Desktops & Laptops',
        html:true,

        content:  $('#desktops').html()
    }).on('click', function(){

        $('.btn-primary').click(function(){

            $.post('/echo/html/',  {

            }, function(r){
                $('#pops').popover('hide')
                $('#result').html('resonse from server could be here' )
            })
        })
    })

})
$(function(){
    $('#catlist .button2').popover({

        placement: 'bottom',
        title: 'Randapparatuur',
        html:true,

        content:  $('#randapparatuur').html()
    }).on('click', function(){

        $('.btn-primary').click(function(){

            $.post('/echo/html/',  {

            }, function(r){
                $('#pops').popover('hide')
                $('#result').html('resonse from server could be here' )
            })
        })
    })

})
$(function(){
    $('#catlist .button3').popover({

        placement: 'bottom',
        title: 'Onderdelen',
        html:true,

        content:  $('#onderdelen').html()
    }).on('click', function(){

        $('.btn-primary').click(function(){

            $.post('/echo/html/',  {

            }, function(r){
                $('#pops').popover('hide')
                $('#result').html('resonse from server could be here' )
            })
        })
    })

})