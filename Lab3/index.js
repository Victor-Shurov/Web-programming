let count = 2;
function createTable() {
    let check = document.getElementById("data_table");
    if (check !== null) {
        alert("Таблица уже существует");
        return;
    }
    let table = document.createElement("table");
    table.setAttribute("id", "data_table");

    let tr1 = table.insertRow(-1);
    let th1 = tr1.insertCell(0);
    let th2 = tr1.insertCell(1);
    th1.innerHTML = "Номер";
    th2.innerHTML = "Сообщение";

    let tr2 = table.insertRow(-1);
    let td11 = tr2.insertCell(0);
    let td12 = tr2.insertCell(1);
    td11.innerHTML = "1";
    td12.innerHTML = "Здравствуйте";

    let tr3 = table.insertRow(-1);
    let td21 = tr3.insertCell(0);
    let td22 = tr3.insertCell(1);
    td21.innerHTML = "2";
    td22.innerHTML = "Привет";

    document.getElementById("right").appendChild(table);

    document.getElementById("btn-add").disabled = false;
    document.getElementById("btn-delete").disabled = false;
    showAddTableSuccessToast();
}

function addRow() {
    count++;
    let table = document.getElementById("data_table");
    let message = document.getElementById("message");
    let row = table.insertRow(-1);
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    cell1.innerHTML = "" + count;
    cell2.innerHTML = message.value;
    message.value = "";
    showAddSuccessToast();
}

function deleteRow() {
    let table = document.getElementById("data_table");
    let number = document.getElementById("number").value;
    if (isNaN(number) || number === "") {
        alert("Пожалуйста, введите число");
        return;
    }
    var length = table.rows.length;
    if (number >= length) {
        document.getElementById("number").value = "";
        showErrorToast();
        return;
    }
    table.deleteRow(number);
    document.getElementById("number").value = "";
    var length = table.rows.length;
    if (length === 1) {
        document.getElementById("btn-add").disabled = true;
        document.getElementById("btn-delete").disabled = true;
        table.setAttribute("id", "");
        table.deleteRow(0);
    }
    for (let i = number; i < length; i++) {
        table.rows[i].cells[0].innerHTML = "" + i;
    }
    showDeleteSuccessToast();
    count--;
}





function Custom_toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .4s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
        main.appendChild(toast);
    }
}
function showAddTableSuccessToast() {
    Custom_toast({
        title: "Успех",
        message: "Добавление таблицы успешно.",
        type: "success",
        duration: 1000
    });
}
function showDeleteSuccessToast() {
    Custom_toast({
        title: "Успех",
        message: "Удалить строку успешно.",
        type: "success",
        duration: 1000
    });
}

function showAddSuccessToast() {
    Custom_toast({
        title: "Успешно!",
        message: "Добавить строку успешно",
        type: "success",
        duration: 1000
    });
}

function showErrorToast() {
    Custom_toast({
        title: "Не удалось!",
        message: "Номер строки не существует.",
        type: "error",
        duration: 2000
    });
}