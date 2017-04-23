
$('document').ready(function(){

    style_btn();

});

function style_btn(){


    $("input[name = 'submit_btn']").css({

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
        "border":"1px solid white",
        "margin-bottom" : " 5px"

    });

}
