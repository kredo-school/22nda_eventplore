// FullCalendar
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var today = new Date();
    today.setHours(0, 0, 0, 0); // 今日の0時0分0秒に設定

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth', // 月表示
        firstDay: 1, // 月曜始まり
        height: 'auto', // 高さ自動
        fixedWeekCount: false, // 月毎に週数を固定しない
        selectable: true, // 日にち選択可能
        unselectAuto: false, // 日にち選択継続
        dateClick: function(info) {
            if (info.date >= today) { // 今日以降の日付がクリックされた場合
                document.getElementById('caleandarDate').value = info.dateStr; // 選択日をフォームに格納
            }
        },
        selectAllow: function(selectInfo) {
            // 今日以降の日付のみ選択可能
            return selectInfo.start >= today;
        },
        dayCellClassNames: function(info) {
            // 過去の日付に対してクラスを追加
            if (info.date < today) {
                return ['past-date'];
            }
            return [];
        }
    });
    calendar.render();

    // カレンダーの選択解除
    window.clearCalendar = function() {
        calendar.unselect();
        document.getElementById('caleandarDate').value = '';
    };
});