<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

echo '<div class="Course-FE">';

//Title
    if (!empty($Display_CourseTitle)) {
        echo "<h2>".$Display_CourseTitle."</h2>";
    }
    //Introduction
    echo "<p>".$Display_Introduction."</p>";
    
    //Apply buttons
    echo "<div class='apply-buttons'>";

         if ($Available_Web_App==1) {
            if (empty($displayStartDate)) { ?>
                <input type="button" onclick="REMSapply()" value="Apply for Course">
        <?php } else { ?>
                <input type="button" onclick="REMSapply()" value="Apply for Course starting <?php echo $displayStartDate; ?>">
        <?php } ?>
            <script type="text/javascript">
                function REMSapply() {
                    window.location.href='<?= $REMSurl ?>?course=<?= $CourseCode ?>';
                }
            </script>
        <?php }  

    echo "</div> <!-- apply-button END -->";

    echo "<div id='course-body'>";
        if ($OneInstanceAvalible>0) {
            echo "<p><b>Please DO NOT use the Safari web browser on Apple devices when using the online application system, there are known issues with some of the form pages. <br> Supported browsers include Internet Explorer, Firefox and Google Chrome.</b></p>";
        }
        //Course content
        if (!empty($Display_CourseContent)) {
            echo "<h3>What will I learn?</h3><p>".$Display_CourseContent."</p>";       
        }
        //Assessment
        if (!empty($Display_Assessment)) {
            echo "<h3>How will I be assessed?</h3><p>".$Display_Assessment."</p>";
        }
        //Progression
        if (!empty($Display_Progression)) {
            echo "<h3>What may it lead to?</h3><p>".$Display_Progression."</p>";
        }
        //Entry requirements
        if (!empty($Display_EntryRequirements)) {
            echo "<h3>Entry Requirements</h3><p>".$Display_EntryRequirements."</p>";
        }
        //Work experience
        if (!empty($Display_WorkExperience)) {
            echo "<h3>Work Experience</h3><p>".$Display_WorkExperience."</p>";
        }
        //Additional information
        if (!empty($Display_AddionalInformation)) {
            echo "<h3>Additional Information & Other Costs</h3><p>".$Display_AddionalInformation."</p><p>".$Display_AddionalInformation2."</p>";
        }
    echo "</div> <!-- course-body END -->";

    echo "<div id='course-info'>";
        //Course code.
        echo "<h3>Course Code</h3><p>".$CourseCode."</p>";

        if (empty($Display_CourseContent)) {
            echo "<p>Details of this programme are currently being finalised. Please email <a href='mailto:".$enquiriesEmail."'>".$enquiriesEmail."</a> or call ".$enquiriesPhone." for further details or assistance.";
        }
        //Day
        if (!empty($Display_Day)) {
            echo "<h3>Days</h3><p>".$Display_Day."</p>";
        }
        //Interviews
        if (!empty($Display_Day)) {
            echo "<h3>Dates for interview</h3><p>".$Display_Day."</p>";
        }
        //Time
        if (!empty($Display_Time)) {
            echo "<h3>Time</h3><p>".$Display_Time."</p>";
        }
        echo "<h3>FE Study Programme</h3>";
        echo "<p>This qualification will form the main part of your Canterbury College study programme. Our study programmes combine your main qualification and may involve work experience and Maths & English sessions. <a href='".$CourseLearnMore."'>Learn more.</a></p>";
        echo "<h3>Course Fees</h3>";
        echo "<p>What you pay in course fees will depend on your personal circumstances and age. To find out more, visit our <a href='".$CourseFees."'>Fees page</a>. If you are aged 19 or above, you may qualify for a <a href='".$CourseLoans."'>Advanced Learning Loan</a>.</p>";
    echo "</div> <!-- course-info -->";
    
echo '</div> <!-- END Course-FE';