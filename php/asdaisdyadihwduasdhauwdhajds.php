

          <!-- Most reads tab -->
          <div id="mostReads" class="tab-pane fade">
           <!-- remove p tag -->
           <p>Most reads</p>
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

                        <!-- Author name -->
                        <a href="#" class="cLink"><?php echo $row["Author"] ?></a>
                      
                      <!-- Abstract contraction -->
                      <p>
                        <?php echo substr($row['Abstract'], 0, 250) ?>
                        <span id="dots_<?php echo $row['RS_ID']; ?>">...</span>
                        <span id="readMore_<?php echo $row['RS_ID']; ?>" style="display: none;">
                        <?php echo substr($row['Abstract'], 250, 500) ?>...</span>
                        <a type="button" onclick="readAbstract(<?php echo $row['RS_ID'] ?>)" 
                          id="readBtn_<?php echo $row['RS_ID']; ?>" class="cLink">Read more</a>
                      </p>
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
                            <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                            <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                          <?php }else { ?>
                          <!-- Verified status -->
                            <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                            <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                          <?php } ?>
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
                                      <!-- Pending status -->
                                      <?php if($_SESSION['status'] === "pending") { ?>
                                        <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                        <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                      <?php }else { ?>
                                      <!-- Verified status -->
                                        <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                        <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                      <?php } ?>
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

                $sql = "SELECT * FROM researchstudy_table";

                $records = mysqli_query($conn, $sql);

                $totalRecords = mysqli_num_rows($records);

                $totalPage = ceil($totalRecords/$limit);

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
              } ?>

              <!-- The whole research study details ends here -->

          
          </div>
          <!-- end of most reads -->

          <!-- Most downloads tabs -->
          <div id="mostDownloads" class="tab-pane fade">
            
            <!-- Remove p tag -->
            <p>Most Downloads</p>
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

                        <!-- Author name -->
                        <a href="#" class="cLink"><?php echo $row["Author"] ?></a>
                      
                      <!-- Abstract contraction -->
                      <p>
                        <?php echo substr($row['Abstract'], 0, 250) ?>
                        <span id="dots_<?php echo $row['RS_ID']; ?>">...</span>
                        <span id="readMore_<?php echo $row['RS_ID']; ?>" style="display: none;">
                        <?php echo substr($row['Abstract'], 250, 500) ?>...</span>
                        <a type="button" onclick="readAbstract(<?php echo $row['RS_ID'] ?>)" 
                          id="readBtn_<?php echo $row['RS_ID']; ?>" class="cLink">Read more</a>
                      </p>
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
                            <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                            <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                          <?php }else { ?>
                          <!-- Verified status -->
                            <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                            <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                          <?php } ?>
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
                                      <!-- Pending status -->
                                      <?php if($_SESSION['status'] === "pending") { ?>
                                        <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                        <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="notVerified()" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                      <?php }else { ?>
                                      <!-- Verified status -->
                                        <a id="view_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addDownload(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>'); addDownloadMini(<?php echo $row['RS_ID'] ?>,'download.php?file=<?php echo $row['File'] ?>')" class="fa fa-download btn btn-outline-primary sm-btn-font-size cLink"> Download</a><!-- Download button -->

                                        <a id="download_href_<?php echo $row['RS_ID'] ?>" type="button" onclick="addView(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>'); addViewMini(<?php echo $row['RS_ID'] ?>,'../Research_Studies/<?php echo $row['File'] ?>')" class="fa fa-file btn btn-outline-primary sm-btn-font-size cLink"> View PDF</a><!-- View button -->
                                      <?php } ?>
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

                $sql = "SELECT * FROM researchstudy_table";

                $records = mysqli_query($conn, $sql);

                $totalRecords = mysqli_num_rows($records);

                $totalPage = ceil($totalRecords/$limit);

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

          
          
          </div>
          <!-- end of most downloads -->