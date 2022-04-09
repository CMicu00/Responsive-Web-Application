<?php 


function check_login($con)
{
    error_reporting(E_ALL);
    if(isset($_SESSION['user_id']))
    {
        $user = $_SESSION['user_id'];
        $query = "Select * from tbl_users where user_id = '$user'";

        $result = mysqli_query($con,$query);
        if($result){
        
            $user_data = mysqli_fetch_assoc($result);
            
            return $user_data;
        }
    }
}

?>