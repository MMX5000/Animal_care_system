/**
 * Created by RyanFox on 3/30/17.
 */
$("document").ready(function () {

    //hides and shows fields depending where text is being entered.
    var firstname = $("input[name = 'fname']");
    var lastname  = $("input[name = 'lname']");
    var email = $("input[name = 'email']");
    var username = $("input[name = 'username']");
    var user_id = $("input[name = 'user_id']");
    var animal_id = $("input[name = 'animal_id']");

    firstname.on('input',function(){

        username.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");

        if(firstname.val() === "" && lastname.val() ==="" && email.val() === ""){
            username.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
        }

    });

    lastname.on('input',function(){

        username.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");
        if(firstname.val() === "" && lastname.val() ==="" && email.val() === ""){
            username.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
        }

    });
    email.on('input',function(){

        username.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");
        if(firstname.val() === "" && lastname.val() ==="" && email.val() === ""){
            username.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
        }

    });

    username.on('input',function(){

        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        email.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");

        if(username.val() === ""){

            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            email.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
        }
    });


    user_id.on("input",function(){


        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        email.fadeOut("slow");
        username.fadeOut("slow");
        animal_id.fadeOut("slow");

        if(user_id.val() === ""){

            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            email.fadeIn("slow");
            username.fadeIn("slow");
            animal_id.fadeIn("slow");
        }

    });

    animal_id.on("input",function(){


        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        email.fadeOut("slow");
        user_id.fadeOut("slow");
        username.fadeOut("slow");

        if(animal_id.val() === ""){

            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            email.fadeIn("slow");
            user_id.fadeIn("slow");
            username.fadeIn("slow");
        }
    });


});