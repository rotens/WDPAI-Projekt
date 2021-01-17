const user = document.querySelector('.user-select');
const dateFrom = document.querySelector('.search-form input[name="from"]');
const dateTo = document.querySelector('.search-form input[name="to"]');
const searchedString = document.querySelector('.search-form input[name="search_input"]');
const searchButton = document.querySelector('.search-form button');
const resultsContainerH1 = document.querySelector('.results-container h1');
const messagesTable = document.querySelector('.results-table-container table');

searchButton.addEventListener("click", function (event) {
    const data = {
        user: user.value,
        dateFrom: dateFrom.value,
        dateTo: dateTo.value,
        searchedString: searchedString.value
    };

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (messages) {
        resultsContainerH1.innerText = "Wyniki wyszukiwania"
        messagesTable.innerHTML = "";
        if (messagesTable.querySelector("tr") == null)
        {
            const tableHeaderTemplate = document.querySelector("#table-header-template");
            const clone = tableHeaderTemplate.content.cloneNode(true);
            messagesTable.appendChild(clone);
        }
        console.log(messages);
        loadMessages(messages);
    });

});

function loadMessages(messages) {
    messages.forEach(message => {
        console.log(message);
        createMessage(message);
    });
}

function createMessage(message) {
    const template = document.querySelector("#message-template");

    const clone = template.content.cloneNode(true);
    const user = clone.querySelector("td:nth-child(1)");
    user.innerText = message.name;
    const date = clone.querySelector("td:nth-child(2)");
    date.innerText = message.date;
    const message_content = clone.querySelector("td:nth-child(3)");
    message_content.innerText = message.message;

    messagesTable.appendChild(clone);
}
