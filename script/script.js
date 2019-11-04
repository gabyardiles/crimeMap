$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
    });

    var date = $('#dateFilter')
    var Currentdate = new Date();

    var day = Currentdate.getDate();
    var month = Currentdate.getMonth() + 1;
    var year = Currentdate.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    date.val(today);
    
});