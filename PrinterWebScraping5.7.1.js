const { setInterval } = require('timers');

function Printer_Info(Printer_Status,Printer_Hostname,Printer_Ipv4,Printer_Model,Printer_SerialNumber,Printer_Toner_Percentage,Printer_Tray1_Status,Printer_Tray1_Type,Printer_Tray2_Status,Printer_Tray2_Type,Printer_Tray3_Status,Printer_Tray3_Type,Printer_Tray4_Status,Printer_Tray4_Type,Printer_MultiPurposeFeeder_Status,Printer_MaintKitLife,Printer_RollerKitLife,Printer_ImagingUnitLife){
    console.log(">--Printer Status: " + Printer_Status);
    console.log(">--Printer Hostname: " + Printer_Hostname);
    console.log(">--Printer IP address: " + Printer_Ipv4);
    console.log(">--Printer Model: " + Printer_Model);
    console.log(">--Printer ContactName: " + Printer_SerialNumber);
    console.log(">--Printer Tonner Percentage: " + Printer_Toner_Percentage);
    console.log(">--Printer Tray 1 Status: " + Printer_Tray1_Status + " - Type: " + Printer_Tray1_Type);
    console.log(">--Printer Tray 2 Status: " + Printer_Tray2_Status + " - Type: " + Printer_Tray2_Type);
    console.log(">--Printer Tray 3 Status: " + Printer_Tray3_Status + " - Type: " + Printer_Tray3_Type);
    console.log(">--Printer Tray 4 Status: " + Printer_Tray4_Status + " - Type: " + Printer_Tray4_Type);
    console.log(">--Printer Multi-Purpose Feeder Status: " + Printer_MultiPurposeFeeder_Status);
    console.log(">--Printer Maintenance Kit Life: " + Printer_MaintKitLife);
    console.log(">--Printer Roller Kit Life: " + Printer_RollerKitLife);
    console.log(">--Printer Imaging Unit Life: " + Printer_ImagingUnitLife);
}

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
                    let Printer_Status1 = document.querySelector('.statusBox tr td font').innerText;
                    let Printer_Status2 = document.querySelector('.statusBox tr:nth-of-type(2) td font').innerText;
                    let hostname = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(3)').innerText
                    let Printer_Hostname = hostname.substring(10);
                    let ipv4 = document.querySelector('.top_bar td:nth-of-type(3) b').innerText;
                    let Printer_Ipv4 = ipv4.substring(9);
                    let Printer_Model = document.querySelector('.top_prodname').innerText;
                    let contact_name = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(2)').innerText;
                    let Printer_SerialNumber = contact_name.substring(14);
                
                    return {
                        Printer_Status1,
                        Printer_Status2,
                        Printer_Hostname,
                        Printer_Ipv4,
                        Printer_Model,
                        Printer_SerialNumber
                    }
                });
    
                console.log("--Top Bar collected");
                printerJSONTopBarInfo = JSON.stringify(data);    
                await browser.close();
                console.log("->Browser 1 is closed");
                var PrinterTopBar = JSON.parse(printerJSONTopBarInfo);
                
                let printerURL2 = "http://"+PrinterHostname+".internal/cgi-bin/dynamic/printer/PrinterStatus.html";
                let browser2 = await puppeteer.launch();
                console.log("-Browser 2 is open");
                let page2 = await browser2.newPage();
                console.log("-Browser 2 open page"); 
                await page2.goto(printerURL2, {waitUntil: 'networkidle2'});

                let data2 = await page2.evaluate((PrinterTopBar)=>{
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
                    let Printer_MaintKitLife = -1;
                    let rollerkitlife = "";
                    let Printer_RollerKitLife = -1;
                    let imagingunitlife = "";
                    let Printer_ImagingUnitLife = -1;
                    let pckitlife = "";
                    let Printer_PCKitLife = -1;

                    switch(PrinterTopBar.Printer_Model){
                        case "Lexmark X864de":
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
                            pckitlife = document.querySelector('.status_table:nth-of-type(4) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
                            Printer_PCKitLife = pckitlife.replace("%","");
                            break;
                        case "Lexmark XM9155":
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
                            break;
                        case "Lexmark XM7155":
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

                            var determine = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(1)').innerText;
                            if(determine == "Imaging Unit Life Remaining:"){
                                imagingunitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(2)').innerText;
                                Printer_ImagingUnitLife = imagingunitlife.replace("%","");
                            }else{
                                rollerkitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
                                Printer_RollerKitLife = rollerkitlife.replace("%","");
                                imagingunitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(7) td:nth-of-type(2) ').innerText;
                                Printer_ImagingUnitLife = imagingunitlife.replace("%","");
                            }
                            
                            break;        
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
                        Printer_ImagingUnitLife,
                        Printer_PCKitLife
                    }
                    
            },PrinterTopBar);
            console.log("--Bot Bar Collected");
            printerJSONBotBarInfo = JSON.stringify(data2);
            await browser2.close();
            console.log("->Browser 2 is closed");
            var PrinterBotBar = JSON.parse(printerJSONBotBarInfo);

            var mysql = require('mysql');
            var con = mysql.createConnection({
                host: "vuongv.dev.fast.sheridanc.on.ca",
                user: "vuongv_brlabt1",
                password: "J4yx87Au7j8c6V"
            });
           
                con.connect(function(err) {
                    if (err) throw err;
                    console.log("Connected!");
                    var sql = "INSERT INTO `vuongv_PrinterData`.`Collector` (`UserName`,`Date_Capture`, `Printer_Status1`,`Printer_Status2`, `Printer_Hostname`, `Printer_IPv4`, `Printer_Model`, `Printer_Contact_Name`, `Printer_Toner_Percentage`, `Printer_Tray1_Status`, `Printer_Tray1_Type`, `Printer_Tray2_Status`, `Printer_Tray2_Type`, `Printer_Tray3_Status`, `Printer_Tray3_Type`, `Printer_Tray4_Status`, `Printer_Tray4_Type`, `Printer_MultiPurposeFeeder_Status`, `Printer_MaintKitLife`, `Printer_RollerKitLife`, `Printer_ImagingUnitLife`,`Printer_PCKitLife`) VALUES ('brlabt1',NOW(),'"+PrinterTopBar.Printer_Status1+"','"+PrinterTopBar.Printer_Status2+"','"+PrinterTopBar.Printer_Hostname+"','"+PrinterTopBar.Printer_Ipv4+"','"+PrinterTopBar.Printer_Model+"','"+PrinterTopBar.Printer_SerialNumber+"','"+PrinterBotBar.Printer_Toner_Percentage+"','"+PrinterBotBar.Printer_Tray1_Status+"','"+PrinterBotBar.Printer_Tray1_Type+"','"+PrinterBotBar.Printer_Tray2_Status+"','"+PrinterBotBar.Printer_Tray2_Type+"','"+PrinterBotBar.Printer_Tray3_Status+"','"+PrinterBotBar.Printer_Tray3_Type+"','"+PrinterBotBar.Printer_Tray4_Status+"','"+PrinterBotBar.Printer_Tray4_Type+"','"+PrinterBotBar.Printer_MultiPurposeFeeder_Status+"','"+PrinterBotBar.Printer_MaintKitLife+"','"+PrinterBotBar.Printer_RollerKitLife+"','"+PrinterBotBar.Printer_ImagingUnitLife+"','"+PrinterBotBar.Printer_PCKitLife+"');";
                    con.query(sql, function (err, result) {
                        if (err) throw err;
                    console.log("1 record inserted");
                    con.end();
                    });
                });
                
        }catch (e){
            console.log(PrinterHostname+ ", Connection Timeout");
                    }
        
    })();
}

function Load_Config(filepath){
    let PrinterArray = [];
    const lineReader = require('line-reader');
    lineReader.eachLine(filepath,(line,last) => {
        PrinterArray.push(line);
     });
    return PrinterArray;
}
global.printer1 = "";
global.printer2 = "";
function Time_Controller(){
    var configFile = "Printers3.txt";
    console.log("->"+configFile+ " is config file");
    console.log("->Loading " +configFile+" Config File");
    let PrinterArray = Load_Config(configFile);
    
    setTimeout(() => {
        console.log("->"+PrinterArray.length + " printers found");
        if(PrinterArray.length == 0){
            console.log("->Failure to load config file");
        }else{
            console.log("->Load config file successfully");
            var d = new Date();
            var h = d.getHours();
            console.log("*TIMER INTIATED*");
            var timeleft = 5;
            console.log(timeleft + " is set");
            console.log("->Countdown begin of " +timeleft);
            var timer = setInterval(() => {
                var i = 0;
                if (timeleft == -1) {
                    var d = new Date();
                    var h = d.getHours();
                
                    if(h>7 && h<23){
                        (async ()=>{
                            for(var i = 0; i<PrinterArray.length; i++){
                                await Printer_WebScraping(PrinterArray[i]);
                                console.log("-------------------------");
                            }
                        })();
                    
                    }else{
                        console.log("Data Collector will start at 7:00 AM and end at 11:00 PM ");
                    }
                    delete d;
                    delete h;
                    console.log("->Timer reset");
                    timeleft = 300;
                    } else {
                        console.log(timeleft)
                        timeleft--;
                    }
                
            }, 1000);
        }
    }, 5000);
}
function main(){
    Time_Controller();
}
main();


