function activeMenu(id) {
    itemMenu    = "#item-menu-"+id;
    itemContent = "#item-content-"+id;

    $('.item-menu').each(function () {
        $(this).removeClass('selected')
    });

    $('.item-content').each(function () {
        $(this).hide()
    });

    $(itemMenu).addClass('selected');
    $(itemContent).show();
}

function preventLink(e) {
    e.preventDefault();
}