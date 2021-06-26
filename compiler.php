<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8" http-equiv="refresh" content="5">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="compiler.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compiler</title>
</head>
<body>

    <style id="styling">
    </style>

    

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
        <img style="border-radius: 50%;" src="Gallery/logo.jpeg" width="50" height="40" alt="Logo">&nbsp;
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Compiler</a>
                </li>
                
            </ul>
            <div class="right">
                <ul class="navbar-nav mr-auto  ">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link ">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="logintag">
        <div class="container">
            <form action="" id="login">
                <input type="text" placeholder="Enter Email-Id">
                <input type="password" placeholder="Enter Password">
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="form-group">
        <!-- <label for=""></label> -->
          <select class="form-control" name="" id="choosecompiler">
              <option selected value="" disabled>Select Language</option>
          <option>C</option>
            <option>C++</option>
            <option>Java</option>
            <option >HTML</option>
        </select>
      </div>
    </div>

    <br>
    <div id="default">
        <h3>Select A Language to Compile</h3>
    </div>

    <div id="ccppjava" class="notvisible"  >
        <div  class="container" >
            <div style="width: 3%;float:left;background:whitesmoke;">
                1
            </div>
            
            <div style="width: 93%;float:left; ">
                    <input id="input" type="text" style="width: 100%;outline:none; border: none;" value="&emsp;">
            </div>
            <div style="width: 3%;float:right" >
                    3
            </div>
        </div>
    </div>

    <div id="html" class="visible" >
        <!-- <i class="fa fa-th" aria-hidden="true" style="position:relative; left: 92%; cursor:pointer; " onclick="htmltlayout()"></i> -->
        <div class="card-body">
            <div class="flex" id="htmldisplay" >
                <textarea class="flexhtml" id="" onkeyup="compileHtml(this)"  placeholder="Enter HTML Code Here" ></textarea>
                <textarea class="flexhtml" id=""  onkeyup="compileCss(this)" placeholder="Enter CSS Code Here" ></textarea>
            </div>
        </div>
        
        <div id="htmlouput" ></div>
    </div>
    
    <script>
         let input = document.getElementById('input');
         input.addEventListener("keydown", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 9) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                input.textContent+= '&emsp;'
            }
        });
        let choosecompiler = document.getElementById('choosecompiler');
        let otherlang = document.getElementById('ccppjava');
        let htmlouput = document.getElementById('htmlouput');
        let styling = document.getElementById('styling');
        let html = document.getElementById('html');

        choosecompiler.addEventListener('change',() =>{
            console.log(choosecompiler.value);
            if(choosecompiler.value  == 'HTML'){
                otherlang.className = 'notvisible' ;
                html.className = 'visible';
                document.getElementById('default').style.display = 'none';
                document.getElementById('htmlouput').style.display = 'block';
                

            }else if(choosecompiler.value  == ''){
                otherlang.className = 'notvisible' ;
                html.className = 'notvisible';
                document.getElementById('default').style.display = 'block';
                document.getElementById('htmlouput').style.display = 'none';


            }
            else{
                document.getElementById('default').style.display = 'none';
                otherlang.className ='visible';
                html.className = 'notvisible';
                document.getElementById('htmlouput').style.display = 'none';
            }
        });

        function compileHtml(field,e){
            htmlouput.innerHTML = field.value;
        }
        function compileCss(field,e){
            styling.innerHTML = field.value;
        }
        function htmltlayout(){
            if(document.getElementById('htmldisplay').style.display === 'flex' ){
                document.getElementById('htmldisplay').style.display = 'block';
                document.getElementById('htmldisplay').firstElementChild = 
                document.getElementById('htmldisplay').firstElementChild.nextElementSibling =  
                console.log(document.getElementById('htmldisplay').firstElementChild.nextElementSibling);
            }else{
                document.getElementById('htmldisplay').style.display = 'flex' ;
            }
        }

    </script>

</body>
</html>