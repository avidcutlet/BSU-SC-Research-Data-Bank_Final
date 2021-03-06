<?php
session_start();
include "server.php";
if (isset($_GET['term'])) {
  $search = $_GET['term'];
  $json = array();

  $sql = " SELECT DISTINCT Title 
  FROM researchstudy_table 
  where Title LIKE '%$search%' OR Keywords LIKE '%$search%' OR Abstract LIKE '%$search%' 
  ORDER BY Title ASC";
  $result = $conn->query($sql);
  if (strlen($_GET['term']) > 2) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {

        array_push($json, $row['Title']);
      }
    } else {
      array_push($json, "No results found");
    }
  }
  echo json_encode($json);
}
?>
<?php
  //search_page.php functions
  //add count for number of readers
  if (isset($_GET['addViews'])) {
    $id = $_GET['addViews'];
    //get current views count
    $sql_select = "SELECT Views, Downloads FROM researchstudy_table WHERE RS_ID ='$id'";
    $execute_select = $conn->query($sql_select);
    $row = mysqli_fetch_assoc($execute_select);
    $views = $row['Views']; //current views
    $downloads = $row['Downloads']; //current downloads

    $sql_update = "UPDATE researchstudy_table SET Views=('$views' + 1) WHERE RS_ID='$id'";

    if ($conn->query($sql_update) === TRUE) {
      echo '<p class="text-center smaller">';
      echo $views + 1;
      echo "<br>";
      echo "Readers";
      echo '</p>';
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
  ?>

<?php
  //add count for number of downloads
  if (isset($_GET['addDownloads'])) {
    $id = $_GET['addDownloads'];
    //get current views count
    $sql_select = "SELECT Downloads FROM researchstudy_table WHERE RS_ID ='$id'";
    $execute_select = $conn->query($sql_select);
    $row = mysqli_fetch_assoc($execute_select);
    $downloads = $row['Downloads']; //current downloads

    $sql_update = "UPDATE researchstudy_table SET Downloads=('$downloads' + 1) WHERE RS_ID='$id'";

    if ($conn->query($sql_update) === TRUE) {
      echo '<p class="text-center smaller">';
      echo $downloads + 1;
      echo "<br>";
      echo "Downloads";
      echo '</p>';
    } else {
      echo "Error updating record: " . $conn->error;
    }
}
?>

<?php
  //search_page.php functions
  //add count for number of readers (mini stats)
  if (isset($_GET['addViewsMini'])) {
    $id = $_GET['addViewsMini'];
    //get current views count
    $sql_select = "SELECT Views, Downloads FROM researchstudy_table WHERE RS_ID ='$id'";
    $execute_select = $conn->query($sql_select);
    $row = mysqli_fetch_assoc($execute_select);
    $views = $row['Views']; //current views
    $downloads = $row['Downloads']; //current downloads

    //$sql_update = "UPDATE researchstudy_table SET Views=('$views' + 1) WHERE RS_ID='$id'";

    // if ($conn->query($sql_update) === TRUE) {
      echo '<p><small class="sm-show-stat">';
      echo $views;
      echo ' Views | ';
      echo $downloads;
      echo ' Downloads</small></p>';
    // } else {
      // echo "Error updating record: " . $conn->error;
    // }
  }
  ?>

<?php
  //add count for number of downloads
  if (isset($_GET['addDownloadsMini'])) {
    $id = $_GET['addDownloadsMini'];
    //get current views count
    $sql_select = "SELECT Views, Downloads FROM researchstudy_table WHERE RS_ID ='$id'";
    $execute_select = $conn->query($sql_select);
    $row = mysqli_fetch_assoc($execute_select);
    $views = $row['Views']; //current views
    $downloads = $row['Downloads']; //current downloads

    // $sql_update = "UPDATE researchstudy_table SET Downloads=('$downloads' + 1) WHERE RS_ID='$id'";

    // if ($conn->query($sql_update) === TRUE) {
      echo '<p><small class="sm-show-stat">';
      echo $views;
      echo ' Views | ';
      echo $downloads;
      echo ' Downloads</small></p>';
    // } else {
      // echo "Error updating record: " . $conn->error;
    // }
}
?>