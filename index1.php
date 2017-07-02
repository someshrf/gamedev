<?php include('server.php'); ?>
<?php include('errors.php'); ?>
       
<?
if(empty($_SESSION['username'])) {
  header('location: login.php');
  } 
?>
<!DOCTYPE html>
<html>
<head>
  <title>user</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
        <h2>home</h2>
    </div>

  <form method="post" action="index1.php" class="formm">
   
    <div class="content">
      <?php if (isset($_SESSION['success'])): ?>
        <div class="success">
         <h3>
            <?php 
                echo $_SESSION['success'];
                unset($_SESSION['success']);
             ?>
          </h3>
         </div>
        <?php endif ?>  
      
       <?php

        if (isset($_SESSION['post'])):
           if($_SESSION['post']=='prof'): ?>
            
            <!--for ad notes -->  
            <div class="input-group">
            <input type="text" name="note" placeholder="enter note">
            </div>
           
            <div class="input-group">
            <button type="submit" name="addnote" class="btn">add note</button>
            </div>
            
            <!-- for delete notes-->
            <div class="input-group">
            <input type="text" name="nos" placeholder="enter id to delete">
            </div>
           
            <div class="input-group">
            <button type="submit" name="delnote" class="btn">delete note</button>
            </div>
            
            <!--user admin -->
            <div class="input-group">
            <input type="text" name="useradmin" placeholder="enter id">
            </div>
           
            <div class="input-group">
            <button type="submit" name="useradm" class="btn">make admin</button>
            </div>
            <!-- notes --> 
            <div class="prof">
             <?php
             $result = mysqli_query($db,"SELECT id,texts FROM notes");
              echo "<table border='1'>
                 <tr>
                 <th>Id</th>
                 <th>Notice</th>
                 </tr>";

                while($row = mysqli_fetch_array($result))
                 {
                  echo "<tr>";
                  echo "<td width='30'>" . $row['id'] . "</td>";
                  echo "<td width='670'>" . $row['texts'] . "</td>";
                  echo "</tr>";
                 }
                 echo "</table>";
                ?>            
                      
            </div>
           
           <!-- notes --> 
           <div class="prof1">
            <?php 
            $result = mysqli_query($db,"SELECT id,username FROM users");
             echo "<table border='1'>
                 <tr>
                 <th>Id</th>
                 <th>Notice</th>
                 </tr>";

                while($row = mysqli_fetch_array($result))
                 {
                  echo "<tr>";
                  echo "<td width='25'>" . $row['id'] . "</td>";
                  echo "<td width='310'>" . $row['username'] . "</td>";
                  echo "</tr>";
                 }
                 echo "</table>";
                ?>            
              </div> 
            
           <!-- for student --> 
           
            <?php elseif($_SESSION['post']=='student'):  ?>
              
              <div class="stud">
              <?php
               $result = mysqli_query($db,"SELECT id,texts FROM notes");
                 echo "<table border='1'>
                 <tr>
                 <th>Id</th>
                 <th>Notice</th>
                 </tr>";

                while($row = mysqli_fetch_array($result))
                 {
                  echo "<tr>";
                  echo "<td width='60'>" . $row['id'] . "</td>";
                  echo "<td width='1150'>" . $row['texts'] . "</td>";
                  echo "</tr>";
                 }
                 echo "</table>";
                ?>            
          
              </div>

             <!-- for cr -->
              <?php elseif($_SESSION['post']=='classrep'):  ?>
              
              <!--for ad notes -->  
             <div class="input-group">
             <input type="text" name="note" placeholder="enter note">
             </div>
           
             <div class="input-group">
             <button type="submit" name="addnote" class="btn">add note</button>
             </div>
            
             <div class="cr">
              <?php
               $result = mysqli_query($db,"SELECT id,texts FROM notes");
                 echo "<table border='1'>
                 <tr>
                 <th>Id</th>
                 <th>Notice</th>
                 </tr>";

                while($row = mysqli_fetch_array($result))
                 {
                  echo "<tr>";
                  echo "<td width='60'>" . $row['id'] . "</td>";
                  echo "<td width='1150'>" . $row['texts'] . "</td>";
                  echo "</tr>";
                 }
                 echo "</table>";
                ?>            
          
              </div>

          
          <?php endif ?> 
     <?php endif ?> 
      
  </div> 
  
      <?php if (isset($_SESSION['username'])): ?>
          <div class="body">
         
           <p>Welcome <?php echo $_SESSION['post'] ?> <strong><?php echo $_SESSION['username']; ?></strong></p>
           
           <p><a href="index1.php?logout='1'" style="color:red;">Logout</a></p>
          
          </div>
        <?php endif ?>    

  </form> 

</body>
<html>