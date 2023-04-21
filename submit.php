// Get the form element
const form = document.querySelector('form');

// Add an event listener for form submission
form.addEventListener('submit', (event) => {
  // Prevent the default form submission behavior
  event.preventDefault();
  
  // Get the user input values
  const name = form.elements.name.value;
  const email = form.elements.email.value;
  const message = form.elements.message.value;
  
  // Send the user input to a server for processing
  fetch('https://example.com/submit-form', {
    method: 'POST',
    body: JSON.stringify({ name, email, message }),
    headers: {
      'Content-Type': 'application/json'
    }
  })
  .then(response => response.json())
  .then(data => {
    // Show a success message to the user
    alert('Thanks for contacting me! I will get back to you soon.');
    
    // Clear the form inputs
    form.elements.name.value = '';
    form.elements.email.value = '';
    form.elements.message.value = '';
  })
  .catch(error => {
    // Show an error message to the user
    alert('Sorry, there was an error submitting your message. Please try again later.');
  });
});
