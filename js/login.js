function pwdgen() {
    a = ["0", "h", "?", "1", "v", "4", "r", "l", "0", "g"]
    b = ["m", "w", "7", "j", "1", "e", "8", "l", "r", "a", "2"]
    c = ["c", "k", "h", "p", "q", "9", "w", "v", "5", "p", "4"]
}
//pwd gen for Daedalus a[9]+b[10]+b[5]+c[8]+c[8]+c[1]+a[1]+a[5]+c[0]+c[1]+c[8]+b[8]
//                             |\____/|
///                           (\|----|/)
//                             \ 0  0 /
//                              |    |
//                           ___/\../\____
//                          /     --       \

$(document).ready(function() {
    $("#forgot-password").click(function() {
        alert("Ye .... Thought it would be this easy? \n                       -_______-")
    });
    $("#submit").click(function() {
        console.log("TEST")

        var email = $("#email1").val();
        var password = $("#password1").val();

        if (email == '' || password == '') {
            alert("Please fill all fields.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "login.php",
            data: {
                email: email,
                password: password

            },
            cache: false,
            success: function(data) {
                //alert(data);
                window.location.href = "index.php"
            },
            error: function(xhr, status, error) {
                console.error(xhr);
            }
        });

    });

});