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
