<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="shortcut icon" href="assets/images/3d-cube.png" type="image/x-icon">

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <script type="text/javascript" src="/jquery/jquery.js"></script>


    
    <style>

@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

section {
  position: fixed;
  height: 100%;
  width: 100%;
  background: #ffffff;
}

button {
  font-size: 18px;
  font-weight: 400;
  color: #fff;
  padding: 14px 22px;
  border: none;
  background: #1e52a8;
  border-radius: 6px;
  cursor: pointer;
}

button:hover {
  background-color: #1e52a8;
}

button.show-modal,
.modal-box {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
}

section.active .show-modal {
  display: none;
}

.overlay {
  position: fixed;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.3);
  opacity: 0;
  pointer-events: none;
}

section.active .overlay {
  opacity: 1;
  pointer-events: auto;
}

.modal-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  max-width: 380px;
  width: 100%;
  padding: 30px 20px;
  border-radius: 24px;
  background-color: #fff;
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s ease;
  transform: translate(-50%, -50%) scale(1.2);
}

section.active .modal-box {
  opacity: 1;
  pointer-events: auto;
  transform: translate(-50%, -50%) scale(1);
}

.modal-box i {
  font-size: 70px;
  color: #1e52a8;
}

.modal-box h2 {
  margin-top: 20px;
  font-size: 25px;
  font-weight: 500;
  color: #333;
}

.modal-box h3 {
  font-size: 16px;
  font-weight: 400;
  color: #333;
  text-align: center;
}

.modal-box .buttons {
  margin-top: 25px;
}

.modal-box button {
  font-size: 14px;
  padding: 6px 12px;
  margin: 0 10px;
}
</style>
</head>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="loading-spinner"></div>

<script>
    
    document.getElementById("loading-spinner").style.display = "flex"; // Afficher le spinner

// Ici, votre code AJAX...

setTimeout(function() {
    document.getElementById("loading-spinner").style.display = "none"; // Cacher le spinner après 2 secondes
}, 1000);</script>


<body>
  <section>

    <button class="show-modal">
    <i class="fas fa-download"></i> Télécharger le contrat <!-- icone changée -->
    </button>

      <span class="overlay"></span>
    <div class="modal-box">
      <i class="fas fa-file-alt"></i>
      <h2>Téléchargement du contrat</h2>
      <h3>Voulez-vous télécharger le contrat?</h3>
      <form action="DownCFiles" method="POST">
      @csrf
      <div class="buttons">
        <button type="reset" class="close-btn">Non, merci</button>
        <button id="down_btn">Oui</button>
      </div>
      </form>
   </div>
 </section>

  <script>
    const section = document.querySelector("section"),
      overlay = document.querySelector(".overlay"),
      showBtn = document.querySelector(".show-modal"),
      closeBtn = document.querySelector(".close-btn");

    showBtn.addEventListener("click", () => section.classList.add("active"));

    overlay.addEventListener("click", () =>
      section.classList.remove("active")
    );

    closeBtn.addEventListener("click", () =>
      section.classList.remove("active")
    );


    $(document).ready(function(e) {
        $('#down_btn').click(function(){
            var myTimeout = setTimeout(PageReload, 3000);


            function PageReload(){
                window.location.href='Home';
            }
            
            console.log("click");
            
        });

    });

  </script>
</body>
</html>