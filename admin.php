<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="et">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin - Auto Rent (Fun Edition 😎)</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* ANIMEERITUD GRADIENT TAUST */
body {
  background: linear-gradient(-45deg, #1a1a2e, #162447, #1f4068, #e43f5a);
  background-size: 400% 400%;
  animation: gradientBG 15s ease infinite;
  overflow-x: hidden;
}
@keyframes gradientBG {
  0%{background-position:0% 50%}
  50%{background-position:100% 50%}
  100%{background-position:0% 50%}
}

/* TABLE HOVER EFECT */
.table tbody tr:hover {
  transform: translateY(-5px);
  transition: transform 0.2s ease;
  cursor: pointer;
}

/* SCREEN SHAKE */
.shake { animation: shake 0.1s infinite; }
@keyframes shake {
  0% { transform: translate(2px,2px); }
  25% { transform: translate(-2px,2px); }
  50% { transform: translate(2px,-2px); }
  75% { transform: translate(-2px,-2px); }
  100% { transform: translate(2px,2px); }
}

/* PANIC BUTTON MESSAGE */
#panicMessage { font-size: 1.5rem; font-weight: bold; margin-top: 10px; color: white; text-shadow: 1px 1px 2px black; }

/* PIXEL KASS */
#pixelCat {
  position: fixed; width:50px; bottom:20px; right:20px;
  pointer-events: none; z-index:1000; transition: transform 0.1s;
}

/* SPARKLES */
.sparkle {
  position: absolute; width:6px; height:6px;
  background: gold; border-radius:50%; pointer-events:none; z-index:999;
  animation: sparkleFade 0.7s forwards;
}
@keyframes sparkleFade {0% {opacity:1; transform: translateY(0);} 100% {opacity:0; transform: translateY(-20px);}}

/* RAINBOW MODE */
.rainbow * {
  animation: rainbowText 3s infinite;
}
@keyframes rainbowText {0%{color:red;}20%{color:orange;}40%{color:yellow;}60%{color:green;}80%{color:blue;}100%{color:violet;}}

/* DANCING SERVER GIF */
#dancingServer { position:fixed; bottom:10px; left:10px; width:80px; display:none; z-index:1000; }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
<div class="container">
<a class="navbar-brand" href="index.php">Auto Rent</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav me-auto mb-2 mb-lg-0">
<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
<li class="nav-item"><a class="nav-link active" href="admin.php">Admin</a></li>
</ul>
<form class="d-flex" role="search">
<input class="form-control me-2" type="search" placeholder="Search">
<button class="btn btn-outline-light" type="submit">Search</button>
</form>
</div>
</div>
</nav>

<div class="container mt-4">
  <div class="d-flex justify-content-end mb-3">
    <a href="lisa.php" class="btn btn-success">+ Lisa auto</a>
  </div>

  <!-- TABLE -->
  <table class="table table-striped table-bordered shadow-sm">
    <thead class="table-dark">
      <tr>
          <td>Mark</td>
          <td>Model</td>
          <td>Engine</td>
          <td>Fuel</td>
          <td>Price</td>
          <td>Image</td>
          <td>Kustuta</td>
          <td>Muuda</td>
      </tr>
    </thead>
    <tbody>
<?php
include("config.php");
$paring = "SELECT * FROM cars ORDER BY id DESC LIMIT 8";
$valjund = mysqli_query($yhendus, $paring);
while($rida = mysqli_fetch_assoc($valjund)){
    echo"<tr>
        <td>".$rida['mark']."</td>
        <td>".$rida['model']."</td>
        <td>".$rida['engine']."</td>
        <td>".$rida['fuel']."</td>
        <td>".$rida['price']."</td>
        <td>".$rida['image']."</td>
        <td><a href='kustuta.php?id=".$rida['id']."'class='btn btn-sm btn-outline-danger'>Kustuta</a></td>
        <td><a href='muuda.php?id=".$rida['id']."'class='btn btn-sm btn-outline-primary'>Muuda</a></td>
    </tr>";
}
?>
    </tbody>
  </table>

  <!-- PANIC BUTTON -->
  <div class="text-center mt-4">
    <button id="panicBtn" class="btn btn-danger btn-lg mb-3">DO NOT PRESS</button>
    <div id="panicMessage"></div>
  </div>

  <!-- LOGOUT -->
  <div class="d-flex justify-content-end gap-3 mt-4">
    <a href="logout.php" class="btn btn-danger">Logi välja</a>
  </div>
</div>

<!-- PIXEL CAT -->
<img id="pixelCat" src="https://i.imgur.com/Jb7EJbV.png" alt="Pixel Cat">

<!-- DANCING SERVER GIF -->
<img id="dancingServer" src="https://i.imgur.com/2v9z7GF.gif" alt="Dancing Server">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
// RANDOM ADMIN QUOTE
const quotes = ["99 little bugs in the code…","It worked on localhost!","Deploy on Friday? Bold move.","Ctrl+C, Ctrl+V is life."];
document.addEventListener("DOMContentLoaded",()=> {
  const quote = quotes[Math.floor(Math.random()*quotes.length)];
  const qEl = document.createElement("div");
  qEl.id="adminQuote"; qEl.className="text-center mt-2 text-white fw-bold";
  qEl.innerText = quote;
  document.body.prepend(qEl);
});

// ELEMENTS
const panicBtn = document.getElementById("panicBtn");
const panicMessage = document.getElementById("panicMessage");
const tableRows = document.querySelectorAll('.table tbody tr');
const cat=document.getElementById("pixelCat");
const dancingServer=document.getElementById("dancingServer");

// PANIC BUTTON FUNCTIONALITY
panicBtn.addEventListener("click", () => {
  // SCREEN SHAKE
  document.body.classList.add("shake");
  panicMessage.innerText="💀 Server deleted successfully 😎";

  // TEXT-TO-SPEECH
  const msg = new SpeechSynthesisUtterance("Server deleted successfully... just kidding!");
  window.speechSynthesis.speak(msg);

  // SPARKLES
  for(let i=0;i<15;i++){
    const s=document.createElement('div');
    s.className='sparkle';
    s.style.left=Math.random()*window.innerWidth+'px';
    s.style.top=Math.random()*window.innerHeight+'px';
    document.body.appendChild(s);
    setTimeout(()=>s.remove(),700);
  }

  // TABLE ROWS MOVE
  tableRows.forEach((row,i)=>{
    setTimeout(()=>{
      row.style.position='relative';
      row.style.left=Math.random()*200-100+'px';
      row.style.top=Math.random()*50-25+'px';
      row.style.transform=`rotate(${Math.random()*20-10}deg)`;
    }, i*100);
  });

  // DANCING SERVER GIF
  dancingServer.style.display='block';
  setTimeout(()=>dancingServer.style.display='none',3000);

  // RESET MESSAGE
  setTimeout(()=>{document.body.classList.remove("shake"); panicMessage.innerText="jk 😂";},2000);
});

// PIXEL CAT FOLLOW CURSOR
document.addEventListener('mousemove', e=>{
  cat.style.transform = `translate(${e.clientX-25}px, ${e.clientY-25}px)`;
});

// CLICK SPARKLES
document.addEventListener('click', e=>{
  const s=document.createElement('div');
  s.className='sparkle';
  s.style.left=e.clientX+'px';
  s.style.top=e.clientY+'px';
  document.body.appendChild(s);
  setTimeout(()=>s.remove(),700);
});

// RAINBOW MODE (Konami code)
const konami=[38,38,40,40,37,39,37,39,66,65];
let konamiPos=0;
document.addEventListener('keydown', e=>{
  if(e.keyCode===konami[konamiPos]) konamiPos++; else konamiPos=0;
  if(konamiPos===konami.length){
    document.body.classList.add('rainbow');
    alert("🌈 RAINBOW MODE ACTIVATED 🌈");
    konamiPos=0;
  }
});
</script>
</body>
</html>
