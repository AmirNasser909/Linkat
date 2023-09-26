/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $("#password1").keyup(validatelength);
});

$(document).ready(function () {
    $("#password2").keyup(validate);
});

function validatelength() {
    var password1 = $("#password1").val().length;
    if (password1 < 8)
    {
        $("#validate-length").css("display", "block");
        $("#validate-length").text("Password too short");
        $("#registerbtn").prop("disabled", true);
    } else
    {
        $("#validate-length").css("display", "none");
        $("#registerbtn").prop("disabled", false);
    }
}

function validate() {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();

    if (password1 === password2) {
        $("#validate-status").css("color", "#2ec392");
        $("#validate-status").text("Password match !");
        $("#registerbtn").prop("disabled", false);
    } else {
        $("#validate-status").css("color", "red");
        $("#validate-status").text("Password mismatch !");
        $("#registerbtn").prop("disabled", true);
    }

}
