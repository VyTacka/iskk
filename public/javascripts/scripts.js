$(document).ready(function () {
    var contentLeft = $('#contentLeft');
    var contentLeftHeading = contentLeft.find('h2');
    var contentLeftList = contentLeft.find('ul');

    contentLeftHeading.mouseover(function () { // užvedus pelyte
        $(this).css('cursor', 'pointer'); // pakeičiamas pelytės žymeklis
    });

    contentLeftHeading.click(function () { // paspaudus contentLeft h2 elem.
        contentLeftList.fadeToggle('slow'); // slepiamas/rodomas ul meniu elem.
    });

    var contentRight = $('#contentRight');

    contentRight.fadeIn('slow');
});

