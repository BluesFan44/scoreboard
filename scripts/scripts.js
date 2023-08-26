/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $(".scoreRadio").click(function () {
        score = $(this).attr("value");
        table = ($(this).attr("name")).substr(7, 8);
        round = $("#currentRound").val();
        eventNo = $("#currentEvent").val();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                updateScore(this.responseText);
            }
        };
        xhttp.open("GET", 'services/srvAddScore.php?event=' + eventNo + '&team=' + table + '&round=' + round + '&score=' + score, true);
        xhttp.send();
    });
});


function updateScore(data) {
    var JSONdata = $.parseJSON(data);
    $.each(JSONdata, function (i, item) {
        $("#total" + item.Team).html(item.Total);
        if (item.Score != null) {
            $("#tableNo" + item.Team + "-" + item.Score).attr('checked', true);
            $("#tableNo" + item.Team + "-" + item.Score).button("refresh");
            $("#total" + item.Team).addClass('w3-green');
        }
    });
}
;

$(function () {
    $(".teamName").change(function () {
        teamName = $(this).val();
        table = ($(this).attr("name")).substr(4,5);
        eventNo = $("#currentEvent").val();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                  $("#team" + data).addClass('w3-green');
//                updateTeamName(this.responseText);
//                alert('Response = ' + this.responseText);
            }
        };
        xhttp.open("GET", 'services/srvNameTeam.php?eventid=' + eventNo + '&team=' + table + '&teamName=' + teamName, true);
        xhttp.send();
    });
});
