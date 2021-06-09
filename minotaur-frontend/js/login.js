$(document).ready(function() {
    $("#forgot-password").click(function() {
        alert("Ye .... Thought it would be this easy? \n                       -_______-")
    });
    $("#submit").click(function() {

        var email = $("#email1").val();
        var password = $("#password1").val();

        if (email == '' || password == '') {
            alert("Please fill all fields.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "../minotaur-backend/login.php",
            data: {
                email: email,
                password: password

            },
            cache: false,
            success: function(data) {
                //alert(data);
                window.location.href = "/minotaur/minotaur-box/minotaur-backend/index.php"
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });

    });

});