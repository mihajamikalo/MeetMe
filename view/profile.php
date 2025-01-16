<?php 

error_reporting(-1);
ini_set('display_errors', 0);



if (!isset($_SESSION['registred'])) {
    // Redirection ou affichage d'un message d'erreur
    require '../view/registration/error.php';
	http_response_code(403);
	exit();
	
}

require_once 'models/getUserProfile.php';

 $user = new Profile;

require('./view/header.php');

    $notification = $_SESSION['flashdata'];

?>
<style>
.rounded-circle{
	height: 180px;
	width: 200px;
	
}
.profile-picture{
	height: 175px;
	width: 200px;
	border-radius: 10%;
	border-style: solid 4px ;
	border-color: gold;
	
}
</style>
<body>
	<div class="container">
		<div class="row fixed-top h-200 w-200" style="background-color:#fff;">

			<a href="" class="col-3">
				<div class="icon container">
					<img id="home" src="../ressources/img/incons/home (1).png" class="img-fluid " alt="" style="max-width: 60%;">
					<label class="text-center" for="home">Acceuil il</label>
				</div>
			</a>
			<a href="" class="col-3">
				<div class="icon container">
					<img id="ctg" src="../ressourcesimg/incons/list.png" class="img-fluid" alt="" style="max-width: 60%;">
					<label class="text-center" for="ctg">Messages</label>
				</div>
			</a>
			<a href="notification" class="col-3">
				<div class="icon container">
					<img id="home" src="../ressourcesimg/incons/shopping-cart.png" class="img-fluid " alt="" style="max-width: 60%;">
					<label class="text-center" for="home">Notification</label>
				</div>
			</a>
			<a href="destroy" class="col-3">
				<div class="icon container">
					<img id="home" src="../ressourcesimg/incons/user-add.png" class="img-fluid " alt="" style="max-width: 60%;">
					<label class="text-center" for="home">LogOut</label>
				</div>
			</a>
		</div>
		<!-- ======= bar de recherche======= -->
		<br> <br> <br>


		<!-- fin bare de recherce Header -->
		

		<main id="main" class="main">
 
			<div class="pagetitle">
				<?php flashData::show(); ?>
				<h1>Profile</h1>
				<nav>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="profile">Home</a></li>
						<li class="breadcrumb-item">Users</li>
						<li class="breadcrumb-item active">Profile</li>
					</ol>
				</nav>
			</div><!-- End Page Title -->

			<section class="section profile">
				<div class="row">
					<div class="col-xl-4">

						<div class="card">
							<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

								<img src="./ressources/users_picture/<?php $user->image() ?>" alt="Profile" class="rounded-circle">
								<h2><?php Profile::name() ?></h2>
								<h3><?php Profile::Job() ?></h3>
								<div class="social-links mt-2">
									<a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
									<a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
									<a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
									<a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
								</div>
							</div>
						</div>

					</div>

					<div class="col-xl-8">

						<div class="card">
							<div class="card-body pt-3">
								<!-- Bordered Tabs -->
								<ul class="nav nav-tabs nav-tabs-bordered">

									<li class="nav-item">
										<button class="nav-link active" data-bs-toggle="tab"
											data-bs-target="#profile-overview">Overview</button>
									</li>

									<li class="nav-item">
										<button class="nav-link" data-bs-toggle="tab"
											data-bs-target="#profile-edit">Edit Profile</button>
									</li>

									<li class="nav-item">
										<button class="nav-link" data-bs-toggle="tab"
											data-bs-target="#profile-settings">Settings</button>
									</li>

									<li class="nav-item">
										<button class="nav-link" data-bs-toggle="tab"
											data-bs-target="#profile-change-password">Change Password</button>
									</li>

								</ul>
								<div class="tab-content pt-2">

									<div class="tab-pane fade show active profile-overview" id="profile-overview">
										<h5 class="card-title">About</h5>
										<p class="small fst-italic"><?php Profile::About() ?>.</p>

										<h5 class="card-title">Profile Details</h5>

										<div class="row">
											<div class="col-lg-3 col-md-4 label ">Full Name</div>
											<div class="col-lg-9 col-md-8"><?php Profile::name() ?></div>
										</div>

										<div class="row">
											<div class="col-lg-3 col-md-4 label">Company</div>
											<div class="col-lg-9 col-md-8"><?php Profile::Company() ?></div>
										</div>

										<div class="row">
											<div class="col-lg-3 col-md-4 label">Job</div>
											<div class="col-lg-9 col-md-8"><?php Profile::Job() ?></div>
										</div>

										<div class="row">
											<div class="col-lg-3 col-md-4 label">Country</div>
											<div class="col-lg-9 col-md-8"><?php Profile::Country() ?></div>
										</div>

										<div class="row">
											<div class="col-lg-3 col-md-4 label">Address</div>
											<div class="col-lg-9 col-md-8"><?php Profile::Adress() ?></div>
										</div>

										<div class="row">
											<div class="col-lg-3 col-md-4 label">Phone</div>
											<div class="col-lg-9 col-md-8"> (+261) <?php Profile::Phone() ?></div>
										</div>

										<div class="row">
											<div class="col-lg-3 col-md-4 label">Email</div>
											<div class="col-lg-9 col-md-8"><?php echo $_SESSION['userName']; ?></div>
										</div>

									</div>

									<div class="tab-pane fade profile-edit pt-3" id="profile-edit">

										<!-- Profile Edit Form -->
										<form method="POST" action="edit">
											<div class="row mb-3">
												<label for="profileImage"
													class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
												<div class="col-md-8 col-lg-9">
													<?php
													
													?>
													<img src="./ressources/users_picture/<?php $user->image();?>" class="profile-picture" alt="Profile">
													<div class="pt-2">
														<a href="#" class="btn btn-primary btn-sm"
															title="Upload new profile image">Approve<i
																class="bi bi-upload"></i></a>
														
													</div>
												</div>
											</div>

											<div class="row mb-3">
												<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full
													Name</label>
												<div class="col-md-8 col-lg-9">
													<input name="fullName" type="text" class="form-control"
														id="fullName" value="<?php Profile::name() ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="about"
													class="col-md-4 col-lg-3 col-form-label">About</label>
												<div class="col-md-8 col-lg-9">
													<textarea name="about" class="form-control" id="about"
														style="height: 100px"><?php Profile::About() ?></textarea>
												</div>
											</div>

											<div class="row mb-3">
												<label for="company"
													class="col-md-4 col-lg-3 col-form-label">Company</label>
												<div class="col-md-8 col-lg-9">
													<input name="company" type="text" class="form-control" id="company"
														value="<?php Profile::Company() ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
												<div class="col-md-8 col-lg-9">
													<input name="job" type="text" class="form-control" id="Job"
														value="<?php Profile::Job() ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Country"
													class="col-md-4 col-lg-3 col-form-label">Country</label>
												<div class="col-md-8 col-lg-9">
													<input name="country" type="text" class="form-control" id="Country"
														value="<?php Profile::Country() ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Address"
													class="col-md-4 col-lg-3 col-form-label">Address</label>
												<div class="col-md-8 col-lg-9">
													<input name="address" type="text" class="form-control" id="Address"
														value="<?php Profile::Adress() ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Phone"
													class="col-md-4 col-lg-3 col-form-label">Phone</label>
												<div class="col-md-8 col-lg-9">
													<input name="phone" type="text" class="form-control" id="Phone"
														value="0<?php Profile::Phone() ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Email"
													class="col-md-4 col-lg-3 col-form-label">Email</label>
												<div class="col-md-8 col-lg-9">
													<input name="email" type="email" class="form-control" id="Email"
														value="<?php echo $_SESSION['userName']; ?>">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
													Profile</label>
												<div class="col-md-8 col-lg-9">
													<input name="twitter" type="text" class="form-control" id="Twitter"
														value="https://twitter.com/#">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
													Profile</label>
												<div class="col-md-8 col-lg-9">
													<input name="facebook" type="text" class="form-control"
														id="Facebook" value="https://facebook.com/#">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Instagram"
													class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
												<div class="col-md-8 col-lg-9">
													<input name="instagram" type="text" class="form-control"
														id="Instagram" value="https://instagram.com/#">
												</div>
											</div>

											<div class="row mb-3">
												<label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
													Profile</label>
												<div class="col-md-8 col-lg-9">
													<input name="linkedin" type="text" class="form-control"
														id="Linkedin" value="https://linkedin.com/#">
												</div>
											</div>

											<div class="text-center">
												<button type="submit" class="btn btn-primary">Save Changes</button>
											</div>
										</form><!-- End Profile Edit Form -->

									</div>

									<div class="tab-pane fade pt-3" id="profile-settings">

										<!-- Settings Form -->
										<form>

											<div class="row mb-3">
												<label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
													Notifications</label>
												<div class="col-md-8 col-lg-9">
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="changesMade"
															checked>
														<label class="form-check-label" for="changesMade">
															Changes made to your account
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="newProducts"
															checked>
														<label class="form-check-label" for="newProducts">
															Information on new products and services
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox" id="proOffers">
														<label class="form-check-label" for="proOffers">
															Marketing and promo offers
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="checkbox"
															id="securityNotify" checked disabled>
														<label class="form-check-label" for="securityNotify">
															Security alerts
														</label>
													</div>
												</div>
											</div>

											<div class="text-center">
												<button type="submit" class="btn btn-primary">Save Changes</button>
											</div>
										</form><!-- End settings Form -->

									</div>

									<div class="tab-pane fade pt-3" id="profile-change-password">
										<!-- Change Password Form -->
										<form method="post" action="UpdatePassword">

											<div class="row mb-3">
												<label for="currentPassword"
													class="col-md-4 col-lg-3 col-form-label">Current Password</label>
												<div class="col-md-8 col-lg-9">
													<input name="CurrentPassword" required type="password" class="form-control"
														id="currentPassword">
												</div>
											</div>

											<div class="row mb-3">
												<label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
													Password</label>
												<div class="col-md-8 col-lg-9">
													<input name="newpassword" required type="password" class="form-control"
														id="newPassword">
												</div>
											</div>

											<div class="row mb-3">
												<label for="renewPassword"
													class="col-md-4 col-lg-3 col-form-label">Re-enter New
													Password</label>
												<div class="col-md-8 col-lg-9">
													<input name="renewpassword" required type="password" class="form-control"
														id="renewPassword">
												</div>
											</div>

											<div class="text-center">
												<button type="submit" class="btn btn-primary">Change Password</button>
											</div>
										</form><!-- End Change Password Form -->

									</div>

								</div><!-- End Bordered Tabs -->

							</div>
						</div>

					</div>
				</div>
			</section>

		</main>
	</div>

	<!--footer-->
	<?php require('./view/footer.php'); ?>