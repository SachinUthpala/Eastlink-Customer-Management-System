<?php
 require_once '../Db/Db.Conn.php';
 session_start();

 if(!$_SESSION['userName']) {
    header("Location:../index.html");
    exit;
 }


 $date = date("Y/m/d");
?>


<!-- 

php codses for the dashbord

$

<?php

$myCustotalSql = "SELECT * FROM `customers` WHERE createdBy = :createdBy";
$myCustotalsmtp = $conn->prepare($myCustotalSql);
$myCustotalsmtp->bindParam(':createdBy', $_SESSION['userName']);
$myCustotalsmtp->execute();
$Mycustotal = $myCustotalsmtp->rowCount();


$myCustotalSql1 = "SELECT * FROM `customers` WHERE createdBy = :createdBy AND createdDate = :createdDate";
$myCustotalsmtp1 = $conn->prepare($myCustotalSql1);
$myCustotalsmtp1->bindParam(':createdBy', $_SESSION['userName']);
$myCustotalsmtp1->bindParam(':createdDate',$date );
$myCustotalsmtp1->execute();
$Mycustotal1 = $myCustotalsmtp1->rowCount();


$myCustotalSql2 = "SELECT * FROM `customers`";
$myCustotalsmtp2 = $conn->prepare($myCustotalSql2);
$myCustotalsmtp2->execute();
$Mycustotal2 = $myCustotalsmtp2->rowCount();



$myCustotalSql3 = "SELECT * FROM `customers` WHERE  createdDate = :createdDate";
$myCustotalsmtp3 = $conn->prepare($myCustotalSql3);
$myCustotalsmtp3->bindParam(':createdDate',$date );
$myCustotalsmtp3->execute();
$Mycustotal3 = $myCustotalsmtp3->rowCount();

?>


-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../Asserts/Styles/Style.css">
    <title>Estlink Engineering- CM</title>

      <!--for sweet alert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" ></script>

    <!-- 
    download -->
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="#" class="logo">
            <i class='bx bx-user-circle' style="color: red;"></i>
            <div class="logo-name" style="color: red;"><span >East - </span>Link</div>
        </a>
        <ul class="side-menu">
            <li class="active" onclick="shoDash()"><a href="#"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
            <li><a href="#" onclick="shoAddCus()"><i class='bx bxs-user-plus'></i>Add Customer</a></li>
            <li><a href="#" onclick="showMyCustomers()"><i class='bx bx-table'></i>My Customers</a></li>
            <li><a href="#" onclick="showAllCustomers()"><i class='bx bxs-spreadsheet'></i>All Customers</a></li>
            <li  
                <?php
                    if($_SESSION['admin'] == 1) {
                        echo "style = 'display: block;'";
                    }else {
                        echo "style = 'display: none;'";
                    }
                ?>
                onclick="shoAdduser()"
            ><a href="#"><i class='bx bx-folder-plus'></i>Add User</a></li>
            <li  
                <?php
                    if($_SESSION['admin'] == 1) {
                        echo "style = 'display: block;'";
                    }else {
                        echo "style = 'display: none;'";
                    }
                ?>

                onclick="showAllUsers()"
                
            ><a href="#" ><i class='bx bx-table'></i>All Users</a></li>
            
        </ul>
        <ul class="side-menu">
            <li onclick="logout()">
                <a href="#" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->


    <!-- logout Scripts -->
    <script>
        function logout() {
            
            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Log Out!"
            }).then((result) => {
            if (result.isConfirmed) {
                location.href = "../Db/logout.php"
            }
            });

        }
    </script>




    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#" style="display: none;">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
           
     
            
        </nav>

        <!-- End of Navbar -->

        <main id="Dashboard" <?php
            if($_SESSION['UserCreated'] == 1 || $_SESSION['UserNotCreated'] == 1) {
                echo "style= 'display: none'";
            }
        ?>
        >
            <div class="header">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">
                                Analytics
                            </a></li>
                        /
                        <li><a href="#" class="active">Dashbord</a></li>
                    </ul>
                </div>
                
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            <?php echo $Mycustotal; ?>
                        </h3>
                        <p>My Customers</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            <?php echo $Mycustotal1; ?>
                        </h3>
                        <p>Today My Crations</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            <?php echo $Mycustotal2 ; ?>
                        </h3>
                        <p>Total Customers</p>
                    </span>
                </li>
                <li><i class='bx bx-calendar-check'></i>
                    <span class="info">
                        <h3>
                            <?php echo $Mycustotal3 ; ?>
                        </h3>
                        <p>Today All Creations</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <!-- <div class="orders">
                    <div class="header">
                        <i class='bx bx-receipt'></i>
                        <h3>Recent Orders</h3>
                        <i class='bx bx-filter'></i>
                        <i class='bx bx-search'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Order Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="images/profile-1.jpg">
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status completed">Completed</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile-1.jpg">
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="images/profile-1.jpg">
                                    <p>John Doe</p>
                                </td>
                                <td>14-08-2023</td>
                                <td><span class="status process">Processing</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->

                

            </div>

        </main>

        <main id="AddCustomer" 
        <?php
            if($_SESSION['UserCreated'] == 1 || $_SESSION['UserNotCreated'] == 1) {
                echo "style= 'display: block'";
            }
        ?>
            
            >
            
            <section class="container">
                <header>Add Customer</header>
                <form action="../Db/createUser.php" method="post" class="form">
                    
                    <input type="hidden" name="user" value="<?php echo $_SESSION['userName']; ?>" />

                    <div class="input-box">
                        <label>Company Name</label>
                        <input type="text" name="company" placeholder="Enter Company Name" required />
                    </div>
            
                    <div class="input-box">
                        <label>Contact Person</label>
                        <input type="text" name="contactperson" placeholder="Enter Contact Person name" required />
                    </div>
            
                    <div class="input-box">
                        <label>Email Address</label>
                        <input type="text" name="email" placeholder="Enter email address" required />
                    </div>
            
                    <div class="column">
                        <div class="input-box">
                            <label>Phone Number</label>
                            <input type="number" name="phone" placeholder="Enter phone number" required />
                        </div>
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label>Whatsapp Number</label>
                            <input type="number" name="whatsapp" placeholder="Enter phone number" required />
                        </div>
                    </div>
            
                    <div class="gender-box">
                        <h3>Group</h3>
                        <div class="gender-option">
                            <div class="gender" onclick="showsub01()">
                                <input type="radio" id="check-male" name="Group" value="Group 1"  />
                                <label for="check-male">Group 1</label>
                            </div>
                            <div class="gender" onclick="showsub02()">
                                <input type="radio" id="check-female" name="Group" value="Group 2-1" />
                                <label for="check-female">Group 2-1</label>
                            </div>
                            <div class="gender" onclick="showsub03()">
                                <input type="radio" id="check-other" name="Group" value="Group 2-2" />
                                <label for="check-other">Group 2-2</label>
                            </div>
                            <div class="gender" onclick="showsub04()">
                                <input type="radio" id="check-other2" name="Group" value="Group 2-3" />
                                <label for="check-other2">Group 2-3</label>
                            </div>
                            <div class="gender" onclick="showsub05()">
                                <input type="radio" id="check-other3" name="Group" value="MIS" />
                                <label for="check-other3">MIS</label>
                            </div>
                        </div>
                        <br>
                        <span id="contectssss" style="color: #388E3C">Select Main Group</span>
                    </div>
            
                    <div class="input-box address">
                        <label>Sub Group</label>
                        <div class="column">
                            <div class="select-box">
                                <select name="subGroup" id="subGroupSelect">
                                    <option value="" hidden></option>
                                    <optgroup id="sub01" label="Computers & Networks , Solar">
                                        <option value="Computers & Networks">Computers & Networks</option>
                                        <option value="Solar">Solar</option>
                                    </optgroup>
                                    <optgroup id="sub02" label="Telecommunication , ISPs , Computer Software Companies , Universities & Institutes" style="display:none;">
                                        <option value="Telecommunication">Telecommunication</option>
                                        <option value="ISPs">ISPs</option>
                                        <option value="Computer Software Companies">Computer Software Companies</option>
                                        <option value="Universities & Institutes">Universities & Institutes</option>
                                    </optgroup>
                                    <optgroup id="sub03" label="Banks , Hotels , Hospitals , Factories-Garments , Factories-Others , Airlines" style="display:none;">
                                        <option value="Banks">Banks</option>
                                        <option value="Hotels">Hotels</option>
                                        <option value="Hospitals">Hospitals</option>
                                        <option value="Factories-Garments">Factories-Garments</option>
                                        <option value="Factories-Others">Factories-Others</option>
                                        <option value="Airlines">Airlines</option>
                                    </optgroup>
                                    <optgroup id="sub04" label="Electrical , Electrical - AC , Civil , Interior Decors , Government & NGO , Offices & Companies , Shpping , TV & radio" style="display:none;">
                                        <option value="Electrical">Electrical</option>
                                        <option value="Electrical - AC">Electrical - AC</option>
                                        <option value="Civil">Civil</option>
                                        <option value="Interior Decors">Interior Decors</option>
                                        <option value="Government & NGO">Government & NGO</option>
                                        <option value="Offices & Companies">Offices & Companies</option>
                                        <option value="Shpping">Shpping</option>
                                        <option value="TV & radio">TV & radio</option>
                                    </optgroup>
                                    <optgroup id="sub05" label="Competitors , Informed to remove , General , Individuals , Other" style="display:none;">
                                        <option value="Competitors">Competitors</option>
                                        <option value="Informed to remove">Informed to remove</option>
                                        <option value="General">General</option>
                                        <option value="Individuals">Individuals</option>
                                        <option value="Other">Other</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </section>
              <br><br>
        </main>


        <!-- user Customer -->
        <?php

            $myCusSql = "SELECT * FROM `customers` WHERE createdBy = :createdBy";
            $myCusRes = $conn->prepare($myCusSql);
            $myCusRes->bindParam(':createdBy', $_SESSION['userName']);
            $myCusRes->execute();

        ?>

        <main id="myCustomers" >
        
        <div class="container">
        <input type="text" id="searchInput" onkeyup="searchTable22()" placeholder="Search by name..." class="search-box">
        <button id="downloadExcel">Download Excel</button>
        
        <table id="dataTable">
            <thead>
                <tr>
                    <th>Catogary</th>
                    <th>Company</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Whatsapp</th>
                    <th>Date</th>
                    <th>By</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example table data -->
                 <?php while($myCusRow = $myCusRes->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <td><?php echo $myCusRow['subGroup'];?></td>
                    <td><?php echo $myCusRow['company'];?></td>
                    <td><?php echo $myCusRow['contactp'];?></td>
                    <td><?php echo $myCusRow['email'];?></td>
                    <td><?php echo $myCusRow['phone'];?></td>
                    <td><?php echo $myCusRow['whatsapp'];?></td>
                    <td><?php echo $myCusRow['createdDate'];?></td>
                    <td><?php echo $myCusRow['createdBy'];?></td>
                </tr>
               <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <script src="./table2excel.js"></script>
<script>
    function searchTable22() {
        let input = document.getElementById("searchInput");
        let filter = input.value.toLowerCase();
        let table = document.getElementById("dataTable");
        let tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            let tds = tr[i].getElementsByTagName("td");
            let match = false;
            for (let j = 0; j < tds.length; j++) {
                if (tds[j]) {
                    let txtValue = tds[j].textContent || tds[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }
            }
            tr[i].style.display = match ? "" : "none";
        }
    }

    document.getElementById("downloadExcel").addEventListener("click", function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#dataTable"));
    } )


</script>

        </main>


        <?php

            $CusSql = "SELECT * FROM `customers`";
            $CusRes = $conn->prepare($CusSql);
            $CusRes->execute();

        ?>

        <!-- all customers -->
        <main id="AllCustomers">
    <div class="container">
        <input type="text" id="searchInput1" onkeyup="searchTable()" placeholder="Search by name..." class="search-box">

        <div class="inputgroups">
            <select id="subGroupFilter" onchange="filterTableBySubGroup()" class="search-box">
                <option value="all">All Sub Groups</option>
                <option value="Computers & Networks">Computers & Networks</option>
                <option value="Solar">Solar</option>
                <option value="Telecommunication">Telecommunication</option>
                <option value="ISPs">ISPs</option>
                <option value="Computer Software Companies">Computer Software Companies</option>
                <option value="Universities & Institutes">Universities & Institutes</option>
                <option value="Banks">Banks</option>
                <option value="Hotels">Hotels</option>
                <option value="Hospitals">Hospitals</option>
                <option value="Factories-Garments">Factories-Garments</option>
                <option value="Factories-Others">Factories-Others</option>
                <option value="Airlines">Airlines</option>
                <option value="Electrical">Electrical</option>
                <option value="Electrical - AC">Electrical - AC</option>
                <option value="Civil">Civil</option>
                <option value="Interior Decors">Interior Decors</option>
                <option value="Government & NGO">Government & NGO</option>
                <option value="Offices & Companies">Offices & Companies</option>
                <option value="Shpping">Shpping</option>
                <option value="TV & radio">TV & radio</option>
                <option value="Competitors">Competitors</option>
                <option value="Informed to remove">Informed to remove</option>
                <option value="General">General</option>
                <option value="Individuals">Individuals</option>
                <option value="Other">Other</option>
            </select>
        </div>

        <button id="downloadExcel1">Download Excel</button>

        <table id="dataTable1">
            <thead>
                <tr>
                    <th>Catogary</th>
                    <th>Company</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Phone</th>
                    
                </tr>
            </thead>
            <tbody>
                <!-- Example table data -->
                <?php while($CusRow = $CusRes->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>

                    <td><?php echo $CusRow['subGroup'];?></td>
                    <td><?php echo $CusRow['company'];?></td>
                    <td><?php echo $CusRow['contactp'];?></td>
                    <td><?php echo $CusRow['email'];?></td>
                    <td><?php echo $CusRow['phone'];?></td>
                    
                </tr>
                <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <script src="./table2excel.js"></script>
    <script>
        function searchTable() {
            let input = document.getElementById("searchInput1");
            let filter = input.value.toLowerCase();
            let table = document.getElementById("dataTable1");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let tds = tr[i].getElementsByTagName("td");
                let match = false;
                for (let j = 0; j < tds.length; j++) {
                    if (tds[j]) {
                        let txtValue = tds[j].textContent || tds[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }
                tr[i].style.display = match ? "" : "none";
            }
        }

        function filterTableBySubGroup() {
            let select = document.getElementById("subGroupFilter");
            let filter = select.value;
            let table = document.getElementById("dataTable1");
            let tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName("td")[0]; // Sub Group column
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    if (filter === "all" || txtValue === filter) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function createFilteredTable() {
            // Create a new table element
            let table = document.createElement("table");
            table.id = "filteredTable";

            // Clone the original table's header
            let header = document.querySelector("#dataTable1 thead").cloneNode(true);
            table.appendChild(header);

            // Add rows that are currently visible
            let rows = document.querySelectorAll("#dataTable1 tbody tr");
            let tbody = document.createElement("tbody");
            rows.forEach(row => {
                if (row.style.display !== "none") {
                    tbody.appendChild(row.cloneNode(true));
                }
            });
            table.appendChild(tbody);

            // Append the table to the body (or a hidden div) temporarily
            document.body.appendChild(table);
            return table;
        }

        document.getElementById("downloadExcel1").addEventListener("click", function() {
            let filteredTable = createFilteredTable();
            var table2excel = new Table2Excel();
            table2excel.export(filteredTable);
            document.body.removeChild(filteredTable); // Remove the temporary table after export
        });
    </script>
</main>





        <!-- add user -->
         <main id="addUser">
         <section class="container">
                <header>Add User</header>
                <form action="../Db/addUser.php" method="post" class="form">
                    


                    <div class="input-box">
                        <label>User Name</label>
                        <input type="text" name="username" placeholder="Enter Company Name" required />
                    </div>
            
                    <div class="input-box">
                        <label>User Email</label>
                        <input type="text" name="email" placeholder="Enter email address" required />
                    </div>
            
                    <div class="column">
                        <div class="input-box">
                            <label>User Passeword</label>
                            <input type="text" name="Passeword" placeholder="Enter phone number" required />
                        </div>
                    </div>

                    <div class="input-box address">
                        <label>Admin Access</label>
                        <div class="column">
                            <div class="select-box">
                                <select name="adminAccess" id="subGroupSelect">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
            
            
                    
                    <button type="submit" name="submit">Submit</button>
                </form>
            </section>
         </main>



         <?php

            $userSql = "SELECT * FROM `user`";
            $userSmtp = $conn->prepare($userSql);
            $userSmtp->execute();

        ?>

        <!-- all users -->

        <main id="allUsers" >
        
        <div class="container">
        <input type="text" id="searchInput4" onkeyup="searchTable4()" placeholder="Search by name..." class="search-box">
        <button id="downloadExcel4">Download Excel</button>
        <!-- `username`, `usermail`, `userpassword`, `adminAccess` -->
        <table id="dataTable4">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Mail</th>
                    <th>Password</th>
                    <th>Admin Access</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example table data -->
                 <?php while($userSmtpRow = $userSmtp->fetch(PDO::FETCH_ASSOC)){ ?>
                <tr>
                    <td><?php echo $userSmtpRow['username'];?></td>
                    <td><?php echo $userSmtpRow['usermail'];?></td>
                    <td><?php echo $userSmtpRow['userpassword'];?></td>
                    <td><?php echo $userSmtpRow['adminAccess'];?></td>
                </tr>
               <?php } ?>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
    <script src="./table2excel.js"></script>
<script>
    function searchTable4() {
        let input = document.getElementById("searchInput4");
        let filter = input.value.toLowerCase();
        let table = document.getElementById("dataTable4");
        let tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            let tds = tr[i].getElementsByTagName("td");
            let match = false;
            for (let j = 0; j < tds.length; j++) {
                if (tds[j]) {
                    let txtValue = tds[j].textContent || tds[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        match = true;
                        break;
                    }
                }
            }
            tr[i].style.display = match ? "" : "none";
        }
    }

    document.getElementById("downloadExcel4").addEventListener("click", function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#dataTable4"));
    } )


</script>

        </main>
        
      













    </div>

    <script>

        const shoDash = () => {
            document.getElementById("Dashboard").style.display = "block";
            document.getElementById("AddCustomer").style.display = "none";
            document.getElementById("myCustomers").style.display = "none";
            document.getElementById("AllCustomers").style.display = "none";
            document.getElementById("addUser").style.display = "none";
            document.getElementById("allUsers").style.display = "none";
        }

        const shoAddCus = () => {
            document.getElementById("Dashboard").style.display = "none";
            document.getElementById("AddCustomer").style.display = "block";
            document.getElementById("myCustomers").style.display = "none";
            document.getElementById("AllCustomers").style.display = "none";
            document.getElementById("addUser").style.display = "none";
            document.getElementById("allUsers").style.display = "none";
        }

        const showMyCustomers = () => {
            document.getElementById("Dashboard").style.display = "none";
            document.getElementById("AddCustomer").style.display = "none";
            document.getElementById("myCustomers").style.display = "block";
            document.getElementById("AllCustomers").style.display = "none";
            document.getElementById("addUser").style.display = "none";
            document.getElementById("allUsers").style.display = "none";
        }

        const showAllCustomers = () => {
            document.getElementById("Dashboard").style.display = "none";
            document.getElementById("AddCustomer").style.display = "none";
            document.getElementById("myCustomers").style.display = "none";
            document.getElementById("AllCustomers").style.display = "block";
            document.getElementById("addUser").style.display = "none";
            document.getElementById("allUsers").style.display = "none";
        }

        const shoAdduser = () => {
            document.getElementById("addUser").style.display = "block";
            document.getElementById("Dashboard").style.display = "none";
            document.getElementById("AddCustomer").style.display = "none";
            document.getElementById("myCustomers").style.display = "none";
            document.getElementById("AllCustomers").style.display = "none";
            document.getElementById("allUsers").style.display = "none";
        }

        const showAllUsers = () => {
            document.getElementById("addUser").style.display = "none";
            document.getElementById("Dashboard").style.display = "none";
            document.getElementById("AddCustomer").style.display = "none";
            document.getElementById("myCustomers").style.display = "none";
            document.getElementById("allUsers").style.display = "block";
            document.getElementById("AllCustomers").style.display = "none";
        }

        



        const showsub01 = () => {
        showSubGroup('sub01');
        document.getElementById("contectssss").innerHTML  = "Includes : Computers & Networks , Solar";
    }

    const showsub02 = () => {
        showSubGroup('sub02');
        document.getElementById("contectssss").innerHTML  = "Includes : Telecommunication , ISPs , Computer Software Companies , Universities & Institutes";
    }

    const showsub03 = () => {
        showSubGroup('sub03');
        document.getElementById("contectssss").innerHTML  = "Includes : Banks , Hotels , Hospitals , Factories-Garments , Factories-Others , Airlines";
    }

    const showsub04 = () => {
        showSubGroup('sub04');
        document.getElementById("contectssss").innerHTML  = "Includes : Electrical , Electrical - AC , Civil , Interior Decors , Government & NGO , Offices & Companies , Shpping , TV & radio";
    }

    const showsub05 = () => {
        showSubGroup('sub05');
        document.getElementById("contectssss").innerHTML  = "Includes : Competitors , Informed to remove , General , Individuals , Othe";
    }

    const showSubGroup = (id) => {
        const subGroups = ['sub01', 'sub02', 'sub03', 'sub04', 'sub05'];
        subGroups.forEach(sub => {
            if (sub === id) {
                document.getElementById(sub).style.display = 'block';
            } else {
                document.getElementById(sub).style.display = 'none';
            }
        });
    }

    // Initially show the first sub-group
    showSubGroup('sub01');
        
    </script>









<?php


            if($_SESSION['UserCreated'] == 1 ){
                echo '
                <script>
                Swal.fire({
                    title: "Customer Added Sucessfull!",
                    text: "You are sucessfully Customer Added In!",
                    icon: "success"
                  });
                  </script>
                '
                ;
                // Set the flag to true
                $_SESSION['UserCreated'] = null; // Reset the session variable
                
            }else if($_SESSION['UserNotCreated'] == 1) {
                echo '
                
                <script>
                
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "User Alerady Exsist!",
                    });
                </script>
                ';

                $_SESSION['UserNotCreated'] = null;
            }else if($_SESSION['usernotadded'] == 1) {
                echo '
                
                <script>
                
                    Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "User Not Added ! Try again",
                    });
                </script>
                ';

                $_SESSION['usernotadded'] = null;
            }else if($_SESSION['useraadded'] == 1 ){
                echo '
                <script>
                Swal.fire({
                    title: "User Added Sucessfull!",
                    text: "You are sucessfully User Added In!",
                    icon: "success"
                  });
                  </script>
                '
                ;
                // Set the flag to true
                $_SESSION['useraadded'] = null; // Reset the session variable
                
            }

?>

    <script src="../Asserts/Scripts/Script.js"></script>
    
</body>

</html>