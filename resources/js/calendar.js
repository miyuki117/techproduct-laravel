import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import axios from 'axios';

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin,timeGridPlugin, listPlugin],
    initialView: "timeGridWeek",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,listWeek",
    },
    buttonText:{
        today:'今日',
        month: '月',
        week: '週',
        list: '一覧'
    },
    timeZone: 'Asia/Tokyo',
    locale: "ja",


     //データの取得、表示
     events: function(info,successCallback,failureCallback){

     axios
     .post('/calendar_show',{

        startDate: info.start.valueOf(),
        endDate: info.end.valueOf(),
    }).then((response)=>{

        // カレンダーに読み込み
        if (response.data && Array.isArray(response.data)) {
            successCallback(response.data);
        } else {
            console.error('Invalid response format:', response);
        }
    }).catch((error)=>{
            // バリデーションエラーなど
            console.error(error);
            alert("登録に失敗しました");
        });
    }

});


calendar.render();