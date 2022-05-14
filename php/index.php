<?php 
require_once ("php-functions/component.php");
/* require_once ("./php-functions/db.php");
Createdb(); */

require_once ("./php-functions/operation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom styles --> 
    <link rel="stylesheet" href="./styles.css">
    <title>Document</title>
</head>
<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>
        
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50" target="blank">
                <div class="py-2">
              
                     <?php inputElement("<i class='fas fa-id-badge'></i>","ID","book_id",setId()); ?>
                </div>
                <div class="pb-2">
                    <?php
                        inputElement("<i class='fas fa-book '></i>"," Name","book_name","");
                    ?>
                   
                </div>
               <div class="row pb-2">
                    <div class="col">
                    <?php
                        inputElement("<i class='fas fa-people-carry '></i>","Publisher ","book_publisher","");
                    ?>
                   
                </div>
                <div class="col">
                    <?php
                        inputElement("<i class='fas fa-dollar-sign '></i>","Price","book_price","");
                    ?>
                   
                </div>
               </div>
               <div class="d-flex btn-container justify-content-center">
                  <div class="col">
                       <?php
                    buttonElement("btn-create","btn btn-success","create","<i class='fas fa-plus'></i>","data-toggle='tooltip' data-placement='bottom' title='Create'") ;?>
                    <?php buttonElement("btn-read","btn btn-primary","read","<i class='fas fa-sync'></i>","data-toggle='tooltip' data-placement='bottom' title='Read'") ;?>
                     <?php buttonElement("btn-update","btn btn-light border","update","<i class='fas fa-pen-alt'></i>","data-toggle='tooltip' data-placement='bottom' title='Update'") ;?>
                      <?php buttonElement("btn-delete","btn btn-danger","deleteAll","<i class='fas fa-trash-alt'></i>","data-toggle='tooltip' data-placement='bottom' title='delete'") ;?>
                    <?php deleteBtn() ?>
                    
                  </div>
                  
               </div>
            </form>
        </div>
        <!-- table -->
        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <thead id="tbody">
                    <?php 
                        if(isset($_POST['read'])){
                             $result=getData();

                             if($result){
                                  while($row=mysqli_fetch_assoc($result)){?>
       <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['book_price']; ?></td>
                                   <td ><i class="fas fa-edit btn-edit" data-id="<?php echo $row['id']; ?>"></i></td>
                               </tr>
    <?php }
                             }
                            else{
        ?><tr><td colspan="5"><?php TextNode("alert-danger py-2","Data is empty");?></td></tr><?php
    }
                        }
                    ?>
                </thead>
            </table>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="./php-functions//main.js"></script> 
</body>
</html>