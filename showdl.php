<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Show DL</title>
       <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
        <script src="js/jsPDF-1.3.2/jspdf.js"></script>
        <script src="js/jsPDF-1.3.2/dist/jspdf.min.js"></script>
        <script type="text/javascript" src= "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.60/pdfmake.js"></script>


<script type="text/javascript">
    function Export(){

     html2canvas(document.getElementById('HTMLtoPDF'),{

             onrendered: function (canvas){

                var data = canvas.toDataURL();
                var docDefinition = {

                    content: [{
                        image: data,
                        width:500
                    }]
                };


                pdfMake.createPdf(docDefinition).download("HTMLtoPDF.pdf");
                alert("Download Started");
             }

     });
}
</script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php require_once('header.php'); ?>
        <br>
        <br>
        <br>
        <br>
          <?php
        error_reporting(0);
        session_start();
        require_once('Connection.php');
        $dlno = $_SESSION['dlno'];
        $aadhar = $_SESSION['aadhar'];
        $obj = new Connection();
        $db = $obj->getNewConnection();
        $sql = "select * from dl where dlno=$dlno AND aadhar=$aadhar";
        $res = $db->query($sql);
        $row = $res->fetch_assoc();
        $dlno = $row['dlno'];
        $name = $row['name'];
        $fatherName = $row['fatherName'];
        $dob = $row['dob'];
        $bloodGroup = $row['bloodGroup'];
        $address = $row['address'];
        $aadhar = $row['aadhar'];
        $validity = $row['validity'];
        $issueDate = $row['issueDate'];
             $db->close();
        session_destroy();
    ?>
        

        
        <div id="HTMLtoPDF">
            <div align="center">
            <h2 style="color:blue;">DRIVING LICENCE COPY </h2>
            <br>
            <h3 style="color:blue">RTO OFFICE WEST BENGAL</h3>
         </div>
        <div class="row">
            <div class="col-lg-6 m-auto d-block">
            <ul class="list-group">
            <li class="list-group-item text-muted" contenteditable="false">DL:</li>


        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>DL NO:</strong></span>
              <?php echo $dlno;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Name:</strong></span>
              <?php echo $name;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Father's name:</strong></span><?php echo $fatherName;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>DOB:</strong></span>   <?php  echo   $dob;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Blood Group:</strong></span><?php echo $bloodGroup;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Address:</strong></span> <?php echo $address;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Aadhar Number:</strong></span><?php echo $aadhar;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Issue Date:</strong></span><?php echo $issueDate;?></li>
        <li class='list-group-item text-right'><span class='pull-left'><strong class=''>Validity:</strong></span><?php echo $validity;?></li>
      
    
    </ul>
    </div>
    </div>
    </div>
   





<div align="center">
    <input style="background-color: #33FF36"   type="button" id="btnExport" value="DOWNLOAD" onclick="Export()" class="auto-style"/>
    </div>   
    <br><br><br>
    <?php require_once('footer.php'); ?>
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
   
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
   
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>
</html>


