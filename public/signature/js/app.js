/*
 * Start jQuery
 */
$(document).ready(function() {

  	/*
	 * humbager
	 */
    $(".humbager").click(function() {
        var menu = $(".left-bar");
        if (menu.hasClass("slide-menu")) {
            menu.removeClass("slide-menu");
        } else {
            menu.addClass("slide-menu");
        }
    });

  // sidebar - scroll container
    $('.slimscroll-menu').slimscroll({
        height: 'auto',
        position: 'right',
        size: "3px",
        color: '#9ea5ab',
        wheelStep: 5,
        touchScrollStep: 50
    });

    $("#editTeam, #editCustomer").on('click', '.password-trigger', function(event) {
            event.preventDefault();
            var changePassword = $(".change-password");
            if (changePassword.hasClass("hidden")) {
                changePassword.removeClass("hidden");
                $("#newPassword").attr("data-parsley-required", "true");
                $("#confirmPassword").attr("data-parsley-required", "true");
            } else {
                changePassword.addClass("hidden");
                $("#newPassword").removeAttr("data-parsley-required");
                $("#confirmPassword").removeAttr("data-parsley-required");
            }
        })

	/*
	 * allow users to upload docx
	 */
    $("input[name=allowdocx]").change(function() {
        if ($(this).prop("checked")) {
            $(".allowdocx").show();
        } else {
            $(".allowdocx").hide();
        }

    });

});


// Switch login cards
$(".login-card a").click(function() {
    var target = "." + $(this).attr("target");
    $(".sign-in, .forgot-password, .reset-password, .sign-up, .alert").hide();
    $(target).show();

    if (target === '.sign-in') {
        $(".sign-up-btn").show();
    } else {
        $(".sign-up-btn").hide();
    }
});

// business vs personal account
$(".business-account").change(function() {
    if ($(this).prop("checked")) {
        $(".business-name").show();
        $("input[name=company]").attr("required", true);
    } else {
        $(".business-name").hide();
        $("input[name=company]").val("");
        $("input[name=company]").removeAttr("required");
    }

});

// Tooltip
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});



//Add class name to the nav menu item, depending on the active page
$(function() {
    $('.left-bar a').each(function() {
        if ($(this).attr('href') == window.location.pathname) {
            $(this).parent().addClass('active');
        }
    });
});


/*
 * add reminder
 */
$(".add-reminder").click(function(){
    $('.collapse').collapse('hide');
    var reminderKey = random(),
          reminderNumber = parseInt($(".reminders-holder").find('.panel').length) + 1;
    $(".reminders-holder").append(`<div class="panel panel-default">
            <div class="panel-heading">
                <span class="delete-reminder" data-toggle="tooltip" title="Remove reminder"><i class="ion-ios-trash"></i></span>
                <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" href="#collapse-`+reminderKey+`">Reminder #<span class="count">`+reminderNumber+`</span></a></h4>
            </div>
            <div class="panel-collapse collapse in" id="collapse-`+reminderKey+`">
                <div class="panel-body">
                    <div class="remider-item">
                        <div class="form-group">
                            <div class="col-md-12 p-lr-o">
                                <input type="hidden" name="count[]" value="1">
                                <label>Email subject</label> <input class="form-control" name="subject[]" placeholder="Email subject" required="" type="text" value="Signing invitation reminder">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 p-lr-o">
                                <label>Days after request is sent</label> <input class="form-control" name="days[]" min="1" placeholder="Days after request is sent" required="" type="number" value="7">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 p-lr-o">
                                <label>Message</label> 
                                <textarea class="form-control" name="message[]" required="" rows="9">Hello there,

I hope you are doing well.
I am writing to remind you about the signing request I had sent earlier.

Cheers!
`+fullName+`
</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
        $('[data-toggle="tooltip"]').tooltip();
        reminderIndexing();
})

/*
 * delete reminder
 */
$(".reminders-holder").on("click",".delete-reminder",function(){
    $(this).closest(".panel").remove();
    reminderIndexing();
});

/*
 * Number reminder cards
 */
 function reminderIndexing(){
       $(".reminders-holder").find("span.count").each(function(index) { 
        $(this).text(index + 1);
    });
 }

/*
 * reminders toggle
 */
 $("input[name=reminders]").change(function(){
    if ($(this).prop("checked")) {
        $(".reminders-holder, .add-reminder").show();
    }else{
        $(".reminders-holder, .add-reminder").hide();
    }
 });

/*
 * cloud convert toggle
 */
 $("input[name=USE_CLOUD_CONVERT]").change(function(){
    if ($(this).prop("checked")) {
        $(".cloud-convert-holder").show();
    }else{
        $(".cloud-convert-holder").hide();
    }
 });

/*
 * on signature type 
 */
$(".signature-input").keyup(function() {
    textSignature = $(this).val();
    if (textSignature == "") {
        textSignature = "Firma estudiante";
    }
    $(".text-signature").text(textSignature);
})

$(".signature-inputtutor1").keyup(function() {
    textSignaturetutor1 = $(this).val();
    if (textSignaturetutor1 == "") {
        textSignaturetutor1 = "Firma tutor 1";
    }
    $(".text-signaturetutor1").text(textSignaturetutor1);
})

$(".signature-inputtutor2").keyup(function() {
    textSignaturetutor2 = $(this).val();
    if (textSignaturetutor2 == "") {
        textSignaturetutor2 = "Firma tutor 1";
    }
    $(".text-signaturetutor2").text(textSignaturetutor2);
})

/*
 * change signature style
 */
$(".signature-style").change(function() {
    var signatureStyle = $(this).val();
    $(".text-signature").css("font-style", signatureStyle);
})

$(".signature-style").change(function() {
    var signatureStyletutor1 = $(this).val();
    $(".text-signaturetutor1").css("font-style", signatureStyletutor1);
})

$(".signature-style").change(function() {
    var signatureStyletutor2 = $(this).val();
    $(".text-signaturetutor2").css("font-style", signatureStyletutor2);
})


/*
 * change signature color
 */
function updateSignatureColor(color) {
    $(".text-signature").css("color", "#"+color);
    $(".signature-color").css("color", "#"+color);
}

function updateSignatureColortutor1(color) {
    $(".text-signaturetutor1").css("color", "#"+color);
    $(".signature-colortutor1").css("color", "#"+color);
}

function updateSignatureColortutor2(color) {
    $(".text-signaturetutor2").css("color", "#"+color);
    $(".signature-colortutor2").css("color", "#"+color);
}


/*
 * Initilize signature drawing
 */
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var target = $(e.target).parent().attr("type");
    if (target === "draw") {
        initDrawing()
    }
});

/*
 * change signature weight
 */
$(".signature-weight").change(function() {
    var signatureWeight = $(this).val();
    $(".text-signature").css("font-weight", signatureWeight);
})

$(".signature-weight").change(function() {
    var signatureWeight = $(this).val();
    $(".text-signaturetutor1").css("font-weight", signatureWeight);
})

$(".signature-weight").change(function() {
    var signatureWeight = $(this).val();
    $(".text-signaturetutor2").css("font-weight", signatureWeight);
})

/*
 * change signature font
 */
$(".signature-font").change(function() {
    var signatureFont = $(this).val();
    $(".text-signature").css("font-family", signatureFont);
})

$(".signature-font").change(function() {
    var signatureFont = $(this).val();
    $(".text-signaturetutor1").css("font-family", signatureFont);
})

$(".signature-font").change(function() {
    var signatureFont = $(this).val();
    $(".text-signaturetutor2").css("font-family", signatureFont);
})

/*
 * on stroke size click
 */
$("#signature-stroke").click(function() {
    stroke = parseInt($(this).attr("stroke"));
    if (stroke == 3) {
        updateStroke(5);
    }else if(stroke == 5){
        updateStroke(7);
    }else if(stroke == 7){
        updateStroke(3);
    }
});

/*
 * update stroke
 */
 function updateStroke(stroke){
    modules.stroke(stroke);
    $("#signature-stroke").attr("stroke", stroke);
 }

/*
 * change signature font
 */
$(".save-signature").click(function() {
    signatureType = $(".head-links").find("li.active").attr("type");
    if (signatureType === "capture") {
        saveTextSignature();
    }else if(signatureType === "upload"){
        saveUploadSignature();
    }else if(signatureType === "draw"){
    }
});

$(".save-signaturetutor1").click(function() {
    signatureType = $(".head-links-tutor1").find("li.active").attr("type");
    if (signatureType === "capturetutor1") {
        saveTextSignaturetutor1();
    }else if(signatureType === "uploadtutor1"){
       
        saveUploadSignaturetutor1();
    }else if(signatureType === "drawtutor1"){
    }
});

$(".save-signaturetutor2").click(function() {
    signatureType = $(".head-links-tutor2").find("li.active").attr("type");
    if (signatureType === "capturetutor2") {
        saveTextSignaturetutor2();
    }else if(signatureType === "uploadtutor2"){
       // alert(22)
        saveUploadSignaturetutor2();
    }else if(signatureType === "drawtutor2"){
    }
});



/*
 * change signature font
 */
 function signatureCallback(image){
    $(".signature-body img").attr("src", image);
    $('#updateSignature').modal('hide');
 }

/*
 * when send request reminder is clicked
 */
 $(".request-remind").click(function(event){
    event.preventDefault();
    $("input[name=requestid]").val($(this).attr("data-id"));
    $("#remindRequest").modal({show: true, backdrop: 'static', keyboard: false});
 })

/*
 * delete notification
 */
 $(".delete-notification").click(function(event){
    event.preventDefault();
    notificationid = $(this).attr("data-id");
    $(this).closest(".notification-item").remove();
    server({
        url: deleteNotificationUrl,
        data: {
            "notificationid": notificationid,
            "csrf-token": Cookies.get("CSRF-TOKEN")
        },
        loader: false
    });
 })

/*
 * Mark notifications as read
 */
 function readNotifications(url){
    server({
        url: url,
        data: {
            "csrf-token": Cookies.get("CSRF-TOKEN")
        },
        loader: false
    });
 }

/*
 *  check for new notifications after 5seconds 
 */


/*
 * Mark notifications as read
 */


/*
 * Update notifications count
 */
function updateNotificationsCount(count) {
    if (count > 0) {
        $("body").find(".bubble").remove();
        $(".notification-holder").append('<span class="label label-danger btn-round bubble">'+count+'</span>');
    }else{
        if ($(".bubble").length) {
            $("body").find(".bubble").remove();
        }
    }
}

