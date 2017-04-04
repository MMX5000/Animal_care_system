/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    

information();
style_btn();

});

function style_btn(){
    
    
    $("input[name = 'search_btn']").css({
        
      "background-color":"#48b5f9",
    "height":"50px",
    "width":"99%",
    "font-family": "sans-serif",
    "font-size": "25px",
    "margin-left":"5px",
    "margin-top":"5px",
    "border-radius":"10px",
    "color":"#ffffff",
    "border":"1px solid white"
    });
    $("input[name = 'reset_btn']").css({
        
    "background-color":"#48b5f9",
    "height":"50px",
    "width":"99%",
    "font-family": "sans-serif",
    "font-size": "25px",
     "margin-top":"5px",
     "margin-left":"5px",
    "border-radius":"10px",
    "color":"#ffffff",
    "border":"1px solid white"
        
    });
    
}

function information(){
    
    
   $(".form_layout").before("<div class = 'info'> </div>");
    
   var info_div = $('.info');
    
    var info_txt = $("<p class = 'info_txt'> </p>");
    
    info_txt.text("*Fill in the form below to search for users and pets. You can either search by any of the fields but one must be filled out!");
    
    info_div.append(info_txt);
    
    $(".info").css({
        
    'font-family': 'sans-serif',
    'font-size': '20px',
    'margin':'auto',
    'background-color':'#48b5f9',
    'font-weight':'bold',
    'padding':'2.5px',
    'text-indent':'10px',
    'border-radius':'10px', 
    'color':'#ffffff',
    'height':'10%',
    'width':'50%' 
        
    });
    
}