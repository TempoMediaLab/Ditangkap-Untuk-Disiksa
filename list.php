<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link media="all" type="text/css" rel="stylesheet" href="my_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Ditangkap Untuk Disiksa</title>
    <style>
        .layout a{
          background-color:#d4d4d4;
          border: 0.1px solid;
          border-color: #b8b8b8;
          text-decoration:none;
          color: white;
        }
        a:hover {color: red; background-color: #999;}

        a.body-btn{
          background: white;
          padding: 10px;
          color: #2e2e2e;
        }

        a.body-btn:hover {color: white; background-color: #999;}
    </style>
</head>
<body>
  <section class="bg-file">
    <header>
        <img class="right-img" src="img/logo.png">
        <h1><b> YANG TERSIKSA </b></h1>
        <h2>Cerita para tahanan yang disiksa polisi dalam penjara</h2>
    </header>
  </section>

<div class="layout">
      <section class="header-bg">
        <ul class="body-bg">
          <li style="text-align:center"><h1><b>255</b></h1>JUMLAH KORBAN</li>
          <li>Liputan investigasi ini bersifat berkelanjutan. Angka yang sekarang kami sajikan bisa bertambah. Makanya, kami menguncang pembaca untuk "mengisi kekosongan" atau melaporkan kejadian penyiksaan oleh kepolisian. <br><br><br><center><a class="body-btn" href="index.html">Laporkan</a></center></li>
          <li style="background-image:url(img/yusman.png); background-size:cover"><h2><b>YUSMAN,<br>PENJARA,<br>DAN SIKSAAN</b></h2> Selamatkan Yusman Telambauna di newsgame interaktif ini<br><br><br><center><a class="body-btn" href="game/index.html">Mainkan</a></center></li>
        </ul>
      </section>
    <div class="container">
      <div class="konten">
        <ul id="tombol" class="tombol"></ul>
      </div>
    </div>
</div>
</body>
</html>

<!-- modal for pop up -->
<div class="modal fade" id="modal-id">
    <div class="modal-dialog" style="background-color: #9a9a9a; border: 1px solid; border-color:white">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h2 class="modal-title" id="name" style="color: white"></h2>
        </div>
        <div class="modal-body" style="color:white">
          <label for="label">KASUS AWAL :</label>
          <p id="case"></p></br>
          <label for="label">METODE PENYIKSAAN :</label>
          <p id="metode"></p></br>
          <label for="label">DETAIL KASUS :</label>
          <p id="metode_penyiksaan"></p></br>
          <label for="label">Jumlah Korban :</label>
          <p id="number_of_victim"></p>
          <label for="label">Efek :</label>
          <p id="effect"></p>
          <hr>
          <label for="label">Pelaku :</label>
          <h5 id="persecutor"></h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

    </div>
</div>

<script type="text/javascript">
var kasus = [];
var kasusFiltered;

  $(document).ready(function(){
    $.getJSON("data.json",function(data){
      var tombol = '';
      kasus = data;
      $.each(data,function(kety, value){
        if ( value.EFFECT == 'Meninggal'){
         tombol += '<a style="background-color:black; text-decoration:none;" onclick="klik('+kety+')" data-toggle="modal" href="#modal-id"><li><span>&nbsp'+value.DATE+'</span></br><b>'+value.VICTIM+'</br>'+value.METODE+'</b></br>'+value.CITY+'</li></a>';
        } else {
         tombol += '<a onclick="klik('+kety+')" data-toggle="modal" href="#modal-id"><li style="color:#b6b6b6"><span>&nbsp'+value.DATE+'</span></br><b style:"font-size: 10px">'+value.VICTIM+'</br>'+value.METODE+'</b></br>'+value.CITY+'</li></a>';
        }
      });
      $('#tombol').append(tombol);
    });
  });

function klik(id) {
  kasusFiltered =  kasus.filter(function(data) {
    return data.ID == id;
  });
  document.getElementById('name').innerHTML = kasusFiltered[0].VICTIM;
  document.getElementById('case').innerHTML = kasusFiltered[0].CASE;
  document.getElementById('metode').innerHTML = kasusFiltered[0].METODE;
  document.getElementById('metode_penyiksaan').innerHTML = kasusFiltered[0].METODE_PENYIKSAAN;
  document.getElementById('number_of_victim').innerHTML = kasusFiltered[0].NUMBER_OF_VICTIM;
  document.getElementById('effect').innerHTML = kasusFiltered[0].EFFECT;
  document.getElementById('persecutor').innerHTML = kasusFiltered[0].PERSECUTOR;
}

</script>
