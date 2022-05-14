<?php
function inputElement($icon,$placeholder,$name,$value){
         $ele="
         <div class='input-group mb-2'>
                        <div class='input-group-prepend'>
                            <div class='input-group-text bg-warning' >$icon</div>
                        </div>
                        <input type='text' autocomplete='off' placeholder='$placeholder'  class='form-control py-0' name='$name' value=$value >
                    </div>
    ";
    echo $ele;
}


function buttonElement($btnId,$styleClass,$name,$text,$attr){
    $btn="
    <button name='$name' '$attr' class='$styleClass' id='$btnId'>$text</button>
    ";
    echo $btn;
}

function tblColElement($id,$bookName,$bookPublisher,$icon){
    $col="
<tr>$id</tr>
<tr>$bookName</tr>
<tr>$bookPublisher</tr>
<tr><i class='fas fa-edit btn-edit'></i></tr>
    ";
    echo $col;
}
?>
