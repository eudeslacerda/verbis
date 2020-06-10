var registryCode = 0;

function back() {
    window.history.back();
}

function go(url) {
    window.location = url;
}

function goActionButton(url) {
    window.location = url + "/" + registryCode;
}

function setId(code) {
    registryCode = code;
}

function buttonEnable(idHTML) {
    $(idHTML).removeAttr('disabled');
}

function setSelectedLine(idTable, code, btn) {
    $(idTable).on('click', 'tr', function () {

        for (var i = 0; i < btn.length; i++)
            buttonEnable(btn[i]);

        registryCode = code;

        $(this).siblings().removeClass('active');
        $(this).toggleClass('active');

    });
}
