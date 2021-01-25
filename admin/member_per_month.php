<?php

    require_once 'header.php';
    $yearArray = range(2000, date('Y'));
?>
<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Member per month</h3>
</div>
    <div class="container">
        <select class="custom-select mr-sm-2 w-25" name="year" id="syear">
            <option selected>Select Year</option>
            <?php
            foreach ($yearArray as $year) {
                // if you want to select a particular year
                $selected = ($year == date('Y')) ? 'selected' : '';
                echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
            }
            ?>

            <?php
            // set the month array
            $formattedMonthArray = array(
                "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                "09" => "September", "10" => "October", "11" => "November", "12" => "December",
            );

            ?>
        </select>

        <!-- displaying the dropdown list -->
        <select class="custom-select mr-sm-2 w-25" name="month" id="smonth">
            <option value="0">Select Month</option>
            <?php

            foreach ($formattedMonthArray as $month) {
                // if you want to select a particular month
                $mm=implode(array_keys($formattedMonthArray,$month));
                $selected = ($mm == date('m')) ? 'selected' : '';
                // if you want to add extra 0 before the month uncomment the line below
                //$month = str_pad($month, 2, "0", STR_PAD_LEFT);
                echo '<option '.$selected.' value="'.$mm.'">'.$month.'</option>';
            }
            ?>
        </select>

        <input type="button" class="btn btn-primary" name="search" onclick="showMember();" value="Search">
    </div>

    <div class="pt-5">
        <table class="table" id="memmonth">

        </table>
    </div>

<script>

    function showMember(){
        var year=document.getElementById("syear");
        var month=document.getElementById("smonth");
        var iyear=year.selectedIndex;
        var imonth=month.selectedIndex;
        var mnumber=month.options[imonth].value;
        var ynumber=year.options[iyear].value;
        if(mnumber=="0" || ynumber=="0"){
            document.getElementById("memmonth").innerHTML="";
            return;
        }
        else{
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status ==200){
                    document.getElementById("memmonth").innerHTML=this.responseText;
                }
            };
            xmlhttp.open("GET","over_month.php?mm="+mnumber+"&yy="+ynumber+"&flag=0",true);
            xmlhttp.send();
        }

    }

</script>

<?php require_once 'footer.php'?>
