var selectBox = document.getElementById("selectedCoin");
var desiredBox = document.getElementById("desiredCoin");
selectCoin = selectBox.options[selectBox.selectedIndex].value;
desiredCoin = desiredBox.options[desiredBox.selectedIndex].value;
api_url="http://rest.coinapi.io/v1/exchangerate/" + selectCoin + "/" + desiredCoin +"?apiKey=E6E4F34B-C76F-412F-8253-9F4A684CC43E";

async function getapi() {
    
    // Storing response
    const response = await fetch(api_url);
    
    // Storing data in form of JSON
    data = await response.json();
    console.log(data);
    if (response) {
        calculateResult();
    }
}

function calculateResult(){
    selectCoin = selectBox.options[selectBox.selectedIndex].value;
    desiredCoin = selectBox.options[desiredBox.selectedIndex].value;
    api_url="http://rest.coinapi.io/v1/exchangerate/" + selectCoin + "/" + desiredCoin +"?apiKey=E6E4F34B-C76F-412F-8253-9F4A684CC43E";
    for (var key in data) {
        if(key == "rate"){
            var result = document.getElementById("amount").value * data[key];
            console.log(result);
            break;
        }
    }
    document.getElementById("showResult").value = result; 
}

getapi();