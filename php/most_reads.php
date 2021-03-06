<?php
// Connect database 
require_once('server.php');
require "header.php";

$limit = 10;
if (isset($_POST['page_no'])) {
    $page_no = $_POST['page_no'];
}else{
    $page_no = 1;
}
$offset = ($page_no-1) * $limit;

if (isset($_POST['page_no'])) {
    $page_no = $_POST['page_no'];
}else{
    $page_no = 1;
}
$offset = ($page_no-1) * $limit;

if (isset($_POST['query'])) {
  $search = $_POST['query'];
}else{
  $search = false;
}
if (isset($_POST['adviser1'])) {
  $adviser1 = $_POST['adviser1'];
}else{
  $adviser1 = false;
}
if (isset($_POST['adviser2'])) {
  $adviser2 = $_POST['adviser2'];
}else{
  $adviser2 = false;
}
if (isset($_POST['adviser3'])) {
  $adviser3 = $_POST['adviser3'];
}else{
  $adviser3 = false;
}
if (isset($_POST['adviser4'])) {
  $adviser4 = $_POST['adviser4'];
}else{
  $adviser4 = false;
}
if (isset($_POST['adviser5'])) {
  $adviser5 = $_POST['adviser5'];
}else{
  $adviser5 = false;
}
if (isset($_POST['year1'])) {
  $year1 = $_POST['year1'];
}else{
  $year1 = false;
}
if (isset($_POST['year2'])) {
  $year2 = $_POST['year2'];
}else{
  $year2 = false;
}
if (isset($_POST['year3'])) {
  $year3 = $_POST['year3'];
}else{
  $year3 = false;
}
if (isset($_POST['year4'])) {
  $year4 = $_POST['year4'];
}else{
  $year4 = false;
}
if (isset($_POST['year5'])) {
  $year5 = $_POST['year5'];
}else{
  $year5 = false;
}
if (isset($_POST['course1'])) {
  $course1 = $_POST['course1'];
}else{
  $course1 = false;
}
if (isset($_POST['course2'])) {
  $course2 = $_POST['course2'];
}else{
  $course2 = false;
}
if (isset($_POST['course3'])) {
  $course3 = $_POST['course3'];
}else{
  $course3 = false;
}
if ($search != false && $adviser1 == false && $adviser2 == false && $adviser3 == false && $adviser4 == false && $adviser5 == false &&
$year1 == false && $year2 == false && $year3 == false && $year4 == false && $year5 == false && $course1 == false && $course2 == false && $course3 == false) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table 
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')";
    //pagination
    $sql = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) && 
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table 
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3')";
    //pagination
    $sql = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3')";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table 
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')";
    //pagination
    $sql = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table 
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
    //pagination
    $sql = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
}

elseif ($search != false || 
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) &&
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') 
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table 
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
    //pagination
    $sql = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    AND (Course = '$course1' OR Course = '$course2' OR Course = '$course3') ";
}

elseif ($search != false || 
  ($adviser1 != false || $adviser2 != false || $adviser3 != false || $adviser4 != false || $adviser5 != false) ||
  ($year1 != false || $year2 != false || $year3 != false || $year4 != false || $year5 != false) ||
  ($course1 != false || $course2 != false || $course3 != false)) {
  $query = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    OR (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5') 
    OR (Course = '$course1' OR Course = '$course2' OR Course = '$course3')
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table 
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    OR (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
    OR (Course = '$course1' OR Course = '$course2' OR Course = '$course3')";
    //pagination
    $sql = "SELECT * FROM researchstudy_table
    WHERE (Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%')
    AND (Adviser = '$adviser1' OR Adviser = '$adviser2' OR Adviser = '$adviser3' OR Adviser = '$adviser4' OR Adviser = '$adviser5') 
    OR (Year = '$year1' OR Year = '$year2' OR Year = '$year3' OR Year = '$year4' OR Year = '$year5')
    OR (Course = '$course1' OR Course = '$course2' OR Course = '$course3')";
}

else{
    $query = "SELECT * FROM researchstudy_table 
    ORDER BY Views DESC 
    LIMIT $offset, $limit";
    // this sql is for getting counts
    $sql_count = " SELECT * from researchstudy_table ";
    //pagination
    $sql = "SELECT * FROM researchstudy_table";
}
// $query = "SELECT * FROM researchstudy_table 
// ORDER BY Views DESC 
// LIMIT $offset, $limit";
$result = mysqli_query($conn, $query);
?>
                    <!-- Here is the whole research study
                    This part includes the research study details
                    (titles, authors, abstract, view pdf, download file,
                    and statistics for reads and downloads)-->

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    echo '<hr class="mb-0">';
                      while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <div class="cards hBg 
                        border border-left-0
                                        border-right-0
                                        border-top-0
                                        border-semilightblue">

                          <div class="card-body">


                            <!-- Research studies information -->
                            <div class="row">
                              <div class="col">
                                <h4 class="sm-body-font-size"><?php echo $row["Title"] ?></h4><!-- Research title -->
                                <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                <!-- Author name -->
                                <p>Authors:&nbsp;
                                    <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                    <?php if ($row['Author2'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author3'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author4'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author5'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                    <?php endif ?>
                                    <?php if ($row['Author6'] != 'N/A'): ?>
                                      <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                  </p>
                                    <?php endif ?>
                                <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>
                              
                              <!-- Abstract contraction -->
                              <?php if (strlen($row['Abstract']) < 250): ?>
                              <p>
                                <?php echo $row['Abstract']; ?>
                              </p>
                              <?php endif ?>
                              <?php if (strlen($row['Abstract']) >= 250): ?>
                              <p>
                                <?php echo substr($row['Abstract'], 0, 250) ?>
                                <span id="dots_<?php echo $row['RS_ID']; ?>">...</span>
                                <span id="readMore_<?php echo $row['RS_ID']; ?>" style="display: none;">
                                <?php echo substr($row['Abstract'], 250, 500) ?>...</span>
                                <a type="button" onclick="readAbstract('most_read_cModalContent_',<?php echo $row['RS_ID'] ?>)" 
                                  id="readBtn_<?php echo $row['RS_ID']; ?>" class="cLink">Read more</a>
                              </p>
                              <?php endif ?>
                              <!-- end of abstract -->

                                <!-- Statistics for small media -->
                                <p id="miniStats_<?php echo $row['RS_ID'] ?>"><small class="sm-show-stat">
                                  <?php if ($row['Views'] === 0) {
                                    echo '0';} else {  echo $row['Views']; } ?> Views | 
                                    <?php if ($row['Downloads'] === 0) {  echo '0'; } else {  echo $row['Downloads']; } ?> Downloads
                                  </small></p>


                                <!-- show this when a user is logged in -->
                                              <?php if (isset($_SESSION['user_id'])) { ?>
                                                <!-- Pending status -->
                                                <?php if($_SESSION['status'] === "pending") { ?>
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary  sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary  sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php }else { ?>
                                                <!-- Verified status -->
                                                  <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary  sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                  <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary  sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                <?php } ?>
                                              <?php } else { ?>

                                                <!-- show this when user isn't logged in -->

                                                <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary  sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary  sm-btn-font-size cLink"> View PDF</a><!-- View button -->

                                              <?php } ?>



                                <!-- Modal -->
                                <div class="modal fade" id="most_read_cModalContent_<?php echo $row['RS_ID']; ?>" role="dialog">
                                  <div class="modal-dialog modal-dialog-scrollable">

                                    <!-- Modal header -->
                                    <div class="modal-content">
                                      <div class="modal-title">

                                        <div class="modal-header">
                                                        <div class="btn-group">
                                                          <!-- Download PDF (logged in)-->
                                                          <?php if (isset($_SESSION['user_id'])) { ?>
                                                            <!-- Pending status -->
                                                            <?php if($_SESSION['status'] === "pending") { ?>
                                                              <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary  sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                              <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file-pdf-o btn btn-outline-primary  sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                            <?php }else { ?>
                                                            <!-- Verified status -->
                                                              <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary  sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                                              <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file-pdf-o btn btn-outline-primary  sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                                            <?php } ?>
                                                          <?php } else { ?>
                                                            <!-- Download PDF -->
                                                            <button type="button" onclick="needToLoginDownload()" class="fa fa-download btn btn-outline-primary  sm-btn-font-size cLink"> Download</button><!-- Download button -->

                                                            <!-- View PDF -->
                                                            <button type="submit" onclick="needToLoginView()" class="fa fa-file-pdf-o btn btn-outline-primary "> View PDF</button><!-- View button -->
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
                                        <p>Adviser:&nbsp;<a href="#" class="cLink"><?php echo $row["Adviser"] ?></a></p>
                                        <p>Authors:&nbsp;
                                        <a href="#" class="cLink"><?php echo $row["Author1"] ?></a>
                                        <?php if ($row['Author2'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author2"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author3'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author3"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author4'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author4"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author5'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author5"] ?></a>
                                        <?php endif ?>
                                        <?php if ($row['Author6'] != 'N/A'): ?>
                                          <a href="#" class="cLink"><?php echo ', '.$row["Author6"] ?></a>
                                    </p>
                                        <?php endif ?><!-- author name -->
                                        <p><?php echo strtoupper($row['Course']).' '.$row['Year']; ?></p>

                                        <hr class="bg-muted">

                                        <p class="text-uppercase">Abstract</p>

                                        <p><?php echo $row['Abstract'] ?></p><!-- research abstract -->

                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <!-- Mini tab for short details
                                    This <a> tag represent the button for the whole research study -->

                                <a href="#most_read_cModalContent_<?php echo $row['RS_ID']; ?>" class="stretched-link" data-toggle="modal" data-backdrop="static"></a>
                              </div>

                              <!-- Statistics for large media -->

                              <div class="col-2 sm-hide-stat">
                                <div class=" pt-2 text-ash">
                                  <p id="viewCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Views'] === 0) {  echo '0';} else { echo $row['Views'];} ?>
                                    <br>Readers</small></p><!-- count of views -->

                                </div>

                                <div class="pt-2 text-ash">
                                  <p id="downloadCounts_<?php echo $row['RS_ID'] ?>" class="text-center small"><small>
                                    <?php if ($row['Downloads'] === 0) { echo '0';} else { echo $row['Downloads'];} ?>
                                    <br>Downloads</small></p><!-- count of downloads -->
                                </div>


                              </div>

                            </div> <!-- End of research studies information -->


                          </div>



                      </div>
                      <?php
                        } ?>
                        <?php

                        $records = mysqli_query($conn, $sql);

                        $totalRecords = mysqli_num_rows($records);

                        $totalPage = ceil($totalRecords/$limit);

                        // Remove divs
                        echo "<ul class='pagination justify-content-center mt-5'>";

                        for ($i=1; $i <= $totalPage; $i++) { 
                          if ($i == $page_no) {
                          $active = "active";
                          }else{
                          $active = "";
                          }


                          }
                           
                        //modified pagination
                                  echo "<ul class='pagination justify-content-center mt-5'>";
                                  for ($i=1; $i <= $totalPage; $i++) { 
                                    if ($i == $page_no) {
                                      $active = "active";
                                      }else{
                                         $active = "";
                                         }
                                       }
                                        // Last page
                                       if ($page_no == 1) {
                                        echo "<li class='page-item'><a class='fa fa-angle-double-left page-link disabled' data-toggle='tooltip' title='Last page' id='1' last='$page_no' href=''></a></li>";
                                       }else{
                                          echo "<li class='page-item'><a class='fa fa-angle-double-left page-link' data-toggle='tooltip' title='Last page' id='1' last='$page_no' href=''></a></li>";
                                        }

                                        // Prev
                                        if ($page_no == 1) {
                                            echo "<li class='page-item'><a class='fa fa-angle-left page-link disabled' data-toggle='tooltip' title='Next' id='1' limit='$page_no' href=''></a></li>";
                                        }else{
                                            echo "<li class='page-item'><a class='fa fa-angle-left page-link' data-toggle='tooltip' title='Next' id='".($page_no - 1)."' limit='$page_no' href=''></a></li>";
                                        }

                                        // Input
                                        echo "<li class='page-item'><p class='px-3'>Page: <input id='inputPage' type='number' min='1' max='$totalPage' data-toggle='tooltip' title='Press Enter to go to page' value='$page_no'></input> of $totalPage</p></li>";

                                        // Next
                                        if ($page_no == $totalPage) {
                                            echo "<li class='page-item'><a class='fa fa-angle-right page-link disabled' data-toggle='tooltip' title='Next' id='$totalPage' limit='$totalPage' href=''></a></li>";
                                        }else{
                                            echo "<li class='page-item'><a class='fa fa-angle-right page-link' data-toggle='tooltip' title='Next' id='".($page_no + 1)."' limit='$totalPage' href=''></a></li>";
                                        }

                                        // Last page
                                        if ($page_no == $totalPage) {
                                            echo "<li class='page-item'><a class='fa fa-angle-double-right page-link disabled' data-toggle='tooltip' title='Last page' id='$totalPage' last='$totalPage' href=''></a></li>";
                                        }else{
                                            echo "<li class='page-item'><a class='fa fa-angle-double-right page-link' data-toggle='tooltip' title='Last page' id='$totalPage' last='$totalPage' href=''></a></li>";
                                        }
                                        

                                  echo "</ul>";
                                  //end of pagination


                        

                      ?>

                      <?php } else {
                        echo "No Results Found";
                      } ?>

                      <!-- The whole research study details ends here -->
                      <script src="../js/readAbstract_function.js"></script>