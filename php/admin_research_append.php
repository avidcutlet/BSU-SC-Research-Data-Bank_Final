<?php
require "header.php";
include "server.php";
//paginationsht
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
//limit kung ilan gusto mo i display
$limit = 5;
//saan mag sisimula ung i display mo
$start = ($page - 1) * $limit;


if (isset($_GET['query'])) {
    $search = $_GET['query'];
} else {
}

//this sql naman ay para ipakita ang nilalaman ng nakalimit
$sql = " SELECT * from researchstudy_table LIMIT $start, $limit ";
//this sql is for getting the number of results
$sql_count = " SELECT * from researchstudy_table ";
$result = mysqli_query($conn, $sql);
$count_result = mysqli_query($conn, $sql_count);
$number_pages = ceil(mysqli_num_rows($count_result) / $limit);

?>
<!-- Main content -->
                <div id="research-livesearch">
                <div class="row">

                    <!-- first column -->
                    <div class="col-sm-3 pl-4 pt-4 sm-hide">

                        <p><?php if (mysqli_num_rows($count_result) > 0) {
                                echo mysqli_num_rows($count_result);
                            } else {
                                echo '0';
                            } ?> Results</p><!-- results count -->
                        <hr>

                        <?php
                        if (mysqli_num_rows($count_result) === 0) {
                            echo '';
                        } else { ?>
                            <!-- Filter Department -->
                                <label>Filter Department:</label>

                                <br>
                                <div class="ml-3">
                                    <input type="checkbox" id="title">
                                    <label for="#title">Title</label>

                                    <br>

                                    <input type="checkbox" id="keyword">
                                    <label for="#keyword">Keyword</label>

                                    <br>

                                    <input type="checkbox" id="abstract">
                                    <label for="#abstract">Abstract</label>

                                    <br>
                                    
                                    <input type="checkbox" id="content">
                                    <label for="#content">Content</label>
                                </div>
                        <?php } ?>

                        <!-- first column -->
                    </div>


                    <!-- Content -->
                    <div class="col">

                        <div class="d-flex align-items-center justify-content-center pt-2 sm-hide">


                            <!-- Use the 'active class' to change the btn color -->
                            <?php if (mysqli_num_rows($count_result) > 0) { ?>
                                <div class="btn-group text-dark">

                                    <button class="btn btn-outline-dark sm-research-fs active">Most relevant</button>

                                    <button class="btn btn-outline-dark sm-research-fs">Most reads</button>

                                    <button class="btn btn-outline-dark sm-research-fs">Most downloads</button>
                                </div>
                            <?php } else {
                                echo '';
                            } ?>

                        </div>
                        <hr>

                        <!-- Here is the whole research study
                        This part includes the research study details
                            (titles, authors, abstract, view pdf, download file,
                            and statistics for reads and downloads)-->
    <div id="research-livesearch1">
                        <?php
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="cards hBg mt-n3 border border-left-0 border-right-0 border-top-0 border-semilightblue">

              <div class="card-body">


                <!-- Research studies information -->
                <div class="row">
                  <div class="col-9">
                    <h4 class="sm-body-font-size"><?php echo $row["Title"] ?></h4><!-- Research title -->

                    <!-- Author name -->
                    <a href="#" class="cLink"><?php echo $row["Author"] ?></a>

                    <p><?php echo $row['Abstract'] ?></p>

                    <!-- Statistics for small media -->
                    <!-- Statistics for small media -->
                    <p id="miniStats_<?php echo $row['RS_ID'] ?>"><small class="sm-show-stat">
                      <?php if ($row['Views'] === 0) {
                        echo '0';} else {  echo $row['Views']; } ?> Views | 
                        <?php if ($row['Downloads'] === 0) {  echo '0'; } else {  echo $row['Downloads']; } ?> Downloads
                      </small></p>


                    <!-- show this when a user is logged in -->
                    <?php if (isset($_SESSION['user_id'])) { ?>

                      <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                      <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->

                    <?php } else { ?>

                      <!-- show this when user isn't logged in -->

                      <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                      <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginView()" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->

                    <?php } ?>



                    <!-- Modal -->
                    <div class="modal fade" id="cModalContent_<?php echo $row['RS_ID']; ?>" role="dialog">
                      <div class="modal-dialog modal-dialog-scrollable">

                        <!-- Modal header -->
                        <div class="modal-content">
                          <div class="modal-title">

                            <div class="modal-header">
                              <div class="btn-group">
                                <!-- Download PDF (logged in)-->
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                  <button type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="btn btn-outline-dark fa fa-download sm-btn-font-size"> Download</button><!-- Download button -->

                                  <!-- View PDF (logged in)-->
                                  <button type="submit" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="btn btn-outline-dark fa fa-file sm-btn-font-size"> View PDF</button><!-- View button -->
                                <?php } else { ?>
                                  <!-- Download PDF -->
                                  <button type="button" onclick="needToLoginDownload()" class="btn btn-outline-dark fa fa-download sm-btn-font-size"> Download</button><!-- Download button -->

                                  <!-- View PDF -->
                                  <button type="submit" onclick="needToLoginView()" class="btn btn-outline-dark fa fa-file sm-btn-font-size"> View PDF</button><!-- View button -->
                                <?php } ?>

                              </div>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                          </div>

                          <!-- Modal details -->

                          <div class="modal-body">
                            <!-- Make the title color black -->
                            <!-- Make the hover color blue -->

                            <div class="cfont cs-2"><?php echo $row['Title'] ?></div><!-- research title -->
                            <div><a href="#"><?php echo $row['Author'] ?></a></div><!-- author name -->

                            <hr class="bg-muted">

                            <p class="text-uppercase">Abstract</p>

                            <p><?php echo $row['Abstract'] ?></p><!-- research abstract -->

                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger sm-btn-font-size" data-dismiss="modal">Close</button>

                          </div>




                        </div>
                      </div>
                    </div>

                    <!-- Mini tab for short details
                        This <a> tag represent the button for the whole research study -->

                    <a href="#cModalContent_<?php echo $row['RS_ID']; ?>" class="stretched-link" data-toggle="modal" data-backdrop="static"></a>
                  </div>

                  <!-- Statistics for large media -->

                  <div class="col-3 sm-hide-stat">
                    <div class=" pt-2 text-ash">
                      <p id="viewCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                        <?php if ($row['Views'] === 0) {
                          echo '0';
                        } else {
                          echo $row['Views'];
                           } ?><br>Readers</small></p><!-- count of views -->

                    </div>

                    <div class="pt-2 text-ash">
                      <p id="downloadCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                        <?php if ($row['Downloads'] === 0) { 
                          echo '0'; } else {
                            echo $row['Downloads'];
                          } ?><br>Downloads</small></p><!-- count of downloads -->
                    </div>


                  </div>

                </div> <!-- End of research studies information -->


              </div>



            </div>
        <?php
          }
        } else {
          echo "No Results Found";
        } ?>
    </div>

                        <!-- The whole research study details ends here -->


                        <!-- Pagination -->

                        <div class="container mt-3">
                            <ul class="pagination justify-content-center">
                                <?php if ($page > 1) { ?>
                                    <li class="page-item"><a class="page-link" href="search_page.php?page=<?php echo ($page - 1) ?>&query=<?php echo $search ?>">Previous</a></li>
                                <?php } ?>
                                <?php for ($i = 1; $i < $number_pages; $i++) { ?>
                                    <li class="page-itemactive"><a class="page-link" href="search_page.php?page=<?php echo $i ?>&query=<?php echo $search ?>"><?php echo $i ?></a></li>
                                <?php } ?>
                                <?php if ($i > $page) { ?>
                                    <li class="page-item"><a class="page-link" href="search_page.php?page=<?php echo ($page + 1) ?>&query=<?php echo $search ?>">Next</a></li>
                                <?php } ?>
                            </ul>

                        </div>

                        <!-- div for Content -->
                    </div>

                    <!-- div for row -->
                </div>
            </div>
<!-- End of Main content -->

<?php $conn->close(); ?>