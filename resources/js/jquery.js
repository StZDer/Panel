import $ from "jquery";
window.$ = window.jQuery = $;
let time = 0;
$(document).ready(function () {
    //здесь функция срабатывает раз в минуту, можно настроить как вам удобно
    let interval = setInterval(idleTimer, 60000);

    //тут можно добавлять все события которые не должны срабатывать(нажатие на клавиши, ресайз и т.д.)
    $(this).on("mousemove", function (e) {
        time = 0;
    });
});

//тут задаем время простоя, сейчас стоит 3 минуты
function idleTimer() {
    time = time + 1;
    if (time > 2) {
        //  document.location.assign('{{ route('panel.main') }}')
        location.href = "http://127.0.0.1:8000";
    }
}
