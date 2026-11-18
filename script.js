document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("registrationForm");

    form.addEventListener("submit", function (event) {

        const name = document.getElementById("fullname").value.trim();
        const email = document.getElementById("email").value.trim();
        const phone = document.getElementById("phone").value.trim();
        const dob = document.getElementById("dob").value;
        const address = document.getElementById("address").value.trim();
        const course = document.getElementById("course").value;

        // Validate name
        if (name.length < 3) {
            alert("Name must contain at least 3 characters.");
            event.preventDefault();
            return;
        }

        // Validate email
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            event.preventDefault();
            return;
        }

        // Validate phone
        const phonePattern = /^[0-9]{10}$/;

        if (!phonePattern.test(phone)) {
            alert("Phone number must contain exactly 10 digits.");
            event.preventDefault();
            return;
        }

        // Validate date of birth
        const birthDate = new Date(dob);
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        if (!dob || birthDate >= today) {
            alert("Please enter a valid date of birth.");
            event.preventDefault();
            return;
        }

        // Validate address
        if (address.length < 5) {
            alert("Please enter a valid address.");
            event.preventDefault();
            return;
        }

        // Validate gender
        const gender = document.querySelector(
            'input[name="gender"]:checked'
        );

        if (!gender) {
            alert("Please select your gender.");
            event.preventDefault();
            return;
        }

        // Validate course
        if (course === "") {
            alert("Please select a course.");
            event.preventDefault();
            return;
        }

        alert("Validation successful! Submitting your registration.");

    });

});



// jQuery functionality

$(document).ready(function () {

    // Display character count
    $("#address").on("input", function () {

        let count = $(this).val().length;

        $("#charCount").text("Characters: " + count);

    });

    // Highlight input fields on focus
    $("input, textarea, select").focus(function () {

        $(this).css("background-color", "#eef4ff");

    });

    // Remove highlight when focus is lost
    $("input, textarea, select").blur(function () {

        $(this).css("background-color", "white");

    });

    // Form animation
    $(".container").hide().fadeIn(1000);

});