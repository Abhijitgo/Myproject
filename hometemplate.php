<?php

    include 'home.php';

?>

    <div id="fst" class="fstim">
          <h1>Welcome to Sagar's Study Material.com</h1>
    </div>
    <script>
         let body = document.getElementById('fst');
            body.addEventListener('click',check);
            function check(){
              if(dropcontant.className == 'dropdown-content dropdown-visible' )
                {
                    Logoutbtn();
                }    
            }

        </script>

    </body>
</html>