$(document).ready(function(){

    $("#download-btn-free").click(function(){

        $.ajax({
            type: "POST",
            url: "ajax/downloadnote.php",
            data: {
                type: "free"
            },
            success: function (msg) {
                console.log(msg);
            }
        });

    })

    $("#download-btn-paid").click(function(){

        $.ajax({
            type: "POST",
            url: "ajax/downloadnote.php",
            data: {
                type: "paid"
            },
            success: function (msg) {
                console.log(msg);
            }
        });

    })

})