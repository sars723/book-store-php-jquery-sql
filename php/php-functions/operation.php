<?php 

require_once ("db.php");
require_once ("component.php");

$con = Createdb();


//create button click
if(isset($_POST['create'])){
createData();
}
 if(isset($_POST['update'])){
    updateData();
}

if(isset($_POST['delete'])){
    deleteData();
}
if(isset($_POST['deleteAll'])){
    deleteAllData();
}

function createData(){
 /*    $bookid=textboxValue(("id")); */
$bookname=textboxValue(("book_name"));
$bookpublisher=textboxValue(("book_publisher"));
$bookprice=textboxValue(("book_price"));


if($bookname&&$bookpublisher&&$bookprice){
    $sql="INSERT INTO books (book_name,book_publisher,book_price) VALUES ('$bookname','$bookpublisher','$bookprice')";
if(mysqli_query($GLOBALS['con'],$sql)){
    TextNode("alert-success py-1","record inserted successfully");
}else{
    TextNode("alert-danger py-1","record not inserted");
}
}
else{
   TextNode("alert-danger py-1","Provide data");
}
}

function textboxValue($value){
    $textbox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
if(empty($textbox)){
    return false;
}else{
    return $textbox;
}
}

//messages
function TextNode($classname,$msg){
    $msgEle="
    <h6 class='$classname' role='alert'>$msg</h6>
    ";
    echo $msgEle;
}


//gez fszs gtom mxdwl fszsnsdr
function getData(){
    $sql="select * from books";
    $result=mysqli_query($GLOBALS['con'],$sql);
    if(mysqli_num_rows($result)>0 ){
       /* while($row=mysqli_fetch_assoc($result)){
           //echo "id:".$row['id']."-Book Name:".$row['book_name']."-Book Publisher:".$row['book_publisher']."-Book Price:".$row['book_price'];
       tblColElement($row['id'],$row['book_name'],$row['book_publisher'],$row['book_price']);
        } */
        return $result;
    }
   /*  else{
        TextNode("alert-danger py-2","Data is empty");
    } */
}

//update data
function updateData(){
$bookid=textboxValue(("book_id"));
$bookname=textboxValue(("book_name"));
$bookpublisher=textboxValue(("book_publisher"));
$bookprice=textboxValue(("book_price"));
if($bookname && $bookpublisher && $bookprice){
     $sql="UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id=$bookid";
if(mysqli_query($GLOBALS['con'],$sql)){
    TextNode("alert-success py-2","data updated");
}
else {
    TextNode("alert-error py-2", "unable to update data");
}
}else {
    TextNode("alert-error py-2", "select data using edit icon");
}
   
}

//delete Data

function deleteData(){
    $bookid=(int)textboxValue(("book_id"));
$bookname=textboxValue(("book_name"));
$bookpublisher=textboxValue(("book_publisher"));
$bookprice=textboxValue(("book_price"));

if($bookname && $bookpublisher && $bookprice){

    $sql="DELETE  from books WHERE id=$bookid";

    if(mysqli_query($GLOBALS['con'],$sql)){
TextNode("alert-success py-2","data deleted successfully");
    }else{
        TextNode("alert-danger py-2","unable to delete");
    }
}else{
        TextNode("alert-danger py-2","select data using edit icon");
    }
}

function deleteBtn(){
    $result=getData();
    $i=0;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $i++;
            if($i>3){
                buttonElement("btn-deleteall","btn btn-danger","deleteAll","delete all <i class='fas fa-trash-alt'></i>","data-toggle='tooltip' data-placement='bottom' title='delete all'");
            $i=0;
            }

        }
    }
}

function deleteAllData(){
    $sql="DELETE FROM books";
    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("alert-success py-2","all data deleted");
    }
}

function setId(){
    $getid=getData();
    $id=1;
    if($getid){
        while($row=mysqli_fetch_assoc($getid)){
             
         ++$id;  
        }
        
    }
return $id;
}
?>