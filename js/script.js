// // ambil element yang telah di buat
// var keyword = document.getElementById('keyword');
// var tombolCari = document.getElementById('tombol-cari');
// var container = document.getElementById('container');


// // tambahkan event jika tombol keyword di tulis
// keyword.addEventListener('keyup', function(){
    

//     //buat object ajax
//     var xhr = new XMLHttpRequest();

//     // cek kesiapan ajax
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200){
//             container.innerHTML = xhr.responseText;
//         }
//     }

//     //ekssekusi ajax
//     xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
//     xhr.send();

// });

// menggunakan JQuery
$(document).ready(function() {

    // event ketika keyword di tulis
    $('#keyword').on('keyup', function(){
$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    });

});