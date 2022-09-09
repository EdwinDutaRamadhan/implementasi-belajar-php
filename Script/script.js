$(document).ready(function() {
    //hide search button
    $('#search-button').hide();
    //event input writed
    $('#keywords').on('keyup', function(e) {
        //display loader
        $('.loader').show();

        //ajax with load
        // $('#container').load('../ajax/mahasiswa.php?keywords=' + $('#keywords').val());
        $.get('../ajax/mahasiswa.php?keywords=' + $('#keywords').val(), function(data){
            $('#container').html(data);
            $('.loader').hide();
        });

    });
    
});

/*
epiz_32552430
DSSvGk5JKu
db = epiz_32552430_db_pedes
mysql username = epiz_32552430
hostname = sql108.epizy.com
*/
