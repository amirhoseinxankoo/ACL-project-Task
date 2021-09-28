<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>dashboard</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <a href="{{ route('logout') }}" class="btn btn-warning">logout</a>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">dashboard admin</div>
            </a>
            <!-- Sidebar Toggler (Sidebar) -->
        </ul>
        <div class="content col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        @can('delete-edit')
                            <th scope="col">status</th>
                        @endcan

                        @can('change-user-status')
                            <th>change User</th>
                        @endcan
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @can('delete-edit')
                            <td>{{ $user->status }}</td>
                        @endcan
                        <td>
                            @can('change-user-status')
                               <a href="{{route('user.edit', $user->id )}}" class="btn btn-info"> edit User</a>
                            @endcan

                        </td>
                    </tbody>
                @endforeach

            </table>


        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
