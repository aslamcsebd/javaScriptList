<!DOCTYPE html>
<html>
<head>
   <title>Datepicker</title>

   <!-- Date picker -->     
   <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

   <link rel="stylesheet" href="css/bootstrap.css" >
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

   <div class="container">      
      <div class="row justify-content-center">
         <div class="col-2">
            <label for="datepicker" class="form-control">Select Date</label>
         </div>   
         <div class="col-2">
            <input type="text" id="datepicker" name="date" placeholder="click hear">       
         </div>       
      </div>
   </div>

   <!-- Date picker -->
   <script src="js/jquery.min.js"></script>
   <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>  

   <script>
      $('#datepicker').datepicker({
         uiLibrary: 'bootstrap'
      });
   </script>

</body>
</html>
