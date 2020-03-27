<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Dynamic Dependent</title>
      <link href="include/bootstrap.css" rel="stylesheet" />
      <link type="text/css" rel="stylesheet" href="include/style.css" />
   </head>

   <body>
      
      <div class="container">
         <div lass="middel_div_right" align="center">
            <h3>Dynamic Dependent Select Box</h3>
            <hr class="hr"/>

            <div class="select-boxes">
               <?php
                  include('connection.php');

                  //Get all country data
                  $query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");
                   
                  //Count total number of rows
                  $rowCount = $query->num_rows; 
               ?>

               <select name="country" id="country">
                  <option value="">Select Country</option>
                     <?php
                        if($rowCount > 0){
                           while($row = $query->fetch_assoc()){ 
                              echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
                           }
                       }else{
                           echo '<option value="">Country not available</option>';
                       }
                     ?>
               </select>
                
               <select name="state" id="state">
                  <option value="">Select country first</option>
               </select>
                
               <select name="city" id="city">
                  <option value="">Select state first</option>
               </select>
            </div>
         </div>
      </div>

      <script src="include/jquery.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function(){
             $('#country').on('change',function(){
                 var countryID = $(this).val();
                 if(countryID){
                     $.ajax({
                         type:'POST',
                         url:'ajaxData.php',
                         data:'country_id='+countryID,
                         success:function(html){
                             $('#state').html(html);
                             $('#city').html('<option value="">Select state first</option>'); 
                         }
                     }); 
                 }else{
                     $('#state').html('<option value="">Select country first</option>');
                     $('#city').html('<option value="">Select state first</option>'); 
                 }
             });
             
             $('#state').on('change',function(){
                 var stateID = $(this).val();
                 if(stateID){
                     $.ajax({
                         type:'POST',
                         url:'ajaxData.php',
                         data:'state_id='+stateID,
                         success:function(html){
                             $('#city').html(html);
                         }
                     }); 
                 }else{
                     $('#city').html('<option value="">Select state first</option>'); 
                 }
             });
         });
      </script> 

   </body>
</html>