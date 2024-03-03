$(document).ready(function () {

    // Delete model

    $('.trash').click(function () {
        var modelEndPoint = $(this).data('model-end-point');
        var modelId = $(this).data('model-id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve CSRF token from a meta tag

        $(this).closest('tr').remove();

        $.ajax({
            url: '/admin/' + modelEndPoint + '/' + modelId,
            type: 'DELETE',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            success: function (response) { },
            error: function (xhr, status, error) { }
        });

    });


    // activate profile
    $('.change-status').click(function () {
        var modelEndPoint = $(this).data('model-end-point');
        var modelId = $(this).data('model-id');
        var currentStatus = $(this).data('current-status');
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Retrieve CSRF token from a meta tag

        $.ajax({
            url: '/admin/' + modelEndPoint + '/' + modelId,
            type: 'PUT',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            data: {
                action: 'change_status'
            },
            success: function (response) { },
            error: function (xhr, status, error) { }
        });

    });


    function setEmpty(){
        $('#name').val('');
        $('#email').val('');
        $('#message').val('');
    }
    $('.contact-submit').click(function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var name = $('#name').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var $contactMessage = $('.contact-message');

        // Simple email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            $contactMessage.html('<div class="danger">Please enter a valid email address.</div>');
            return;
        }

        // Check if message is not empty
        if (message.trim() === '') {
            $contactMessage.html('<div class="danger">Please enter a message.</div>');
            return;
        }
        $contactMessage.html('<div class="info">Sending...</div>');

        $.ajax({
            url: '/contact',
            type: 'POST',
            headers: {
                'X-CSRF-Token': csrfToken
            },
            data: {
                name, email, message
            },
            success: function (response) {
                console.log(response)
                $contactMessage.html('<div class="success">Thank you for reaching out!</div>');
                setEmpty()
            },
            error: function (xhr, status, error) {
                console.log(error)
                $contactMessage.html('<div class="danger">Failed to send email.</div>');
            }
        });
    });

});


// front end
var topNav = document.getElementById("myTopnav");

function myFunction() {
    if (topNav.className === "topnav") {
        topNav.className += " responsive";
    } else {
        topNav.className = "topnav";
    }
}

function handleNavLinkClick() {
    topNav.className = "topnav";
}

var header = document.getElementById("myHeader");
var story = document.getElementById("nav-stick-time");
var sticky = story.offsetTop;
console.log(sticky);
window.onscroll = function () {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
};