<?php

?>
<!-- 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>HTML to PDF Eample</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <script src="html2pdf.bundle.min.js"></script>
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.1.1/jspdf.umd.min.js" integrity="sha512-/Am09zlYshHgRizY3RkConGj4BsYIdb8mS7r5XAXw0rTiLgGSHzpUHTQBhinWR32C/KzLr749J1xuORzT2JnRA==" crossorigin="anonymous"></script>
    <script>
        // Choose the element that our invoice is rendered in.
        const element = document.getElementById("somehtml");
        // Choose the element and save the PDF for our user.
      function generatePDF() {
        let imgData;
        html2canvas($("#somehtml"),{
          useCORS: true,
          onrendered: function(canvas) {
            imgData = canvas.toDataURL('image/png');

            let doc = new jsPDF('p','pt','a4');
            doc.addImage(imgData,'PNG',10,10);

            // SAVE PDF DOCUMENT

            doc.save('same-file.pdf');

            window.open(imgData);

          } 
        });


        //  html2pdf()
        //   .from(element)
        //   .save();
      }
    </script>
  </head>
  <body>
   <div id="somehtml">
      <h1>This is converter</h1>
        <img src="Gallery/admin.png" alt="">

   </div>
   <button onclick="generatePDF()" >Save generatePDF</button>
  </body>
</html>
 -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="html2pdf.bundle.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous"></script>
  <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 

  <title>Document</title>
</head>
<body>
      <input type="file" id="imgfile">
      <canvas id="canvas" style="width: 400px; height: 400px;" ></canvas>
      <button id="btn"  >Download Pdf</button>
      <script>
        let imgfile = document.getElementById('imgfile');
        let canvas = document.getElementById('canvas');
        let btn = document.getElementById('btn');  
        let ctx = canvas.getContext('2d') ;

        btn.onclick = imgtopdf;

        function imgtopdf(){
          let imgData;
          html2canvas(canvas,{
            useCORS: true,
            onrendered: function(canvas) {
              imgData = canvas.toDataURL('image/png');

              let doc = new jsPDF('p','pt','a4');
              doc.addImage(imgData,'PNG',10,10);

              // SAVE PDF DOCUMENT

              doc.save('same-file.pdf');

              //window.open(imgData);

            } 
          });
        }
        /*
        function imgtopdf(){
          let imgData;
          html2canvas(canvas,{
            //useCORS: true,
            onrendered: function(canvas) {
              
              var img = canvas.toDataURL("image/png", wid = canvas.width, hgt = canvas.height);
              var hratio = hgt/wid
              var doc = new jsPDF('p','pt');
              var width = doc.internal.pageSize.width;    
              var height = width * hratio
              doc.addImage(img,'PNG',0,0, width, height);
              doc.save('same-file.pdf');
              //window.open(imgData);

            } 
          });
        }
        */

        imgfile.addEventListener("change",handleImage,false);

        function handleImage(e){
          console.log(e);
        

          let filereader = new FileReader();

          filereader.onload = function(event){

            var img = new Image;
            
            img.onload = function(){
              canvas.width = img.width
              canvas.height = img.height
              ctx.drawImage(img,0,0)
            }

            img.src = event.target.result;

          }
        filereader.readAsDataURL(e.target.files[0])
        }






      </script>

</body>
</html>
