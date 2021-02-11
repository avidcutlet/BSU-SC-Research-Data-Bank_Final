//Student
function verifyStudent(student_id,type) {
	swal({
		title: "Verify Account?",
		text: "Verifying account would allow the user to \ndownload"+
		" and view pdf.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).
	then((ok)=>{
		if(ok){
			$.ajax({
				url: "student_account_pagination.php",
				type: 'post',
				data: {
					verify_id: student_id
				},
				success: function(response){
					var bsit = '';
					var educ = '';
					var bm = '';
					var sortTxt = '';
					var statusTxt = '';
					var status = '';
					var sort = '';
				    
				    if (type == 'alumni' || type == 'alumni' || type == 'alumni') {
					    bsit = document.getElementById('bsitAlumni');
					    educ = document.getElementById('educAlumni');
					    bm = document.getElementById('bmAlumni');
					    if (document.getElementById('alumniSort') != null) {
					      sortTxt = document.getElementById('alumniSort').innerHTML;
					    }
					    if (sortTxt == 'Descending') {
					    	sort = 'DESC';
					    }else {
					    	sort = 'ASC';
					    }
					    statusTxt = document.getElementById('alumniAccountStatus').innerHTML;
					    if (statusTxt == 'Pending') {
					    	status = 'pending';
					    }else if (statusTxt == 'Verified') {
					    	status = 'verified';
					    }else if (statusTxt == 'Denied') {
					    	status = 'denied';
					    }
					  }
					  else if (type == 'student' || type == 'student' || type == 'student') {
					    bsit = document.getElementById('bsitStudent');
					    educ = document.getElementById('educStudent');
					    bm = document.getElementById('bmStudent');
					    if (document.getElementById('studentSort') != null) {
					      sortTxt = document.getElementById('studentSort').innerHTML;
					    }
					    if (sortTxt == 'Descending') {
					    	sort = 'DESC';
					    }else {
					    	sort = 'ASC';
					    }
					    statusTxt = document.getElementById('studentAccountStatus').innerHTML;
					    if (statusTxt == 'Pending') {
					    	status = 'pending';
					    }else if (statusTxt == 'Verified') {
					    	status = 'verified';
					    }else if (statusTxt == 'Denied') {
					    	status = 'denied';
					    }
					  }

					  var course1 = '';
					  var course2 = '';
					  var course3 = '';

					//get current course
					if (bsit != null) {
					  if (bsit.checked == true) {
					    course1 = 'bsit';
					    bsit.checked = true;
					    if (educ.checked == true) {
					      course2 = 'educ';
					      educ.checked == true;
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
					    if(bsit.checked == true) {
					      course1 = 'bsit';
					      bsit.checked = true;
					    }if (educ.checked == true) {
					      course2 = 'educ';
					      educ.checked = true;
					    }
					  } 
					}
					if (type == 'alumni' || type == 'alumni' || type == 'alumni') {
				      updateAlumni(sort,sortTxt,status,statusTxt,course1,course2,course3);
				    }
				    else if (type == 'student' || type == 'student' || type == 'student') {
				      updateStudent(sort,sortTxt,status,statusTxt,course1,course2,course3);
				    }
				}
			}).
			then((results)=>{
				swal({
					title: "Account Verified!",
					text: "Account had been sucessfully verified.",
					icon: "success",
					button: true,
				});
			});	
		}else{
			swal.stopLoading();
			swal.close();
		}
	});
}

function denyStudent(student_id,type) {
	swal({
		title: "Deny Account?",
		text: "Denying account would not allow the user to \ndownload"+
		" and view pdf.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).
	then((ok)=>{
		if(ok){
			$.ajax({
				url: "student_account_pagination.php",
				type: 'post',
				data: {
					deny_id: student_id
				},
				success: function(response){
					var bsit = '';
					var educ = '';
					var bm = '';
					var sortTxt = '';
					var statusTxt = '';
					var status = '';
					var sort = '';
				    
				    if (type == 'alumni' || type == 'alumni' || type == 'alumni') {
					    bsit = document.getElementById('bsitAlumni');
					    educ = document.getElementById('educAlumni');
					    bm = document.getElementById('bmAlumni');
					    if (document.getElementById('alumniSort') != null) {
					      sortTxt = document.getElementById('alumniSort').innerHTML;
					    }
					    if (sortTxt == 'Descending') {
					    	sort = 'DESC';
					    }else {
					    	sort = 'ASC';
					    }
					    statusTxt = document.getElementById('alumniAccountStatus').innerHTML;
					    if (statusTxt == 'Pending') {
					    	status = 'pending';
					    }else if (statusTxt == 'Verified') {
					    	status = 'verified';
					    }else if (statusTxt == 'Denied') {
					    	status = 'denied';
					    }
					  }
					  else if (type == 'student' || type == 'student' || type == 'student') {
					    bsit = document.getElementById('bsitStudent');
					    educ = document.getElementById('educStudent');
					    bm = document.getElementById('bmStudent');
					    if (document.getElementById('studentSort') != null) {
					      sortTxt = document.getElementById('studentSort').innerHTML;
					    }
					    if (sortTxt == 'Descending') {
					    	sort = 'DESC';
					    }else {
					    	sort = 'ASC';
					    }
					    statusTxt = document.getElementById('studentAccountStatus').innerHTML;
					    if (statusTxt == 'Pending') {
					    	status = 'pending';
					    }else if (statusTxt == 'Verified') {
					    	status = 'verified';
					    }else if (statusTxt == 'Denied') {
					    	status = 'denied';
					    }
					  }

					  var course1 = '';
					  var course2 = '';
					  var course3 = '';

					//get current course
					if (bsit != null) {
					  if (bsit.checked == true) {
					    course1 = 'bsit';
					    bsit.checked = true;
					    if (educ.checked == true) {
					      course2 = 'educ';
					      educ.checked == true;
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
					    if(bsit.checked == true) {
					      course1 = 'bsit';
					      bsit.checked = true;
					    }if (educ.checked == true) {
					      course2 = 'educ';
					      educ.checked = true;
					    }
					  } 
					}
					if (type == 'alumni' || type == 'alumni' || type == 'alumni') {
				      updateAlumni(sort,sortTxt,status,statusTxt,course1,course2,course3);
				    }
				    else if (type == 'student' || type == 'student' || type == 'student') {
				      updateStudent(sort,sortTxt,status,statusTxt,course1,course2,course3);
				    }
				}
			}).
			then((results)=>{
				swal({
					title: "Account Denied!",
					text: "Account had been sucessfully denied.",
					icon: "success",
					button: true,
				});
			});	
		}else{
			swal.stopLoading();
			swal.close();
		}
	});
}

//Professor
function verifyProfessor(professor_id) {	
	swal({
		title: "Verify Account?",
		text: "Verifying account would allow the user to \ndownload"+
		" and view pdf.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).
	then((ok)=>{
		if(ok){
			$.ajax({
				url: "professor_account_pagination.php",
				type: 'post',
				data: {
					verify_id_professor: professor_id
				},
				success: function(response){
					var bsit = '';
					var educ = '';
					var bm = '';
					var sortTxt = '';
					var statusTxt = '';
					var status = '';
					var sort = '';
					var course1 = '';
					var course2 = '';
					var course3 = '';

					if (document.getElementById('professorSort') != null) {
				      sortTxt = document.getElementById('professorSort').innerHTML;
				    }
				    if (sortTxt == 'Descending') {
				    	sort = 'DESC';
				    }else {
				    	sort = 'ASC';
				    }
				    statusTxt = document.getElementById('professorAccountStatus').innerHTML;
				    if (statusTxt == 'Pending') {
				    	status = 'pending';
				    }else if (statusTxt == 'Verified') {
				    	status = 'verified';
				    }else if (statusTxt == 'Denied') {
				    	status = 'denied';
				    }

					//get current course
					bsit = document.getElementById('bsitProfessor');
				    educ = document.getElementById('educProfessor');
				    bm = document.getElementById('bmProfessor');
					if (bsit != null) {
					  if (bsit.checked == true) {
					      course1 = 'BIT Department';
					    bsit.checked = true;
					    if (educ.checked == true) {
					        course2 = 'EDUC Department';
					      educ.checked == true;
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
					    if(bsit.checked == true) {
					        course1 = 'BIT Department';
					      bsit.checked = true;
					    }if (educ.checked == true) {
					        course1 = 'EDUC Department';
					      educ.checked = true;
					    }
					  } 
					}
					updateProfessor(sort,sortTxt,status,statusTxt,course1,course2,course3);
				}
			}).
			then((results)=>{
				swal({
					title: "Account Verified!",
					text: "Account had been sucessfully verified.",
					icon: "success",
					button: true,
				});
			});	
		}else{
			swal.stopLoading();
			swal.close();
		}
	});
}

function denyProfessor(professor_id) {	
	swal({
		title: "Deny Account?",
		text: "Denying account not would allow the user to \ndownload"+
		" and view pdf.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).
	then((ok)=>{
		if(ok){
			$.ajax({
				url: "professor_account_pagination.php",
				type: 'post',
				data: {
					deny_id_professor: professor_id
				},
				success: function(response){
					updateProfessor();
				}
			}).
			then((results)=>{
				swal({
					title: "Account Denied!",
					text: "Account had been sucessfully denied.",
					icon: "success",
					button: true,
				});
			});	
		}else{
			swal.stopLoading();
			swal.close();
		}
	});
}
//delete account function
function deleteAcc(table,username,dir,id_type,id,type) {
  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this account!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal({
        title: 'Deleting Account...',
        icon: "/img/upload_loading_icon.gif",
        button: false,
        closeModal: false,
        closeOnClickOutside: false,
        colseOnEsc: false,
      });
      $.ajax({
              url: "deleteAccount.php",
              type: "POST",
              cache: false,
              data: {
                table: table,
                id: id,
                id_type: id_type,
                username: username,
                dir: dir
              },
              success: function(response) {
                swal({
                	title: 'Account had been deleted.',
                	icon: 'success',
                	button: true,
                });
                var bsit = '';
                var educ = '';
                var bm = '';
                var sortTxt = '';
                var statusTxt = '';
                var status = '';
                var sort = '';
                  //alumni
                  if (type == 'alumni' || type == 'alumni' || type == 'alumni') {
                    bsit = document.getElementById('bsitAlumni');
                    educ = document.getElementById('educAlumni');
                    bm = document.getElementById('bmAlumni');
                    if (document.getElementById('alumniSort') != null) {
                      sortTxt = document.getElementById('alumniSort').innerHTML;
                    }
                    if (sortTxt == 'Descending') {
                      sort = 'DESC';
                    }else {
                      sort = 'ASC';
                    }
                    statusTxt = document.getElementById('alumniAccountStatus').innerHTML;
                    if (statusTxt == 'Pending') {
                      status = 'pending';
                    }else if (statusTxt == 'Verified') {
                      status = 'verified';
                    }else if (statusTxt == 'Denied') {
                      status = 'denied';
                    }
                  }
                  //student
                  else if (type == 'student' || type == 'student' || type == 'student') {
                    bsit = document.getElementById('bsitStudent');
                    educ = document.getElementById('educStudent');
                    bm = document.getElementById('bmStudent');
                    if (document.getElementById('studentSort') != null) {
                      sortTxt = document.getElementById('studentSort').innerHTML;
                    }
                    if (sortTxt == 'Descending') {
                      sort = 'DESC';
                    }else {
                      sort = 'ASC';
                    }
                    statusTxt = document.getElementById('studentAccountStatus').innerHTML;
                    if (statusTxt == 'Pending') {
                      status = 'pending';
                    }else if (statusTxt == 'Verified') {
                      status = 'verified';
                    }else if (statusTxt == 'Denied') {
                      status = 'denied';
                    }
                  }
                  //student
                  else if (type == 'professor' || type == 'professor' || type == 'professor') {
                    bsit = document.getElementById('bsitProfessor');
                    educ = document.getElementById('educProfessor');
                    bm = document.getElementById('bmProfessor');
                    if (document.getElementById('professorSort') != null) {
                      sortTxt = document.getElementById('professorSort').innerHTML;
                    }
                    if (sortTxt == 'Descending') {
                      sort = 'DESC';
                    }else {
                      sort = 'ASC';
                    }
                    statusTxt = document.getElementById('professorAccountStatus').innerHTML;
                    if (statusTxt == 'Pending') {
                      status = 'pending';
                    }else if (statusTxt == 'Verified') {
                      status = 'verified';
                    }else if (statusTxt == 'Denied') {
                      status = 'denied';
                    }
                  }

                  var course1 = '';
                  var course2 = '';
                  var course3 = '';

                //get current course
                if (bsit != null) {
                  if (bsit.checked == true) {
                  	if (type == 'professor') {
                  		course1 = 'BIT Department';	
                  	}else{
                  		course1 = 'bsit';	
                  	}
                    bsit.checked = true;
                    if (educ.checked == true) {
                    	if (type == 'professor') {
                    		course2 = 'EDUC Department';
                    	}else{
                    		course2 = 'educ';
                    	}
                      educ.checked == true;
                    }if (bm.checked == true) {
                    	if (type == 'professor') {
                    		course3 = 'BM Department';
                    	}else{
                    		course3 = 'bm';
                    	}
                      bm.checked = true;
                    }
                  } 
                }

                if (educ != null) {
                  if (educ.checked == true) {
                  	if (type == 'professor') {
                  		course2 = 'EDUC Department';
                  	}else{
                  		course2 = 'educ';
                  	}
                    educ.checked = true;
                    if (bsit.checked == true) {
                    	if (type == 'professor') {
                    		course1 = 'BIT Department';
                    	}else{
                    		course1 = 'bsit';
                    	}
                      bsit.checked = true;
                    }if (bm.checked == true) {
                    	if (type == 'professor') {
                    		course3 = 'BM Department';
                    	}else{
                    		course3 = 'bm';
                    	}
                      bm.checked = true;
                    }
                  } 
                }

                if (bm != null) {
                  if (bm.checked == true) {
                  	if (type == 'professor') {
                  		course3 = 'BM Department';
                  	}else{
                  		course3 = 'bm';
                  	}
                    bm.checked = true;
                    if(bsit.checked == true) {
                    	if (type == 'professor') {
                    		course1 = 'BIT Department';
                    	}else{
                    		course1 = 'bsit';
                    	}
                      bsit.checked = true;
                    }if (educ.checked == true) {
                    	if (type == 'professor') {
                    		course2 = 'EDUC Department';
                    	}else{
                    		course2 = 'educ';
                    	}
                      educ.checked = true;
                    }
                  } 
                }
                if (type == 'alumni' || type == 'alumni' || type == 'alumni') {
                    updateAlumni(sort,sortTxt,status,statusTxt,course1,course2,course3);
                  }
                  else if (type == 'student' || type == 'student' || type == 'student') {
                    updateStudent(sort,sortTxt,status,statusTxt,course1,course2,course3);
                  }
                  else if (type == 'professor' || type == 'professor' || type == 'professor') {
                    updateProfessor(sort,sortTxt,status,statusTxt,course1,course2,course3);
                  }
              }
            });
    } else {
    	swal.stopLoading();
    	swal.close();
    }
  });
}
//move student to alumni
function addToAlumni(student_id) {
	swal({
		title: "Modify Account?",
		text: "Modifying account would move the student to alumni.",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).
	then((ok)=>{
		if(ok){
			swal({
		        title: 'Modifying Account...',
		        icon: "/img/upload_loading_icon.gif",
		        button: false,
		        closeModal: false,
		        closeOnClickOutside: false,
		        colseOnEsc: false,
		      });
			$.ajax({
				url: "student_account_pagination.php",
				type: 'post',
				data: {
					studentToAlumni_id: student_id
				},
				success: function(response){
					var bsit = '';
					var educ = '';
					var bm = '';
					var sortTxt = '';
					var statusTxt = '';
					var status = '';
					var sort = '';
					//course
					bsit = document.getElementById('bsitStudent');
					educ = document.getElementById('educStudent');
					bm = document.getElementById('bmStudent');
					if (document.getElementById('studentSort') != null) {
						sortTxt = document.getElementById('studentSort').innerHTML;
					}
					if (sortTxt == 'Descending') {
						sort = 'DESC';
					}else {
						sort = 'ASC';
					}
					statusTxt = document.getElementById('studentAccountStatus').innerHTML;
					if (statusTxt == 'Pending') {
						status = 'pending';
					}else if (statusTxt == 'Verified') {
						status = 'verified';
					}else if (statusTxt == 'Denied') {
						status = 'denied';
					}

					var course1 = '';
					var course2 = '';
					var course3 = '';

					//get current course when checked
					if (bsit != null) {
					  if (bsit.checked == true) {
					    course1 = 'bsit';
					    bsit.checked = true;
					    if (educ.checked == true) {
					      course2 = 'educ';
					      educ.checked == true;
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
					    if(bsit.checked == true) {
					      course1 = 'bsit';
					      bsit.checked = true;
					    }if (educ.checked == true) {
					      course2 = 'educ';
					      educ.checked = true;
					    }
					  } 
					}
					updateStudent(sort,sortTxt,status,statusTxt,course1,course2,course3);
					updateAlumni();
				}
			}).
			then((results)=>{
				swal({
					title: "Account Modified!",
					text: "Student had been moved to alumni.",
					icon: "success",
					button: true,
				});
			});	
		}else{
			swal.stopLoading();
			swal.close();
		}
	});
}

//update student after verify or deny
function updateStudent(sort,sortTxt,status,statusTxt,course1,course2,course3) {
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
					if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
						loadData(parseInt($(this).attr("max")));
					}else{
						var pageId = parseInt($(this).val());
						loadData(pageId);	
					}
				}
			});
		});
}
//update alumni after verify or deny
function updateAlumni(sort,sortTxt,status,statusTxt,course1,course2,course3) {
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
					if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
						loadData(parseInt($(this).attr("max")));
					}else{
						var pageId = parseInt($(this).val());
						loadData(pageId);	
					}
				}
			});
		});
}
//update professor after verify or deny
function updateProfessor(sort,sortTxt,status,statusTxt,course1,course2,course3) {
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
					if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
						loadData(parseInt($(this).attr("max")));
					}else{
						var pageId = parseInt($(this).val());
						loadData(pageId);	
					}
				}
			});
		});
}
function deleteAccAdmin(id) {
	  swal({
	    title: "Are you sure?",
	    text: "Once deleted, you will not be able to recover this account!",
	    icon: "warning",
	    buttons: true,
	    dangerMode: true,
	  })
	  .then((willDelete) => {
	    if (willDelete) {
	      swal({
	        title: 'Deleting Account...',
	        icon: "/img/upload_loading_icon.gif",
	        button: false,
	        closeModal: false,
	        closeOnClickOutside: false,
	        colseOnEsc: false,
	      });
	      $.ajax({
	              url: "deleteAccount.php",
	              type: "POST",
	              cache: false,
	              data: {
	                admin_id: id
	              },
	              success: function(response) {
	              	swal({
	                	title: 'Account had been deleted.',
	                	icon: 'success',
	                	button: true,
	                });
	                if (document.getElementById('adminSort') != null) {
	                	sortTxt = document.getElementById('adminSort').innerHTML;
	                }
	                if (sortTxt == 'Descending') {
	                	sort = 'DESC';
	                }else {
	                	sort = 'ASC';
	                }
	                updateAdmin(sort,sortTxt);
	            }
	        });
	  } else {
	  	swal.stopLoading();
	  	swal.close();
	  }
	});
}
function updateAdmin(sort,sortTxt) {
	
}
//update professor after verify or deny
function updateAdmin(sort,sortTxt) {
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
					if (parseInt($(this).val()) > parseInt($(this).attr("max"))) {
						loadData(parseInt($(this).attr("max")));
					}else{
						var pageId = parseInt($(this).val());
						loadData(pageId);	
					}
				}
			});
		});
}