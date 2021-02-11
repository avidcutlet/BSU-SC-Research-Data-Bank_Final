// Function name change
function moreAlumnus() {
    var dots = document.getElementById("dotss");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("form_alumnus_student");

//  Header change added
    var changeHeader = document.getElementById("student_header_create");

    if (btnText.checked == true) {


            dots.style.display = "inline";
            moreText.style.display = "none";
            changeHeader.innerHTML = "An alumnus is registering..."
    } else {


            dots.style.display = "none";
            moreText.style.display = "inline";
            changeHeader.innerHTML = "A student is registering..."

    }
}