<?php
require "server.php";
$fullListQuery = "SELECT * FROM researchstudy_table 
ORDER BY Title ASC ";
$fullList = mysqli_query($conn, $fullListQuery);
?>
<table class="table table-bordered" id="fullListPdf">
                        <tbody>
                          <?php if (mysqli_num_rows($fullList) > 0): ?>
                                                <?php while ($row_fullList = mysqli_fetch_array($fullList)) { ?>
                                                  <tr class="first-border-top first-border-bottom">
                                                    <td class="font-weight-bold" colspan="5"><?php echo $row_fullList['Title'] ?></td>
                                                  </tr>
                                                  <?php for ($x = 1; $x <= 6; $x++) { ?>
                                                  <tr>
                                                    <td class="font-weight-bold  td-style">Author<?php echo $x ?></td><td><?php echo $row_fullList['Author'.$x];?></td>
                                                  </tr>
                                                  <?php } ?>
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