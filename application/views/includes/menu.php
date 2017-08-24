<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main" aria-expanded="true">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PataMarks  <span style="color: #f26419; font-size: small;">Beta</span><span style="color: #f26419; font-size: x-small; text-align: center;">1.0</span></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-main">
            <ul class="nav navbar-nav">
            <!-- active when current nav item <span class="sr-only">(current)</span> -->
            <li><a href="<?php echo base_url(); ?>dashboard">Dashboard</a></li>
                <li class="dropdown"> 
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" href="#">Users<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <!-- For separated links <li role="separator" class="divider"></li> -->
                    <li><a href="<?php echo base_url(); ?>users/group">Tuition Groups</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>users/lecturer">Lecturers</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>users/student">Students</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>users/admin_user">Admin Users</a></li>
                </ul>
                </li>
                <li class="dropdown"> 
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" href="#">Exams<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>exams/schedule">Dates</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>exams/grades">Grading</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>exams/results">Results</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>exams/types">Types</a></li>               
                </ul>
                </li>

                <li class="dropdown"> 
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" href="#">Colleges<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>colleges/courses">Courses</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>colleges/commission">Commissioning</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>colleges/units">Add Unit</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>colleges/assignment">Assign Lectures</a></li>
                </ul>
                </li>

                <li class="dropdown"> 
                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" href="#">Reports<span class="caret"></span></a>
                <ul class="dropdown-menu">
                <!-- For separated links <li role="separator" class="divider"></li> -->
                    <li><a href="<?php echo base_url(); ?>reports/assignment">Marks</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>reports/college">Lecturers</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>reports/course">Courses</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>reports/exam">Colleges</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url(); ?>reports/group">Users</a></li>
                </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" data-toggle="tooltip" data-placement="bottom" title="Search for students or lecturers">
                </div>
                <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            </form>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
            
<div class="container">