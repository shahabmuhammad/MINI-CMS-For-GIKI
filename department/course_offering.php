<?php
session_start();
 session_start();
  if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];

       
    }
    else
    {
        header("location:department_login.php");
    }
 include "header.php";
?>

<?php

   /*Connection with database*/
   $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"obe system");
       
            							$query = "SELECT Emp_id FROM examination_login
									WHERE username='$username'";
									echo $query;
									if ($res = mysqli_query($link, $query)) {
										
										$row=mysqli_fetch_array($res);
									$emp_id=$row["Emp_id"];
									echo $emp_id;

									}
                                    else{
                                    	echo "not working";
                                    }									
									

									
								
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
	            <div class="">
	                <div class="page-title">
	                    <div class="title_left">
	                        <h3>Course Offering</h3>
	                    </div>
		                <div class="title_right">
	                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
	                            <div class="input-group">
		                                <input type="text" class="form-control" placeholder="Search for...">
					                    <span class="input-group-btn">
				                        <button class="btn btn-default" type="button">Go!</button>
					                    </span>
	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="clearfix"></div>
			                <div class="row" style="min-height:500px">
				                    <div class="col-md-12 col-sm-12 col-xs-12">
				                        <div class="x_panel">
				                            <div class="x_title">
				                                <h2>Select Course For each Program:</h2>
					                                <div class="clearfix">
					                                	
					                                </div>
				                            </div>
				                            <div class="x_content">
												<form name="form1" action="" method="post" class="col-lg-6">
													<table class = "table table-bordered">
															<tr>
															<td>
																<div class="container">
																		<!-- /*down here php code for selecting Departments name*/ -->
																		<?php

																		$query = "SELECT * FROM department";
																		$res = mysqli_query($link, $query);
																		?>

																		<div class="form-group">
																				<label for="sel1">Select Department :</label>
																				<select class="form-control" id="sel1" name=department_id>
																				<?php
																				while($row=mysqli_fetch_array($res)){?>
																				<option value=<?php echo $row["Dept_id"]; ?>>
																				<?php echo $row["Dept_name"]; echo "</option>"; }?>
																				</select>
																		</div>

                                                                 </div>
															</td>									
															</tr>
															<tr>
															<td>
																	<div class="container">
																	<!-- /*down here php code for selecting Departments name*/ -->
																	<?php

																	$query = "SELECT * FROM program";
																	$res = mysqli_query($link, $query);
																	?>

																	<div class="form-group">
																	<label for="sel1">Select Program :</label>
																	<select class="form-control" id="sel1" name="programe_name">
																	<?php
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["Prog_id"]; ?>>
																	<?php echo $row["Prog_name"]; echo "</option>"; }?>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>

															<tr>
															<td>
																	<div class="container">
																	<!-- /*down here php code for selecting Departments name*/ -->
																	<?php

																	$query = "SELECT * FROM courses";
																	$res = mysqli_query($link, $query);
																	?>

																	<div class="form-group">
																	<label for="sel1">Select Course :</label>
																	<select class="form-control" id="sel1" name=course_id>
																	<?php
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["C_id"]; ?>>
																	<?php echo $row["C_name"]; echo "</option>"; }?>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>
															<tr>
															<td>
																	<div class="container">
																	<!-- /*down here php code for selecting Departments name*/ -->
																	<?php

																	$query = "SELECT * FROM instructor";
																	$res = mysqli_query($link, $query);
																	?>

																	<div class="form-group">
																	<label for="sel1">Select Instructor :</label>
																	<select class="form-control" id="sel1" name=instructor_id>
																	<?php
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["Inst_id"]; ?>>
																	<?php echo $row["Inst_name"]; echo "</option>"; }?>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>
															<tr>
															<td>
																	<div class="container">
																	<div class="form-group">
																	<label for="sel1">Select Samester :</label>
																	<select class="form-control" id="sel1" name=samester>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>
															<tr>
															<td>
															<label for="sel1">Year :</label>
															<input type = "text" class="form-control" name="year" required="" placeholder="Enter Year e.g. 2019">
															</td>
															</tr>	
															<tr>
															<td>
															<input type = "submit" class="btn btn-default submit" name="submit1" value="Submit" >
															</td>
															</tr>						
													</table>
												</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php		
		  /*Select emp_id from the emp table using username*/


        if(isset($_POST["submit1"])){

								 $department_id=$_POST['department_id'];
								 $programe_id= $_POST['programe_id'];
	                             $course_id = $_POST['course_id'];
	                             $instructor_id= $_POST['instructor_id'];
								 $samester  = $_POST['samester'];
                                 $year=$_POST['year'];
                                 echo $department_id;
                                 echo $programe_id;
                                 echo $course_id;
                                 echo $instructor_id;
                                 echo $samester;
                                 echo $year;
                                 echo $emp_id;
	                            $query = "insert into course_offering values('$department_id', '$programe_id', 'emp_id','$course_id','$instructor_id','$samester','$year')";
                                if(mysqli_query($link, $query)==TRUE){
									
                                 echo "good inserted";
                                 
                          }}
                          ?>
<?php
 include "footer.php";
?>
