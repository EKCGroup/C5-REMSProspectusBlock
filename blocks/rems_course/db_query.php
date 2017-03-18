<?php defined('C5_EXECUTE') or die(_("Access Denied."));

//Current Date
$today=date("Y-m-d");

//Create connection
$connection = new mysqli('IP', 'dbuser', 'PASSWORD', 'prospectus');
if ($connection->connect_error) {
    die("<!-- REMS Database connection failed: " . $connection->connect_error . " -->");
} else {
    echo "<!-- REMS Database connection successfully -->";
}

//SQL to get REMS course text
$queryRems = "SELECT PRTXProspectusText.PRTX_PRPI_Code, PRTXProspectusText.PRTX_PRTC_Code, PRTXProspectusText.PRTX_Paragraph, PRTXProspectusText.PRTX_Text FROM PRTXProspectusText WHERE PRTXProspectusText.PRTX_PRPI_Code ='$CourseCode';";
//SQL to get REMS course provision data
$queryRemsProvision = "SELECT PRPIProvision.*, CAST(IsAlevel AS unsigned integer) AS ISALEVEL, CAST(PRPI_Available_Web_App AS unsigned integer) AS Available_Web_App FROM PRPIProvision WHERE PRPIProvision.PRPI_Code ='$CourseCode';";
//SQL to get REMs instance data
$queryRemsInstance ="SELECT PRPIProvision.PRPI_Instance, PRPIProvision.PRPI_Start_Date, CAST(PRPI_Available_Web_App AS unsigned integer) AS Available_Web_App FROM PRPIProvision WHERE PRPIProvision.PRPI_Code ='$CourseCode';";
//Check a least one instance is avalible for web applicaion.
$queryOneAvalible ="select SUM(CAST(PRPI_Available_Web_App AS unsigned integer)) AS Available_Web_App from PRPIProvision where DATE(PRPI_Start_Date) >= DATE(NOW()) AND PRPI_Code ='$CourseCode';";

//Run Querys
$resultRems = $connection->query($queryRems);
$resultRemsProvison = $connection->query($queryRemsProvision);
$resultRemsInstance = $connection->query($queryRemsInstance);
$resultOneAvalible = $connection->query($queryOneAvalible);

//Close connection
mysqli_close($connection);
           
while($row = $resultRems->fetch_assoc()) {
    if ($row["PRTX_PRTC_Code"]==115) {$Display_Introduction = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==125) {$Display_CourseContent = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==130) {$Display_EntryRequirements = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==50)  {$Display_Assessment = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==55)  {$Display_Progression = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==60)  {$Display_WorkExperience = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==70)  {$Display_Comment = $row["PRTX_Text"];} 
    if ($row["PRTX_PRTC_Code"]==65)  {$Display_AddionalInformation = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==120) {$Display_AddionalInformation2 = $row["PRTX_Text"];} 
    if ($row["PRTX_PRTC_Code"]==110) {$Display_Time = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==105) {$Display_Day = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==155) {$Display_Fee = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==150) {$Display_FeeCode = $row["PRTX_Text"];} 
    if ($row["PRTX_PRTC_Code"]==160) {$Display_24PlusLoan = $row["PRTX_Text"];}  
    if ($row["PRTX_PRTC_Code"]==85)  {$Display_UCASCourseCode = $row["PRTX_Text"];}
    if ($row["PRTX_PRTC_Code"]==80)  {$Display_UCASCCampusCode = $row["PRTX_Text"];} 
    if ($row["PRTX_PRTC_Code"]==75)  {$Display_UCASInstitution = $row["PRTX_Text"];} 
}

while($row = $resultRemsProvison->fetch_assoc()) {
    $ISCourse = $row["PRPI_Title"];
    $Display_CourseTitle = $row["PRPI_Title"];
    $Available_Web_App = $row["Available_Web_App"];
}

while($row = $resultOneAvalible->fetch_assoc()) {
    $OneInstanceAvalible = $row["Available_Web_App"];
}

while($row = $resultRemsInstance->fetch_assoc()) {
    $day =substr($row["PRPI_Start_Date"],8,2);
    $month = substr($row["PRPI_Start_Date"],5,2);
    $year =substr($row["PRPI_Start_Date"],0,4);
    $displayStartDate = $day."/".$month."/".$year;
    $Available_Web_App = $row["Available_Web_App"];
}