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