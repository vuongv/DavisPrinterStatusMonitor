<?php
    
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=vuongv_PrinterData","vuongv_brlabt1","J4yx87Au7j8c6V");
        }catch (Exception $ex){
           die("");
        }

?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        /* https://projects.verou.me/css3patterns/#blueprint-grid*/
            /*.grid-container{*/
            /*    border-top: 1px solid black;*/
            /*    border-left: 1px solid black;*/
            /*    border-right: 1px solid black;*/
            /*    border-bottom: 1px solid black;*/
            /*    width: 100%;*/
            /*    display: grid;*/
            /*    grid-template:*/
            /*        'Awing Bwing Cwing'*/
            /*        'Jwing Hwing SCMwing ';*/
            /*}*/
            /*#Awing{*/
            /*    width: auto;*/
            /*    grid-area: Awing;*/
            /*}*/
            /*#Bwing{*/
            /*    width: auto;*/
            /*    grid-area: Bwing;*/
            /*}*/
            /*#Cwing{*/
            /*    width: auto;*/
            /*    grid-area: Cwing;*/
            /*}*/
            /*#Jwing{*/
            /*    width: auto;*/
            /*    grid-area: Jwing;*/
            /*}*/
            /*#Hwing{*/
            /*    width: auto;*/
            /*    grid-area: Hwing;*/
            /*}*/
            /*#SCMwing{*/
            /*    width: auto;*/
            /*    grid-area: SCMwing;*/
            /*}*/
            #grid{
                table-layout: auto;
                width: 100%;
                border: 1px solid black;
            }
            td{
                border: 1px solid black;
                width:33%;
                height: 50%;
                text-align: center;
            }
            .CoordinateFixed{
                position: fixed;
                top: 100px;
                right: 300px;
                font-size: large;
            }
            #cursor{
                position: absolute;
                width: 1px;
                height: 1px; 
                border: 2px solid #000;
                box-sizing: border-box;
                transition: 0.1s;
                transform: translate(-50%,-50%);
                border-radius: 50%;
                pointer-events: none;
                
            }
            #CoordInfo{
                font-size: large;
            }
            .gridLine{
                background-color: grey;
                background-image: linear-gradient(white 2px, transparent 2px),
                    linear-gradient(90deg, white 2px, transparent 2px),
                    linear-gradient(rgba(255,255,255,.3) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,.3) 1px, transparent 1px);
                background-size: 100px 100px, 100px 100px, 20px 20px, 20px 20px;
                background-position:-2px -2px, -2px -2px, -1px -1px, -1px -1px;
            }
            .TrayEmpty {
                background: red;
                border-radius: 35%;
                width: 55px;
                height: 25px;
                float: left;
                text-align: center;
            }
            .TrayOk {
                background: green;
                border-radius: 35%;
                width: 55px;
                height: 25px;
                float: left;
                text-align: center;
            }
            .TrayLow {
                background: yellow;
                border-radius: 35%;
                width: 55px;
                height: 25px;
                float: left;
                text-align: center;
            }
            .PrinterImg{
                width:61px;
                margin:0; 
                position:relative; 
                float:left;
            }
            .PrinterName{
                font-size: 24px; 
                margin:0; 
                font-weight:bold; 
                -webkit-text-stroke: 0.5px black; 
                color: yellow; 
            }
            .TrayX{
                background: grey;
                border-radius: 50%;
                width: 25px;
                height: 25px;
                float: left;
                text-align: center;
            }
            body{
                padding: 0;
                margin: 10px;
            }
           
        </style>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body style="background: #444444">
        <table id="grid">
            <tr>
                <td>
                    <div onmousemove="showCoords(event)">
                        <img id="Awing" src="img\A-Floor1.jpg" style="width:85%; opacity: 0.6;">
                    </div>
                </td>
                <td>
                    <div onmousemove="showCoords(event)">
                        <img id="Bwing" src="img\B-Floor1.jpg" style="width:85%; opacity: 0.6;">
                    </div>
                </td>
                <td onmousemove="showCoords(event)">
                    <img id="Cwing" src="img\C-Floor1.jpg" style="width:85%; opacity: 0.6;">
                </td>
            </tr>
            <tr>
                <td onmousemove="showCoords(event)">
                   <img id="Hwing" src="img\H-Floor1.jpg" style="width:85%; opacity: 0.6;">
                </td>
                <td onmousemove="showCoords(event)">
                   <img id="Jwing" src="img\J-Floor1.jpg" style="width:85%; opacity: 0.6;">
                </td>
                <td onmousemove="showCoords(event)">
                   <img id="SCMwing" src="img\M-Floor1.jpg" style="width:85%; opacity: 0.6;">
                </td>
            </tr>
        </table>
        <div id="timer">
        </div>
        <div id="cursor">
            <p id="CoordInfo"></p>
        </div>
        <!-- A Wing-->
        <div id="Awing-Floor1-Printer">
            <div id = "br-a103-prn1" style="position:absolute; left:210px; top:95px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-a103-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
        </div>
       <div id="Awing-Floor2-Printer">
           <div id = "br-a206-prn1" style="position:absolute; left:229px; top:83px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-a206-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-a208-prn1" style="position:absolute; left:230px; top:331px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-a208-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Awing-Floor3-Printer">
           <div id = "br-a301-prn1" style="position:absolute; left:220px; top:99px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-a301-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-a317-prn1" style="position:absolute; left:200px; top:333px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-a317-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <!-- B Wing-->
       <div id="Bwing-Floor1-Printer">
           <div id = "br-b114-prn2" style="position:absolute; left:870px; top:210px; margin:0; width: 350px;">
               <?php
                    $hostname = "br-b114-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            $captureDate = substr($row["capturedate"],0,19);
                            echo "<div style=\"font-size: 10px;\">";
                                echo "Capture:{$captureDate}";
                                echo "<br>";
                                echo "Current:{$row["currentdate"]}";
                            echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-b132-prn6" style="position:absolute; left:820px; top:373px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b132-prn6";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-b127-prn1" style="position:absolute; left:750px; top:310px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b127-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
             <div id = "br-b111-prn1" style="position:absolute; left:880px; top:120px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b111-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-b126-prn1" style="position:absolute; left:690px; top:266px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b126-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Bwing-Floor2-Printer">
           <div id = "br-b213-prn2" style="position:absolute; left:924px; top:320px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b213-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-b216-prn1" style="position:absolute; left:838px; top:195px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b216-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Bwing-Floor3-Printer">
           <div id = "br-b303-prn1" style="position:absolute; left:984px; top:315px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b303-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-b307-prn1" style="position:absolute; left:857px; top:269px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-b307-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <!-- C Wing-->
       <div id="Cwing-Floor1-Printer">
            <div id = "br-c172-prn1" style="position:absolute; left:1553px; top:398px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c172-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-c102-prn1" style="position:absolute; left:1360px; top:365px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c102-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-c138-prn2" style="position:absolute; left:1697px; top:207px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c138-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Cwing-Floor2-Printer">
           <div id = "br-c210-prn3" style="position:absolute; left:1380px; top:350px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c210-prn3";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-c268-prn1" style="position:absolute; left:1550px; top:403px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c268-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-c238-prn2" style="position:absolute; left:1701px; top:190px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c238-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Cwing-Floor3-Printer">
           <div id = "br-c300-prn1" style="position:absolute; left:1322px; top:402px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c300-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-c318-prn1" style="position:absolute; left:1586px; top:391px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-c318-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <!-- H Wing-->
       <div id="Hwing-Floor1-Printer">
           <div id = "br-h109-prn2" style="position:absolute; left:380px; top:615px; margin:0; width: 350px;">
               <?php
                    $hostname = "br-h109-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Hwing-Floor2-Printer">
           <div id = "br-h200-prn1" style="position:absolute; left:338px; top:721px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-h200-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-h242-prn2" style="position:absolute; left:264px; top:913px; margin:0; width: 350px;">
                <<?php
                    $hostname = "br-h242-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Hwing-Floor3-Printer">
           <div id = "br-h300-prn1" style="position:absolute; left:353px; top:729px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-h300-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-h310-prn2" style="position:absolute; left:115px; top:763px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-h310-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            <div id = "br-h318-prn2" style="position:absolute; left:299px; top:794px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-h318-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <!-- J Wing-->
       <div id="Jwing-Floor1-Printer">
           <div id = "br-j124-prn5" style="position:absolute; left:872px; top:660px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j124-prn5";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-j124-prn6" style="position:absolute; left:920px; top:569px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j124-prn6";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-j100-prn1" style="position:absolute; left:920px; top:969px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j100-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Jwing-Floor2-Printer">
           <div id = "br-j212-prn2" style="position:absolute; left:952px; top:904px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j212-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-j214-prn4" style="position:absolute; left:866px; top:650px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j214-prn4";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-j214-prn5" style="position:absolute; left:1021px; top:684px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j214-prn5";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <div id="Jwing-Floor3-Printer">
           <div id = "br-j310-prn2" style="position:absolute; left:946px; top:909px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j310-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-j314-prn3" style="position:absolute; left:926px; top:786px; margin:0; width: 350px;">
               <?php
                    $hostname = "br-j314-prn3";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-j314-prn4" style="position:absolute; left:884px; top:735px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-j314-prn4";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
       </div>
       <!-- SC Wing-->
       <div id="SCwing-Floor1-Printer">
           
       </div>
       <div id="SCwing-Floor2-Printer">
            <!--<div id = "br-j214-prn5" style="position:absolute; left:1021px; top:684px; margin:0;">-->
            <!--    <img src="img\PrinterIcon.jpg" style="width:7%; margin:0; position:relative; float:left; ">-->
            <!--    <div>-->
            <!--       <h1 style="font-size: 24px; margin:0; font-weight:bold; -webkit-text-stroke: 0.5px black; color: yellow;">BR-J214-prn5</h1> -->
            <!--       <div style="float:left;">-->
            <!--        <div id="br-j214-prn5-tray1" style="background: red;border-radius: 50%;width: 25px;height: 25px; float:left;"></div>-->
            <!--        <div id="br-j214-prn5-tray2" style="background: green;border-radius: 50%;width: 25px;height: 25px; float:left;"></div>-->
            <!--        <div id="br-j214-prn5-tray3" style="background: green;border-radius: 50%;width: 25px;height: 25px; float:left;"></div>-->
            <!--    </div>-->
            <!--    </div>                -->
            <!--    <div class="w3-container w3-green w3-center" style="width:5%; font-size:15px; margin:2;">25%</div>-->
            <!--</div>-->
       </div>
       <div id="SCwing-Floor3-Printer">
           
       </div>
       <!-- M Wing-->
       <div id="Mwing-Floor1-Printer">
           <div id = "br-m4-prn2" style="position:absolute; left:1700px; top:778px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-m4-prn2";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                ?>
            </div>
            <div id = "br-m25-prn1" style="position:absolute; left:1469px; top:778px; margin:0; width: 350px;">
                <?php
                    $hostname = "br-m25-prn1";
                    $command = "select `Printer_Status1`, `Printer_Status2`, `Printer_Hostname`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, now() as currentdate,`Date_Capture` as capturedate from vuongv_PrinterData.Collector where Printer_Hostname LIKE \"$hostname%\"  order by capturedate DESC limit 1;
                    ";
                    $stmt = $dbh->prepare($command);
                    $stmt->execute();
                    if($stmt->rowCount() > 0){
                        while ($row = $stmt->fetch()){  
                            echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIcon.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$row["Printer_Hostname"]}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    if($row["Printer_Tray1_Status"] != "NA"){
                                        switch ($row["Printer_Tray1_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray1_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                    if($row["Printer_Tray2_Status"] != "NA"){
                                        switch ($row["Printer_Tray2_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray2_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }    
                                    if($row["Printer_Tray3_Status"] != "NA"){
                                        switch ($row["Printer_Tray3_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray3_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                        }
                                    }
                                    if($row["Printer_Tray4_Status"] != "NA"){
                                        switch ($row["Printer_Tray4_Status"]){
                                            case "OK":
                                                echo "<div class=\"TrayOk\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Low":
                                                echo "<div class=\"TrayLow\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            case "Empty":
                                                echo "<div class=\"TrayEmpty\">";
                                                switch ($row["Printer_Tray4_Type"]){
                                                    case "Letter":
                                                        echo "Letter";
                                                        break;
                                                    case "Legal":
                                                        echo "Legal";
                                                        break;
                                                    case "11x17":
                                                        echo "Tabloid";
                                                        break;
                                                }
                                                echo "</div>";
                                                break;
                                            }
                                        }
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                echo "<div class=\"w3-container w3-green w3-center\" style=\"width:{$row["Printer_Toner_Percentage"]}px; font-size:15px; color:black;\">{$row["Printer_Toner_Percentage"]}%</div>";
                            echo "</div>";
                            // $captureDate = substr($row["capturedate"],0,19);
                            // echo "<div style=\"font-size: 10px;\">";
                            //     echo "Capture:{$captureDate}";
                            //     echo "<br>";
                            //     echo "Current:{$row["currentdate"]}";
                            // echo "</div>";
                        }
                    }else{
                        echo "<div style=\"height:61px;\">";
                                echo "<img src=\"img\PrinterIconX.jpg\" class=\"PrinterImg\">";
                                echo "<h1 class=\"PrinterName\">{$hostname}</h1> ";
                                echo "<div style=\"float: left;\">";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                    echo "<div class=\"TrayX\">";
                                    echo "x";
                                    echo "</div>";
                                 echo "</div>";
                                 echo "<br>";
                            echo "</div>";
                            echo "<div class=\"w3-light-grey\" style=\"width: 100px;  position:bottom;\">";
                                
                            echo "</div>";
                            
                    }
                $dbh=null;
                ?>
            </div>
       </div>
      
        <script>
            var cursor = document.getElementById(`cursor`);
            document.addEventListener('mousemove',function(e){
                var x = e.clientX;
                var y = e.clientY;
                cursor.style.left = x + "px";
                cursor.style.top = y + "px";
            });
            var numFloor = 1;
            function showCoords(event){
                var x = event.clientX;
                var y = event.clientY;
                var coor = "(" + x +"," + y +")";
                document.getElementById("CoordInfo").innerHTML = coor;
            }
            var timeLeft = 30;
            var elem = document.getElementById('timer');
            var timerId = setInterval(countdown, 1000);
            
            function countdown() {
                if (timeLeft == -1) {
                    changeFloor();
                    timeLeft = 30;
                    
                } else {
                   elem.innerHTML = timeLeft + ' seconds remaining';
                    timeLeft--;
                }
            }
            var Awing = document.getElementById('Awing');
            var Bwing = document.getElementById('Bwing');
            var Cwing = document.getElementById('Cwing');
            var Jwing = document.getElementById('Jwing');
            var Hwing = document.getElementById('Hwing');
            var SCMwing = document.getElementById('SCMwing');
                
            var AwingF1Printer = document.getElementById('Awing-Floor1-Printer');
            var BwingF1Printer = document.getElementById('Bwing-Floor1-Printer');
            var CwingF1Printer = document.getElementById('Cwing-Floor1-Printer');
            var JwingF1Printer = document.getElementById('Jwing-Floor1-Printer');
            var HwingF1Printer = document.getElementById('Hwing-Floor1-Printer');
            var SCwingF1Printer = document.getElementById('SCwing-Floor1-Printer');
            var MwingF1Printer = document.getElementById('Mwing-Floor1-Printer');
            
            AwingF1Printer.style.visibility = "visible";
            BwingF1Printer.style.visibility = "visible";
            CwingF1Printer.style.visibility = "visible";
            JwingF1Printer.style.visibility = "visible";
            HwingF1Printer.style.visibility = "visible";
            SCwingF1Printer.style.visibility = "visible";
            MwingF1Printer.style.visibility = "visible";
            
            var AwingF2Printer = document.getElementById('Awing-Floor2-Printer');
            var BwingF2Printer = document.getElementById('Bwing-Floor2-Printer');
            var CwingF2Printer = document.getElementById('Cwing-Floor2-Printer');
            var JwingF2Printer = document.getElementById('Jwing-Floor2-Printer');
            var HwingF2Printer = document.getElementById('Hwing-Floor2-Printer');
            var SCwingF2Printer = document.getElementById('SCwing-Floor2-Printer');
            
            
            AwingF2Printer.style.visibility = "hidden";
            BwingF2Printer.style.visibility = "hidden";
            CwingF2Printer.style.visibility = "hidden";
            JwingF2Printer.style.visibility = "hidden";
            HwingF2Printer.style.visibility = "hidden";
            SCwingF2Printer.style.visibility = "hidden";
            
            
            var AwingF3Printer = document.getElementById('Awing-Floor3-Printer');
            var BwingF3Printer = document.getElementById('Bwing-Floor3-Printer');
            var CwingF3Printer = document.getElementById('Cwing-Floor3-Printer');
            var JwingF3Printer = document.getElementById('Jwing-Floor3-Printer');
            var HwingF3Printer = document.getElementById('Hwing-Floor3-Printer');
           
            AwingF3Printer.style.visibility = "hidden";
            BwingF3Printer.style.visibility = "hidden";
            CwingF3Printer.style.visibility = "hidden";
            JwingF3Printer.style.visibility = "hidden";
            HwingF3Printer.style.visibility = "hidden";
            
            function changeFloor() {
                
                
                if (numFloor == 1){
                    Awing.src= "img\\A-Floor2.jpg";
                    Bwing.src= "img\\B-Floor2.jpg";
                    Cwing.src= "img\\C-Floor2.jpg";
                    Jwing.src= "img\\J-Floor2.jpg";
                    Hwing.src= "img\\H-Floor2.jpg";
                    SCMwing.src = "img\\SC-Floor2.jpg";
                    
                    AwingF1Printer.style.visibility= "hidden";
                    BwingF1Printer.style.visibility= "hidden";
                    CwingF1Printer.style.visibility= "hidden";
                    JwingF1Printer.style.visibility= "hidden";
                    HwingF1Printer.style.visibility= "hidden";
                    MwingF1Printer.style.visibility= "hidden";
                    
                    AwingF2Printer.style.visibility= "visible";
                    BwingF2Printer.style.visibility= "visible";
                    CwingF2Printer.style.visibility= "visible";
                    JwingF2Printer.style.visibility= "visible";
                    HwingF2Printer.style.visibility= "visible";
                    SCwingF2Printer.style.visibility= "visible";
                    
                    
                    numFloor++;
                }else if (numFloor == 2){
                    Awing.src= "img\\A-Floor3.jpg";
                    Bwing.src= "img\\B-Floor3.jpg";
                    Cwing.src= "img\\C-Floor3.jpg";
                    Jwing.src= "img\\J-Floor3.jpg";
                    Hwing.src= "img\\H-Floor3.jpg";
                    SCMwing.src = "img\\M-Floor1.jpg";
                    
                    AwingF2Printer.style.visibility= "hidden";
                    BwingF2Printer.style.visibility= "hidden";
                    CwingF2Printer.style.visibility= "hidden";
                    JwingF2Printer.style.visibility= "hidden";
                    HwingF2Printer.style.visibility= "hidden";
                    SCwingF2Printer.style.visibility= "hidden";
                    
                    
                    AwingF3Printer.style.visibility= "visible";
                    BwingF3Printer.style.visibility= "visible";
                    CwingF3Printer.style.visibility= "visible";
                    JwingF3Printer.style.visibility= "visible";
                    HwingF3Printer.style.visibility= "visible";
                    MwingF1Printer.style.visibility= "visible";
                    
                    numFloor++;
                }else if (numFloor == 3){
                    Awing.src= "img\\A-Floor1.jpg";
                    Bwing.src= "img\\B-Floor1.jpg";
                    Cwing.src= "img\\C-Floor1.jpg";
                    Jwing.src= "img\\J-Floor1.jpg";
                    Hwing.src= "img\\H-Floor1.jpg";
                    SCMwing.src = "img\\SC-Floor2.jpg";
                    AwingF1Printer.style.visibility= "visible";
                    BwingF1Printer.style.visibility= "visible";
                    CwingF1Printer.style.visibility= "visible";
                    JwingF1Printer.style.visibility= "visible";
                    HwingF1Printer.style.visibility= "visible";
                    SCwingF2Printer.style.visibility= "visible";
                    
                    
                    AwingF3Printer.style.visibility= "hidden";
                    BwingF3Printer.style.visibility= "hidden";
                    CwingF3Printer.style.visibility= "hidden";
                    JwingF3Printer.style.visibility= "hidden";
                    HwingF3Printer.style.visibility= "hidden";
                    MwingF1Printer.style.visibility= "hidden";
                    numFloor=1;
                    location.reload();
                }
                
                
            }
          
        </script>
    </body>
</html>
