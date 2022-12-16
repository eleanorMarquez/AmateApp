var calendar = null;
$(document).ready(function () {
    var calendarEl = document.getElementById("calendar");
    $("#clos").click(function () {
        $("#exampleModal").modal("hide");
    });
    calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: "prev,next today",
            center: "title",
            right: "dayGridMonth,timeGridWeek,timeGridDay",
        },
        locale: "es",
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        select: function (arg) {
            //console.log(arg);
            let d = moment(arg.start).format("YYYY-MM-DD");
            let hi = moment(arg.start).format("HH:mm:ss");
            let hf = moment(arg.end).format("HH:mm:ss");
            //console.log(m);

            $("#txt_date").val(d);
            $("#txt_time_start").val(hi);
            $("#txt_time_end").val(hf);
            $("#exampleModal").modal("show");
            calendar.unselect();
        },
        eventClick: function (info) {
            Swal.fire({
                title: "Eliminar Disponibilidad",
                text: "¿Estás seguro de eliminar esta disponibilidad de cita?",
                icon: "question",
                showCancelButton: "Cancelar",
                confirmButtonColor: "#d33",
                confirmButtonText: "Si, eliminar",
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(info.event.id);
                    var url = "citas/eliminardisponibilidad/" + info.event.id;
                    $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        },
                        type: "GET",
                        encoding: "UTF-8",
                        url: url,
                        dataType: "json",
                        beforeSend: function () {
                            Swal.fire({
                                text: "Eliminando disponibilidad de cita, espere...",
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                            });
                        },
                    })
                        .done(function (respuesta) {
                            //console.log(respuesta);
                            if (!respuesta.error) {
                                Swal.fire({
                                    title: "Disponibilidad de cita Eliminada!",
                                    icon: "success",
                                    showConfirmButton: true,
                                });
                                calendar.refetchEvents();
                                //info.event.remove();
                            } else {
                                setTimeout(function () {
                                    Swal.fire({
                                        title: respuesta.mensaje,
                                        icon: "error",
                                        showConfirmButton: true,
                                        timer: 4000,
                                    });
                                }, 2000);
                            }
                        })
                        .fail(function (resp) {
                            console.log(resp);
                        });
                }
            });
        },
        selectAllow: function (selectInfo) {
            return moment().diff(selectInfo.start) <= 0;
        },
        editable: true,
        hiddenDays: [0],
        events: {
            url: "/listado/citas",
            method: "GET",
            failure: function () {
                Swal.fire({
                    title: "Ha ocurrido un error al cargar la agenda",
                    icon: "error",
                    button: false,
                    timer: 4000,
                });
            },
            //color: 'yellow',   // a non-ajax option
            //textColor: 'black' // a non-ajax option
        },
    });

    calendar.render();
});
function clear() {
    $("#txt_date").val("");
    $("#txt_time_start").val("");
    $("#txt_time_end").val("");
    $("#txt_title").val("");
    $("#txt_link").val("");
    $("#exampleModal").modal("hide");
}

function savedata() {
    let form = new FormData(document.getElementById("form-citation"));

    $.ajax({
        url: "/citas/store",
        type: "POST",
        data: form,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
    }).done(function (respuesta) {
        console.log(respuesta);
        if (respuesta && respuesta.ok) {
            clear();
            calendar.refetchEvents();
            Swal.fire({
                title: "Disponibilidad de cita guardada",
                icon: "success",
                button: true,
                timer: 2000,
            });
        } else {
            Swal.fire({
                title: "La agenda ya contiene la fecha seleccionada",
                icon: "error",
                button: false,
                timer: 4000,
            });
        }
    });
}
