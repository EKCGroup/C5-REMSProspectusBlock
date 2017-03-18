<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); 

require('db_query.php');

//Variables
$enquiriesEmail = 'courseenquiries@canterburycollege.ac.uk';
$enquiriesPhone = '01227 811188';
$CourseFees = 'https://www.canterburycollege.ac.uk/apply/fees/';
$CourseLoans = 'https://www.canterburycollege.ac.uk/apply/24-advanced-learning-loans/';
$CourseLearnMore = 'https://www.canterburycollege.ac.uk/16-18/study-programmes/';
$REMSurl = 'https://rems.canterburycollege.ac.uk/portal/html/Application/index.aspx';

//Checks If Course Exists
if (empty($ISCourse)) {
    echo '<div class="REMS-Course-Block" id="CC-REMS">';
    echo "<h2>This code doesn't link to a course; please ensure you have a valid code and try again.</h2>";
    echo '</div> <!--REMS-Course-Block-->';
} else {
    echo '<div class="REMS-Course-Block" id="CC-REMS ' . $CourseCode . '">';
    
    if ($CourseTemplate == 'fefull') { 
        require 'course_views/fe_full_time.php';
    }
    if ($CourseTemplate == 'fepart') { 
        require 'course_views/fe_part_time.php';
    }
    if ($CourseTemplate == 'he') { 
        require 'course_views/he.php';
    }
    if ($CourseTemplate == 'apprenticeship') { 
        require 'course_views/apprenticeship.php';
    }
    
    echo '</div> <!--REMS-Course-Block-->';
}

