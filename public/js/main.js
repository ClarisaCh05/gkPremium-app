function getCurrentTime() {
    return moment().format('h:mm A');
}

function getCurrentDateTime() {
    return moment().format('MM/DD/YY h:mm A');
}

function dateFormat(datetime) {
    return moment(datetime, 'YYYY-MM-DD HH:m:ss').format('MM/DD/YY HH:mm A');
}

function timeFormat(dateitem) {
    return moment(datetime, "YYYY-MM-DD HH:mm:ss").format('h:mm A');
}