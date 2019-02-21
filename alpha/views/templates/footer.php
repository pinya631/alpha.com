	 <footer class="row no-gutters sticky-footer">
				<div class="col-md-6 col-sm-6 col-xs-6">	
					<p class="copyright text-left">Copyright 2019 </p>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6">	
					<p class="copyright text-right">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
				</div> 

	</footer>

		</div>	
	</div>
	
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>
  	
	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
		  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		  </button>
		</div>
		<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
		<div class="modal-footer">
		  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		  <a class="btn btn-primary" href="login.html">Logout</a>
		</div>
	  </div>
	</div>
	</div>

	<script src="<?php echo base_url()."assets/js/jquery-3.3.1.min.js"; ?>"></script>
	<script src="<?php echo base_url()."assets/vendor/bootstrap/js/bootstrap.bundle.min.js"; ?>"></script>
	<script src="<?php echo base_url()."assets/vendor/jquery-easing/jquery.easing.min.js"; ?>"></script>
	<script src="<?php echo base_url()."assets/js/sb-admin.min.js"; ?>"></script>

  <!-- Bootstrap core JavaScript 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <!-- Core plugin JavaScript-->

  <!-- Page level plugin JavaScript 
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>-->

  <!-- Custom scripts for all pages-->

  <!-- Demo scripts for this page
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>-->
</body>
</html>		