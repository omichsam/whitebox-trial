
<?php
include("../../../../connect.php");
            $article_name=mysqli_real_escape_string($con,$_POST['article_name']);
		    $field_study=mysqli_real_escape_string($con,$_POST['field_study']);
		    $refferenceno=mysqli_real_escape_string($con,$_POST['refferenceno']);
		    $volume=mysqli_real_escape_string($con,$_POST['volume']);
		    $author=mysqli_real_escape_string($con,$_POST['author']);
		    $published=mysqli_real_escape_string($con,$_POST['published']);
		    $fileholder=mysqli_real_escape_string($con,$_POST['fileholder']);
		     $Sourceb=mysqli_real_escape_string($con,$_POST['Source']);
		    $field_county=mysqli_real_escape_string($con,$_POST['field_county']);
		    $fileholder=mysqli_real_escape_string($con,$_POST['fileholder']);
            $user=mysqli_real_escape_string($con,$_POST['user']);
            $Description=mysqli_real_escape_string($con,$_POST['Description']);
            

            
            $newcounty="";
            if($Sourceb=="National"){
           $newcounty="";
            }else{
           $sqlj="SELECT id FROM counties where county_name='$field_county'";

    $query_runll=mysqli_query($con,$sqlj) or die($query_runll."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runll)){
            $newcounty=$row['id'];

}

            }

          $sqlg="SELECT id FROM users where email='$user'";

    $query_runl=mysqli_query($con,$sqlg) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
            $user_id=$row['id'];

}

         $get_account=mysqli_query($con,"SELECT * FROM articles_tbl WHERE refference_no ='$refferenceno' AND article_name='$article_name' AND Author='$author' and Pubblished_year='$published'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){


echo base64_encode("Record already exists");
	}else{
	
		
$sql=mysqli_query($con,"INSERT INTO articles_tbl VALUE(Null,
											'$refferenceno',
											'$article_name',
											'$author',
											'$volume',
											'$Description',
											'$published',
											'$field_study',
										    '$user_id',
										    '',
								            '$Sourceb',
								            '$newcounty',
								            'new',
								            '',
								            '',
								            '',
								            '$Today',
								            '')") or die(mysqli_error($con));

	


       $sqlgp="SELECT id FROM articles_tbl WHERE refference_no ='$refferenceno' AND article_name='$article_name' AND Author='$author' and Pubblished_year='$published'";

    $query_runlo=mysqli_query($con,$sqlgp) or die($query_runlo."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runlo)){
            $docid_id=$row['id'];

}
$fullname=$docid_id."_".preg_replace("/\s+/", "", $author).$docid_id;
//echo $fullname;
            
             if(isset($_FILES['fileholder']['name'])){
       		$atachment =$_FILES['fileholder']['name'];
         

			$picsize =$_FILES['fileholder']['size'];
			$pictmp =$_FILES['fileholder']['tmp_name'];	  									  		  
	 		 move_uploaded_file($pictmp,"../../../../../documents/articles/".$_FILES['fileholder']['name']);

	 		   $thumb = $fullname.".jpg";
	 		   $sourcesdt="../../../../documents/articles/".$_FILES['fileholder']['name'];
	 		   $destfiles='../../../../../documents/thumbnails/';
	 		
		 exec("convert \"{$sourcesdt}[0]\" -colorspace RGB -geometry 200 $destfiles$thumb");
   
	   	 $new_names=$fullname.".pdf";
	 		
	 		  rename("../../../../../documents/articles/".$_FILES['fileholder']['name'],"../../../../../documents/articles/".$fullname.".pdf");


$update=mysqli_query($con,"UPDATE articles_tbl SET Documet_dir='$new_names',thumbnails='$thumb' WHERE id='$docid_id'") or die(mysqli_error($con));
echo base64_encode("success");

	   	}else{
echo base64_encode("success");
}
}

?>