//most relevant
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
//most reads
$(document).ready(function() {
			function loadData(page) {
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
//most downloads
$(document).ready(function() {
			function loadData(page) {
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
// alumni account pagination
$(document).ready(function() {
			function loadData(page) {
				$.ajax({
					url: "alumni_account_pagination.php",
					type: "POST",
					cache: false,
					data: {
						page_no: page
					},
					success: function(response) {
						$("#alumni-content").html(response);
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

// student account pagination
$(document).ready(function() {
			function loadData(page) {
				$.ajax({
					url: "student_account_pagination.php",
					type: "POST",
					cache: false,
					data: {
						page_no: page
					},
					success: function(response) {
						$("#student-content").html(response);
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

// professor account pagination
$(document).ready(function() {
			function loadData(page) {
				$.ajax({
					url: "professor_account_pagination.php",
					type: "POST",
					cache: false,
					data: {
						page_no: page
					},
					success: function(response) {
						$("#professor-content").html(response);
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

// admin account pagination
$(document).ready(function() {
			function loadData(page) {
				$.ajax({
					url: "admin_account_pagination.php",
					type: "POST",
					cache: false,
					data: {
						page_no: page
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