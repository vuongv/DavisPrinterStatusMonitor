class Printer {
    constructor(){
        this.status = "";
        this.hostname = "";
        this.ipv4 = "";
        this.model = "";
        this.contact_name = "";
        this.tonner = "";
        this.tray1_status = "";
        this.tray1_type = "";
        this.tray2_status = "";
        this.tray2_type = "";
        this.tray3_status = "";
        this.tray3_type = "";
        this.tray4_status = "";
        this.tray4_type = "";
        this.multipurposefeeder_status = "";
        this.maintkitlife = "";
        this.rollerkitlife = "";
        this.imagingunitlife = "";
    }
    setTopBar(status,hostname, ipv4, model, contact_name){
        this.status = status;
        this.hostname = hostname;
        this.ipv4 = ipv4;
        this.model = model;
        this.contact_name = contact_name;
    }
    setBotBar(tonner, tray1_status, tray1_type, tray2_status, tray2_type, tray3_status, tray3_type, tray4_status, tray4_type, multipurposefeeder_status, maintkitlife, rollerkitlife, imagingunitlife){
        this.tonner = tonner;
        this.tray1_status = tray1_status;
        this.tray1_type = tray1_type;
        this.tray2_status = tray2_status;
        this.tray2_type = tray2_type;
        this.tray3_status = tray3_status;
        this.tray3_type = tray3_type;
        this.tray4_status = tray4_status;
        this.tray4_type = tray4_type;
        this.multipurposefeeder_status = multipurposefeeder_status;
        this.maintkitlife = maintkitlife;
        this.rollerkitlife = rollerkitlife;
        this.imagingunitlife = imagingunitlife;
    }
    printPrinterInfo(){
        console.log("Printer Status: " + this.status);
        console.log("Printer Hostname: " + this.hostname);
        console.log("Printer IP address: " + this.ipv4);
        console.log("Printer Model: " + this.model);
        console.log("Printer ContactName: " + this.contact_name);
        console.log("Printer Tonner Percentage: " + this.tonner);
        console.log("Printer Tray 1 Status: " + this.tray1_status + " - Type: " + this.tray1_type);
        console.log("Printer Tray 2 Status: " + this.tray2_status + " - Type: " + this.tray2_type);
        console.log("Printer Tray 3 Status: " + this.tray3_status + " - Type: " + this.tray3_type);
        console.log("Printer Tray 4 Status: " + this.tray4_status + " - Type: " + this.tray4_type);
        console.log("Printer Multi-Purpose Feeder Status: " + this.multipurposefeeder_status);
        console.log("Printer Maintenance Kit Life: " + this.maintkitlife);
        console.log("Printer Roller Kit Life" + this.rollerkitlife);
        console.log("Printer Imaging Unit Life" + this.imagingunitlife);
    }
}


function webScraping(){
    const puppeteer = require('puppeteer');
    
    
    (async ()=> {
        let printerArray = [];
        let printerURL = "http://br-a103-prn1.internal/cgi-bin/dynamic/topbar.html";
        let browser = await puppeteer.launch();
        let page = await browser.newPage();
        
        await page.goto(printerURL, {waitUntil: 'networkidle2'});
        let data = await page.evaluate(()=>{
            var printerWebScraping = {
                printStuff: function(){
                    console.log("stuff");
                }
            }
            let Printer_Status = document.querySelector('.statusBox tr td font').innerText;
            let Printer_Hostname = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(3)').innerText;
            let Printer_Ipv4 = document.querySelector('.top_bar td:nth-of-type(3) b').innerText;
            let Printer_Model = document.querySelector('.top_prodname').innerText;
            let Printer_Contact_Name = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(2)').innerText;
            // printerWeb.setTopBar(Printer_Status,Printer_Hostname,Printer_Ipv4,Printer_Model,Printer_Contact_Name);
           printerArray.push(Printer_Status);
            return {
                Printer_Status,
                Printer_Hostname,
                Printer_Ipv4,
                Printer_Model,
                Printer_Contact_Name
        
            }
            
        });
        
        console.log(printerArray[0]);
        await browser.close();

        // let printerURL2 = "http://br-a103-prn1.internal/cgi-bin/dynamic/printer/PrinterStatus.html";
        // let browser2 = await puppeteer.launch();
        // let page2 = await browser2.newPage();

        // await page2.goto(printerURL2, {waitUntil: 'networkidle2'});
        // let data2 = await page2.evaluate(()=>{

        //     let Printer_Toner_Percentage = document.querySelector('.status_table tr:nth-of-type(4) td table tr td ').width;
        //     let Printer_Tray1_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td' ).innerText;
        //     let Printer_Tray1_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td:nth-of-type(2) p table tr td b').innerText;
        //     let Printer_Tray1_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(3) td:nth-of-type(4) ').innerText;
        //     let Printer_Tray2_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td' ).innerText;
        //     let Printer_Tray2_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td:nth-of-type(2) p table tr td b').innerText;
        //     let Printer_Tray2_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(4) td:nth-of-type(4) ').innerText;
        //     let Printer_Tray3_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td' ).innerText;;
        //     let Printer_Tray3_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(2) p table tr td b').innerText;;
        //     let Printer_Tray3_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(5) td:nth-of-type(4) ').innerText;
        //     let Printer_Tray4_Name = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td' ).innerText;
        //     let Printer_Tray4_Status = "NA";
        //     let Printer_Tray4_Type = "NA";
        //     let Printer_MaintKitLife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(5) td:nth-of-type(2) ').innerText;
        //     let Printer_RollerKitLife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(6) td:nth-of-type(2) ').innerText;
        //     let Printer_ImagingUnitLife = document.querySelector('.status_table:nth-of-type(5) tr:nth-of-type(7) td:nth-of-type(2) ').innerText;
        //     let Printer_MultiPurposeFeeder;
        //     let Printer_MultiPurposeFeeder_Status;
        //     if (Printer_Tray4_Name == "Multi-Purpose Feeder"){
        //         Printer_MultiPurposeFeeder = Printer_Tray4_Name;
        //         Printer_Tray4_Name = "NA";
        //         Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
        //     }else{
        //         Printer_Tray4_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(2) p table tr td b').innerText;
        //         Printer_Tray4_Type = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(6) td:nth-of-type(4) ').innerText;
        //         Printer_MultiPurposeFeeder = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(7) td' ).innerText;
        //         Printer_MultiPurposeFeeder_Status = document.querySelector('.status_table:nth-of-type(3) tr:nth-of-type(7) td:nth-of-type(2) p table tr td b').innerText;
        //     }
            
        //     return {
        //         Printer_Toner_Percentage,
        //         Printer_Tray1_Name,
        //         Printer_Tray1_Status,
        //         Printer_Tray1_Type,
        //         Printer_Tray2_Name,
        //         Printer_Tray2_Status,
        //         Printer_Tray2_Type,
        //         Printer_Tray3_Name,
        //         Printer_Tray3_Status,
        //         Printer_Tray3_Type,
        //         Printer_Tray4_Name,
        //         Printer_Tray4_Status,
        //         Printer_Tray4_Type,
        //         Printer_MultiPurposeFeeder,
        //         Printer_MultiPurposeFeeder_Status,
        //         Printer_MaintKitLife,
        //         Printer_RollerKitLife,
        //         Printer_ImagingUnitLife
        //     }
        // });
        // console.log(data2);
        
        // await browser2.close();
    })();
    
}

webScraping();

