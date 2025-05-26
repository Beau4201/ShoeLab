

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoeLab</title>
    <link rel="stylesheet" href="css/eigen-website.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>


  <div class="logo-container" style="background-color: black; height:70px;">
        <img src="img/IMG-20250509-WA0000.jpg" style= "height:70px; width:80px; background-color: black;"alt="ShoeLab logo" class="logo-circle">
            <h1 id="h1">
            Shop NU! 50 procent korting op je eerste paar schoenen!
        </h1>
    </div>

    <div class="search-container">
  <input type="text" id="searchInput" placeholder="Zoek een product" onkeyup="liveFilter()">
  <button onclick="searchFunction()">🔍</button>
</div>


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>


    
        <div id="header">
        <header> ShoeLab </header>


    

    </div>
      <a id="login" href="login">Log in </a>
      

    <section>
        <nav>
            <li> <a id="Contact" href="contact">Contact</a></li>
            <li> <a id="Over" href="soortenschoenen">Soorten schoenen</a></li>
            <li> <a id="Over" href="#">...</a></li>
            <li> <a id="Over" href="#">...</a></li>
            <li> <a id="Over" href="#">...</a></li>
        </nav>
    </section>
    <br>
    <br>
    <img id="coffeeshop" src="img/orig_ss25_theoriginal_bnr_m_black_d_9f78cc08dc.jpg">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <section>

        <h1 id="over">Over ons</h1>
        <p id="para">Welkom bij ShoeLab, jouw online bestemming voor stijlvolle en kwalitatieve schoenen – direct geleverd aan je deur!
Bij ShoeLab combineren we gemak met stijl. We bieden een zorgvuldig samengestelde collectie sneakers, boots en instappers die perfect passen bij elke look en gelegenheid. Omdat we werken met dropshipping, wordt jouw bestelling rechtstreeks van onze partners naar jou verzonden – snel, efficiënt en zonder onnodige tussenstappen.

Geen volle winkels, geen wachtrijen – gewoon relaxed online shoppen met de zekerheid van topkwaliteit. Wij selecteren alleen leveranciers die staan voor vakmanschap en comfort, zodat jij altijd loopt in stijl.

Of je nu op zoek bent naar die ene statement sneaker of gewoon een betrouwbaar paar voor dagelijks gebruik, bij ShoeLab zit je goed.

Bestel vandaag nog en ervaar hoe makkelijk stijlvol shoppen kan zijn.</p>




        <table id="tabel" border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th colspan="2">Openingstijden</th>
            </tr>
            <tr id="kleur">
                <td>Maandag</td>
                <td>09:00 - 23:00</td>
            </tr>
            <tr>
                <td>Dinsdag</td>
                <td>09:00 - 23:00</td>
            </tr>
            <tr id="kleur">
                <td>Woensdag</td>
                <td>09:00 - 23:00</td>
            </tr>
            <tr>
                <td>donderdag</td>
                <td>09:00 - 23:00</td>
            </tr>
            <tr id="kleur">
                <td>Vrijdag</td>
                <td>09:00 - 01:00</td>
            </tr>
            <tr>
                <td>Zaterdag</td>
                <td>09:00 - 21:00</td>
            </tr>
            <tr id="kleur">
                <td>Zondag</td>
                <td>09:00 - 21:00</td>
            </tr>

        </table>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <footer id="footer">
        <div class="footer-content">
            <p id="copy">&copy; 2025 Shoelab. All Rights Reserved.</p>
            <p>Follow us on:
                <a id="nav" href="https://facebook.com" target="_blank">Facebook</a> |
                <a id="nav" href="https://instagram.com" target="_blank">Instagram</a> |
                <a id="nav" href="https://twitter.com" target="_blank">Twitter</a>
            </p>
        </div>
    </footer>


<script>



  function searchFunction() {
    const input = document.getElementById('searchInput').value.toLowerCase();

    if (!input) {
      alert("Typ iets in om te zoeken.");
      return;
    }

    const elements = document.querySelectorAll(".searchable");
    let found = false;

    elements.forEach(el => {
      if (el.innerText.toLowerCase().includes(input)) {
        el.scrollIntoView({ behavior: "smooth", block: "center" });
        el.style.backgroundColor = "#ffff99"; // highlight
        found = true;
      } else {
        el.style.backgroundColor = ""; // reset
      }
    });

    if (!found) {
      window.location.href = "search.php?q=" + encodeURIComponent(input);
    }
  }

  function liveFilter() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const elements = document.querySelectorAll(".searchable");

    elements.forEach(el => {
      if (el.innerText.toLowerCase().includes(input)) {
        el.style.display = "block";
      } else {
        el.style.display = "none";
      }
    });
  }
</script>




</body>

</html>