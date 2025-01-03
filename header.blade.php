<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <body>
         <header>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">

                <a class="navbar-brand" href="#"><img src="icons8-education-30.png">&nbsp;&nbsp;VEERA EDUCATION</a>
                <button class="btn btn-outline-primary" id="sidebarToggle" ><i class='bx bx-menu bx-rotate-180'></i></button>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <aside id="sidebar" class="sidebar-hidden">
        <div class="container">
            <ul class="list-unstyled">
                <li><a href="/dashboard" class="active"><i class='bx bxs-dashboard' ></i>&nbsp;&nbsp;Dashboard</a></li>
                <li><a href="{{route('student.create')}}"><i class='bx bxs-user-pin bx-flip-horizontal' ></i>&nbsp;&nbsp;Add Student</a></li>
                <li><a href="/studenttable"><i class='bx bx-list-ul bx-flip-horizontal' ></i>&nbsp;&nbsp;Student List</a></li>
                <li><a href="{{route('attendancetable')}}"><i class='bx bx-list-ul bx-flip-horizontal' ></i>&nbsp;&nbsp;Attendance List</a></li>
                <li><a href="{{route('register')}}"><i class='bx bxs-registered' ></i>&nbsp;&nbsp;Register</a></li>
                <li><a href="/report"><i class='bx bx-bar-chart-alt'></i>&nbsp;&nbsp;Reports</a></li>
            </ul>
        </div>
    </aside>
    <main>
        
    </main>
    
   <script src="./js/script.js"></script>
   
    </body>