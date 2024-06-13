document.getElementById("emailForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const formData = new FormData(this);
    fetch('process.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById("result").innerHTML = `
                <p>Contains classified word/phrase: ${data.containsClassified}</p>
                <p>Email Text:</p>
                <p>${data.emailText}</p>
            `;
        } else {
            document.getElementById("result").innerHTML = `
                <p>Error: ${data.error}</p>
            `;
        }
        
    })
    .catch(error => console.error('Error:', error));
});
