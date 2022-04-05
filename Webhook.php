const botToken = 'token do bot';
const sheetId = 'Id da Excel';
const googleWebAppUrl = 'link do script da incrementação do AppScript';

function setWebHook() {

const url = 'https://api.telegram.org/bot' + botToken + '/setWebhook?url=' + googleWebAppUrl;
const response = UrlFetchApp.fetch(url);
console.log(response.getContentText());

}

function doPost(e){

const data = JSON.parse(e.postData.contents);
const sheet = SpreadsheetApp.openById(sheetId).getSheets()[0];

sheet.appendRow([new Date(), data.message.from.first_name , data.message.from.last_name , data.message.text]);

}

