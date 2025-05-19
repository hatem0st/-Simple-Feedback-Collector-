document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    const message = document.getElementById('message').value.trim();
    
    if (message === '') {
        alert('Please enter your feedback message');
        event.preventDefault();
    }
});