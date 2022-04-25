let SelectedCoachIndex;
let Coaches = [];
let DaysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
let Begin_week_date;
let mapp_Time_GridLine =
{
    "08:00:00":2,
    "08:30:00":3,
    "09:00:00":4,
    "09:30:00":5,
    "10:00:00":6,
    "10:30:00":7,
    "11:00:00":8,
    "11:30:00":9,
    "12:00:00":10,
    "12:30:00":11,
    "13:00:00":12,
    "13:30:00":13,
    "14:00:00":14,
    "14:30:00":15,
    "15:00:00":16,
    "15:30:00":17,
    "16:00:00":18,
    "16:30:00":19,
    "17:00:00":20,
    "17:30:00":21,
    "18:00:00":22,
    "18:30:00":23,
    "19:00:00":24,
    "19:30:00":25,
    "20:00:00":26,
    "20:30:00":27,
    "21:00:00":28,
    "21:30:00":29,
    "22:00:00":30,
    "22:30:00":21,
    "23:00:00":32,
    "23:30:00":33,
    "00:00:00":34
}

$(document).ready(function($){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    debugger
    Coaches = getCoaches();
    debugger
    if (Coaches.length > 0) {
        SelectedCoachIndex = 0;
        coach_name.textContent = Coaches[SelectedCoachIndex].nom;
        let currentDate = new Date();
        Begin_week_date = defineBeginWeek(currentDate);
        changePlanning(Coaches[SelectedCoachIndex].id);
    }
});
function getSalles(selectedDate, coach) {
    let salles = [];

    $.ajax({
        type:"GET",
        url: "/salles-planning",
        async: false,
        data: {
            givenDate : selectedDate,
            coachID : coach,
        },
        dataType: 'json',
        success: function(givenSalles){
            // debugger
            salles = givenSalles;
        },
        error: function (request, status, error) {
            console.log(request.responseText);
        }
    });

    return salles;
}
function getCoures(selectedDate, coach) {
    let Coures = [];

    $.ajax({
        type:"GET",
        url: "/coures-planning",
        async: false,
        data: {
            givenDate : selectedDate,
            coachID : coach,
        },
        dataType: 'json',
        success: function(givenCoures){
            // debugger
            Coures = givenCoures;
        },
        error: function (request, status, error) {
            console.log(request.responseText);
        }
    });

    return Coures;
}
// get all plannings for a specific date:
function getPlannings(selectedDate, coach)
{
    let salles = getSalles(selectedDate, coach);
    let coures = getCoures(selectedDate, coach);

    return [salles, coures];
}
function defineBeginWeek(currentDay)
{
    let begin_week_date = currentDay;
    let day_name = DaysOfWeek[currentDay.getDay()]; // get the name of the current day.
    if (day_name != DaysOfWeek[1]) {
        let nb_days_to_subtract = currentDay.getDay() - 1;
        if(nb_days_to_subtract == -1) // if the current day is Sunday.
        {
            nb_days_to_subtract = 6;
        }
        begin_week_date.setDate(currentDay.getDate() - nb_days_to_subtract);
    }
    return begin_week_date;
}
function changePlanning(selectedCoachIndex)
{
    $(".seances").remove();
    for (let i = 0; i < 7; i++) {
        let selectedDate = new Date(Begin_week_date);
        selectedDate.setDate(Begin_week_date.getDate() + i);
        const offset = selectedDate.getTimezoneOffset()
        selectedDate = new Date(selectedDate.getTime() - (offset*60*1000))
        let plannings = getPlannings(selectedDate.toISOString().split('T')[0], selectedCoachIndex);
        // debugger
        if (plannings[0].length > 0) {
            for (let j = 0; j < plannings[0].length; j++) {
                let divSeance = document.createElement("div");
                divSeance.textContent = plannings[1][j].nom + " " + plannings[0][j].nom;
                divSeance.style.gridColumnStart = mapp_Time_GridLine[plannings[1][j].plannings.start_time];
                divSeance.style.gridColumnEnd = mapp_Time_GridLine[plannings[1][j].plannings.end_time];
                divSeance.style.gridRowStart = DaysOfWeek[(i!=6)?i+1:0];
                divSeance.classList.add('seances');
                container.appendChild(divSeance);
            }
        }
    }
}
function getCoaches() {
    let givenCoaches;
    $.ajax({
        type:"GET",
        url: "/coaches",
        async: false,
        dataType: 'json',
        success: function(coaches){
            // debugger
            givenCoaches = coaches;
        },
        error: function (request, status, error) {
            debugger
            console.log(request.responseText);
        }
    });
    return givenCoaches;
}
setInterval(() => {
    // debugger
    if (Coaches.length > 0) {
        SelectedCoachIndex++;
        if (SelectedCoachIndex == Coaches.length) {
            SelectedCoachIndex = 0;
        }
        coach_name.textContent = Coaches[SelectedCoachIndex].nom;
        changePlanning(Coaches[SelectedCoachIndex].id);
    }
}, 10000);
