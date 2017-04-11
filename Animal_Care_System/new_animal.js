/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
   
   //declarations of array 
   var species = ["Dog", "Cat","Bird","Reptile","Monkey","Fish","Rodent","Horse","Pig","Spider"];
   var colors = ["Blond",'Red','Brown','Grey','Blue','Green','Orange','Pink','Purple','Silver','Black','White',
   'Yellow','Multi-Color'];
   
   var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct",'Nov',"Dec"];

   set_up_species(species);
   
   set_up_color(colors);
   
   style_btn();

  var owner_id_field =  $("input[name = 'owner_id']");
  var owner_usrname_field = $("input[name = 'username']");
  var owner_email_field = $("input[name='email']");
     //hides and shows text fields
   owner_id_field.on('input',function(){

    owner_usrname_field.fadeOut("slow");
    owner_email_field.fadeOut("slow");
    
    if(owner_id_field.val() === ""){

       owner_usrname_field.fadeIn("slow");
       owner_email_field.fadeIn("slow");
   }

  });

    owner_usrname_field.on("input",function(){

    owner_id_field.fadeOut("slow");
    owner_email_field.fadeOut("slow");
    
    if(owner_usrname_field.val() === ""){

       owner_id_field.fadeIn("slow");
       owner_email_field.fadeIn("slow");
   }

   });//end owner_usrname_field

  owner_email_field.on('input',function(){

    owner_usrname_field.fadeOut("slow");
    owner_id_field.fadeOut("slow");
    
    if(owner_email_field.val() === ""){

       owner_usrname_field.fadeIn("slow");
       owner_id_field.fadeIn("slow");
   }

  });
  //end of hiding and showing text fields


});//end of document(ready);


function set_up_species(species){
    var label = $("<span> Species </span>").appendTo("#pet");
    var sel = $("<select name = 'species' id = 'species'>").appendTo("#pet");
   $("#species").after("<br/>");
    for(var i = 0; i < species.length; i++){
        
           sel.append($('<option>').attr("value",species[i]).text(species[i]));
           sel.text = species[i];
    }
    
}

function set_up_color(colors){
    
        $("<br>").appendTo("#animal_form");
       var label = $("<span> Color </span>").appendTo("#pet");
        var sel = $("<select name = 'color' id = 'colors'>").appendTo("#pet");
        $("#colors").after("<br/>");
    for(var i = 0; i < colors.length; i++){
        
           sel.append($('<option>').attr("value",colors[i]).text(colors[i]));
           sel.text = colors[i];
    }

}



function style_btn(){
    
    
    $("input[name = 'reg_pet']").css({
        
   "background-color":"#48b5f9",
    "height":"25px",
    "width":"99%",
    "font-family": "sans-serif",
    "font-size": "18px",
     "margin-top":"5px",
     "margin-left":"5px",
    "border-radius":"10px",
    "color":"#ffffff",
    "border":"1px solid white"
    });
    $("input[name = 'reset_btn']").css({
        
 "background-color":"#48b5f9",
    "height":"25px",
    "width":"99%",
    "font-family": "sans-serif",
    "font-size": "18px",
     "margin-top":"5px",
     "margin-left":"5px",
    "border-radius":"10px",
    "color":"#ffffff",
    "border":"1px solid white"
        
    });

}//end of style_btn

