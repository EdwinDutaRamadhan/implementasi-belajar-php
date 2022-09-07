var keyword = document.getElementById('keywords');
var searchButton = document.getElementById('search-button');
var container = document.getElementById('container');

keyword.addEventListener('keyup', function(e) {
    //creat ajac object
    var xhr = new XMLHttpRequest();
    //prepare ajax
    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 && xhr.status == 200){
               container.innerHTML = xhr.responseText;
        }
    }
    xhr.open('GET', '../ajax/mahasiswa.php?keywords='+ keyword.value, true);
    xhr.send();
});
