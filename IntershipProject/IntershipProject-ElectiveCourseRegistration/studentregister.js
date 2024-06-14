        function validateForm() {
            // Get the values from the form
            var semester = document.getElementById("semester").value;
            var usn = document.getElementById("usn").value;
            var phoneNumber = document.getElementById("phone").value;
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;

            // Regular expression pattern for USN
            var usnPattern = /^(4(SU|su)20)(CS|IS|EC|EE|CV|ME|cs|is|ec|ee|cv|me)(\d{3})$/;
            // Regular expression pattern for name (only characters)
            var namePattern = /^[A-Za-z\s]+$/;
            // Regular expression pattern for email
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            // Check if semester is within the limit (1 to 8)
            if (semester < 1 || semester > 8) {
                alert("Semester must be between 1 and 8");
                return false;
            }

            // Check if the USN matches the pattern
            if (!usn.match(usnPattern)) {
                alert("Invalid USN format!");
                return false;
            }

            // Check if the phone number has exactly 10 digits
            if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
                alert("Phone number must be 10 digits");
                return false;
            }

            // Check if the name contains only characters (letters and spaces)
            if (!name.match(namePattern)) {
                alert("Name should contain only characters");
                return false;
            }

            // Check if the email address matches the pattern
            if (!email.match(emailPattern)) {
                alert("Invalid email address");
                return false;
            }

            // If all checks pass, the form is valid
            return true;
        }