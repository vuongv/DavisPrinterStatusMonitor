function Printer_WebScraping(){
    const puppeteer = require('puppeteer');
    var Printer_Hostname = "br-h310-prn2";
    (async ()=> {
        let printerURL = "http://"+Printer_Hostname+".internal/cgi-bin/dynamic/topbar.html";
        let browser = await puppeteer.launch();
        let page = await browser.newPage();

        await page.goto(printerURL, {waitUntil: 'networkidle2'});
        let data = await page.evaluate(()=>{

            let Printer_Status = document.querySelector('.statusBox tr td font').innerText;
            let hostname = document.querySelector('.top_bar td:nth-of-type(3) b:nth-of-type(3)').innerText;
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
    })
}
Printer_WebScraping();