<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="shortcut icon" href="assets/images/3d-cube.png" type="image/x-icon">

    <title>Gestion des devis clients</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">

      <!-- Ajoutez cela à la fin de votre body, avant vos autres scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  

    <style>


        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        h2 {
            color: #1e52a8;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            border: 1px solid #1e52a8;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #1e52a8;
            color: #ffffff;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-edit, .btn-delete {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .btn-edit i, .btn-delete i {
            font-size: 18px;
        }

        .btn-edit i {
            color: #1e52a8;
        }

        .btn-delete i {
            color: #ff6666;
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        #searchInput {
            width: 60%;
            padding: 10px;
            margin-right: 5px;
        }

        #searchButton {
            padding: 10px;
        }



        /*this is for btn consulter */

        .btn-view {
        background-color: transparent;
        border: none;
        cursor: pointer;
        }

        .btn-view i {
            font-size: 18px;
            color: #1e52a8;
        }
        /*Fin*/





          /* Ajoutez ce style pour le bouton "Confirmer" */
          #searchButton {
            background-color: #1e52a8; /* Couleur de fond bleu */
            color: #ffffff; /* Couleur du texte blanc */
            border: none; /* Retirer la bordure */
            cursor: pointer; /* Curseur en forme de main */
            padding: 10px 20px; /* Espacement autour du texte */
            transition: background-color 0.3s; /* Transition en douceur pour l'effet de survol */
        }

        #searchButton:hover {
            background-color: #0d2f6b; /* Couleur de fond bleu foncé lors du survol */
        }      

    </style>
  
</head>
<body>
  


<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificationModalLabel"><i class="fas fa-bell" style="color: #1e52a8;"></i> Notification</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Pas de nouvelles pour l'instant.
      </div>
      <div class="modal-footer">
        <button  class="btn btn-secondary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('.fa-bell').on('click', function() {
        $('#notificationModal').modal('show');
    });
});

$(document).ready(function() {
    $('.nav-link-notification').on('click', function(e) {
        e.preventDefault();
        $('#notificationModal').modal('show');
    });
});
</script>

<div id="loading-spinner"></div>

<script>
    
    document.getElementById("loading-spinner").style.display = "flex"; // Afficher le spinner

// Ici, votre code AJAX...

setTimeout(function() {
    document.getElementById("loading-spinner").style.display = "none"; // Cacher le spinner après 2 secondes
}, 1000);</script>



<div>
    <br>
    <br>
    <br>
</div>

<!-- Navbar -->
<div class="navbar">
  <a href="Welcome" class="navbar-brand">
    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo"> EncapSure
  </a>
     <div class="nav-items">
            <a href="Profile" class="nav-link"><i class="fas fa-user"></i> {{ session()->get('name') }}</a>
            <a href="#" class="nav-link nav-link-notification"><i class="fas fa-bell"></i> Notification</a>
            <a href="Logout" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
     </div>
</div>



<div class="content">


    <div class="container">

    <div class="client-header">
   <h1 class="text-center mb-5 interactive client-text"> <i class="icon fas fa-tasks"></i> Gestion des échéances</h1>
</div>


<table>
    <thead>
    <tr>

        <td>Product</td>
        <td>Contract N°</td>
        <td>Receipt</td>
        <td>Period</td>
        <td>Left Amount</td>
        <td>Total Amount</td>
        <td>State</td>
        
</tr>
</thead>
<tbody>
<tr>
    @php $i=0 @endphp
    @foreach ($PRODUCT as $prod)
    <tr>
    <td>{{$prod->product}}</td>
    <td>{{$prod->contract_num}}</td>
    <td>{{$prod->receipt}}</td>
    <td>{{$prod->start_date}} To {{$prod->end_date}}</td>
    <td>{{$prod->left_amount}}</td>
    <td>{{$prod->total_amount}}</td>
    <td>{{$prod->state}}</td>
    
</tr>
    @endforeach
</tr>
</tbody>
</table>

    <div style="text-align: center; margin-top: 20px;">
        <button class="pay_btn" id="payAll">Payer</button>
        <button onclick="window.history.back();" class="btn btn-secondary">Retour</button>
    </div>
    <!--
<button class="pay_btn" id="payAll">Payer</button>
<button onclick="window.history.back();" class="btn btn-secondary">Retour</button>
    -->

</div>

</div>

<!-- Footer -->
<div class="footer">
  <p>&copy; 2023 EncapSure. All rights reserved.</p>
  <p>
    <a href="#">Politique de confidentialité</a>
    <a href="#">Termes et conditions</a>
    <a href="#">Contactez-nous</a>
  </p>
</div>

<!-- Fin Footer --> 







<script>


var HttpClient = function(){
    this.get = function(Reqdata, aUrl, aCallback) {
        var anHttpRequest = new XMLHttpRequest();
        anHttpRequest.onreadystatechange = function() {
            if (anHttpRequest.readyState == 4 && anHttpRequest.status == 200)
            aCallback(anHttpRequest.responseText);
        }
        anHttpRequest.open("POST",aUrl,true);
        anHttpRequest.setRequestHeader('Content-Type', 'application/json; charset=UTF-8');
        anHttpRequest.send(JSON.stringify(Reqdata));
    }
}

var client= new HttpClient();


$(document).ready(function(e) {
        $('.pay_btn').on('click',function() {
            var currentRow = $(this).closest("tr");
            var contract_num = currentRow.find("td:eq(1)").text();
            var receipt = currentRow.find("td:eq(2)").text();

        });
    
    });


</script>
  
</body>
</html>