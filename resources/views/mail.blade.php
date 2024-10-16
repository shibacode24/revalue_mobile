<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" 
          href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <style>
/* #contentss{
    font-size: 5px;
} */
table,th,tr,td{
    border-top: solid 0.1px;
    border: solid 0.1px;
    text-align: center;
    border-collapse: collapse;
}

</style>
</head>
 <body id="contentss">


 <p>You have received the username and password for the mobile application login. Please check the details below<br>
        Name:  {{ $data['username'] }}<br>
        Password:  {{ $data['password'] }}<br>

        Download the App from PlayStore using this link
       <br> https://play.google.com/store/apps/details?id=io.com.revaluemobiletechnician&hl=en_IN
       
       <br> Kindly Regards,<br>
       Revalue Mobile private limited
        </p>';
        
  

   <script src=
"https://code.jquery.com/jquery-3.2.1.slim.min.js">
  </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
  </script>    
 </body>
 </html>
