//search research studies

//enter function
// Get the input field
var input = document.getElementById("rs-input");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("research-search-button").click();
  }
});

//Autocomplete
$(function() {
  //adviser
  if (document.getElementById('filter_checkbox_adviser1').checked == true) {
    var adviser1 = $('#filter_checkbox_adviser1').val();
  }else {
    adviser1 = null;
  }
  if (document.getElementById('filter_checkbox_adviser2') != null) {
    if (document.getElementById('filter_checkbox_adviser2').checked == true) {
      var adviser2 = $('#filter_checkbox_adviser2').val();
    }else {
      adviser2 = null;
    }
  }
  if (document.getElementById('filter_checkbox_adviser3') != null) {
    if (document.getElementById('filter_checkbox_adviser3').checked == true) {
      var adviser3 = $('#filter_checkbox_adviser3').val();
    }else {
      adviser3 = null;
    }
  }
  if (document.getElementById('filter_checkbox_adviser4') != null) {
    if (document.getElementById('filter_checkbox_adviser4').checked == true) {
      var adviser4 = $('#filter_checkbox_adviser4').val();
    }else {
      adviser4 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_adviser5') != null) {
    if (document.getElementById('filter_checkbox_adviser5').checked == true) {
      var adviser5 = $('#filter_checkbox_adviser5').val();
    }else {
      adviser5 = null;
    } 
  }

  //year
  if (document.getElementById('filter_checkbox_year1') != null) {
    if (document.getElementById('filter_checkbox_year1').checked == true) {
      var year1 = $('#filter_checkbox_year1').val();
    }else {
      year1 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_year2') != null) {
    if (document.getElementById('filter_checkbox_year2').checked == true) {
      var year2 = $('#filter_checkbox_year2').val();
    }else {
      year2 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_year3') != null) {
    if (document.getElementById('filter_checkbox_year3').checked == true) {
      var year3 = $('#filter_checkbox_year3').val();
    }else {
      year3 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_year4') != null) {
    if (document.getElementById('filter_checkbox_year4').checked == true) {
      var year4 = $('#filter_checkbox_year4').val();
    }else {
      year4 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_year5') != null) {
    if (document.getElementById('filter_checkbox_year5').checked == true) {
      var year5 = $('#filter_checkbox_year5').val();
    }else {
      year5 = null;
    } 
  }

  //course
  if (document.getElementById('filter_checkbox_course1') != null) {
    if (document.getElementById('filter_checkbox_course1').checked == true) {
      var course1 = $('#filter_checkbox_course1').val();
    }else {
      course1 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_course2') != null) {
    if (document.getElementById('filter_checkbox_course2').checked == true) {
      var course2 = $('#filter_checkbox_course2').val();
    }else {
      course2 = null;
    } 
  }
  if (document.getElementById('filter_checkbox_course3') != null) {
    if (document.getElementById('filter_checkbox_course3').checked == true) {
      var course3 = $('#filter_checkbox_course3').val();
    }else {
      course3 = null;
    } 
  }
        $("#rs-input").autocomplete({
          source: "action.php",
          appendTo: "#menu-container",
          select: function(event, ui) {
                researchBtn(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3);
              }
        })
      });
function getWidthResearch() {
  var elemDiv = document.getElementById("rs-input");
  var newWidth = elemDiv.clientWidth + 'px';
  var elemDiv2 = document.getElementById("menu-container");
  elemDiv2.style.width = newWidth;
}

//button function
function researchBtn(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3) {
  var input = document.getElementById("rs-input").value.length;//get length of input
  if (input > 2) {
    addSearchCount($("#rs-input").val()); 
  }
    $(document).ready(function() {
      function loadData(page) {
        $.ajax({
          url: "most_relevant.php",
          type: "POST",
          cache: false,
          data: {
            page_no: page,
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            year4: year4,
            year5: year5,
            course1: course1,
            course2: course2,
            course3: course3
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
            page_no: page,
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            year4: year4,
            year5: year5,
            course1: course1,
            course2: course2,
            course3: course3
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
            page_no: page,
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            year4: year4,
            year5: year5,
            course1: course1,
            course2: course2,
            course3: course3
          },
          success: function(response) {
            $("#downloads-content").html(response);
          }
        });
        $.ajax({
          url: "count_results.php",
          type: "POST",
          cache: false,
          data: {
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            year4: year4,
            year5: year5,
            course1: course1,
            course2: course2,
            course3: course3
          },
          success: function(response) {
            $("#count-results").html(response);
          }
        });
        $.ajax({
          url: "tab_list.php",
          type: "POST",
          cache: false,
          data: {
            query: $('#rs-input').val()
          },
          success: function(response) {
            $("#tab-list").html(response);
          }
        });
        $.ajax({
          url: "updateFullList.php",
          type: "POST",
          cache: false,
          data: {
            query: $('#rs-input').val()
          },
          success: function(response) {
            $("#fullListPdf").html(response);
          }
        });
        $.ajax({
          url: "updateYear.php",
          type: "POST",
          cache: false,
          data: {
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            course1: course1,
            course2: course2,
            course3: course3
          },
          success: function(response) {
            $("#yearCheckbox").html(response);
            if (document.getElementById("filter_checkbox_year1") && year1) {
              document.getElementById("filter_checkbox_year1").checked = true;
            }
            if (document.getElementById("filter_checkbox_year2") && year2) {
              document.getElementById("filter_checkbox_year2").checked = true;
            }
            if (document.getElementById("filter_checkbox_year3") && year3) {
              document.getElementById("filter_checkbox_year3").checked = true;
            }
            if (document.getElementById("filter_checkbox_year4") && year4) {
              document.getElementById("filter_checkbox_year4").checked = true;
            }
            if (document.getElementById("filter_checkbox_year5") && year5) {
              document.getElementById("filter_checkbox_year5").checked = true;
            }
          }
        });
        $.ajax({
          url: "updateAdviser.php",
          type: "POST",
          cache: false,
          data: {
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            course1: course1,
            course2: course2,
            course3: course3
          },
          success: function(response) {
            $("#adviserCheckbox").html(response);
            if (document.getElementById("filter_checkbox_adviser1") && adviser1) {
              document.getElementById("filter_checkbox_adviser1").checked = true;
            }
            if (document.getElementById("filter_checkbox_adviser2") && adviser2) {
              document.getElementById("filter_checkbox_adviser2").checked = true;
            }
            if (document.getElementById("filter_checkbox_adviser3") && adviser3) {
              document.getElementById("filter_checkbox_adviser3").checked = true;
            }
            if (document.getElementById("filter_checkbox_adviser4") && adviser4) {
              document.getElementById("filter_checkbox_adviser4").checked = true;
            }
            if (document.getElementById("filter_checkbox_adviser5") && adviser5) {
              document.getElementById("filter_checkbox_adviser5").checked = true;
            }
          }
        });
        $.ajax({
          url: "updateCourse.php",
          type: "POST",
          cache: false,
          data: {
            query: $('#rs-input').val(),
            adviser1: adviser1,
            adviser2: adviser2,
            adviser3: adviser3,
            adviser4: adviser4,
            adviser5: adviser5,
            year1: year1,
            year2: year2,
            year3: year3,
            course1: course1,
            course2: course2,
            course3: course3
          },
          success: function(response) {
            $("#courseCheckbox").html(response);
            if (document.getElementById("filter_checkbox_course1") && course1) {
              document.getElementById("filter_checkbox_course1").checked = true;
            }
            if (document.getElementById("filter_checkbox_course2") && course2) {
              document.getElementById("filter_checkbox_course2").checked = true;
            }
            if (document.getElementById("filter_checkbox_course3") && course3) {
              document.getElementById("filter_checkbox_course3").checked = true;
            }
            if (document.getElementById("filter_checkbox_course4") && course4) {
              document.getElementById("filter_checkbox_course4").checked = true;
            }
            if (document.getElementById("filter_checkbox_course5") && course5) {
              document.getElementById("filter_checkbox_course5").checked = true;
            }
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
//end of search research studies
function addSearchCount(search) {
  $.ajax({
    url: "/php/addSearchCount.php",
    type: "POST",
    data: {
      query: search
    }
  });
}