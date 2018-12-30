<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view("admin/head") ?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view("admin/menu") ?>
		<div class="main-panel"> 
			<?php $this->load->view($temp) ?>
			<?php $this->load->view("admin/footer") ?>
		</div>
	</div>
</body>
</html>