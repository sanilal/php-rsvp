<?php $active="submissions"; 
ob_start();
include("includes/conn.php"); 
?>

<?php include_once('includes/header.php'); ?>


 <!-- Left side column. contains the sidebar -->
 <?php include_once('includes/side_bar.php'); ?>

<?php  

 
$entry_id = $_GET['e_id'];

$sql="select * from `".TB_pre."shop_win` WHERE `entry_id` = '$entry_id'  ORDER BY entry_id DESC ";
$r1=mysqli_query($url,$sql) or die("Failed".mysqli_error($url));

?>  

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            View Submission
            <small></small>
          </h1>
          
 
          
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <tbody>
                    <?php 
                   
					$i = 1;
					while($res = mysqli_fetch_array($r1)){  ?>
                      <tr>
                   
						 <th>Full Name</th>
						<td><?php echo $res['full_name']; ?></td>
						</tr>
            <tr>
						<th>Nationality</th>
                        <td><?php echo $res['country']; ?></td>
						</tr>
            <tr>
						<th>Date of Birth</th>
                        <td><?php echo $res['dob']; ?></td>
						</tr>
            <tr>
						<th>Emirate</th>
                        <td><?php echo $res['emirate']; ?></td>
						</tr>
						<tr>
						<th>Email</th>
                        <td><?php echo $res['email']; ?></td>
						</tr>
						<tr>
						<th>Mobile</th>
						<td><?php echo $res['mobile']; ?></td>
						</tr>
					
					
						<!-- <tr>
						<th>Retailer Name</th>
                        <td><?php //echo $res['retailer_name']; ?></td>
						</tr> -->
					
							<th>Order Screenshot</th>
							<td><?php if($res["invoice_img"]!=""){ ?>
                      <img src="../hktdcAdmin/uploads/<?php //if($res['is_arabic']==1) {echo ('../ar/uploads/');} else {echo ('../uploads/');} ?><?php echo $res["invoice_img"]; ?>" />
                      <?php } else{ echo "No-image";} ?></td>
						</tr>
						<!-- <tr>
						<th>Delete</th>
                        <td><a href="javascript:removeItem(<?php echo $res['entry_id']; ?>);" class="btn btn-danger">Remove</a></td>
                      </tr> -->
                      <?php }?>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
            <div class="box-footer">
            
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     
      <!-- Control Sidebar -->


	<?php include_once('includes/footer.php'); ?>
    <!-- jQuery 2.1.4 -->
   <?php include_once('includes/footer-scripts.php'); ?>
    
    
    <!-- AdminLTE for demo purposes -->
     <script>
      $(function () {
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
		  });
      });
    </script>
    <script type="text/javascript">
    function removeItem(id){
		var c= confirm("Do you want to remove this?");
		if(c){
			location = "submissions.php?remove_pr="+id;
		}
	}
	
    </script>
  </body>
</html>
<?php ob_end_flush(); ?>