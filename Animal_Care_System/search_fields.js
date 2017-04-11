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
        email.fadeOut("slow");
        username.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");
        email.fadeOut("slow");


        $("#search").text("Searching By First Name and Last name");
        if(firstname.val() === "" && lastname.val() ===""){
            username.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
            email.fadeIn("slow");



            $("#search").text("Search");
        }

    });

    lastname.on('input',function(){

        username.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");

        email.fadeOut("slow");

        $("#search").text("Searching By First name and Last name");
        if(firstname.val() === "" && lastname.val() ===""){


            username.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
            email.fadeIn("slow");
            $("#search").text("Search");
        }

    });
    email.on('input',function(){

        username.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");
        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        $("#search").text("Searching By Email");
        if(firstname.val() === "" && lastname.val() ==="" && email.val() === ""){
            username.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            $("#search").text("Search");
        }

    });

    username.on('input',function(){

        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        email.fadeOut("slow");
        user_id.fadeOut("slow");
        animal_id.fadeOut("slow");
        $("#search").text("Searching By Username");
        if(username.val() === ""){

            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            email.fadeIn("slow");
            user_id.fadeIn("slow");
            animal_id.fadeIn("slow");
            $("#search").text("Search");
        }
    });


    user_id.on("input",function(){


        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        email.fadeOut("slow");
        username.fadeOut("slow");
        animal_id.fadeOut("slow");
        $("#search").text("Searching By User ID");

        if(user_id.val() === ""){

            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            email.fadeIn("slow");
            username.fadeIn("slow");
            animal_id.fadeIn("slow");
            $("#search").text("Search");
        }

    });

    animal_id.on("input",function(){


        firstname.fadeOut("slow");
        lastname.fadeOut("slow");
        email.fadeOut("slow");
        user_id.fadeOut("slow");
        username.fadeOut("slow");
        $("#search").text("Searching By Animal ID");
        if(animal_id.val() === ""){

            firstname.fadeIn("slow");
            lastname.fadeIn("slow");
            email.fadeIn("slow");
            user_id.fadeIn("slow");
            username.fadeIn("slow");
            $("#search").text("Search");
        }
    });


});