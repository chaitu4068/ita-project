<?php
$output_dir = "uploads/";
if(isset($_FILES["csv"]))
{
	$ret = array();

	$error =$_FILES["csv"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["csv"]["name"])) //single file
	{
 	 	$fileName = $_FILES["csv"]["name"];
 		move_uploaded_file($_FILES["csv"]["tmp_name"],
      "C:/xampp/htdocs/ita_project/ " . $_FILES["csv"]["name"]);
	}

    //get the csv file
    $file = $_FILES["csv"]["name"];
    $handle = fopen($file,"r");
    
    //loop through the csv file and insert into database
    do {
        if ($data[0]) {
            mysqli_query("INSERT INTO student (uname, name, rollnumber, password, semester, batch_year) VALUES
                (
                    '".addslashes($data[0])."',
                    '".addslashes($data[1])."',
					'".addslashes($data[0])."',
					'".addslashes($data[0])."',
                    '".addslashes($data[2])."',
					'".addslashes($data[2])."'
                )
            ");
			
        }
		else
			print("PROBLEM ENCOUNTERED");
    } while ($data = fgetcsv($handle,1000,",","'"));
    //

    //redirect
    header('Location: upload_file1.php?success=1'); die;

}