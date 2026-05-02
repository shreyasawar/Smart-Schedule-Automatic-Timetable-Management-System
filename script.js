document.addEventListener("DOMContentLoaded", function() {
    // You can add interactivity here if needed
    const markAbsenceBtn = document.getElementById('markAbsenceBtn');
    const viewTimetableBtn = document.getElementById('viewTimetableBtn');

    markAbsenceBtn.addEventListener('click', function() {
        alert('Redirecting to the "Mark Absence" page...');
    });

    viewTimetableBtn.addEventListener('click', function() {
        alert('Redirecting to the "View Timetable" page...');
    });
});






//2222222


// Simple validation to ensure no empty fields
document.querySelector('form').addEventListener('submit', function(event) {
    const teacherName = document.getElementById('teacher_name').value.trim();
    const date = document.getElementById('date').value;
    const reason = document.getElementById('reason').value.trim();

    if (!teacherName || !date || !reason) {
        event.preventDefault();  // Prevent form submission
        alert('All fields are required!');
    }
});



///333
