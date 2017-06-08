 <?php
    if (isset($_POST['search'])) {
    $mid = $_POST['search'];
    $mid = str_replace("EMDB", "", $mid);
    $availcheck = "SELECT * FROM `user` where `member_id`='$mid'";
    $availcheck_result = mysql_query($availcheck);
    $availcheck_check = mysql_num_rows($availcheck_result);
    while ($availcheck_result1 = mysql_fetch_array($availcheck_result)) {
    $available = $availcheck_result1['availability'];
    ?>
    <b style="color:blue;"><?php echo $available; ?></b>

 <?php   } }   ?>