    //add count for views
    function addView(RS_ID, url) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updateResearch();
        }
      }
      xmlhttp.open("GET", "action.php?addViews=" + RS_ID, true);
      xmlhttp.send();
      window.open(url+'#toolbar=0','_blank', 'location=no');
    }

    //add count for downloads
    function addDownload(RS_ID, url) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updateResearch();
        }
      }
      xmlhttp.open("GET", "action.php?addDownloads=" + RS_ID, true);
      xmlhttp.send();
      window.open(url);
    }

    //add count for views (mini stats)
    function addViewMini(RS_ID, url) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updateResearch();
        }
      }
      xmlhttp.open("GET", "action.php?addViewsMini=" + RS_ID, true);
      xmlhttp.send();
    }

    //add count for downloads
    function addDownloadMini(RS_ID, url) {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          updateResearch();
        }
      }
      xmlhttp.open("GET", "action.php?addDownloadsMini=" + RS_ID, true);
      xmlhttp.send();
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