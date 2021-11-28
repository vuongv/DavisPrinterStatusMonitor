
global.myJSONtopbar = "";
global.myJSONbotbar = "";
function printerWebScraping(hostname){

    const puppeteer = require('puppeteer');
    var printerHostname = hostname;
    (async ()=> {

        let printerURL = "http://"+printerHostname+".internal/cgi-bin/dynamic/topbar.html";
        let browser = await puppeteer.launch();
        let page = await browser.newPage();

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
       
        myJSONtopbar = JSON.stringify(data);    
        await browser.close();

        let printerURL2 = "http://"+printerHostname+".internal/cgi-bin/dynamic/printer/PrinterStatus.html";
        let browser2 = await puppeteer.launch();
        let page2 = await browser2.newPage();

        await page2.goto(printerURL2, {waitUntil: 'networkidle2'});
        let data2 = await page2.evaluate(()=>{

            let toner = document.querySelector('.status_table tr:nth-of-type(4) td table tr td ').width;
            let Printer_Toner_Percentage = toner.replace("%","");
            let Printer_Tray1_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td' ).innerText;
            let Printer_Tray1_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td:nth-of-type(2) p table tr td b').innerText;
            let Printer_Tray1_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td:nth-of-type(4) ').innerText;
            let Printer_Tray2_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td' ).innerText;
            let Printer_Tray2_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td:nth-of-type(2) p table tr td b').innerText;
            let Printer_Tray2_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td:nth-of-type(4) ').innerText;
            let Printer_Tray3_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td' ).innerText;;
            let Printer_Tray3_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;;
            let Printer_Tray3_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(4) ').innerText;
            let Printer_Tray4_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td' ).innerText;
            let Printer_Tray4_Status = "NA";
            let Printer_Tray4_Type = "NA";
            let mainkitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(5) td:nth-of-type(2) ').innerText;
            let Printer_MaintKitLife = mainkitlife.replace("%","");
            let rollerkitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
            let Printer_RollerKitLife = rollerkitlife.replace("%","");
            let imagingunitlife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(7) td:nth-of-type(2) ').innerText;
            let Printer_ImagingUnitLife = imagingunitlife.replace("%","");
            let Printer_MultiPurposeFeeder_Name;
            let Printer_MultiPurposeFeeder_Status;
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
        myJSONbotbar = JSON.stringify(data2);
        await browser2.close();

        var PrinterTopBar = JSON.parse(myJSONtopbar);
        var PrinterBotBar = JSON.parse(myJSONbotbar);

        console.log("Printer Status: " + PrinterTopBar.Printer_Status);
        console.log("Printer Hostname: " + PrinterTopBar.Printer_Hostname);
        console.log("Printer IP address: " + PrinterTopBar.Printer_Ipv4);
        console.log("Printer Model: " + PrinterTopBar.Printer_Model);
        console.log("Printer ContactName: " + PrinterTopBar.Printer_SerialNumber);
        console.log("Printer Tonner Percentage: " + PrinterBotBar.Printer_Toner_Percentage);
        console.log("Printer Tray 1 Status: " + PrinterBotBar.Printer_Tray1_Status + " - Type: " + PrinterBotBar.Printer_Tray1_Type);
        console.log("Printer Tray 2 Status: " + PrinterBotBar.Printer_Tray2_Status + " - Type: " + PrinterBotBar.Printer_Tray2_Type);
        console.log("Printer Tray 3 Status: " + PrinterBotBar.Printer_Tray3_Status + " - Type: " + PrinterBotBar.Printer_Tray3_Type);
        console.log("Printer Tray 4 Status: " + PrinterBotBar.Printer_Tray4_Status + " - Type: " + PrinterBotBar.Printer_Tray4_Type);
        console.log("Printer Multi-Purpose Feeder Status: " + PrinterBotBar.Printer_MultiPurposeFeeder_Status);
        console.log("Printer Maintenance Kit Life: " + PrinterBotBar.Printer_MaintKitLife);
        console.log("Printer Roller Kit Life: " + PrinterBotBar.Printer_RollerKitLife);
        console.log("Printer Imaging Unit Life: " + PrinterBotBar.Printer_ImagingUnitLife);
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
          console.log(PrinterTopBar.Printer_Hostname + " is collected");
    })(); 

}



var timeleft = 20;
let PrinterArray = [];
const lineReader = require('line-reader');
lineReader.eachLine('Printers2.txt',(line,last) => {
    PrinterArray.push(line);
 });
var timer = setInterval(countdown , 1000);

function countdown(){
    if (timeleft == -1) {
       for(var i = 0; i<PrinterArray.length;i++){
            console.log(PrinterArray[i]);
            printerWebScraping(PrinterArray[i]);           
       }
       
        timeleft = 20;
        
    } else {
        console.log(timeleft)
        timeleft--;
    }
}
