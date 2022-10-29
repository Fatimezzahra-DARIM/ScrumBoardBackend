<?php
    require "scripts.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- ================== END core-css ================== -->
</head>

<body>


	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="navbar">
				<div>
					<ol class="breadcrumb ">
						<li class="breadcrumb-item"><a href="javascript:;" class="text-decoration-none">Home</a></li>
						<li class="breadcrumb-item active">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header">
						Scrum Board
					</h1>
					<!-- END page-header -->
				</div>

				<div class="">
					<button type="button" class="btn high text-white p-2 rounded-4" style="background-color: #5d3c3c;"
						data-toggle="modal" data-target="#exampleModal"><i class="bi bi-plus"></i> Add Task</button>

					<!-- ADD TASK MODAL -->
					<div class="modal fade shadow-sm" id="exampleModal" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header" style="background-color: #5d3c3c;">
									<h5 class="modal-title text-light-200" id="exampleModalLabel">Add task</h5>
									<button type="button" class="close text-light-200 border-0 fs-4 "
										style="background-color: #5d3c3c;" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body " style="background-color:buttonface">
									<form  method="POST" action="scripts.php" class="d-block fw-bold" id="formTask">
										<label for="titre" class="d-block">Titre:</label>
										<input class="form-control input-sm m-1  shadow-sm" type="text" name="titre"
											id="titre" required>
										</br>
										<label for="type" class="d-block">Type:</label>
										<div class="form-check">
											<input class="form-check-input mx-2  shadow-sm" type="radio" name="type"
												id="idBug" value="1">
											<label class="form-check-label">Bug</label>
										</div>
										<div class="form-check">
											<input class="form-check-input mx-2  shadow-sm" type="radio" name="type"
												id="idFeature" value="2">
											<label class="form-check-label">Feature</label>
										</div>
										</br>
										<label for="propriete" class="d-block">Propriete:</label>
										<select class="form-select form-select-sm m-1 shadow-sm" name="propriete"
											id="propriete">
											<option value="" selected>----please select----</option>
											<option value="1" id="high">High</option>
											<option value="2" id="medium">Medium</option>
											<option value="3" id="low">Low</option>
										</select>
										<br>
										<label for="status" class="d-block">Status:</label>
										<select class="form-select form-select-sm m-1 shadow-sm" name="status"
											id="status" required>
											<option value="" selected>----Please Select----</option>
											<option value="1" id="toDo">To do</option>
											<option value="2" id="inProgress">In progress</option>
											<option value="3" id="done">Done</option>
										</select>
										</br>
										<label for="date" class="d-block">Date:</label>
										<input class="form-control input-sm m-1 shadow-sm" type="date" name="date"
											id="date">
										</br>
										<label for="description" class="d-block">Description:</label>
										<textarea class="form-control m-1  shadow-sm" id="description"
											name="description" rows="5" cols="33"></textarea>
											<div class="modal-footer">
									<button type="button" class="btn shadow-sm" data-dismiss="modal"
										style="background-color:buttonface">Close</button>
									<button type="submit" id="button" class="btn shadow-sm text-light-200 "
										style="background-color: #5d3c3c;"
										name="save">Save</button>
								</div>
									</form>
								</div>

							</div>
						</div>
					</div>


				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-6" ondragover="allowDrop(event)" ondrop="dropedToDo(event)">
					<div class=" ">
						<div class="card-header " style="background-color: #5d3c3c;">
							<h4 class="text-center fw-bolder pt-1 text-light">To do (<span
									id="to-do-tasks-count"><?php countTasks(1) ?></span>)</h4>

						</div>
						<div class="" id="to-do-tasks">
							<?php
								
								for($i = 0; $i < count($GLOBALS['tasks']); $i++){
									if($GLOBALS['tasks'][$i]['status'] == 'To Do'){
							?>		
									<button  class="container-fluid d-flex my-1 border-0 rounded p-2" draggable="true" ondrag="drag(event)"> 
										<div class="col-1">
											<i class="image "><img src="https://img.icons8.com/sf-regular/48/F28F8F/help.png" /></i>
										</div>
										<div class="col-11">
											<div class=""><?=$GLOBALS['tasks'][$i]['title']?></div>
											<div class="">
												<div class="text-muted">#<?=$GLOBALS['tasks'][$i]['id']?>  Created in :<?=$GLOBALS['tasks'][$i]['task_datetime']?>
												<div class=""
													title="<?=$GLOBALS['tasks'][$i]['description']?>"> <?=$GLOBALS['tasks'][$i]['description']?></div>
												
											</div>
											</br>
											<div class="">
												<span class="bg-red-200 text-black px-4 p-1 rounded"><?=$GLOBALS['tasks'][$i]['type']?></span>
												<span class="bg-light text-black px-3 p-1 rounded"><?=$GLOBALS['tasks'][$i]['priority']?></span>
												<i class="bi bi-trash text-danger me-1" onclick="deleteTask()"></i>
												<i class="bi bi-pencil" id="" onclick="editTask()"></i>
											</div>
										</div>
									</button>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="">
						<div class="card-header" style="background-color: #5d3c3c;">
							<h4 class="text-center fw-bolder pt-1 text-light">In Progress (<span
									id="in-progress-tasks-count"><?php countTasks(2) ?></span>)</h4>

						</div>
						<div class="" id="in-progress-tasks" ondragover="allowDrop(event)"
							ondrop="dropedInProgress(event)">
							<?php
								
								for($i = 0; $i < count($GLOBALS['tasks']); $i++){
									if($GLOBALS['tasks'][$i]['status'] == 'In Progress'){
							?>		
									<button  class="container-fluid d-flex my-1 border-0 rounded p-2" draggable="true" ondrag="drag(event)"> 
										<div class="col-1">
										<i class="spinner-border spinner-border-md text-red-200 "></i>
									</div>
										<div class="col-11">
											<div class=""><?=$GLOBALS['tasks'][$i]['title']?></div>
											<div class="">
												<div class="text-muted">#<?=$GLOBALS['tasks'][$i]['id']?>  Created in :<?=$GLOBALS['tasks'][$i]['task_datetime']?>
												<div class=""
													title="<?=$GLOBALS['tasks'][$i]['description']?>"> <?=$GLOBALS['tasks'][$i]['description']?></div>
												
											</div>
											</br>
											<div class="">
												<span class="bg-red-200 text-black px-4 p-1 rounded"><?=$GLOBALS['tasks'][$i]['type']?></span>
												<span class="bg-light text-black px-3 p-1 rounded"><?=$GLOBALS['tasks'][$i]['priority']?></span>
												<i class="bi bi-trash text-danger me-1" onclick="deleteTask()"></i>
												<i class="bi bi-pencil" id="" onclick="editTask()"></i>
											</div>
										</div>
									</button>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="">
						<div class="card-header" style="background-color: #5d3c3c;">
							<h4 class="text-center fw-bolder pt-1 text-light">Done (<span
									id="done-tasks-count"><?php countTasks(3) ?></span>)</h4>

						</div>
						<div class=" " id="done-tasks" ondragover="allowDrop(event)" ondrop="dropedDone(event)">
						<?php
								
								for($i = 0; $i < count($GLOBALS['tasks']); $i++){
									if($GLOBALS['tasks'][$i]['status'] == 'Done'){
							?>		
									<button  class="container-fluid d-flex my-1 border-0 rounded p-2" draggable="true" ondrag="drag(event)"> 
										<div class="col-1">
										<i class="image "><img src="./assets/img/check-mark.png" /></i>
									</div>
										<div class="col-11">
											<div class=""><?=$GLOBALS['tasks'][$i]['title']?></div>
											<div class="">
												<div class="text-muted">#<?=$GLOBALS['tasks'][$i]['id']?>  Created in :<?=$GLOBALS['tasks'][$i]['task_datetime']?>
												<div class=""
													title="<?=$GLOBALS['tasks'][$i]['description']?>"> <?=$GLOBALS['tasks'][$i]['description']?></div>
												
											</div>
											</br>
											<div class="">
												<span class="bg-red-200 text-black px-4 p-1 rounded"><?=$GLOBALS['tasks'][$i]['type']?></span>
												<span class="bg-light text-black px-3 p-1 rounded"><?=$GLOBALS['tasks'][$i]['priority']?></span>
												<i class="bi bi-trash text-danger me-1" onclick="deleteTask()"></i>
												<i class="bi bi-pencil" id="" onclick="editTask()"></i>
											</div>
										</div>
									</button>
							<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->


		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top"
			data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->

	<!-- TASK MODAL -->
	<div class="modal fade" id="modal-task">
		<!-- Modal content goes here -->
		<!-- Modal -->

	</div>
	<!---end of modal-->
	</div>

	<!-- EDIT MODAL -->
	<div class="modal fade shadow-sm " id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #5d3c3c;">
					<h5 class="modal-title text-light-200" id="editModalLabel">Edit task</h5>
					<button type="button" class="close text-light-200 border-0 fs-4 " style="background-color: #5d3c3c;"
						data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body " style="background-color:buttonface">
					<form action="" class="d-block fw-bold" id="editformTask">
						<label for="titre" class="d-block">Titre:</label>
						<input class="form-control input-sm m-1  shadow-sm" type="text" name="titre" id="edittitre"
							required>
						</br>
						<label for="type" class="d-block" id="editType">Type:</label>
						<div class="form-check">
							<input class="form-check-input mx-2  shadow-sm" type="radio" name="type" id="editBug"
								value="Bug">
							<label class="form-check-label">Bug</label>
						</div>
						<div class="form-check">
							<input class="form-check-input mx-2  shadow-sm" type="radio" name="type" id="editFeature"
								value="Feature">
							<label class="form-check-label">Feature</label>
						</div>
						</br>
						<label for="propriete" class="d-block">Propriete:</label>
						<select class="form-select form-select-sm m-1 shadow-sm" name="propriete" id="editpropriete">
							<option value="1" selected>----please select----</option>
							<option value="High" id="edithigh">High</option>
							<option value="Medium" id="editmedium">Medium</option>
							<option value="Low" id="editlow">Low</option>
						</select>
						<br>
						<label for="status" class="d-block">Status:</label>
						<select class="form-select form-select-sm m-1 shadow-sm" name="status" id="editstatus" required>
							<option value="1" selected>----Please Select----</option>
							<option value="To Do">To do</option>
							<option value="In Progress">In progress</option>
							<option value="Done">Done</option>
						</select>
						</br>
						<label for="date" class="d-block">Date:</label>
						<input class="form-control input-sm m-1 shadow-sm" type="date" name="date" id="editdate">
						</br>
						<label for="description" class="d-block">Description:</label>
						<textarea class="form-control m-1  shadow-sm" id="editdescription" name="description" rows="5"
							cols="33"></textarea>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn shadow-sm" data-bs-dismiss="modal"
						style="background-color:buttonface">Close</button>
					<button type="submit" id="editbutton" class="btn shadow-sm text-light-200 " data-dismiss="modal"
						style="background-color: #5d3c3c;" onclick="updateTask()">Save Changes</button>

				</div>
			</div>
		</div>
	</div>
	<!-- ================== BEGIN core-js ================== -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
		integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
		crossorigin="anonymous"></script>
	<!-- <script src="./js/data.js"></script> -->
	<!-- <script src="./js/app.js"></script> -->


	<!-- ================== END core-js ================== -->
</body>

</html>