<?php
 require_once '../Db/Db.Conn.php';
 session_start();

 if(!$_SESSION['userName']) {
    header("Location:../index.html");
    exit;
 }

?>

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
            <li><a href="#"><i class='bx bx-group'></i>My Customers</a></li>
            <li><a href="#"><i class='bx bx-group'></i>All Customers</a></li>
            <li  
                <?php
                    if($_SESSION['admin'] == 1) {
                        echo "style = 'display: block;'";
                    }else {
                        echo "style = 'display: none;'";
                    }
                ?>
            ><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li>
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
                            1,074
                        </h3>
                        <p>Paid Order</p>
                    </span>
                </li>
                <li><i class='bx bx-show-alt'></i>
                    <span class="info">
                        <h3>
                            3,944
                        </h3>
                        <p>Site Visit</p>
                    </span>
                </li>
                <li><i class='bx bx-line-chart'></i>
                    <span class="info">
                        <h3>
                            14,721
                        </h3>
                        <p>Searches</p>
                    </span>
                </li>
                <li><i class='bx bx-dollar-circle'></i>
                    <span class="info">
                        <h3>
                            $6,742
                        </h3>
                        <p>Total Sales</p>
                    </span>
                </li>
            </ul>
            <!-- End of Insights -->

            <div class="bottom-data">
                <div class="orders">
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
                </div>

                

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

    </div>

    <script>

        const shoDash = () => {
            document.getElementById("Dashboard").style.display = "block";
            document.getElementById("AddCustomer").style.display = "none";
        }

        const shoAddCus = () => {
            document.getElementById("Dashboard").style.display = "none";
            document.getElementById("AddCustomer").style.display = "block";
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
            }

?>

    <script src="../Asserts/Scripts/Script.js"></script>
</body>

</html>