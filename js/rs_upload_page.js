function uploadVal() {
  // 1
  var firstnameA1 = '';
  var miA1 = '';
  var surnameA1 = '';
  // 2
  var firstnameA2 = '';
  var miA2 = '';
  var surnameA2 = '';
  // 3
  var firstnameA3 = '';
  var miA3 = '';
  var surnameA3 = '';
  // 4
  var firstnameA4 = '';
  var miA4 = '';
  var surnameA4 = '';
  // 5
  var firstnameA5 = '';
  var miA5 = '';
  var surnameA5 = '';
  // 6
  var firstnameA6 = '';
  var miA6 = '';
  var surnameA6 = '';
  // form data
  var fd = new FormData();

    var inputs = petAuthor.getElementsByTagName("input");
    // author 1
    if (inputs[0] && inputs[0].value) {
      firstnameA1 = inputs[0].value;
    }else{
      firstnameA1 = '';
    }
    if (inputs[1] && inputs[1].value) {
      miA1 = inputs[1].value;
    }else{
      miA1 = '';
    }
    if (inputs[2] && inputs[2].value) {
      surnameA1 = inputs[2].value;
    }else{
      surnameA1 = '';
    }
    var fullNameA1 = surnameA1+','+firstnameA1+' '+miA1;
    if (fullNameA1.length > 2) {
      fd.append('Author1',fullNameA1); 
    }else{
      fd.append('Author1','N/A');
    }
    // author 2
    if (inputs[3] && inputs[3].value) {
      firstnameA2 = inputs[3].value;
    }else{
      firstnameA2 = '';
    }
    if (inputs[4] && inputs[4].value) {
      miA2 = inputs[4].value;
    }else{
      miA2 = '';
    }
    if (inputs[5] && inputs[5].value) {
      surnameA2 = inputs[5].value;
    }else{
      surnameA2 = '';
    }
    var fullNameA2 = surnameA2+','+firstnameA2+' '+miA2;
    if (fullNameA2.length > 2) {
      fd.append('Author2',fullNameA2); 
    }else{
      fd.append('Author2','N/A');
    }
    // author 3
    if (inputs[6] && inputs[6].value) {
      firstnameA3 = inputs[6].value;
    }else{
      firstnameA3 = '';
    }
    if (inputs[7] && inputs[7].value) {
      miA3 = inputs[7].value;
    }else{
      miA3 = '';
    }
    if (inputs[8] && inputs[8].value) {
      surnameA3 = inputs[8].value;
    }else{
      surnameA3 = '';
    }
    var fullNameA3 = surnameA3+','+firstnameA3+' '+miA3;
    if (fullNameA3.length > 2) {
      fd.append('Author3',fullNameA3); 
    }else{
      fd.append('Author3','N/A');
    }
    // author 4
    if (inputs[9] && inputs[9].value) {
      firstnameA4 = inputs[9].value;
    }else{
      firstnameA4 = '';
    }
    if (inputs[10] && inputs[10].value) {
      miA4 = inputs[10].value;
    }else{
      miA4 = '';
    }
    if (inputs[11] && inputs[11].value) {
      surnameA4 = inputs[11].value;
    }else{
      surnameA4 = '';
    }
    var fullNameA4 = surnameA4+','+firstnameA4+' '+miA4;
    if (fullNameA4.length > 2) {
      fd.append('Author4',fullNameA4); 
    }else{
      fd.append('Author4','N/A');
    }
    // author 5
    if (inputs[12] && inputs[12].value) {
      firstnameA5 = inputs[12].value;
    }else{
      firstnameA5 = '';
    }
    if (inputs[13] && inputs[13].value) {
      miA5 = inputs[13].value;
    }else{
      miA5 = '';
    }
    if (inputs[14] && inputs[14].value) {
      surnameA5 = inputs[14].value;
    }else{
      surnameA5 = '';
    }
    var fullNameA5 = surnameA5+','+firstnameA5+' '+miA5;
    if (fullNameA5.length > 2) {
      fd.append('Author5',fullNameA5); 
    }else{
      fd.append('Author5','N/A');
    }
    // author 6
    if (inputs[15] && inputs[15].value) {
      firstnameA6 = inputs[15].value;
    }else{
      firstnameA6 = '';
    }
    if (inputs[16] && inputs[16].value) {
      miA6 = inputs[16].value;
    }else{
      miA6 = '';
    }
    if (inputs[17] && inputs[17].value) {
      surnameA6 = inputs[17].value;
    }else{
      surnameA6 = '';
    }
    var fullNameA6 = surnameA6+','+firstnameA6+' '+miA6;
    if (fullNameA6.length > 2) {
      fd.append('Author6',fullNameA6); 
    }else{
      fd.append('Author6','N/A');
    }
    var title = document.getElementById("form_title").value;
    var adviserFname = document.getElementById("form_adviser_fname").value;
    var adviserSname = document.getElementById("form_adviser_sname").value;
    var adviserMi = document.getElementById("form_adviser_mi").value;
    var year = document.getElementById("form_year").value;
    var course = document.getElementById("form_course").value;
    var keywords = document.getElementById("form_keywords").value;
    var abstract = document.getElementById("form_abstract").value;
    var file = document.getElementById("form_file").value;
    var actualFile = $('#form_file')[0].files;
    fd.append('file',actualFile[0]);
    fd.append('title',title);
    fd.append('adviser',adviserSname+','+adviserFname+' '+adviserMi);
    fd.append('year',year);
    fd.append('course',course);
    fd.append('keywords',keywords);
    fd.append('abstract',abstract);
    if (title.length != 0 && firstnameA1.length != 0 && surnameA1.length != 0 
      && adviserFname.length != 0 && adviserSname.length != 0 
      && year.length != 0 && course.length != 0 && keywords.length != 0 
      && abstract.length != 0 && file.length != 0) {
      swal({
        title: "Upload Research?",
        text: "Check details before proceeding.",
        icon: "warning",
        buttons: {
          cancel: "Cancel",
          ok:{
            text: "Ok",
            value: "ok",
          }
        },
      })
    .then((ok)=>{
      if (ok) {
        //hide modal for uploading research
        $("#researchUpload_mc").modal('hide');
        swal({
          title: "Uploading Research...",
          text: "This may take for a while.",
          icon: "../img/upload_loading_icon.gif",
          button: false,
          closeOnClickOutside: false,
          closeOnEsc: false
        });
        $.ajax({
          url: 'rs_upload_page_function.php',
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
            //update research studies
            updateResearch();
            updateAdviser();
            updateYear();
            updateCourse();
            //reset field to '' after uploading success
            swal({
              title: "Upload success",
              text: response,
              icon: "success",
              button: true,
            });
            // author 1
    if (inputs[0] && inputs[0].value) {
      inputs[0].value = '';
    }
    if (inputs[1] && inputs[1].value) {
      inputs[1].value = '';
    }
    if (inputs[2] && inputs[2].value) {
      inputs[2].value = '';
    }
    if (inputs[3] && inputs[3].value) {
      inputs[3].value = '';
    }
    if (inputs[4] && inputs[4].value) {
      inputs[4].value = '';
    }
    if (inputs[5] && inputs[5].value) {
      inputs[5].value = '';
    }
    if (inputs[6] && inputs[6].value) {
      inputs[6].value = '';
    }
    if (inputs[7] && inputs[7].value) {
      inputs[7].value = '';
    }
    if (inputs[8] && inputs[8].value) {
      inputs[8].value = '';
    }
    if (inputs[9] && inputs[9].value) {
      inputs[9].value = '';
    }
    if (inputs[10] && inputs[10].value) {
      inputs[10].value = '';
    }
    if (inputs[11] && inputs[11].value) {
      inputs[11].value = '';
    }
    if (inputs[12] && inputs[12].value) {
      inputs[12].value = '';
    }
    if (inputs[13] && inputs[13].value) {
      inputs[13].value = '';
    }
    if (inputs[14] && inputs[14].value) {
      inputs[14].value = '';
    }
    if (inputs[15] && inputs[15].value) {
      inputs[15].value = '';
    }
    if (inputs[16] && inputs[16].value) {
      inputs[16].value = '';
    }
    if (inputs[17] && inputs[17].value) {
      inputs[17].value = '';
    }
            document.getElementById("form_title").value = '';
            document.getElementById("form_adviser_fname").value = '';
            document.getElementById("form_adviser_sname").value = '';
            document.getElementById("form_adviser_mi").value = '';
            document.getElementById("form_course").value = '';
            document.getElementById("form_keywords").value = '';
            document.getElementById("form_year").value = '';
            document.getElementById("form_abstract").value = '';
            document.getElementById("form_file").value = '';
            $('#caseFile').html('Choose file...');
          }
        });
      }else {
        swal.stopLoading();
        swal.close();
      }
    });
  }
}
//update research function
function updateResearch() {
  $(document).ready(function() {
      function loadData(page) {
        $.ajax({
          url: "most_relevant.php",
          type: "POST",
          cache: false,
          data: {
            page_no: page
          },
          success: function(response) {
            $("#relevant-content").html(response);
          }
        });
        $.ajax({
          url: "most_reads.php",
          type: "POST",
          cache: false,
          data: {
            page_no: page
          },
          success: function(response) {
            $("#reads-content").html(response);
          }
        });
        $.ajax({
          url: "most_downloads.php",
          type: "POST",
          cache: false,
          data: {
            page_no: page
          },
          success: function(response) {
            $("#downloads-content").html(response);
          }
        });
        $.ajax({
          url: "count_results.php",
          type: "POST",
          cache: false,
          success: function(response) {
            $("#count-results").html(response);
          }
        });
        $.ajax({
          url: "updateFullList.php",
          type: "POST",
          cache: false,
          success: function(response) {
            $("#fullListPdf").html(response);
          }
        });
      }
      loadData();

      // Pagination code
      $(document).on("click", ".pagination li a", function(e) {
        e.preventDefault();
          var pageId = $(this).attr("id");
          loadData(pageId);
      });
      $(document).on("keypress", "#inputPage", function(e) {
        if (e.which == 13) {
          if ($(this).val() > $(this).attr("max")) {
            return false;
          }else{
            var pageId = $(this).val();
            loadData(pageId); 
          }
        }
      });
    });
}
function updateAdviser() {
  $.ajax({
    url: "updateAdviser.php",
    type: "POST",
    cache: false,
    success: function(response) {
      $("#adviserCheckbox").html(response);
    }
  });
}
function updateYear() {
  $.ajax({
    url: "updateYear.php",
    type: "POST",
    cache: false,
    success: function(response) {
      $("#yearCheckbox").html(response);
    }
  });
}
function updateCourse() {
  $.ajax({
    url: "updateCourse.php",
    type: "POST",
    cache: false,
    success: function(response) {
      $("#courseCheckbox").html(response);
    }
  });
}