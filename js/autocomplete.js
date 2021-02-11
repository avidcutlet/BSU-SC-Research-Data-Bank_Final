$(function() {
        $("#search-input").autocomplete({
            source: "/php/action.php",
            appendTo: "#menu-container",
            select: function(event, ui) {
                    location.href="/php/search_page.php?page=1&query="+ui.item.value;
                    addSearchCount(ui.item.value);
            }
        });
    });
    function getWidth() {
      var elemDiv = document.getElementById("search-input");
      var newWidth = elemDiv.clientWidth + 'px';
      var elemDiv2 = document.getElementById("menu-container");
      if (elemDiv.value.length > 2) {
        elemDiv2.style.width = newWidth; 
      }else {
        return false;
      }
    }
//search input on submit
function searchInput() {
  var input = document.getElementById("search-input").value;
    paginateSearchPage(input);
  if (input.length > 2) {
    addSearchCount(input);
  }
}
//button function
function paginateSearchPage(input) {
  input.length;//get length of input
    $(document).ready(function() {
      function loadData(page) {
        $.ajax({
          url: "most_relevant.php",
          type: "POST",
          cache: false,
          data: {
            page_no: page,
            query: input
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
            query: input
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
            query: input
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