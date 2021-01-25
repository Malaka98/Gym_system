<?php

require_once 'header.php';
$yearArray = range(2000, date('Y'));
?>

<div class="d-sm-flex justify-content-between align-items-center mb-4">
    <h3 class="text-dark mb-0">Member per year</h3>
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
    </select>

    <input type="button" class="btn btn-primary" name="search" onclick="showMember();" value="Search">
</div>

<div class="pt-5">
    <table class="table" id="year">

    </table>
</div>

<script>

    function showMember(){
        var year=document.getElementById("syear");
        var iyear=year.selectedIndex;
        var ynumber=year.options[iyear].value;
        if(ynumber=="0"){
            document.getElementById("year").innerHTML="";
            return;
        }
        else{
            if(window.XMLHttpRequest){
                xmlhttp=new XMLHttpRequest();
            }
            xmlhttp.onreadystatechange=function(){
                if(this.readyState==4 && this.status ==200){
                    document.getElementById("year").innerHTML=this.responseText;
                }
            };
            xmlhttp.open("GET","over_month.php?mm=0&flag=1&yy="+ynumber,true);
            xmlhttp.send();
        }

    }

</script>

<?php require_once 'footer.php'?>
