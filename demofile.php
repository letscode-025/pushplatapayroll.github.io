<?php
@session_start();
include "../../dbconn.php";

$employeeID = $_POST['employeeidforpayslip'];
$totalSalary = $_POST['totalsalaryforpayslip'];
$query143="select name,employeeID,age,dateofjoining from employee where employeeID = '$employeeID'";

$result143=mysqli_query($con,$query143) or  die(mysqli_error($con));



$tsv  = array();
$html = array();
$html[] = "<tr><td>NAME</td>
<td>EMPLOYEE ID</td>
<td>AGE</td>
<td>DATE OF JOINING</td>
<td>PARTICULARS</td>
<td>TOTAL SALARY</td>
</tr>";
while($row = mysqli_fetch_array($result143, MYSQLI_NUM))
{
        
        
    $tsv[]  = implode("\t", $row);
   $html[] = "<tr>".
   "<td>" .(($row[0]!="")?$row[0]:"&nbsp;") . "</td>".
   "<td>" .(($row[1]!="")?$row[1]:"&nbsp;") . "</td>".
   "<td>" .(($row[2]!="")?$row[2]:"&nbsp;") . "</td>".
   "<td>" .(($row[3]!="")?$row[3]:"&nbsp;") . "</td>".
   "<td>" ."Total Income". "</td>".
   "<td>" .(($row[1]!="")?$row[1]:"&nbsp;") . "</td>".

   "</tr>";
}

$tsv = implode("\r\n", $tsv);
$html = "<table>" . implode("\r\n", $html) . "</table>";
$curdate=date("YmdHis");
$fileName = 'Salary_Slip'.$curdate.'.xls';
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$fileName");

echo $html;


?>