const localData = [];

const XMLHttpRequestLoadData = () => {
    var httpRequest;

    function getdata() {
        var data;
        if (httpRequest.status === 200 && httpRequest.readyState === 4) {
            data = JSON.parse(httpRequest.responseText);
            var headers = httpRequest.getAllResponseHeaders().replace(/\r\n/g, "\r\n<br>");
            handleDataFromServer(data, headers);
        }
    };
    try {
        httpRequest = new XMLHttpRequest();
        httpRequest.abort();//close any prev connection
        httpRequest.open("post", "data.php", true);
        var requestBody = JSON.stringify(localData);
        httpRequest.send(requestBody);
        httpRequest.onreadystatechange = getdata;
    }
    catch (e) {
        document.getElementById("main").innerHTML = "Please update your browser... " + e;
    }
};

const addToLocal = () => {
    let firstName = document.querySelector("#firstName");
    let lastName = document.querySelector("#lastName");
    let table = document.querySelector("#inputTable");

    localData.push({fname: firstName.value, lname: lastName.value});

    let row = document.createElement("tr");
    let td1 = document.createElement("td");
    td1.textContent = firstName.value;
    row.appendChild(td1);

    let td2 = document.createElement("td");
    td2.textContent = lastName.value;
    row.appendChild(td2);

    table.appendChild(row);
}


const fetchLoadData = () => {
    let responseHeaders = "";
    /*  Fetch returns a promise, which we handle with a .then  */
    fetch("data.php", {
        method: 'post',
        body: JSON.stringify(localData)
    })
        .then((response) => {
            response.headers.forEach((value, name) => {
                responseHeaders += name + ": " + value + "<br>\r\n";
            });
            /*  .json() returns another promise, so we will need another .then.  */
            return response.json();
        })
        .then((jsonObj) => {
            handleDataFromServer(jsonObj, responseHeaders);
        });

};

/*  Handles the server data once we have a parse json object and the response headers  */
const handleDataFromServer = (jsonObj, responseHeaders) => {
    if (!jsonObj || !jsonObj[0]) {
        return;
    }
    let columns = 0;
    let serverOutput = document.querySelector("#server");
    let table = document.createElement("table");

    /*  Table Column Title  */
    let titleRow = document.createElement("tr");
    for (let key in jsonObj[0]) {
        columns++;
        let th = document.createElement("th");
        th.textContent = key;
        titleRow.appendChild(th);
    }
    table.appendChild(titleRow);

    /*  Data  */
    for (let key1 in jsonObj) {
        let row = document.createElement("tr");
        for (let key2 in jsonObj[key1]) {
            let td = document.createElement("td");
            td.textContent = jsonObj[key1][key2];
            row.appendChild(td);
        }
        table.appendChild(row);
    }

    /*  Response headers  */
    let serverRow = document.createElement("tr");
    let sth = document.createElement("td");
    sth.setAttribute("colspan", columns);
    sth.textContent = "Response Headers";
    serverRow.appendChild(sth);
    table.appendChild(serverRow);


    let serverRow2 = document.createElement("tr");
    let std = document.createElement("td");
    std.setAttribute("colspan", columns);
    std.innerHTML = responseHeaders;
    serverRow2.appendChild(std);
    table.appendChild(serverRow2);

    serverOutput.insertBefore(table, serverOutput.firstChild);
}
