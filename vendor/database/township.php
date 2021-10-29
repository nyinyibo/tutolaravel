<?php
include 'connect.php';
@$t_id = $_GET['t_id'];
@$t_id_1 = $_POST['t_id'];
// echo $t_id;


////// Show this part after edit button form //////////////
if ($t_id != "") {
    $sql = 'SELECT new_assign_driver.new_d_t_id,area_tbl.township_name FROM new_assign_driver
inner join area_tbl
on new_assign_driver.new_d_t_id = area_tbl.township_id
where area_tbl.township_id = ' . $t_id . '';
    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            echo '<select name="township" class="form-control" id="township" >';

            while ($row = mysqli_fetch_array($result)) {
                $t_id_value = $row['new_d_t_id'];
                $t_name = $row['township_name'];
                // echo $t_id_value;
                // echo $t_name;
                echo "<option value='" . $t_id_value . "' style='text-transform: uppercase;' selected>" . $t_name . "</option>";
            }

            $sql2 = "SELECT * FROM area_tbl";
            if ($result2 = mysqli_query($conn, $sql2)) {
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_array($result2)) {
                        $t_id_value_2 = $row2['township_id'];
                        $t_name_2 = $row2['township_name'];
                        $area_group2 = $row2['area_group'];
                        echo "<option value=" . $t_id_value_2 . ">" . $t_name_2 . "</option>";
                    }
                }
                mysqli_free_result($result2);
            }

            echo "</select>";
            mysqli_free_result($result);
        }
    }
}
////////////////////////// End Here ///////////


////////// Show this part when creating driver ///////////////

if (!isset($t_id) && !isset($t_id_1)) {
    // Attempt select query execution
    $sql = "SELECT * FROM area_tbl ";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo '<select name="township" class="form-control" id="township" required>';


            echo "<option selected disabled value=''>Choose Township</option>";
            while ($row = mysqli_fetch_array($result)) {
                $t_id = $row['township_id'];
                $t_name = $row['township_name'];
                $area_group = $row['area_group'];
                echo "<option value=" . $t_id . ">" . $t_name . "</option>";
            }
            echo '</select>';
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}


//////////////   End Here /////////////////
