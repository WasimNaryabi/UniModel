<style>

/* Vertical - Menu div styles & settings */

.main_menus {
				//border: 1px solid blue;
				width:255px;
				height:420px;
	}

.menu-div-style {
					background:-webkit-gradient(linear, left top, left bottom, from(#005), to(#448CCB));
					background:-moz-linear-gradient(-90deg,#005,#448CCB); /* Firefox */
					border:1px solid #CCC;
					border-radius:4px;
					width:250px;
					height:40px;
					display:block;
	}

.menu-div-style a {
						font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
						text-decoration:none;
						margin-left:15px;
						font-size:24px;
						color:#FFF;
	}

.menu-div-style:hover {
							background:linear-gradient(to bottom right, #005, #448CCB, #FFF);
							cursor:default;
}

.menu-div-style:hover a {
							font-weight:bold;
}

/* Sub-div Menus styles */

.sub_menus {
				//background:linear-gradient(to right, #EDEDED , 80%, #FFF);
				padding:5px 10px 0px 10px;
				width:230px;
				height:30px;
				display:none;
	}

.sub_menus a {
					font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
					text-decoration:none;
					margin-left:45px;
					font-size:20px;
					color:#006;

}

.sub_menus:hover {
						background-color:#D8D8D8;
}


.sub_menus a:hover{
						color:#1C10A7;
}

.add_color {
				background-color:#D8D8D8;
	}

</style>

<div class="menu_div">
    <h3 style="margin-top:10px;"><i>Welcome! To the Admin Panel.</i><br />
    <?php echo $row['first_name']." ".$row['last_name']; ?></h3>

	<div class="main_menus">

        <div id="admin_home" class="menu-div-style">
            <a>&emsp; Main Panel</a>
        </div>
            <div id="main_page" class="sub_menus">
                <a href="admin_home.php">Admin Home</a>
            </div>
    
        <div id="registrations" class="menu-div-style">
            <a>&emsp; Registrations</a>
        </div>
            <div class="sub_menus" id="student_registration">
                <a href="student_registration.php">Student Registration</a>
            </div>
            <div class="sub_menus" id="faculty_registration">
                <a href="faculty_registration.php">Faculty Registration</a>
            </div>
            <div class="sub_menus" id="admin_registration">
                <a href="admin_registration.php">Admin Registration</a>
            </div>
        
        <div id="specific_search" class="menu-div-style">
            <a>&emsp; Specific Search</a>
        </div>
            <div class="sub_menus" id="student_search">
                <a href="search_student.php">Student</a>
            </div>
            <div class="sub_menus" id="faculty_search">
                <a href="search_faculty.php">Faculty Member</a>
            </div>
            
        <div id="update_record" class="menu-div-style">
            <a>&emsp; Update Record</a>
        </div>
            <div class="sub_menus" id="student_update">
                <a href="student_update.php">Student Update</a>
            </div>
            <div class="sub_menus" id="faculty_update">
                <a href="faculty_update.php">Faculty Update</a>
            </div>
    
        <div id="academic_records" class="menu-div-style">
            <a>&emsp; Academic Records</a>
        </div>
            <div class="sub_menus" id="student_academics1">
                <a href="student_academicRecord.php">Students Record</a>
            </div>
            <div class="sub_menus" id="student_academics2">
                <a href="student_attendenceRecord.php">Attendance Record</a>
            </div>
            <div class="sub_menus" id="student_academics3">
                <a href="student_resultRecord.php">Result Records</a>
            </div>
        
        <div id="latest_updates" class="menu-div-style">
            <a>&emsp; News Updates</a>    
        </div>
            <div id="latest_news" class="sub_menus">
                <a href="latest_news.php">Latest News</a>
            </div>
            <div id="update_news" class="sub_menus">
                <a href="update_news.php">Update News</a>
            </div>
        
        <div id="add_category" class="menu-div-style">
            <a>&emsp; Add Category</a>    
        </div>
            <div id="add_new_discipline" class="sub_menus">
                <a href="add_discipline.php">Add New Discipline</a>
            </div>
            <div id="add_new_session" class="sub_menus">
                <a href="add_session.php">Add New Session</a>
            </div>
            <div id="add_new_section" class="sub_menus">
                <a href="add_section.php">Add New Section</a>
            </div>
    
        <div id="settings" class="menu-div-style">
            <a>&emsp; Admin Setting</a>
        </div>
            <div id="profile" class="sub_menus">
                <a href="admin_profile_update.php">Profile</a>
            </div>
            <div id="update_password" class="sub_menus">
                <a href="admin_update_password.php">Update Password</a>
            </div>
            <div id="login_history" class="sub_menus">
                <a href="admin_login_history.php">Login History</a>
            </div>
    
        <div id="logout" class="menu-div-style">
            <a href="admin_logout.php?value=<?php echo "1"; ?>">&emsp; Log Out</a>
        </div>
        
	</div>
    
</div>
