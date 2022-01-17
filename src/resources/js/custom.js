function validateContactForm() {
    var valid = true;

    $(".info").html("");
    $(".input-field").css('border', '#e0dfdf 1px solid');
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var userEmail = $("#userEmail").val();
    var phone = $("#phone").val();
    var subject = $("#subject").val();
    var content = $("#content").val();
    
    if (fname == "") {
        $("#fname-info").html("Required.");
        $("#fname").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (lname == "") {
        $("#lname-info").html("Required.");
        $("#lname").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (userEmail == "") {
        $("#userEmail-info").html("Required.");
        $("#userEmail").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
    {
        $("#userEmail-info").html("Invalid Email Address.");
        $("#userEmail").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (phone == "") {
        $("#phone-info").html("Required.");
        $("#phone").css('border', '#e66262 1px solid');
        valid = false;
    }
    if(!phone.match(/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/)){
       $("#phone-info").html("Invalid Phone Number.");
       $("#phone").css('border', '#e66262 1px solid');
       valid = false;
       }

    if (subject == "") {
        $("#subject-info").html("Required.");
        $("#subject").css('border', '#e66262 1px solid');
        valid = false;
    }
    if (content == "") {
        $("#userMessage-info").html("Required.");
        $("#content").css('border', '#e66262 1px solid');
        valid = false;
    }
     return valid;
}