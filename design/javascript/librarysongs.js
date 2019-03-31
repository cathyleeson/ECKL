/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//function search(genre){
//    //RPS takes Rock Paper or Scissors from the image chosen and the following lines are AJAX
//    xhttp= new XMLHttpRequest();
//        xhttp.onreadystatechange = function(){
// // When readyState is 4 and status is 200, the response is ready
//            if(this.readyState===4 && this.status ===200){
////this says we want to send back the result of this function to the element with the ID=result
//                document.getElementById("result").innerHTML = this.responseText;
//            }
//        };
////this opens the User Page PHP file and sends the RPS - Rock, Paper or Scissors as 'choice'
//    xhttp.open("GET", "userpage.php?search="+ genre, true); 
//    xhttp.send();
//            }

$(document).ready(function(){
  $('[data-toggle="popover"]').popover(); 
});
