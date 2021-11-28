<?php
    
    try{
        $dbh = new PDO("mysql:host=localhost;dbname=vuongv_PrinterData","vuongv_brlabt1","J4yx87Au7j8c6V");
        }catch (Exception $ex){
           die("");
        }

?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
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
        </style>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div style="display:flex;  flex-direction: column;">
            <!-- A Wing-->
        <div id="Awing-Floor1-Printer" >
            <div id = "br-a103-prn1" style=" margin:0; width: 350px;">
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
       <div id="Awing-Floor2-Printer" >
           <div id = "br-a206-prn1" style="  margin:0; width: 350px; ">
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
            <div id = "br-a208-prn1" style=" margin:0; width: 350px;">
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
           <div id = "br-a301-prn1" style=" margin:0; width: 350px;">
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
            <div id = "br-a317-prn1" style="  margin:0; width: 350px;">
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
           <div id = "br-b114-prn2" style=" margin:0; width: 350px;">
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
            <div id = "br-b132-prn6" style=" margin:0; width: 350px;">
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
            <div id = "br-b127-prn1" style="  margin:0; width: 350px;">
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
             <div id = "br-b111-prn1" style="  margin:0; width: 350px;">
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
            <div id = "br-b126-prn1" style=" margin:0; width: 350px;">
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
           <div id = "br-b213-prn2" style="  margin:0; width: 350px;">
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
            <div id = "br-b216-prn1" style="  margin:0; width: 350px;">
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
           <div id = "br-b303-prn1" style="  margin:0; width: 350px;">
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
            <div id = "br-b307-prn1" style=" margin:0; width: 350px;">
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
            <div id = "br-c172-prn1" style="margin:0; width: 350px;">
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
            <div id = "br-c102-prn1" style=" margin:0; width: 350px;">
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
            <div id = "br-c138-prn2" style="  margin:0; width: 350px;">
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
           <div id = "br-c210-prn3" style="  margin:0; width: 350px;">
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
            <div id = "br-c268-prn1" style=" margin:0; width: 350px;">
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
            <div id = "br-c238-prn2" style=" margin:0; width: 350px;">
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
           <div id = "br-c300-prn1" style="  margin:0; width: 350px;">
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
            <div id = "br-c318-prn1" style="  margin:0; width: 350px;">
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
           <div id = "br-h109-prn2" style=" margin:0; width: 350px;">
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
           <div id = "br-h200-prn1" style="  margin:0; width: 350px;">
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
            <div id = "br-h242-prn2" style=" margin:0; width: 350px;">
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
           <div id = "br-h300-prn1" style="  margin:0; width: 350px;">
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
            <div id = "br-h310-prn2" style="  margin:0; width: 350px;">
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
            <div id = "br-h318-prn2" style="  margin:0; width: 350px;">
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
           <div id = "br-j124-prn5" style="  margin:0; width: 350px;">
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
            <div id = "br-j124-prn6" style=" margin:0; width: 350px;">
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
            <div id = "br-j100-prn1" style=" margin:0; width: 350px;">
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
           <div id = "br-j212-prn2" style=" margin:0; width: 350px;">
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
            <div id = "br-j214-prn4" style=" margin:0; width: 350px;">
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
            <div id = "br-j214-prn5" style=" margin:0; width: 350px;">
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
           <div id = "br-j310-prn2" style="  margin:0; width: 350px;">
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
            <div id = "br-j314-prn3" style=" margin:0; width: 350px;">
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
            <div id = "br-j314-prn4" style="  margin:0; width: 350px;">
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
           <div id = "br-m4-prn2" style=" margin:0;">
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
            <div id = "br-m25-prn1" style=" margin:0;">
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
       </div>
    </body>
</html>