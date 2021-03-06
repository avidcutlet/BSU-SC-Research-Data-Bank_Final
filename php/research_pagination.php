<?php

// Connect database 
require_once('server.php');
require "header.php";


// this sql is for getting counts
$sql_count = " SELECT * from researchstudy_table ";
$count_result = mysqli_query($conn, $sql_count);
//full list query
$fullListQuery = "SELECT * FROM researchstudy_table 
ORDER BY Title ASC ";
$fullList = mysqli_query($conn, $fullListQuery);

?>
  <div class="row">

      <!-- first column -->
      <!-- sm-hide remove -->
      <div class="col-sm-3 pl-4 pt-4">

        <p><?php if (mysqli_num_rows($count_result) > 0) {
              echo mysqli_num_rows($count_result);
            } else {
              echo '0';
            } ?> Results</p><!-- results count -->
        <hr>
        <!-- Button list added -->
            <label>See List: </label>
            <button type="button" class="fa fa-file-text btn btn-outline-primary" data-toggle="modal" data-target="#seeList"></button>
            <div class="modal fade" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" id="seeList" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <!-- modal content -->
                <div class="modal-content">
                  <!-- modal header -->
                  <div class="modal-header">
                    <h4 class="header-font">Research Study List&ThickSpace;</h4>
                    <button type="button" onclick="exportFullListPdf()" class="fa fa-download btn btn-outline-primary" data-toggle="tooltip" title="Download research study list"></button>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- modal and table added -->
                  <!-- modal body -->
                  <div class="modal-body">
                    <div class="table">
                      <table class="table table-bordered" id="fullListPdf">
                        <tbody>
                          <?php if (mysqli_num_rows($fullList) > 0): ?>
                                                <?php while ($row_fullList = mysqli_fetch_array($fullList)) { ?>
                                                  <tr class="first-border-top first-border-bottom">
                                                    <td class="font-weight-bold" colspan="5"><?php echo $row_fullList['Title'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold  td-style">Author1</td><td><?php echo $row_fullList['Author'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Author2</td><td><?php echo $row_fullList['Author'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Year</td><td><?php echo $row_fullList['Year'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Course</td><td><?php echo $row_fullList['Course'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Adviser</td><td><?php echo $row_fullList['Adviser'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Keywords</td><td><?php echo $row_fullList['Keywords'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Date Uploaded</td><td><?php echo $row_fullList['Upload_Date'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Views</td><td><?php echo $row_fullList['Views'] ?></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="font-weight-bold td-style">Downloads</td><td><?php echo $row_fullList['Downloads'] ?></td>
                                                  </tr>
                                                  <tr class="last-border-bottom">
                                                    <td class="font-weight-bold td-style"># of searches</td><td><?php echo $row_fullList['Search'] ?></td>
                                                  </tr>
                                                <?php } ?>
                                              <?php endif ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- modal body -->
                            </div>
                            <!-- modal dialog -->
                        </div>
                        <!-- modal fade -->
                    </div>

        <?php
        if (mysqli_num_rows($count_result) === 0) {
          echo '';
        } else { ?>
          <br>
          <!-- Filter Department -->
                <label>Filter Department:</label>
    
                <br>

                <!-- Checkboxes removed -->
                <!-- select tag here -->


        <!-- hr added -->
        <hr class="sm-show">

        <?php } ?>

        <!-- first column -->
      </div>
      
      <!-- Content -->
      <div class="col">

        <!-- sm-hide remove and change padding top to 3 -->

        <div class="d-flex align-items-center justify-content-center pt-3">


          <!-- Use the 'active class' to change the btn color -->
          <?php if (mysqli_num_rows($count_result) > 0) { ?>
            <!-- btn-group change to nav -->
            <!-- nav-justied added and icon added -->
            <ul class="nav nav-pills nav-justified" role="tablist">
              <li class="nav-item">
                <a class="nav-link fa fa-star active" data-toggle="pill" href="#mostRelevant">Relevant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fa fa-star" data-toggle="pill" href="#mostReads">Read</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fa fa-star" data-toggle="pill" href="#mostDownloads">Download</a>
              </li>
            
            </ul>
          <?php } else {
            echo '';
          } ?>

        </div>

        <!-- tab content for most relevant, most reads, and most downloads -->
        <div class="tab-content">
          <!-- Most relevant -->
          <div id="mostRelevant" class="tab-pane fade active show">
            <div id="relevant-content">
              <!-- content on most_relevant.php -->
            </div>          
          </div>

          <!-- Most reads tab -->
          <div id="mostReads" class="tab-pane fade">
            <div id="reads-content">
              <!-- content on most_reads.php -->
            </div>
          </div>

          <!-- Most downloads tabs -->
          <div id="mostDownloads" class="tab-pane fade">
            <div id="downloads-content">
              <!-- content on most_downloads.php -->
            </div>
          </div>
        </div>
      <!-- div for Content -->

      </div>
  <!-- div for row -->
  </div><br>
  <script src="../js/readAbstract_function.js"></script>