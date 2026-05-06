
// State variables
let calCurrentDate = new Date();
let calSelectedDate = null;

// DOM element references
const calMonthYearEl = document.getElementById('calMonthYear');
const calDaysContainer = document.getElementById('calDaysContainer');
const calPrevBtn = document.getElementById('calPrevBtn');
const calNextBtn = document.getElementById('calNextBtn');
const calSelectedDisplay = document.getElementById('calSelectedDisplay');

const calMonthNames = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

function calRenderCalendar() {
    calDaysContainer.innerHTML = '';

    const year = calCurrentDate.getFullYear();
    const month = calCurrentDate.getMonth();

    calMonthYearEl.textContent = `${calMonthNames[month]} ${year}`;

    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDayOfWeek = new Date(year, month, 1).getDay();

    const today = new Date();
    const isCurrentMonth = 
        today.getFullYear() === year && 
        today.getMonth() === month;

    // Empty padding cells
    for (let i = 0; i < firstDayOfWeek; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.classList.add('cal-widget-daycell-empty');
        calDaysContainer.appendChild(emptyCell);
    }

    // Day cells
    for (let day = 1; day <= daysInMonth; day++) {
        const dayCell = document.createElement('div');
        dayCell.classList.add('cal-widget-daycell');
        dayCell.textContent = day;

        if (isCurrentMonth && today.getDate() === day) {
            dayCell.classList.add('cal-widget-daycell-today');
        }

        if (calSelectedDate) {
            const isSelected = 
                calSelectedDate.getDate() === day &&
                calSelectedDate.getMonth() === month &&
                calSelectedDate.getFullYear() === year;
            
            if (isSelected) {
                dayCell.classList.add('cal-widget-daycell-selected');
            }
        }

        dayCell.addEventListener('click', function() {
            calSelectedDate = new Date(year, month, day);
            calUpdateSelectedDisplay();
            calRenderCalendar();
        });

        calDaysContainer.appendChild(dayCell);
    }
}

function calUpdateSelectedDisplay() {
    if (!calSelectedDate) {
        calSelectedDisplay.textContent = 'None';
        return;
    }

    const options = { 
        weekday: 'long', 
        year: 'numeric', 
        month: 'long', 
        day: 'numeric' 
    };
    calSelectedDisplay.textContent = calSelectedDate.toLocaleDateString('en-US', options);
}

calPrevBtn.addEventListener('click', function() {
    calCurrentDate.setMonth(calCurrentDate.getMonth() - 1);
    calRenderCalendar();
});

calNextBtn.addEventListener('click', function() {
    calCurrentDate.setMonth(calCurrentDate.getMonth() + 1);
    calRenderCalendar();
});

// Initial render
calRenderCalendar();