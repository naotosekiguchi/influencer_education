import './bootstrap';
import $ from 'jquery';

console.log('app.js読み込みOK');
    $(function () {
        if (loginRequired) {
            alert('ログインしてください');
    }

    console.log('$(function)実行');

    let year = currentYear;
    let month = currentMonth;
    let gradeId = currentGradeId;

    const title = $('#current-month');

    function loadCurriculums() {
        console.log('loadCurriculums実行');

        $.ajax({
            url: '/user/curriculum_list',
            type: 'GET',
            data: {
                year: year,
                month: month,
                grade_id: gradeId
            },
            success: function(response) {
                console.log('Ajax成功');
                console.log(response);
                $('.lesson-area').empty();

                if (response.length === 0) {
                    $('.lesson-area').html('<p>対象データなし</p>');
                    return;
                }

                response.forEach(function(curriculum) {

                    let deliveryHtml = '';

                    if (curriculum.alway_delivery_flg == 1) {
                        // クリア済み、または受講中ではない学年は非活性
                        if (currentGradeId !== gradeId) {

                            deliveryHtml = `
                                <p>
                                    <span>
                                        常時公開
                                    </span>
                                </p>
                            `;

                        } else {

                            deliveryHtml = `
                                <p>
                                    <a href="/delivery/${curriculum.id}">
                                        常時公開
                                    </a>
                                </p>
                            `;

                        }

                    } else {

                        curriculum.delivery_times.forEach(function(deliveryTime) {

                            const from = new Date(deliveryTime.delivery_from);
                            const to = new Date(deliveryTime.delivery_to);

                            const month = from.getMonth() + 1;
                            const day = from.getDate();

                            const fromHour = String(from.getHours()).padStart(2, '0');
                            const fromMinute = String(from.getMinutes()).padStart(2, '0');

                            const toHour = String(to.getHours()).padStart(2, '0');
                            const toMinute = String(to.getMinutes()).padStart(2, '0');
                            // クリア済み、または受講中ではない学年は非活性
                            if (curriculum.clear_flg == 1 || currentGradeId !== gradeId) {

                                deliveryHtml += `
                                    <p>
                                        <span>
                                            ${month}月${day}日 ${fromHour}:${fromMinute}
                                            ～
                                            ${toHour}:${toMinute}
                                        </span>
                                    </p>
                                `;

                            } else {

                                deliveryHtml += `
                                    <p>
                                        <a href="/delivery/${curriculum.id}">
                                            ${month}月${day}日 ${fromHour}:${fromMinute}
                                            ～
                                            ${toHour}:${toMinute}
                                        </a>
                                    </p>
                                `;

                            }

                        });

                    }

                    // 画像とタイトル
                    let titleHtml = '';
                    // クリア済み、または受講中ではない学年は非活性
                    if (curriculum.clear_flg == 1 || currentGradeId !== gradeId) {

                        titleHtml = `
                            <span class="lesson-title">
                                ${curriculum.title}
                            </span>
                        `;

                    } else {

                        titleHtml = `
                            <a href="/delivery/${curriculum.id}" class="lesson-title">
                            ${curriculum.title}
                            </a>
                        `;

                    }

                    $('.lesson-area').append(`
                        <div class="lesson-card">
                            <img
                                src="/storage/images/banner/${curriculum.thumbnail}"
                                class="lesson-image"
                            >

                            ${titleHtml}

                            ${deliveryHtml}
                        </div>
                    `);
                });
            },
            error: function(xhr) {
                if (xhr.status === 401) {
                    alert('ログインしてください');
                    return;
                }

                console.log('AJAX失敗');
            }
        });
    }

    // 初期表示
    loadCurriculums();

    // 前月ボタン
    $('.prev-month').on('click', function () {

        month--;

        if (month === 0) {
            year--;
            month = 12;
        }

        title.text(year + '年' + month + '月スケジュール');
        loadCurriculums();

    });

    // 翌月ボタン
    $('.next-month').on('click', function () {

        month++;

        if (month === 13) {
            year++;
            month = 1;
        }

        title.text(year + '年' + month + '月スケジュール');

        console.log(year);
        console.log(month);
        loadCurriculums();

    });

    // 学年ボタン
    $('.grade-button').on('click', function () {

        gradeId = $(this).data('grade');
        const currentGrade = $('#current-grade');

    currentGrade.text($(this).text());
    currentGrade.removeClass('junior-high-school high-school');

    if (gradeId >= 7 && gradeId <= 9) {
        currentGrade.addClass('junior-high-school');

    } else if (gradeId >= 10 && gradeId <= 12) {
        currentGrade.addClass('high-school');
    }
    loadCurriculums();
});

});