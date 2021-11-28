async function Printer_WebScraping(PrinterHostname){
    var printerJSONTopBarInfo = "";
    var printerJSONBotBarInfo = "";
    
    const puppeteer = require('puppeteer');
    console.log("*WEB SCRAPING INTIATED*");
    console.log(">>Hostname: "+PrinterHostname);
    await (async () => {
        
            

            try{   
                let printerURL = "http://"+PrinterHostname+".internal/cgi-bin/dynamic/topbar.html";
                let browser = await puppeteer.launch();
                console.log("-Browser 1 is open");
                let page = await browser.newPage();
                console.log("-Browser 1 open page");
                

                await page.goto(printerURL, {waitUntil: 'networkidle2'});
                let data = await page.evaluate(()=>{
                    let Printer_Status = document.querySelector('.statusBox tr td font').innerText;
                    let hostname = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(3)').innerText
                    let Printer_Hostname = hostname.substring(10);
                    let ipv4 = document.querySelector('.top_bar td:nth-of-type(3) b').innerText;
                    let Printer_Ipv4 = ipv4.substring(9);
                    let Printer_Model = document.querySelector('.top_prodname').innerText;
                    let contact_name = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(2)').innerText;
                    let Printer_SerialNumber = contact_name.substring(14);
                
                    return {
                        Printer_Status,
                        Printer_Hostname,
                        Printer_Ipv4,
                        Printer_Model,
                        Printer_SerialNumber
                    }
                });
                console.log(data);
                console.log("--Top Bar collected");
                printerJSONTopBarInfo = JSON.stringify(data);    
                await browser.close();
                console.log("->Browser 1 is closed");

                let printerURL2 = "http://"+PrinterHostname+".internal/cgi-bin/dynamic/printer/PrinterStatus.html";
                let browser2 = await puppeteer.launch();
                console.log("-Browser 2 is open");
                let page2 = await browser2.newPage();
                console.log("-Browser 2 open page"); 
                await page2.goto(printerURL2, {waitUntil: 'networkidle2'});

                let data2 = await page2.evaluate(()=>{
                    let toner = document.querySelector('.status_table tr:nth-of-type(4) td table tr td ').width;
                    let Printer_Toner_Percentage = toner.replace("%","");
                    
                    let Printer_Tray1_Name ="";
                    let Printer_Tray1_Status ="";
                    let Printer_Tray1_Type = "";
                    let Printer_Tray2_Name = "";
                    let Printer_Tray2_Status = "";
                    let Printer_Tray2_Type = "";
                    let Printer_Tray3_Name = "";
                    let Printer_Tray3_Status = "NA";
                    let Printer_Tray3_Type = "NA";
                    let Printer_Tray4_Name = "NA";
                    let Printer_Tray4_Status = "NA";
                    let Printer_Tray4_Type = "NA";
                    let Printer_MultiPurposeFeeder_Name ="";
                    let Printer_MultiPurposeFeeder_Status= "";

                    let mainkitlife = "";
                    let Printer_MaintKitLife = "";
                    let rollerkitlife = "";
                    let Printer_RollerKitLife = "";
                    let imagingunitlife = "";
                    let Printer_ImagingUnitLife = "";
                    
                    var catchError;
                    try{
                        Printer_Tray1_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td' ).innerText;
                        Printer_Tray1_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td:nth-of-type(2) p table tr td b').innerText;
                        Printer_Tray1_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td:nth-of-type(4) ').innerText;
                        Printer_Tray2_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td' ).innerText;
                        Printer_Tray2_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td:nth-of-type(2) p table tr td b').innerText;
                        Printer_Tray2_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td:nth-of-type(4) ').innerText;
                        
                        Printer_Tray3_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td' ).innerText;
                        Printer_Tray3_Status = "NA";
                        Printer_Tray3_Type = "NA";
                        Printer_Tray4_Name = "NA";
                        Printer_Tray4_Status = "NA";
                        Printer_Tray4_Type = "NA";
                
                        if(Printer_Tray3_Name == "Tray 3"){
                            Printer_Tray3_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;
                            Printer_Tray3_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(4) ').innerText;
                            console.log("Tray 3 exist");
                            Printer_Tray4_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td' ).innerText;
                            if (Printer_Tray4_Name == "Multi-Purpose Feeder"){
                                Printer_MultiPurposeFeeder_Name = Printer_Tray4_Name;
                                Printer_Tray4_Name = "NA";
                                Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
                            }else{
                                Printer_Tray4_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
                                Printer_Tray4_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(4) ').innerText;
                                Printer_MultiPurposeFeeder_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(7) td' ).innerText;
                                Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(7) td:nth-of-type(2) p table tr td b').innerText;
                            }
                        }else if(Printer_Tray3_Name == "Multi-Purpose Feeder"){
                            console.log("Tray 3 doesn't exist");
                            Printer_MultiPurposeFeeder_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;
                            Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;
                        }

                        mainkitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(5) td:nth-of-type(2) ').innerText;
                        Printer_MaintKitLife = mainkitlife.replace("%","");
                        rollerkitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
                        Printer_RollerKitLife = rollerkitlife.replace("%","");
                        imagingunitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(7) td:nth-of-type(2) ').innerText;
                        Printer_ImagingUnitLife = imagingunitlife.replace("%","");
                    }catch(e){
                        catchError = true;
                    }
                    if(catchError == true){
                        try{
                            Printer_Tray1_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(3) td:nth-of-type(2) p table tr td b').innerText;
                            Printer_Tray1_Type = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(3) td:nth-of-type(4) ').innerText;
                            Printer_Tray2_Name = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(4) td' ).innerText;
                            Printer_Tray2_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(4) td:nth-of-type(2) p table tr td b').innerText;
                            Printer_Tray2_Type = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(4) td:nth-of-type(4) ').innerText;
                            
                            Printer_Tray3_Name = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(5) td' ).innerText;
                            Printer_Tray3_Status = "NA";
                            Printer_Tray3_Type = "NA";
                            Printer_Tray4_Name = "NA";
                            Printer_Tray4_Status = "NA";
                            Printer_Tray4_Type = "NA";
                    
                            if(Printer_Tray3_Name == "Tray 3"){
                                Printer_Tray3_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;
                                Printer_Tray3_Type = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(5) td:nth-of-type(4) ').innerText;
                                console.log("Tray 3 exist");
                                Printer_Tray4_Name = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(6) td' ).innerText;
                                if (Printer_Tray4_Name == "Multi-Purpose Feeder"){
                                    Printer_MultiPurposeFeeder_Name = Printer_Tray4_Name;
                                    Printer_Tray4_Name = "NA";
                                    Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
                                }else{
                                    Printer_Tray4_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
                                    Printer_Tray4_Type = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(6) td:nth-of-type(4) ').innerText;
                                    Printer_MultiPurposeFeeder_Name = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(7) td' ).innerText;
                                    Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(7) td:nth-of-type(2) p table tr td b').innerText;
                                }
                            }else if(Printer_Tray3_Name == "Multi-Purpose Feeder"){
                                console.log("Tray 3 doesn't exist");
                                Printer_MultiPurposeFeeder_Name = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;
                                Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(2) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;
                            }
                            mainkitlife = document.querySelector('.status_table:nth-of-type(4) tr:nth-of-type(5) td:nth-of-type(2) ').innerText;
                            Printer_MaintKitLife = mainkitlife.replace("%","");
                            rollerkitlife = document.querySelector('.status_table:nth-of-type(4) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
                            Printer_RollerKitLife = rollerkitlife.replace("%","");
                            imagingunitlife = document.querySelector('.status_table:nth-of-type(4) tr:nth-of-type(7) td:nth-of-type(2) ').innerText;
                            Printer_ImagingUnitLife = imagingunitlife.replace("%","");
                        }catch(e){
                        }
                   }
                   
                    return {
                        Printer_Toner_Percentage,
                        Printer_Tray1_Name,
                        Printer_Tray1_Status,
                        Printer_Tray1_Type,
                        Printer_Tray2_Name,
                        Printer_Tray2_Status,
                        Printer_Tray2_Type,
                        Printer_Tray3_Name,
                        Printer_Tray3_Status,
                        Printer_Tray3_Type,
                        Printer_Tray4_Name,
                        Printer_Tray4_Status,
                        Printer_Tray4_Type,
                        Printer_MultiPurposeFeeder_Name,
                        Printer_MultiPurposeFeeder_Status,
                        Printer_MaintKitLife,
                        Printer_RollerKitLife,
                        Printer_ImagingUnitLife
                        
                    }
                    
            });
            console.log(data2);
            console.log("--Bot Bar Collected");
            printerJSONBotBarInfo = JSON.stringify(data2);
            await browser2.close();
            console.log("->Browser 2 is closed");
           
            var PrinterTopBar = JSON.parse(printerJSONTopBarInfo);
            var PrinterBotBar = JSON.parse(printerJSONBotBarInfo);

            var mysql = require('mysql');
            var con = mysql.createConnection({
                host: "vuongv.dev.fast.sheridanc.on.ca",
                user: "vuongv",
                password: "Q3sLpnT@3E!&M"
            });
           
                con.connect(function(err) {
                    if (err) throw err;
                    console.log("Connected!");
                    var sql = "INSERT INTO `vuongv_PrinterData`.`Collector` (`Date_Capture`, `Printer_Status`, `Printer_Hostname`, `Printer_IPv4`, `Printer_Model`, `Printer_Contact_Name`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, `Printer_MultiPurposeFeeder_Status`, `Printer_MaintKitLife`, `Printer_RollerKitLife`, `Printer_ImagingUnitLife`) VALUES (NOW(),'"+PrinterTopBar.Printer_Status+"','"+PrinterTopBar.Printer_Hostname+"','"+PrinterTopBar.Printer_Ipv4+"','"+PrinterTopBar.Printer_Model+"','"+PrinterTopBar.Printer_SerialNumber+"','"+PrinterBotBar.Printer_Toner_Percentage+"','"+PrinterBotBar.Printer_Tray1_Status+"','"+PrinterBotBar.Printer_Tray1_Type+"','"+PrinterBotBar.Printer_Tray2_Status+"','"+PrinterBotBar.Printer_Tray2_Type+"','"+PrinterBotBar.Printer_Tray3_Status+"','"+PrinterBotBar.Printer_Tray3_Type+"','"+PrinterBotBar.Printer_Tray4_Status+"','"+PrinterBotBar.Printer_Tray4_Type+"','"+PrinterBotBar.Printer_MultiPurposeFeeder_Status+"','"+PrinterBotBar.Printer_MaintKitLife+"','"+PrinterBotBar.Printer_RollerKitLife+"','"+PrinterBotBar.Printer_ImagingUnitLife+"');";
                    con.query(sql, function (err, result) {
                        if (err) throw err;
                    console.log("1 record inserted");
                    });
                });
            
           

        }catch (e){
            console.log(PrinterHostname+ ", Connection Timeout");
        }
        
    })();
}
Printer_WebScraping("br-h300-prn1");