function validateForm() {

    var name = document.getElementById("name").value;
    var semester = document.getElementById("semester").value;
    var namePattern = /^[A-Za-z\s]+$/;
    if (!name.match(namePattern)) {
        alert("Name should contain only characters");
        return false;
    }
    if (semester < 1 || semester > 8) {
        alert("Semester must be between 1 and 8");
        return false;
    }
    return true;
}