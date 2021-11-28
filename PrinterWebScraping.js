

function webScrapingTopBar(){
    const puppeteer = require('puppeteer');

    (async ()=> {

        let printerURL = "http://br-a103-prn1.internal/cgi-bin/dynamic/topbar.html";
        let browser = await puppeteer.launch();
        let page = await browser.newPage();

        await page.goto(printerURL, {waitUntil: 'networkidle2'});
        let data = await page.evaluate(()=>{

            let Printer_Status = document.querySelector('.statusBox tr td font').innerText;
            let Printer_Hostname = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(3)').innerText;
            let Printer_Ipv4 = document.querySelector('.top_bar td:nth-of-type(3) b').innerText;
            let Printer_Model = document.querySelector('.top_prodname').innerText;
            let Printer_Contact_Name = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(2)').innerText;
            return {
                Printer_Status,
                Printer_Hostname,
                Printer_Ipv4,
                Printer_Model,
                Printer_Contact_Name
        
            }
            
        });
        console.log(data);
        
        
        await browser.close();
        return data;
    })();
}


function webScrapingBotBar(){
    const puppeteer = require('puppeteer');

    (async ()=> {

        let printerURL = "http://br-a103-prn1.internal/cgi-bin/dynamic/printer/PrinterStatus.html";
        let browser = await puppeteer.launch();
        let page = await browser.newPage();

        await page.goto(printerURL, {waitUntil: 'networkidle2'});
        let data = await page.evaluate(()=>{

            let Printer_Toner_Percentage = document.querySelector('.status_table tr:nth-of-type(4) td table tr td ').width;
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
            let Printer_MaintKitLife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(5) td:nth-of-type(2) ').innerText;
            let Printer_RollerKitLife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
            let Printer_ImagingUnitLife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(7) td:nth-of-type(2) ').innerText;
            let Printer_MultiPurposeFeeder;
            let Printer_MultiPurposeFeeder_Status;
            if (Printer_Tray4_Name == "Multi-Purpose Feeder"){
                Printer_MultiPurposeFeeder = Printer_Tray4_Name;
                Printer_Tray4_Name = "NA";
                Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
            }else{
                Printer_Tray4_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
                Printer_Tray4_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(4) ').innerText;
                Printer_MultiPurposeFeeder = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(7) td' ).innerText;
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
                Printer_MultiPurposeFeeder,
                Printer_MultiPurposeFeeder_Status,
                Printer_MaintKitLife,
                Printer_RollerKitLife,
                Printer_ImagingUnitLife
            }
        });
        console.log(data);
        
        await browser.close();
        
        
    })();
}

webScrapingTopBar();
webScrapingBotBar();
