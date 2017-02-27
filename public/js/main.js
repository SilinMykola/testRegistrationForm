$(document).ready(function() {
    $(".chosen").chosen();
    $("#location").on("change", "select", function() {
        var id = $(this).attr("id");
        $("#" + id).next().nextAll().remove();
        var reg_id = {
            ter_pid: $("#" + id + " option:selected").val()
        };
        getNextLocation(reg_id);
    });

    $("#submit").on("click", function () {
        $('#answer').empty();
        validation = true;
        var email = $('#email').val();
        var name = $('#name').val();
        var region = $('#location select').last().val();

        var true_email = /^(\w+([\.\w+])*)@\w+(\.\w+)?\.\w{2,3}$/i;
        var true_name = /^[a-zA-Zа-яА-Я\s]+$/i;
        
        textFormValidate('email', true_email, email);
        textFormValidate('name', true_name, name);

        if (region == '0') {
            validation = false;
            $('#regionmsg').append().text('bad location');
        } else {
            $('#regionmsg').append().text('good location');
        };

        if (validation) {
            arr = {
                name: name,
                email: email,
                location: region
            };
            resetForm();
            $.post("user/save", JSON.stringify(arr), function (data) {
                if (data.length > 0) {
                    var newData = JSON.parse(data);
                    $('#answer').append($('<p></p>').text("User name: " + newData.name),
                            $('<p></p>').text("User email: " + newData.email),
                            $('<p></p>').text("User adress: " + newData.location),
                            $('<p></p>').text("Info message: " + newData.msg));
                }
            });
        };
 
    });

    function getNextLocation(id) {
        $.post("user/region", JSON.stringify(id), function (data) {
            if (data.length > 0) {
                var newData = JSON.parse(data);
                $('#location').append('<br>');
                $('#location').append(newData.list);
                $(".chosen").chosen();
            }
        });
    };

    function textFormValidate(id, pattern, value) {

        if (value.length == '0') {
            $('#' + id + 'msg').append().text('empty ' + id + ' field');
            validation = false;
        } else if (!pattern.test(value)) {
            validation = false;
            $('#' + id + 'msg').append().text('wrong ' + id);
        } else {
            $('#' + id + 'msg').append().text('good ' + id);
        };
    };

    function resetForm() {
        validation = false;
        document.getElementById('regform').reset();
        $('#regionmsg').append().text('');
        $('#namemsg').append().text('');
        $('#emailmsg').append().text('');
        $("#region").next().nextAll().remove();
        $('#region').val('');
        $("#region").trigger("chosen:updated");
    };
});