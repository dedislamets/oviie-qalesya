$(function(){

    function setDateToDropDown() {
        let button = $('#dropdownMenu');
        button.text(moment().format("Do MMM YYYY"));
        $('.dashboard-buttons .dropdown .dropdown-item').each(
            function(i, elem) {
                $(elem).text(moment().add(i + 1, 'd').format("Do MMM YYYY"))
            }
        )
    }

    function pjaxPageLoad(){
        $('.widget').widgster();
        // apexChartFifth();
        setDateToDropDown();
    }

    pjaxPageLoad();
    SingApp.onPageLoad(pjaxPageLoad);

});