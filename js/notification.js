

function runnerNotification(role, username, notificationBtnId = 'btn-notification') {
    let baseApi = role == 'admin' ? 'admin_api.php' : role == 'review' ? 'review_api.php' : role == 'penyewa' ? 'penyewa_api.php' : null;
    settingCountNotification(baseApi, username);
    document.getElementById(notificationBtnId).addEventListener('click', () => {
        onClickBtnNotification(baseApi, username);
    })
}


function getNotification(username = null, urlApi) {
    return $.ajax({
        url: `${urlApi}?m=getNotification${username ? `&username=${username}` : ''}`,
        method: "GET",
        async: false,
        success: (res) => {
            (jQuery.parseJSON(res));
        }
    })
}

// function runnerNotification() {
//     setInterval(() => {
//         settingCountNotification()
//     }, 10000)
// }

function settingCountNotification(urlApi, username = null) {
    const datas = JSON.parse(getNotification(username, urlApi).responseText);
    $("#countNotification").empty();
    $("#countNotification").append(datas.length);
}

function onClickBtnNotification(urlApi, username = null) {
    const datas = JSON.parse(getNotification(username, urlApi).responseText);
    let tableData = '';

    datas.forEach((value, index) => {
        tableData += '<tr>';
        tableData += `<td>${index + 1}</td>`;
        tableData += `<td>${value.id_bayar}</td>`;
        tableData += `<td>${value.totalbayar}</td>`;
        if (value.status == 1) {
            tableData += `<td><span class="badge badge-pill badge-success">Success</span></td>`;
        }else if (value.status == 2) {
            tableData += `<td><span class="badge badge-pill badge-danger">Ditolak</span></td>`;
        }else {
            tableData += `<td><span class="badge badge-pill badge-warning">Pending</span</td>`;
        }
        tableData += '</tr>';
    })

    $('#table-notification > tbody').empty();
    $('#table-notification > tbody').append(tableData);
    $('#NotificationModal').modal('show');
    readNotification(datas, username ? username : null, urlApi);
}

function readNotification(notifications, username, urlApi) {
    $.ajax({
        url: `${urlApi}?m=readNotification`,
        method: "POST",
        async: false,
        data: {
            notifications
        },
        success: () => {
            settingCountNotification(urlApi, username);
        }
    })
}