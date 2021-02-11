// Menu starts here...
// For showing tabs
$(document).ready(function(){

    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    
});


// Menu ends here...
// For showing tabs
// Change dropdown text
function changeBtnTxt(id, txt, val){
  //change txt
  var btn = document.getElementById(id);
  btn.textContent = txt;

  if (id == 'studentAccountStatus') {
    //get current sort
  var sortTxt = '';
    if (document.getElementById('studentSort') != null) {
      sortTxt = document.getElementById('studentSort').innerHTML;
    }
    var sort = '';
    if (sortTxt == 'Descending') {
      sort = 'DESC';
    }else {
      sort = 'ASC';
    }

  //get current course
    var bsit = document.getElementById('bsitStudent');
    var educ = document.getElementById('educStudent');
    var bm = document.getElementById('bmStudent');

    var course1 = '';
    var course2 = '';
    var course3 = '';

    if (bsit != null) {
      if (bsit.checked == true) {
        course1 = 'bsit';
        bsit.checked = true;
        if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }if (bm.checked == true) {
          course3 = 'bm';
          bm.checked = true;
        }
      }
    }

    if (educ != null) {
      if (educ.checked == true) {
      course2 = 'educ';
      educ.checked = true;
      if (bsit.checked == true) {
        course1 = 'bsit';
        bsit.checked = true;
      }if (bm.checked == true) {
        course3 = 'bm';
        bm.checked = true;
      }
    }
  }
    
    if (bm != null) {
      if (bm.checked == true) {
        course3 = 'bm';
        bm.checked = true;
        if (bsit.checked == true) {
          course1 = 'bsit';
          bsit.checked = true;
        }if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }
      } 
    }

    filterStudent(val,txt,sort,sortTxt,course1,course2,course3);

  }else if (id == 'professorAccountStatus') {
    //get current sort
  var sortTxt = '';
    if (document.getElementById('professorSort') != null) {
      sortTxt = document.getElementById('professorSort').innerHTML;
    }
    var sort = '';
    if (sortTxt == 'Descending') {
      sort = 'DESC';
    }else {
      sort = 'ASC';
    }

  //get current course
    var bsit = document.getElementById('bsitProfessor');
    var educ = document.getElementById('educProfessor');
    var bm = document.getElementById('bmProfessor');

    var course1 = '';
    var course2 = '';
    var course3 = '';

    if (bsit != null) {
      if (bsit.checked == true) {
        course1 = 'BIT Department';
        bsit.checked = true;
        if (educ.checked == true) {
          course2 = 'EDUC Department';
          educ.checked = true;
        }if (bm.checked == true) {
          course3 = 'BM Department';
          bm.checked = true;
        }
      }
    }

    if (educ != null) {
      if (educ.checked == true) {
      course2 = 'EDUC Department';
      educ.checked = true;
      if (bsit.checked == true) {
        course1 = 'BIT Department';
        bsit.checked = true;
      }if (bm.checked == true) {
        course3 = 'BM Department';
        bm.checked = true;
      }
    }
  }
    
    if (bm != null) {
      if (bm.checked == true) {
        course3 = 'BM Department';
        bm.checked = true;
        if (bsit.checked == true) {
          course1 = 'BIT Department';
          bsit.checked = true;
        }if (educ.checked == true) {
          course2 = 'EDUC Department';
          educ.checked = true;
        }
      } 
    }

    filterProfessor(val,txt,sort,sortTxt,course1,course2,course3);

  }else if (id == 'alumniAccountStatus') {
  //get current sort
  var sortTxt = '';
    if (document.getElementById('alumniSort') != null) {
      sortTxt = document.getElementById('alumniSort').innerHTML;
    }
    var sort = '';
    if (sortTxt == 'Descending') {
      sort = 'DESC';
    }else {
      sort = 'ASC';
    }

  //get current course
    var bsit = document.getElementById('bsitAlumni');
    var educ = document.getElementById('educAlumni');
    var bm = document.getElementById('bmAlumni');

    var course1 = '';
    var course2 = '';
    var course3 = '';

    if (bsit != null) {
      if (bsit.checked == true) {
        course1 = 'bsit';
        bsit.checked = true;
        if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }if (bm.checked == true) {
          course3 = 'bm';
          bm.checked = true;
        }
      }
    }

    if (educ != null) {
      if (educ.checked == true) {
      course2 = 'educ';
      educ.checked = true;
      if (bsit.checked == true) {
        course1 = 'bsit';
        bsit.checked = true;
      }if (bm.checked == true) {
        course3 = 'bm';
        bm.checked = true;
      }
    }
  }
    
    if (bm != null) {
      if (bm.checked == true) {
        course3 = 'bm';
        bm.checked = true;
        if (bsit.checked == true) {
          course1 = 'bsit';
          bsit.checked = true;
        }if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }
      } 
    }

    filterAlumni(val,txt,sort,sortTxt,course1,course2,course3);

  }else if (id == 'alumniSort') {
    //get status alumni
    var statusTxt = document.getElementById('alumniAccountStatus').innerHTML;
    var status = '';
    if (statusTxt == 'Pending') {
      status = 'pending';
    }else if (statusTxt == 'Verified') {
      status = 'verified';
    }else {
      status = 'denied';
    }
    //get current course
    var bsit = document.getElementById('bsitAlumni');
    var educ = document.getElementById('educAlumni');
    var bm = document.getElementById('bmAlumni');

    var course1 = '';
    var course2 = '';
    var course3 = '';

    if (bsit != null) {
      if (bsit.checked == true) {
        course1 = 'bsit';
        bsit.checked = true;
        if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }if (bm.checked == true) {
          course3 = 'bm';
          bm.checked = true;
        }
      }      
    }

    if (educ != null) {
        if (educ.checked == true) {
        course2 = 'educ';
        educ.checked = true;
        if (bsit.checked == true) {
          course1 = 'bsit';
          bsit.checked = true;
        }if (bm.checked == true) {
          course3 = 'bm';
          bm.checked = true;
        }
      }
    }
    
    if (bm != null) {
      if (bm.checked == true) {
        course3 = 'bm';
        bm.checked = true;
        if (bsit.checked == true) {
          course1 = 'bsit';
          bsit.checked = true;
        }if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }
      } 
    }

    filterAlumni(status,statusTxt,val,txt,course1,course2,course3);
  }

  else if (id == 'studentSort') {
    //get status student
    var statusTxt = document.getElementById('studentAccountStatus').innerHTML;
    var status = '';
    if (statusTxt == 'Pending') {
      status = 'pending';
    }else if (statusTxt == 'Verified') {
      status = 'verified';
    }else {
      status = 'denied';
    }
    //get current course
    var bsit = document.getElementById('bsitStudent');
    var educ = document.getElementById('educStudent');
    var bm = document.getElementById('bmStudent');

    var course1 = '';
    var course2 = '';
    var course3 = '';

    if (bsit != null) {
      if (bsit.checked == true) {
        course1 = 'bsit';
        bsit.checked = true;
        if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }if (bm.checked == true) {
          course3 = 'bm';
          bm.checked = true;
        }
      }      
    }

    if (educ != null) {
        if (educ.checked == true) {
        course2 = 'educ';
        educ.checked = true;
        if (bsit.checked == true) {
          course1 = 'bsit';
          bsit.checked = true;
        }if (bm.checked == true) {
          course3 = 'bm';
          bm.checked = true;
        }
      }
    }
    
    if (bm != null) {
      if (bm.checked == true) {
        course3 = 'bm';
        bm.checked = true;
        if (bsit.checked == true) {
          course1 = 'bsit';
          bsit.checked = true;
        }if (educ.checked == true) {
          course2 = 'educ';
          educ.checked = true;
        }
      } 
    }

    filterStudent(status,statusTxt,val,txt,course1,course2,course3);
  }

  else if (id == 'professorSort') {
    //get status professor
    var statusTxt = document.getElementById('professorAccountStatus').innerHTML;
    var status = '';
    if (statusTxt == 'Pending') {
      status = 'pending';
    }else if (statusTxt == 'Verified') {
      status = 'verified';
    }else {
      status = 'denied';
    }
    //get current course
    var bsit = document.getElementById('bsitProfessor');
    var educ = document.getElementById('educProfessor');
    var bm = document.getElementById('bmProfessor');

    var course1 = '';
    var course2 = '';
    var course3 = '';

    if (bsit != null) {
      if (bsit.checked == true) {
        course1 = 'BIT Department';
        bsit.checked = true;
        if (educ.checked == true) {
          course2 = 'EDUC Department';
          educ.checked = true;
        }if (bm.checked == true) {
          course3 = 'BM Department';
          bm.checked = true;
        }
      }      
    }

    if (educ != null) {
        if (educ.checked == true) {
        course2 = 'EDUC Department';
        educ.checked = true;
        if (bsit.checked == true) {
          course1 = 'BIT Department';
          bsit.checked = true;
        }if (bm.checked == true) {
          course3 = 'BM Department';
          bm.checked = true;
        }
      }
    }
    
    if (bm != null) {
      if (bm.checked == true) {
        course3 = 'BM Department';
        bm.checked = true;
        if (bsit.checked == true) {
          course1 = 'BIT Department';
          bsit.checked = true;
        }if (educ.checked == true) {
          course2 = 'EDUC Department';
          educ.checked = true;
        }
      } 
    }

    filterProfessor(status,statusTxt,val,txt,course1,course2,course3);
  }else if (id == 'adminSort') {
    filterAdmin(val,txt);
  }

}
//check filter course for alumni
function course(id) {
  var bsit = '';
  var educ = '';
  var bm = '';
  var sortTxt = '';
  var statusTxt = '';
  var status = '';
  var sort = '';

  if (id == 'bsitAlumni' || id == 'educAlumni' || id == 'bmAlumni') {
    bsit = document.getElementById('bsitAlumni');
    educ = document.getElementById('educAlumni');
    bm = document.getElementById('bmAlumni');
    if (document.getElementById('alumniSort') != null) {
      sortTxt = document.getElementById('alumniSort').innerHTML;
    }
    statusTxt = document.getElementById('alumniAccountStatus').innerHTML;
  }
  else if (id == 'bsitStudent' || id == 'educStudent' || id == 'bmStudent') {
    bsit = document.getElementById('bsitStudent');
    educ = document.getElementById('educStudent');
    bm = document.getElementById('bmStudent');
    if (document.getElementById('studentSort') != null) {
      sortTxt = document.getElementById('studentSort').innerHTML;
    }
    statusTxt = document.getElementById('studentAccountStatus').innerHTML;
  }
  else if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
    bsit = document.getElementById('bsitProfessor');
    educ = document.getElementById('educProfessor');
    bm = document.getElementById('bmProfessor');
    if (document.getElementById('professorSort') != null) {
      sortTxt = document.getElementById('professorSort').innerHTML;
    }
    statusTxt = document.getElementById('professorAccountStatus').innerHTML;
  }

  var course1 = '';
  var course2 = '';
  var course3 = '';

//get current course
if (bsit != null) {
  if (bsit.checked == true) {
    if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
      course1 = 'BIT Department';
    }else {
      course1 = 'bsit'; 
    }
    bsit.checked = true;
    if (educ.checked == true) {
      if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
        course2 = 'EDUC Department';
      }else {
        course2 = 'educ'; 
      }
      educ.checked = true;
    }if (bm.checked == true) {
      if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
        course3 = 'BM Department';
      }else {
        course3 = 'bm'; 
      }
      bm.checked = true;
    }
  } 
}

if (educ != null) {
  if (educ.checked == true) {
    if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
      course2 = 'EDUC Department';
    }else {
      course2 = 'educ'; 
    }
    educ.checked = true;
    if (bsit.checked == true) {
      if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
        course1 = 'BIT Department';
      }else {
        course1 = 'bsit'; 
      }
      bsit.checked = true;
    }if (bm.checked == true) {
      if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
        course3 = 'BM Department';
      }else {
        course3 = 'bm'; 
      }
      bm.checked = true;
    }
  } 
}

if (bm != null) {
  if (bm.checked == true) {
    if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
      course3 = 'BM Department';
    }else {
      course3 = 'bm'; 
    }
    bm.checked = true;
    if(bsit.checked == true) {
      if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
        course1 = 'BIT Department';
      }else {
        course1 = 'bsit'; 
      }
      bsit.checked = true;
    }if (educ.checked == true) {
      if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
        course2 = 'EDUC Department';
      }else {
        course2 = 'educ'; 
      }
      educ.checked = true;
    }
  } 
}

  //get current sort
    
    if (sortTxt == 'Ascending') {
      sort = 'ASC';
    }else {
      sort = 'DESC';
    }
  //get current status
    
    if (statusTxt == 'Pending') {
      status = 'pending';
    }else if (statusTxt == 'Verified') {
      status = 'verified';
    }else {
      status = 'denied';
    }

    if (id == 'bsitAlumni' || id == 'educAlumni' || id == 'bmAlumni') {
      filterAlumni(status,statusTxt,sort,sortTxt,course1,course2,course3);
    }
    else if (id == 'bsitStudent' || id == 'educStudent' || id == 'bmStudent') {
      filterStudent(status,statusTxt,sort,sortTxt,course1,course2,course3);
    }
    else if (id == 'bsitProfessor' || id == 'educProfessor' || id == 'bmProfessor') {
      filterProfessor(status,statusTxt,sort,sortTxt,course1,course2,course3);
    }
}

//send filter for alumni
function filterAlumni(status,statusTxt,sort,sortTxt,course1,course2,course3) {
    // alumni account pagination
    $(document).ready(function() {
          function loadData(page) {
            $.ajax({
              url: "alumni_account_pagination.php",
              type: "POST",
              cache: false,
              data: {
                page_no: page,
                sort: sort,
                sortTxt: sortTxt,
                status: status,
                statusTxt: statusTxt,
                bsit: course1,
                educ: course2,
                bm: course3
              },
              success: function(response) {
                $("#alumni-content").html(response);
                if (course1 == 'bsit') {
                  if (document.getElementById('bsitAlumni') != null) {
                    document.getElementById('bsitAlumni').checked = true; 
                  }
                }
                if (course2 == 'educ') {
                  if (document.getElementById('educAlumni') != null) {
                    document.getElementById('educAlumni').checked = true;
                  }
                }
                if (course3 == 'bm') {
                  if (document.getElementById('bmAlumni') != null) {
                    document.getElementById('bmAlumni').checked = true;
                  }
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

//send filter for student
function filterStudent(status,statusTxt,sort,sortTxt,course1,course2,course3) {
    // professor account pagination
    $(document).ready(function() {
          function loadData(page) {
            $.ajax({
              url: "student_account_pagination.php",
              type: "POST",
              cache: false,
              data: {
                page_no: page,
                sort: sort,
                sortTxt: sortTxt,
                status: status,
                statusTxt: statusTxt,
                bsit: course1,
                educ: course2,
                bm: course3
              },
              success: function(response) {
                $("#student-content").html(response);
                if (course1 == 'bsit') {
                  if (document.getElementById('bsitStudent') != null) {
                    document.getElementById('bsitStudent').checked = true; 
                  }
                }
                if (course2 == 'educ') {
                  if (document.getElementById('educStudent') != null) {
                    document.getElementById('educStudent').checked = true;
                  }
                }
                if (course3 == 'bm') {
                  if (document.getElementById('bmStudent') != null) {
                    document.getElementById('bmStudent').checked = true;
                  }
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

//send filter for professor
function filterProfessor(status,statusTxt,sort,sortTxt,course1,course2,course3) {
    // alumni account pagination
    $(document).ready(function() {
          function loadData(page) {
            $.ajax({
              url: "professor_account_pagination.php",
              type: "POST",
              cache: false,
              data: {
                page_no: page,
                sort: sort,
                sortTxt: sortTxt,
                status: status,
                statusTxt: statusTxt,
                bsit: course1,
                educ: course2,
                bm: course3
              },
              success: function(response) {
                $("#professor-content").html(response);
                if (course1 == 'BIT Department') {
                  if (document.getElementById('bsitProfessor') != null) {
                    document.getElementById('bsitProfessor').checked = true; 
                  }
                }
                if (course2 == 'EDUC Department') {
                  if (document.getElementById('educProfessor') != null) {
                    document.getElementById('educProfessor').checked = true;
                  }
                }
                if (course3 == 'BM Department') {
                  if (document.getElementById('bmProfessor') != null) {
                    document.getElementById('bmProfessor').checked = true;
                  }
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
//send filter for professor
function filterAdmin(sort,sortTxt) {
    // alumni account pagination
    $(document).ready(function() {
          function loadData(page) {
            $.ajax({
              url: "admin_account_pagination.php",
              type: "POST",
              cache: false,
              data: {
                page_no: page,
                sort: sort,
                sortTxt: sortTxt
              },
              success: function(response) {
                $("#admin-content").html(response);
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