/*
Created By: Ryan Claude Fox
Date: 3/8/17
 */


$(document).ready(function() {

    var states = ["AL", "AK", "AZ", "AR", 'CA', 'CO', 'CT', 'DE', 'FL', 'GA', 'HI', 'ID', 'IL', 'IN', 'IA',
        'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MI', 'MN', 'MS', 'MO', 'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND',
        'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY'];

    set_up_state(states);

    style_btn();




});


function set_up_state(states) {

    var sel = $("select[name='state']");

   for (var i = 0; i<states.length; i++){
       
       sel.append($("<option>").attr("value",states[i]).text(states[i]));
       sel.text = states[i];
       
   }



    
    
}

function style_btn() {


    $("input[name = 'reg_user']").css({

        "background-color": "#48b5f9",
        "height": "25px",
        "width": "99%",
        "font-family": "sans-serif",
        "font-size": "18px",
        "margin-top": "5px",
        "margin-left": "5px",
        "border-radius": "10px",
        "color": "#ffffff",
        "border": "1px solid white"
    });
    $("input[name = 'reset_btn']").css({

        "background-color": "#48b5f9",
        "height": "25px",
        "width": "99%",
        "font-family": "sans-serif",
        "font-size": "18px",
        "margin-top": "5px",
        "margin-left": "5px",
        "border-radius": "10px",
        "color": "#ffffff",
        "border": "1px solid white"
    });
}