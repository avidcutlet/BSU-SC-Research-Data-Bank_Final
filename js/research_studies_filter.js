function researchFilter(val) {
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
	updateAdviser(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3);
	updateYear(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3);
	updateCourse(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3);
	updateAll(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3);
}
function updateAll(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3) {
//most relevant
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
function updateAdviser(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3) {
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
			year4: year4,
			year5: year5,
			course1: course1,
			course2: course2,
			course3: course3
		},
		success: function(response) {
			$("#adviserCheckbox").html(response);
			if (document.getElementById("filter_checkbox_adviser1") != null) {
				if (document.getElementById("filter_checkbox_adviser1").value == adviser1) {
					document.getElementById("filter_checkbox_adviser1").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_adviser2") != null) {
				if (document.getElementById("filter_checkbox_adviser2").value == adviser2) {
					document.getElementById("filter_checkbox_adviser2").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_adviser3") != null) {
				if (document.getElementById("filter_checkbox_adviser3").value == adviser3) {
					document.getElementById("filter_checkbox_adviser3").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_adviser4") != null) {
				if (document.getElementById("filter_checkbox_adviser4").value == adviser4) {
					document.getElementById("filter_checkbox_adviser4").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_adviser5") != null) {
				if (document.getElementById("filter_checkbox_adviser5").value == adviser5) {
					document.getElementById("filter_checkbox_adviser5").checked = true;
				}	
			}
		}
	});
}
function updateYear(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3) {
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
			course1: course1,
			course2: course2,
			course3: course3,
			year1: year1,
			year2: year2,
			year3: year3,
			year4: year4,
			year5: year5
		},
		success: function(response) {
			$("#yearCheckbox").html(response);
			if (document.getElementById("filter_checkbox_year1") != null) {
				if (document.getElementById("filter_checkbox_year1").value == year1) {
					document.getElementById("filter_checkbox_year1").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_year2") != null) {
				if (document.getElementById("filter_checkbox_year2").value == year2) {
					document.getElementById("filter_checkbox_year2").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_year3") != null) {	
				if (document.getElementById("filter_checkbox_year3").value == year3) {
					document.getElementById("filter_checkbox_year3").checked = true;
				}
			}
			if (document.getElementById("filter_checkbox_year4") != null) {
				if (document.getElementById("filter_checkbox_year4").value == year4) {
					document.getElementById("filter_checkbox_year4").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_year5") != null) {
				if (document.getElementById("filter_checkbox_year5").value == year5) {
					document.getElementById("filter_checkbox_year5").checked = true;
				}	
			}
		}
	});
}
function updateCourse(adviser1,adviser2,adviser3,adviser4,adviser5,year1,year2,year3,year4,year5,course1,course2,course3) {
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
			year4: year4,
			year5: year5,
			course1: course1,
			course2: course2,
			course3: course3
		},
		success: function(response) {
			$("#courseCheckbox").html(response);
			if (document.getElementById("filter_checkbox_course1") != null) {
				if (document.getElementById("filter_checkbox_course1").value == course1) {
					document.getElementById("filter_checkbox_course1").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_course2") != null) {
				if (document.getElementById("filter_checkbox_course2").value == course2) {
					document.getElementById("filter_checkbox_course2").checked = true;
				}	
			}
			if (document.getElementById("filter_checkbox_course3") != null) {
				if (document.getElementById("filter_checkbox_course3").value == course3) {
					document.getElementById("filter_checkbox_course3").checked = true;
				}	
			}
		}
	});
}