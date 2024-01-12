<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>
    <script src="https://cdn.tailwindcss.com/"></script>
    <link rel="stylesheet" href="View\tailwind config\tailwind.config.js">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

    <!-- Custom fonts for this template -->
    <link href="View/adminView/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="View/adminView/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="View/adminView/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->


    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Utilities Collapse Menu -->
    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    

            <!-- Nav Item - Charts -->


            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?action=gohome">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Insert for user</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=Usertable">
                    <i class="fas fa-fw fa-table"></i>
                    <span>User Table</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar --> 

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        

                        <!-- Nav Item - Alerts -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                        <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>

                                <style>
                                body {background:white !important;}
                                </style>
                                <!--  -->
                            <form action="index.php?action=pushiha&idwiki=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

                                <div class="editor mx-auto w-10/12 flex flex-col  text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
                                    <input class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" name="title" spellcheck="false" placeholder="Title" type="text" value="<?php echo $title; ?>">
                                    <!-- <textarea  name="description" class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none" spellcheck="false" placeholder="Describe everything about this post here"></textarea> -->
                                    <textarea name="editor_content" class="description bg-gray-100 sec p-3 h-[20vh] border border-gray-300  outline-none" id="editor"><?php echo $editor_content; ?></textarea>
                                    <h2 class="bold">Scrollable Menu</h2>
                                <div class="btn-group">
                                    <select name="selected_action" class="btn btn-default">
                                        <?php foreach($categories as $category): ?>
                                        <option value="<?php echo $category->getId(); ?>" >
                                            <?php echo $category->getName(); ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

                                    <div class="mb-3">
                                    
                                            <label for="tags" class="form-label">Tags:</label>
                                            <select class="form-control" name="tags[]" multiple>
                                                <?php foreach ($tags as $tag): ?>
                                                <option value="<?php echo $tag->getId(); ?>">
                                                    <?php echo $tag->getName(); ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    <input type="file" name="image_uploaded" id="" value="<?php echo $fileName; ?>">
                                    <!-- icons -->
                                    <div class="icons flex text-gray-500 m-2">
                                    <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                                    <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    <svg class="mr-2 cursor-pointer hover:text-gray-700 border rounded-full p-1 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                                    <div class="count ml-auto text-gray-400 text-xs font-semibold">0/300</div>
                                    </div>
                                    <!-- buttons -->
                                    <div class="buttons flex">
                                    <div class="btn border border-gray-300 p-1 px-4 font-semibold cursor-pointer text-gray-500 ml-auto">Cancel</div>
                                    <button type="submit" class="btn border border-indigo-500 p-1 px-4 font-semibold cursor-pointer text-gray-200 ml-2 bg-indigo-500">Post</button>
                                    </div>
                                </div>
                            </form>
            </div>
        </div>
    
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        
        <!-- End of Content Wrapper -->

    
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <script>
document.addEventListener("DOMContentLoaded", function () {
  ClassicEditor
    .create(document.querySelector('#editor'), {
        ckfinder: {
            uploadUrl: 'index.php?action=upload-image', // Correct URL
            uploadPath: 'View/uploaded_image/' // Correct server-side path
        }
    })
    .then(editor => {
        editor.ui.view.editable.style.height = '40vh';
    })
    .catch(error => {
        console.error(error);
    });

});

    </script>
    <!-- Bootstrap core JavaScript-->
    <script src="View/adminView/vendor/jquery/jquery.min.js"></script>
    <script src="View/adminView/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="View/adminView/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="View/adminView/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="View/adminView/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="View/adminView/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="View/adminView/js/demo/datatables-demo.js"></script>

</body>

</html>