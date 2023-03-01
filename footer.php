<!--===============================================================================================-->
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/select2/select2.min.js"></script>
	<script src="assets/vendor/sweetalert/sweetalert2.all.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html>

<?php if (@$_GET['status']=="no")  {?>  
	<script>
		Swal.fire({
			type: 'error',
			title: 'The action failed!',
			text: 'Please try again!',
			showConfirmButton: true,
			confirmButtonText: 'Close'
		})
	</script>
<?php } ?>
<?php if (@$_GET['status']=="ok")  {?>  
	<script>
		Swal.fire({
			type: 'success',
			title: 'The action is successful!',
			text: 'Your action was successfully completed!',
			showConfirmButton: false,
			timer: 2000
		})
	</script>
<?php } ?>

<?php if (@$_GET['status']=="login")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'Please Login!',
      text: 'Please log in to the system!',
      showConfirmButton: true,
      confirmButtonText: 'Close'
    })
  </script>
<?php } ?>

<?php if (@$_GET['status']=="error")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'The login process failed!',
      text: 'Please check the information you have entered!',
      showConfirmButton: true,
      confirmButtonText: 'Close'
    })
  </script>
<?php } ?>

<?php if (@$_GET['status']=="unauthorized")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'You do not have an entry permit!',
      text: 'Please log in to view the page!',
      showConfirmButton: true,
      confirmButtonText: 'Close'
    })
  </script>
<?php } ?>

<?php if (@$_GET['status']=="suspect")  {?>  
  <script>
    Swal.fire({
      type: 'error',
      title: 'Suspicious Action',
      text: 'A suspicious action has been detected, please log in again!',
      showConfirmButton: true,
      confirmButtonText: 'Close'
    })
  </script>
<?php } ?>