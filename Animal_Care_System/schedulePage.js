/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  var months = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sept","Oct","Nov","Dec"];

$(document).ready(function(){
    
  
   
   var days = [];
   var weekdays = ["Mon","Tue","Wed","Thur","Fri","Sat","Sun"];
   
   for (var i = 0; i<=31;i++){
       
       days[i] = i;
   }
   
   
    set_up_weekday(weekdays);
    set_up_days(days);
    set_month(months);
   
   
    
    $("button[name = 'prev']").click(function(){
        prev_month();
    });
    
    $("button[name = 'next']").click(function(){
        
       next_month(); 
    });
});


function set_up_weekday(weekdays){
    
    $(".weekdays").append("<ul>");
    for(var i =0; i<weekdays.length;i++){
        
        $(".weekdays").append("<li>" +weekdays[i] + "</li>");
    }
    
    $(".weekdays").append("</ul>");
    
}

function set_month(months){
    
    
    $("#current_month").text(months[0]);
}//end of set_month

function set_up_days(days){
     $(".days").append("<ul>");
    for(var i =0; i<days.length;++i){
        
        $(".days").append("<li>" + days[i] + "</li>");
    }
    
    $(".days").append("</ul>");
}//end of set_up_days

function prev_month(){
    
    
        
        var current_month = $("#current_month").text();
        
        switch(current_month){
            
            case "Jan":
                $("#current_month").text(months[11]);
                break;
                
            case "Feb":
                $("#current_month").text(months[0]);
                break;
            case "Mar":
                $("#current_month").text(months[1]);
                break;
            case "Apr":
                $("#current_month").text(months[2]);
                break;
                
            case "May":
                $("#current_month").text(months[3]);
                break;
            case "Jun":
                $("#current_month").text(months[4]);
                break;
            case "Jul":
                $("#current_month").text(months[5]);
                break;
            case "Aug":
                $("#current_month").text(months[6]);
                break;
            case "Sept":
                $("#current_month").text(months[7]);
                break;
                
            case "Oct":
                $("#current_month").text(months[8]);
                break;
                
            case "Nov":
                $("#current_month").text(months[9]);
                break;
                
            case "Dec":
                $("#current_month").text(months[10]);
                break;
            
            default:
                alert("hello");
        }
        
}//end of prev

function next_month(){
    
            
        var current_month = $("#current_month").text();
        
        switch(current_month){
            
            case "Jan":
                $("#current_month").text(months[1]);
                break;
                
            case "Feb":
                $("#current_month").text(months[2]);
                break;
            case "Mar":
                $("#current_month").text(months[3]);
                break;
            case "Apr":
                $("#current_month").text(months[4]);
                break;
                
            case "May":
                $("#current_month").text(months[5]);
                break;
            case "Jun":
                $("#current_month").text(months[6]);
                break;
            case "Jul":
                $("#current_month").text(months[7]);
                break;
            case "Aug":
                $("#current_month").text(months[8]);
                break;
            case "Sept":
                $("#current_month").text(months[9]);
                break;
                
            case "Oct":
                $("#current_month").text(months[10]);
                break;
                
            case "Nov":
                $("#current_month").text(months[11]);
                break;
                
            case "Dec":
                $("#current_month").text(months[0]);
                break;
            
            default:
                alert("hello");
        }
    
}//end of next
