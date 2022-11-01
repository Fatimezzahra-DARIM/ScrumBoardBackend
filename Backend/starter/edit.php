<?php
//INCLUDE DATABASE FILE
require('database.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<title>Edit Tasks</title>
</head>

<body>
	<?php
	global $con;
	$id = $_GET['id'];
	$sql = "SELECT * FROM tasks WHERE `id`=$id";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
	// var_dump($row) ;
	?>
	<div class="d-flex justify-content-center  ">
		<form action="update.php?id=<?= $id ?>" class=" fw-bold w-50 h-50  " id="editformTask" method="POST">
			<div class="modal-header p-2 rounded-1 " style="background-color: #5d3c3c;">
				<h5 class="modal-title text-light border-4 fs-4 ">Edit task</h5>

			</div>
			<div class="modal-body p-2 " style="background-color:buttonface">
				<label for="titre" class="d-block">Titre:</label>
				<input class="form-control input-sm    shadow-sm" type="text" name="titre" id="edittitre" value="<?php echo $row['title'] ?>" required>
				</br>
				<label for="type" class="d-block background-color:buttonface" id="editType">Type:</label>
				<div class="form-check">
					<input class="form-check-input   shadow-sm" type="radio" name="type" id="editBug" value="1" <?php if ($row['type_id'] == 1) {
																													echo "checked";
																												} ?>>
					<label class="form-check-label">Bug</label>
				</div>
				<div class="form-check">
					<input class="form-check-input  shadow-sm" type="radio" name="type" id="editFeature" value="2" <?php if ($row['type_id'] == 2) {
																														echo "checked";
																													} ?>>
					<label class="form-check-label">Feature</label>
				</div>
				</br>
				<label for="propriete" class="d-block">Propriete:</label>
				<select class="form-select form-select-sm   shadow-sm" name="propriete" id="editpropriete">
					<option value="" selected>----please select----</option>
					<option value="1" id="edithigh" <?php if ($row['priority_id'] == 1) {
														echo "selected";
													} ?>>High</option>
					<option value="2" id="editmedium" <?php if ($row['priority_id'] == 2) {
															echo "selected";
														} ?>>Medium</option>
					<option value="3" id="editlow" <?php if ($row['priority_id'] == 3) {
														echo "selected";
													} ?>>Low</option>
				</select>
				<br>
				<label for="status" class="d-block">Status:</label>
				<select class="form-select form-select-sm  shadow-sm" name="status" id="editstatus" required>
					<option value="" selected>----Please Select----</option>
					<option value="1" <?php if ($row['status_id'] == 1) {
											echo "selected";
										} ?>>To do</option>
					<option value="2" <?php if ($row['status_id'] == 2) {
											echo "selected";
										} ?>>In progress</option>
					<option value="3" <?php if ($row['status_id'] == 3) {
											echo "selected";
										} ?>>Done</option>
				</select>
				</br>
				<label for="date" class="d-block">Date:</label>
				<input class="form-control input-sm   shadow-sm" type="date" name="date" value="<?php echo $row['task_datetime'] ?>">
				</br>
				<label for="description" class="d-block">Description:</label>
				<textarea class="form-control shadow-sm" id="editdescription" name="description" rows="5" cols="33"><?php echo $row['description'] ?></textarea>


				<button type="button" class="btn shadow-sm" data-bs-dismiss="modal" style="background-color:buttonface">Close</button>
				<button type="submit" id="editbutton" class="btn shadow-sm text-light " data-dismiss="modal" style="background-color: #5d3c3c;" name="update">Save Changes</button>
		</form>
	</div>

</body>

</html>