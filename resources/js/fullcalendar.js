// FullCalendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth', // 月表示
      firstDay: 1, // 月曜始まり
      height: 'auto', // 高さ自動
      fixedWeekCount: false, // 月毎に週数を固定しない
      selectable: true, // 日にち選択可能
      unselectAuto: false, // 日にち選択継続
      dateClick: function(info) {
        document.getElementById('date').value = info.dateStr; // 選択日をフォームに格納
      },
    });
    calendar.render();
  });